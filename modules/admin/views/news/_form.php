<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lid')->textInput(['maxlength' => true]) ?>

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

    <?= $this->registerJs("CKEDITOR.plugins.addExternal('font', '/ckeditor/font/plugin.js', '');") ?>
    <?= $this->registerJs("CKEDITOR.plugins.addExternal('colorbutton', '/ckeditor/colorbutton/plugin.js', '');") ?>
    <?= $this->registerJs("CKEDITOR.plugins.addExternal('uploadimage', '/ckeditor/uploadimage/plugin.js', '');") ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'preset' => 'full', 'clientOptions' => [
            'extraPlugins' => 'font,colorbutton,uploadimage',
            'filebrowserImageBrowseUrl'=>Url::to(['ckeditor/uploaded-images']),
            'filebrowserImageUploadUrl'=>Url::to(['ckeditor/upload-image', ['type' => 'Images']]),
        ]
    ]) ?>

    <?= $form->field($model, 'uploadFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'allowedFileExtensions'=>['jpg','gif','jpeg', 'png'],
            'showUpload' => false,
            'showRemove' => false,
            'showClose' => false,
            'initialPreview'=>[
                $model->image ? $model->getFullImageUrl() : null
            ],
            'initialPreviewConfig' => [
                [
                    'caption' => basename($model->image),
                    //'size' => filesize(Yii::$app->params['uploadPath'] . basename($model->image)),
                ]
            ],
            'maxFileSize' => 1200, // КБ
            'overwriteInitial'=>true,
            'initialPreviewAsData'=>true,
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
