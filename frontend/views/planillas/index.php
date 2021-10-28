<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \kartik\editable\Editable;
use \kartik\grid\GridView as KGridView;
use yii\bootstrap\Html as BootHTML;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlanillasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planillas';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'descripcion',
        'editableOptions' => [
            'header' => 'Descripcion',
            'inputType' => Editable::INPUT_TEXT,
        ],
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'costo_sin_impuesto',
        'editableOptions' => [
            'header' => 'Costo S/Impuesto',
            'inputType' => Editable::INPUT_TEXT,
        ],
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'linea',
        'editableOptions' => [
            'header' => 'Linea',
            'inputType' => Editable::INPUT_TEXT,
        ],
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'rubro',
        'editableOptions' => [
            'header' => 'Rubro',
            'inputType' => Editable::INPUT_TEXT,
        ],
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'marca',
        'editableOptions' => [
            'header' => 'Marca',
            'inputType' => Editable::INPUT_TEXT,
        ],
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'activo',
        'editableOptions' => [
            'header' => 'Activo',
            'inputType' => Editable::INPUT_CHECKBOX,
        ],
    ],
];
?>
<div class="planillas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= BootHTML::a(
            'Importar Planilla', ['planillas/importar'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= KGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true, // pjax is set to always true for this demo
        'toolbar' => [
            ['content' => Html::a('Desactivar Todos', ['grid-demo'], [
                    'class' => 'btn btn-outline-secondary',
                    'title' => 'Desactivar Todos',
                    'data-pjax' => 0]) . ' ' .
                Html::a('Activar Todos', ['grid-demo'], [
                    'class' => 'btn btn-outline-secondary',
                    'title' => 'Activar Todos',
                    'data-pjax' => 1]),
                'options' => ['class' => 'btn-group mr-2']
            ]
        ],
        'bordered' => 'true',
        'responsive' => 'true',
        'hover' => 'true',
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
    ]);

    ?>


</div>
