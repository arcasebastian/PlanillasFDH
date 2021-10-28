<?php

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $camposPlanillaNueva string[] */
/* @var $camposPlanillaVieja string[] */
/* @var $camposEspeciales string[] */

$this->title = 'Setear Columnas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planilla-importacion-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php
        ActiveForm::begin(['action' => ['planillas-importacion/create'], 'method' => 'POST']);
        foreach ($camposPlanillaNueva as $key => $campo) {
            ?>
            <div class="col-sm-12">
                <label for="<?= $key ?>" class="col-sm-4"><?= $campo ?></label>
                <input type="hidden" name="atributo[]" value="<?=$key?>">
                <select name="campos[]" id="<?= $key ?>" class="col-sm-4">
                    <?php
                    echo \yii\bootstrap\Html::renderSelectOptions('0', $camposPlanillaVieja);
                    ?>
                </select>

                <select name="especial[]" id="<?= $campo ?>" class="col-sm-4">
                    <?php
                    echo \yii\bootstrap\Html::renderSelectOptions('0', $camposEspeciales);
                    ?>
                </select>
            </div>
        <?php }
        echo Html::submitButton('Generar');
        ActiveForm::end();
        ?>
    </div>
</div>
