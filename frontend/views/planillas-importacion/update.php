<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PlanillaImportacion */

$this->title = 'Update Planilla Importacion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Planilla Importacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planilla-importacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
