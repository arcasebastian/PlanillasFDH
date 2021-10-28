<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "planillas".
 *
 * @property int $id
 * @property string|null $descripcion
 * @property float|null $costo_sin_impuesto
 * @property float|null $costo_con_impuesto
 * @property float|null $precio_mayorista
 * @property float|null $efectivo
 * @property string|null $linea
 * @property string|null $rubro
 * @property string|null $marca
 * @property float|null $porcentaje_iva
 * @property int|null $activo
 */
class Planillas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planillas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['costo_sin_impuesto', 'costo_con_impuesto', 'precio_mayorista', 'efectivo', 'porcentaje_iva'], 'number'],
            [['activo'], 'integer'],
            [['descripcion'], 'string', 'max' => 256],
            [['linea', 'rubro', 'marca'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'costo_sin_impuesto' => 'Costo Sin Impuesto',
            'costo_con_impuesto' => 'Costo Con Impuesto',
            'precio_mayorista' => 'Precio Mayorista',
            'efectivo' => 'Efectivo',
            'linea' => 'Linea',
            'rubro' => 'Rubro',
            'marca' => 'Marca',
            'porcentaje_iva' => 'Porcentaje Iva',
            'activo' => 'Activo',
        ];
    }
}
