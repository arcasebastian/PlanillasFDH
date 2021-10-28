<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "archivos".
 *
 * @property int $id
 * @property string|null $filename
 * @property string|null $imported
 */
class Archivos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imported'], 'safe'],
            [['filename'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'imported' => 'Imported',
        ];
    }
}
