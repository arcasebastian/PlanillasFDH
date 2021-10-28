<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ColumnasEspeciales */

$this->title = 'Create Columnas Especiales';
$this->params['breadcrumbs'][] = ['label' => 'Columnas Especiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="columnas-especiales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
