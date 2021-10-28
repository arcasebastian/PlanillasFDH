<?php

namespace frontend\controllers;

use common\models\Archivos;
use frontend\models\PlanillaActual;
use Yii;
use common\models\Planillas;
use common\models\PlanillasSearch;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\Json;

use PHPExcel;

/**
 * PlanillasController implements the CRUD actions for Planillas model.
 */
class PlanillasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Planillas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanillasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $planillaId = Yii::$app->request->post('editableKey');
            $model = Planillas::findOne($planillaId);
            $out = Json::encode(['output'=>'', 'message'=>'']);

            $posted = current($_POST['Planillas']);
            $post = ['Planillas' => $posted];

            if ($model->load($post)) {
                $model->save();
                $output = '';
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            }
            echo $out;
            return;
        }
        if (Yii::$app->request->post('')) {echo "";}
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Planillas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Planillas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Planillas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Planillas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Planillas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Planillas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Planillas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Planillas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImportar()
    {
        $seleccionarHoja = false;
        $selectOptions = null;
        $cargarArchivo = new PlanillaActual();

        if (Yii::$app->request->isPost) {
            if (isset($_POST['fileID'])) {
                $sheet = $_POST['sheet'];
                $archivo = Archivos::findOne($_POST['fileID']);
            } else {
                $cargarArchivo->planillaFile = UploadedFile::getInstance($cargarArchivo, 'planillaFile');
                if ($cargarArchivo->upload()) {
                    $archivo = Archivos::findOne(['filename' => $cargarArchivo->filename]);
                    if ($archivo == null) {
                        $archivo = new Archivos();
                        $archivo->filename = $cargarArchivo->filename;
                    }
                    $archivo->save();
                }
            }
            try {
                $inputFileType = \PHPExcel_IOFactory::identify($archivo->filename);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($archivo->filename);
            } catch (Exception $ex) {
                die('Error');
            }
            if (!isset($_POST['fileID'])) {
                $selectOptions = $objPHPExcel->getSheetNames();
                $seleccionarHoja = true;
            } else {
                $excelPage = $this->getSheetData($objPHPExcel, $sheet);
                $dataProvider = new ArrayDataProvider([
                    'allModels' => $excelPage,
                    'pagination' => false,
                ]);
                return $this->render('excel_array2', [
                    'excelpage' => $excelPage,
                    'fileID' => $_POST['fileID'],
                    'dataProvider' => $dataProvider,

                ]);
            }
        }
        return $this->render('importacion', [
            'modelArchivo' => $cargarArchivo,
            'seleccionarHoja' => $seleccionarHoja,
            'selectOptions' => $selectOptions,
            'fileID' => $archivo->id,]);
    }

    public function actionConfirmarimportacion()
    {
        if (Yii::$app->request->isPost) {
            $this->response->format = Response::FORMAT_JSON;

            $filas = explode(',', $_POST['activos']);
            $archivoAImportar = Archivos::findOne($_POST['idArchivo']);
            $inputFileType = \PHPExcel_IOFactory::identify($archivoAImportar->filename);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivoAImportar->filename);
            $arrayDatos = $this->getSheetData($objPHPExcel, $_POST['idHoja']);

            foreach ($filas as $fila) {
                $insert = $arrayDatos[$fila];
                $descripcion = $this->eliminar_acentos($insert[$_POST['descripcion_row']]);
                if (is_null($dato = Planillas::findOne(['descripcion' => $descripcion, 'marca' => $_POST['marca']])))
                    $dato = new Planillas();
                //else
                  //  continue;
                $dato->descripcion = $descripcion;
                $dato->costo_sin_impuesto =  $this->toFloat($insert[$_POST['costo_s_impuesto_row']]);
                $dato->linea = $_POST['linea'];
                $dato->rubro = $_POST['rubro'];
                $dato->marca = $_POST['marca'];
                $dato->porcentaje_iva = $_POST['iva'];
                $dato->save();
            }
            Yii::$app->session->setFlash('success', 'Se cargo/actualizo correctamente los datos');
            return [];
        }
        return [];
    }

    private function getSheetData($PHPExcelObj, $sheetNum)
    {
        $sheet = $PHPExcelObj->getSheet($sheetNum);
        $hojaArray = $sheet->toArray();
        $hojaArray['sheetName'] = $sheet->getTitle();
        $hojaArray['sheetID'] = $sheetNum;
        return $hojaArray;
    }

    private function toFloat($numero){
        $no_signed = str_replace( ["$"," "] , "" , $numero);
        //$remove_point = str_replace( "." , "" , $no_signed);
        $number = str_replace( "," , "" , $no_signed);
        return (float) $number;
    }
    private function eliminar_acentos($cadena){

        $cadena = strtoupper($cadena);
        //Reemplazamos la A y a
        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A'),
            $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'E', 'E', 'E', 'E'),
            $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'I', 'I', 'I', 'I'),
            $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'U', 'U', 'U', 'U'),
            $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'N', 'C', 'C'),
            $cadena
        );
        if (strpos($cadena, ['Flex', 'extra']) == 0)
        $cadena = str_replace(
            array('x', 'X'),
            array(' X ', 'X'),
            $cadena
        );
        $cadena = str_replace(
            array('  ', '   ', '    '),
            array(' '),
            $cadena
        );
        $needle = '/([0-9]){3} X/';
        preg_match($needle, $cadena, $matches);
        $position = strpos($cadena, $matches[0]) + 1;
        if ($position > 2)
        $cadena = substr_replace($cadena, ',', $position, 0);

        return $cadena;
    }
}
