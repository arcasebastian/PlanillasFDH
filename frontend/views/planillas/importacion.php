<?php

use frontend\models\PlanillaActual;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $modelArchivo PlanillaActual */
/* @var $selectOptions string[] */
/* @var $seleccionarHoja boolean */
/* @var $fileID int */

$this->title = 'Importar Planilla';
$this->params['breadcrumbs'][] = ['label' => 'Planillas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
if ($seleccionarHoja) { ?>
    <div class="input-group">
        <label for="sheet">Seleccione la hoja a importar: </label>
        <select name="sheet" id="sheet" class="custom-select">
            <?=
            Html::renderSelectOptions('sheet', $selectOptions);
            ?>
        </select>
    </div>
    <input name="fileID" type="hidden" value="<?= $fileID ?>">
    <?php
} else {
    echo $form->field($modelArchivo, 'planillaFile')->fileInput();
}
?>
    <button>Submit</button>
<?php
ActiveForm::end();
?>