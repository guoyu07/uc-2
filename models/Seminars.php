<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use yii\db\Expression;
use \app\components\FileUpload;
use app\components\Stuff;

class Seminars extends \app\models\base\Seminars
{
    public $uploadFile;
    public $deleteUploaded;
    public $dates_type_1;
    public $dates_type_2;
    public $dates_type_3;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge (parent::rules(), [
            [['deleteUploaded'], 'integer' ],
//            [['dates_type_1', 'dates_type_2', 'dates_type_3'], 'date' ],
            [[ 'uploadFile'], 'safe'],
            [['uploadFile', ], 'file',
                'skipOnEmpty' => true, // пропустить если файл не загружен
                'extensions'=>'doc, docx, pdf, xls, xlsx, ppt, pptx'],
        ]);
    }

    public function getWebUrlToFile()
    {
        return FileUpload::getFileRawUrl($this->file);
    }

    public function upload()
    {
        return FileUpload::uploadFile($this, 'file');
    }

    public function checkDates()
    {
        return isset($_POST[Stuff::getClassName($this)]['dates_type_' . $this->dates_type_id]['values']) ? true : false;
    }

    public function getDatesArray()
    {
        if ($this->checkDates()) {
            $dates = $_POST[Stuff::getClassName($this)]['dates_type_' . $this->dates_type_id]['values'];
            foreach ($dates as $key => $value) {
                $dates[$key] = $this->dates_type_id == 3 ? date("Y-m-t", strtotime($value . '-01')) : $value;
            }
            Stuff::sortArrayAsDate($dates);

            return $dates;
        }

        return [];
    }

    public function getModelDatesArray($raw = false, $type = 0)
    {
        $dates = [];
        foreach ($this->dates as $date)
        {
            if($this->onlyMonth == 1) {
                if ($type == 0 || $type == 3) {
                    if ($raw) {
                        $dates [] = date('Y-m', strtotime($date->date));
                    } else {
                        $dates [] = Stuff::getMonthName($date->date)[0] . date(' Y', strtotime($date->date));
                    }
                }
            }
            else {
                if ($type == 0 || $type == 2) {
                    if ($raw) {
                        $dates [] = date('Y-m-d', strtotime($date->date));
                    } else {
                        $dates [] = date('d ', strtotime($date->date)) . Stuff::getMonthName($date->date)[1] . date(' Y', strtotime($date->date));
                    }
                }
            }
        }

        return $dates;
    }

    public function writeDates()
    {
        Dates::deleteAll(['seminar_id' => $this->id]);
        foreach ($this->getDatesArray() as $value) {
            $date = new Dates();
            $date->date = $value;
            $date->seminar_id = $this->id;
            $date->save();
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge (parent::attributeLabels(), [
            'uploadFile' => Yii::t('app', 'uploadFile'),
            'deleteUploaded' => Yii::t('app', 'deleteUploaded'),
            'dateTypes' => Yii::t('app', 'Date Types'),
            'name' => Yii::t('app', 'Seminar Name'),
        ]);
    }

    /**
     * @inheritdoc
     * @return SeminarsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SeminarsQuery(get_called_class());
    }
}
