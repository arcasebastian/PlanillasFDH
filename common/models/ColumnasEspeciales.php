<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "columnas_especiales".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $patron
 */
class ColumnasEspeciales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'columnas_especiales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
            [['patron'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'patron' => 'Patron',
        ];
    }
}
