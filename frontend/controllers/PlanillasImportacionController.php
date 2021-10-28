<?php

namespace frontend\controllers;

use common\models\ColumnasEspeciales;
use common\models\Planillas;
use Yii;
use common\models\PlanillaImportacion;
use common\models\PlanillasImportacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanillasImportacionController implements the CRUD actions for PlanillaImportacion model.
 */
class PlanillasImportacionController extends Controller
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
     * Lists all PlanillaImportacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanillasImportacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $planillaVieja = new Planillas();
        $planillaNueva = new PlanillaImportacion();
        $columnasEspeciales = ColumnasEspeciales::find()->all();
        foreach ($columnasEspeciales as $columna) {
            $campoEspeciales[$columna->id] = $columna->nombre;
        }
        $camposPlanillaVieja['null'] = "NULL";
        $camposPlanillaVieja[] = $planillaVieja->attributeLabels();
        $camposPlanillaNueva = $planillaNueva->attributeLabels();
        return $this->render('index', [
            'camposPlanillaVieja' => $camposPlanillaVieja,
            'camposPlanillaNueva' => $camposPlanillaNueva,
            'camposEspeciales' => $campoEspeciales
        ]);
    }

    /**
     * Displays a single PlanillaImportacion model.
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
     * Creates a new PlanillaImportacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->post()) {
            $campos = $_POST['campos'];
            $atributos = $_POST['atributo'];
            $especiales = $_POST['especiales'];

            $articulosActivos = Planillas::findAll(['activo' => 1]);

            foreach ($articulosActivos as $articulo) {
                if (is_null($dato = PlanillaImportacion::findOne(['descripcion' => $articulo->descripcion])))
                    $dato = new PlanillaImportacion();
                foreach ($campos as $key => $campo) {
                    if ($campo == 'null') continue;
                    echo "$atributos[$key]  $key == $articulo[$campo] <br>";
                    $dato[$atributos[$key]] = $articulo[$campo];
                }
                $dato->save();
            }


        } else {
            $model = new PlanillaImportacion();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PlanillaImportacion model.
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
     * Deletes an existing PlanillaImportacion model.
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

    public function actionControlar()
    {
        $searchModel = new PlanillasImportacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('asdsa', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    /**
     * Finds the PlanillaImportacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PlanillaImportacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PlanillaImportacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCrearExcel()
    {
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $ews = $objPHPExcel->getSheet(0);
        $ews->setTitle("1");
        $modelo = new PlanillaImportacion();
        $ews->fromArray($modelo->attributeLabels(), ' ', 'A1');
        $Datos = PlanillaImportacion::find()->orderBy('linea')->addOrderBy('rubro')->all();
        $index = 2;
        foreach ($Datos as $dato) {
            $ews->fromArray($dato->getAttributes(array_keys($modelo->attributeLabels())), ' ', 'A' . $index);
            $index++;
        }
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias('@webroot') . '/some_excel_file.xlsx');
    }
}
