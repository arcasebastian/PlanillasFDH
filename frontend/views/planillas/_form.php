<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Planillas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planillas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costo_sin_impuesto')->textInput() ?>

    <?= $form->field($model, 'costo_con_impuesto')->textInput() ?>

    <?= $form->field($model, 'precio_mayorista')->textInput() ?>

    <?= $form->field($model, 'efectivo')->textInput() ?>

    <?= $form->field($model, 'linea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rubro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'porcentaje_iva')->textInput() ?>

    <?= $form->field($model, 'activo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
