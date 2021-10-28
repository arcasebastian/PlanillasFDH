<?php


namespace frontend\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class PlanillaActual extends Model
{
    /**
     * @var UploadedFile
     */
    public $planillaFile;
    public $filename;

    public function rules()
    {
        return [
            [['planillaFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }

    public function upload()
    {
        $basePath = Yii::$app->basePath . '/uploads/';
        if ($this->validate()) {
            if (!file_exists($basePath)) {
                mkdir($basePath, 0755, true);
            }
            $this->filename = str_replace(" ","",($basePath . $this->planillaFile->baseName . '.' . $this->planillaFile->extension));
            if ($this->planillaFile->saveAs($this->filename)){
                return true;
            } else {
                echo 'No Guardado';
                echo $this->filename;
                return false;
            }
        } else {
            echo 'No Validado';
            return false;
        }
    }
}
