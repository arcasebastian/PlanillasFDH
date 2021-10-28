<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PlanillasImportacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planilla-importacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'numero_interno') ?>

    <?= $form->field($model, 'linea') ?>

    <?= $form->field($model, 'rubro') ?>

    <?= $form->field($model, 'marca') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'codigo_barras') ?>

    <?php // echo $form->field($model, 'unidad_medida') ?>

    <?php // echo $form->field($model, 'precio_costo_neto') ?>

    <?php // echo $form->field($model, 'precio_venta_neto') ?>

    <?php // echo $form->field($model, 'porcentaje_iva') ?>

    <?php // echo $form->field($model, 'moneda') ?>

    <?php // echo $form->field($model, 'stock_de_seguridad') ?>

    <?php // echo $form->field($model, 'punto_de_pedido') ?>

    <?php // echo $form->field($model, 'stock_maximo') ?>

    <?php // echo $form->field($model, 'ubicacion') ?>

    <?php // echo $form->field($model, 'imagen') ?>

    <?php // echo $form->field($model, 'impuesto_interno') ?>

    <?php // echo $form->field($model, 'numero_origen') ?>

    <?php // echo $form->field($model, 'descripcion_origen') ?>

    <?php // echo $form->field($model, 'cuenta_contable_ventas') ?>

    <?php // echo $form->field($model, 'cuenta_contable_compras') ?>

    <?php // echo $form->field($model, 'cuenta_contable_acopio') ?>

    <?php // echo $form->field($model, 'precio_costo_lista_neto') ?>

    <?php // echo $form->field($model, 'primer_descuento') ?>

    <?php // echo $form->field($model, 'segundo_descuento') ?>

    <?php // echo $form->field($model, 'tercer_descuento') ?>

    <?php // echo $form->field($model, 'cuarto_descuento') ?>

    <?php // echo $form->field($model, 'precio_neto_lista_1') ?>

    <?php // echo $form->field($model, 'precio_neto_lista_2') ?>

    <?php // echo $form->field($model, 'precio_neto_lista_3') ?>

    <?php // echo $form->field($model, 'numero_reposicion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
