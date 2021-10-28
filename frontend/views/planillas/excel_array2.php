<?php

use common\models\Planillas;
use kartik\typeahead\Typeahead;
use \yii\widgets\ActiveForm;
use yii\helpers\Html;


?>

<?php ActiveForm::begin([
    'action' => ['planillas/confirmarimportacion'],
    'method' => 'POST',
    'id' => 'formulario',
    'enableAjaxValidation' => false,
    'enableClientValidation' => false,

])
?>
<div class="row">
    <div class="col-sm-6">
        <div class="input-group ">
            <label for="linea" class="control-label">Linea:</label>
            <?= Typeahead::widget([
                'name' => 'linea',
                'options' => ['class' => 'form-control'],

                'pluginOptions' => ['highlight' => true],
                'dataset' => [
                    [
                        'local' => \yii\helpers\ArrayHelper::getColumn(Planillas::find()->select('linea')->distinct()->asArray()->all(), 'linea'),
                        'limit' => 10
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-group">
            <label for="rubro">Rubro:</label>
            <?= Typeahead::widget([
                'name' => 'rubro',
                'options' => ['class' => 'form-control'],

                'pluginOptions' => ['highlight' => true],
                'dataset' => [
                    [
                        'local' => \yii\helpers\ArrayHelper::getColumn(Planillas::find()->select('rubro')->distinct()->asArray()->all(), 'rubro'),
                        'limit' => 10
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-group">
            <label for="marca">Marca:</label>
            <?= Typeahead::widget([
                'name' => 'marca',
                'options' => ['class' => 'form-control'],
                'pluginOptions' => ['highlight' => true],
                'dataset' => [
                    [
                        'local' => \yii\helpers\ArrayHelper::getColumn(Planillas::find()->select('marca')->distinct()->asArray()->all(), 'marca'),
                        'limit' => 10
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-group">
            <label for="iva">Porcentaje de IVA:</label>
            <input name="iva" id="iva" class="form-control">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-group">
            <label for="iva">Descripcion:</label>
            <select name="descripcion_row" class="form-control">
                <?= Html::renderSelectOptions('0', $excelpage[1]); ?>
            </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-group">
            <label for="iva">Costo Sin Impuesto:</label>
            <select name="costo_s_impuesto_row" class="form-control">
                <?= Html::renderSelectOptions('1', $excelpage[1]); ?>
            </select>
        </div>
    </div>
</div>
<input type="hidden" name="idHoja" value="<?= $excelpage['sheetID'] ?>">
<input type="hidden" name="idArchivo" value="<?= $fileID ?>">
<input type='hidden' name='activos' value='' id="activos"/>
<h1>Hoja: <?= $excelpage['sheetName'] ?></h1>
<?php ActiveForm::end();
?>
<?= \kartik\grid\GridView::widget([
    'id' => 'gridView_cargaMultiplesCheques',
    'dataProvider' => $dataProvider,
    'panel' => [
        'type' => \kartik\grid\GridView::TYPE_PRIMARY,
        'title' => $fileID,
    ],
    'toolbar' => [
        [
            'content' =>
                Html::button(
                    '<span>Cargar seleccionados</span>',
                    ['class' => 'btn btn-outline-primary btn-block ml-1',
                        'onclick' => 'cargarMultiplesCheques()'])
        ],
        [
            'content' =>
                Html::a(
                    '<span>Nueva Planilla</span>', ['importar'],
                    ['class' => 'btn btn-outline-warning btn-block ml-1'])
        ],
    ],
    'columns' => [

        [
            'class' => 'kartik\grid\CheckboxColumn',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'
    ]
]) ?>


