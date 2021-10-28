<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PlanillasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planillas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'costo_sin_impuesto') ?>

    <?= $form->field($model, 'costo_con_impuesto') ?>

    <?= $form->field($model, 'precio_mayorista') ?>

    <?php // echo $form->field($model, 'efectivo') ?>

    <?php // echo $form->field($model, 'linea') ?>

    <?php // echo $form->field($model, 'rubro') ?>

    <?php // echo $form->field($model, 'marca') ?>

    <?php // echo $form->field($model, 'porcentaje_iva') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
