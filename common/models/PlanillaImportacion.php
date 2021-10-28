<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "planilla_importacion".
 *
 * @property int $id
 * @property int|null $numero_interno
 * @property string|null $linea
 * @property string|null $rubro
 * @property string|null $marca
 * @property string $descripcion
 * @property int|null $codigo_barras
 * @property string|null $unidad_medida
 * @property float $precio_costo_neto
 * @property float|null $precio_venta_neto
 * @property float $porcentaje_iva
 * @property string $moneda
 * @property string|null $stock_de_seguridad
 * @property string|null $punto_de_pedido
 * @property string|null $stock_maximo
 * @property string|null $ubicacion
 * @property string|null $imagen
 * @property string|null $impuesto_interno
 * @property string|null $numero_origen
 * @property string|null $descripcion_origen
 * @property string|null $cuenta_contable_ventas
 * @property string|null $cuenta_contable_compras
 * @property string|null $cuenta_contable_acopio
 * @property string|null $precio_costo_lista_neto
 * @property string|null $primer_descuento
 * @property string|null $segundo_descuento
 * @property string|null $tercer_descuento
 * @property string|null $cuarto_descuento
 * @property float|null $precio_neto_lista_1
 * @property float|null $precio_neto_lista_2
 * @property float|null $precio_neto_lista_3
 * @property string|null $numero_reposicion
 */
class PlanillaImportacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planilla_importacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero_interno', 'codigo_barras'], 'integer'],
            [['descripcion', 'precio_costo_neto', 'porcentaje_iva'], 'required'],
            [['precio_costo_neto', 'precio_venta_neto', 'porcentaje_iva', 'precio_neto_lista_1', 'precio_neto_lista_2', 'precio_neto_lista_3'], 'number'],
            [['linea', 'rubro', 'marca', 'unidad_medida', 'stock_de_seguridad', 'punto_de_pedido', 'stock_maximo', 'ubicacion', 'imagen', 'impuesto_interno', 'numero_origen', 'descripcion_origen', 'cuenta_contable_ventas', 'cuenta_contable_compras', 'cuenta_contable_acopio', 'precio_costo_lista_neto', 'primer_descuento', 'segundo_descuento', 'tercer_descuento', 'cuarto_descuento', 'numero_reposicion'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 256],
            [['moneda'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'NUMERO INTERNO',
            //'numero_interno' => 'Numero Interno',
            'linea' => 'LINEA',
            'rubro' => 'RUBRO',
            'marca' => 'MARCA',
            'descripcion' => 'DESCRIPCION',
            'codigo_barras' => 'CODIGO DE BARRAS',
            //'unidad_medida' => 'Unidad Medida',
            'precio_costo_neto' => 'PRECIO COSTO NETO',
            'precio_venta_neto' => 'PRECIO VENTA NETO (REF.)',
            'porcentaje_iva' => 'PORCENTAJE DE IVA',
            'moneda' => 'MONEDA',
            //'stock_de_seguridad' => 'Stock De Seguridad',
            //'punto_de_pedido' => 'Punto De Pedido',
            //'stock_maximo' => 'Stock Maximo',
            //'ubicacion' => 'Ubicacion',
            //'imagen' => 'Imagen',
            //'impuesto_interno' => 'Impuesto Interno',
            //'numero_origen' => 'Numero Origen',
            //'descripcion_origen' => 'Descripcion Origen',
            //'cuenta_contable_ventas' => 'Cuenta Contable Ventas',
            //'cuenta_contable_compras' => 'Cuenta Contable Compras',
            //'cuenta_contable_acopio' => 'Cuenta Contable Acopio',
            //'precio_costo_lista_neto' => 'Precio Costo Lista Neto',
            //'primer_descuento' => 'Primer Descuento',
            //'segundo_descuento' => 'Segundo Descuento',
            //'tercer_descuento' => 'Tercer Descuento',
            //'cuarto_descuento' => 'Cuarto Descuento',
            //'precio_neto_lista_1' => 'Precio Neto Lista 1',
            //'precio_neto_lista_2' => 'Precio Neto Lista 2',
            //'precio_neto_lista_3' => 'Precio Neto Lista 3',
            //'numero_reposicion' => 'Numero Reposicion',
        ];
    }
}
