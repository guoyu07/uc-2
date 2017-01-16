<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
//use dosamigos\datepicker\DatePicker;
use kartik\widgets\ActiveField;
use kartik\form\ActiveForm;
use kartik\widgets;
use kartik\checkbox\CheckboxX;
//use kartik\popover\PopoverX;
use kartik\file\FileInput;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/* @var $model app\models\Seminars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seminars-form">

    <?= $this->registerJs("CKEDITOR.plugins.addExternal('font', '/ckeditor/font/plugin.js', '');") ?>
    <?= $this->registerJs("CKEDITOR.plugins.addExternal('colorbutton', '/ckeditor/colorbutton/plugin.js', '');") ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php $model->dates_type_id = $model->dates_type_id ? $model->dates_type_id : 2 // default value ?>
    <?= $form->field($model, 'dates_type_id')->radioList(\yii\helpers\ArrayHelper::map(\app\models\base\DatesType::find()->where(['<>', 'id', 1])->all(), 'id', 'name')) ?>

    <div class="dateTypes item-id-2">

    <?php //$model->dates_type_2 = $model->dates ?>
    <?= $form->field($model, 'dates_type_2')->widget(MultipleInput::className(), [
            'max'     => 20,
            'min'     => 1,
            'data' => $model->getModelDatesArray(true, 2),
            'columns' => [
                [
                    'name'  => 'values',
                    'type'  => \kartik\date\DatePicker::className(),
                    'title' => 'Дни семинара',
                    'value' => function($data) {
                        return $data;
                    },
                    'items' => [
                        '0' => 'Saturday',
                        '1' => 'Monday'
                    ],
                    'options' => [
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ],
                    'headerOptions' => [
                        'style' => 'width: 250px;',
                        'class' => 'day-css-class'
                    ]
                ]
            ]
        ])->label(false);
    ?>
    </div>

    <div class="dateTypes item-id-3">
    <?= $form->field($model, 'dates_type_3')->widget(MultipleInput::className(), [
        'max'     => 1,
        'data' => $model->getModelDatesArray(true, 3),
        'columns' => [
            [
                'name'  => 'values',
                'type'  => \kartik\date\DatePicker::className(),
                'title' => 'Месяц семинара',
                'value' => function($data) {
                    return $data;
                },
                'items' => [
                    '0' => 'Saturday',
                    '1' => 'Monday'
                ],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'yyyy-mm',
                        'minViewMode'=>'months',
                        'todayHighlight' => true
                    ]
                ],
                'headerOptions' => [
                    'style' => 'width: 250px;',
                    'class' => 'day-css-class'
                ]
            ]
        ]
    ])->label(false);;
    ?>
    </div>
    <?= $form->field($model, 'price')->widget(kartik\money\MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '₽ ',
            'suffix' => '',
            'allowNegative' => false,
            'affixesStay' => true,
            'thousands' => ' ',
            'decimal' => ',',
            'precision' => 2,
        ]
    ]); ?>

    <?= $form->field($model, 'enabled')->widget(kartik\checkbox\CheckboxX::className(), [
        'model' => $model,
        'attribute' => 'status',
        //'initInputType' => CheckboxX::INPUT_CHECKBOX,
        //'autoLabel'=>true,
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginEvents' => [
            'change' => 'function() { console.log("enabled change"); }',
            'reset'=>'function() {  console.log("enabled reset"); }',
        ],
    ]) ?>

    <?= $form->field($model, 'speakers')->widget(CKEditor::className(), [
        'preset' => 'full', 'clientOptions' => [
            'extraPlugins' => 'font,colorbutton',
        ]
    ]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'preset' => 'full', 'clientOptions' => [
            'extraPlugins' => 'font,colorbutton',
        ]
    ]) ?>

    <?= $form->field($model, 'subscription')->widget(CKEditor::className(), [
        'preset' => 'full', 'clientOptions' => [
            'extraPlugins' => 'font,colorbutton',
        ]
    ]) ?>

    <?= $form->field($model, 'uploadFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*'],
        'pluginOptions' => [
            'previewFileIcon' => '<i class="fa fa-file"></i>',
            'allowedPreviewTypes' => null, // disable preview of standard types
            'allowedPreviewTypes' => null,
            'allowedFileExtensions'=>['doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx'],
            'initialPreviewAsData' => false,
            'showUpload' => false,
            'showRemove' => false,
            'showClose' => false,
            //'overwriteInitial' => false,
            //'initialPreviewAsData' => true,
            'preferIconicPreview' => true,
            'initialPreview'=>[
                $model->file ? $model->getWebUrlToFile() : null
            ],
            'initialPreviewConfig' => [
                [
                    'caption' => $model->file,
                    //'type' => 'docx',
                    //'filename' => $model->file
                    //'size' => filesize(Yii::$app->params['uploadPath'] . basename($model->photo))
                ]
            ],
            'previewFileIconSettings' => [
                'docx' => '<i class="fa fa-file-word-o text-primary"></i>',
                'xlsx' => '<i class="fa fa-file-excel-o text-success"></i>',
                'pptx' => '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                'doc' => '<i class="fa fa-file-word-o text-primary"></i>',
                'xls' => '<i class="fa fa-file-excel-o text-success"></i>',
                'ppt' => '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                'pdf' => '<i class="fa fa-file-pdf-o text-danger"></i>',
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'deleteUploaded')->widget(kartik\checkbox\CheckboxX::className(), [
        'model' => $model,
        'attribute' => 'status',
        //'initInputType' => CheckboxX::INPUT_CHECKBOX,
        //'autoLabel'=>true,
        'pluginOptions' => [
            'threeState' => false,
            'size' => 'lg'
        ],
        'pluginEvents' => [
            'change' => 'function() { console.log("enabled change"); }',
            'reset'=>'function() {  console.log("enabled reset"); }',
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
