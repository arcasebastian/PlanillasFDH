<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PlanillaImportacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planilla-importacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'numero_interno')->textInput() ?>

    <?= $form->field($model, 'linea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rubro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_barras')->textInput() ?>

    <?= $form->field($model, 'unidad_medida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_costo_neto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_venta_neto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'porcentaje_iva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moneda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock_de_seguridad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'punto_de_pedido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock_maximo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'impuesto_interno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_origen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion_origen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuenta_contable_ventas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuenta_contable_compras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuenta_contable_acopio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_costo_lista_neto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_descuento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_descuento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tercer_descuento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuarto_descuento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_neto_lista_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_neto_lista_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_neto_lista_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_reposicion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
