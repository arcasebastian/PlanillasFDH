<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PlanillaImportacion */

$this->title = 'Create Planilla Importacion';
$this->params['breadcrumbs'][] = ['label' => 'Planilla Importacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planilla-importacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
