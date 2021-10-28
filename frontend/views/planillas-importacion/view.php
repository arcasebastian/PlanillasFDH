<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PlanillaImportacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Planilla Importacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="planilla-importacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'numero_interno',
            'linea',
            'rubro',
            'marca',
            'descripcion',
            'codigo_barras',
            'unidad_medida',
            'precio_costo_neto',
            'precio_venta_neto',
            'porcentaje_iva',
            'moneda',
            'stock_de_seguridad',
            'punto_de_pedido',
            'stock_maximo',
            'ubicacion',
            'imagen',
            'impuesto_interno',
            'numero_origen',
            'descripcion_origen',
            'cuenta_contable_ventas',
            'cuenta_contable_compras',
            'cuenta_contable_acopio',
            'precio_costo_lista_neto',
            'primer_descuento',
            'segundo_descuento',
            'tercer_descuento',
            'cuarto_descuento',
            'precio_neto_lista_1',
            'precio_neto_lista_2',
            'precio_neto_lista_3',
            'numero_reposicion',
        ],
    ]) ?>

</div>
