<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uploadFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'allowedFileExtensions'=>['jpg','gif','jpeg', 'png'],
            'showUpload' => false,
            'showRemove' => false,
            'showClose' => false,
            'initialPreview'=>[
                $model->photo ? $model->getFullImageUrl() : null
            ],
            'initialPreviewConfig' => [
                [
                    'caption' => $model->photo,
                    //'size' => filesize(Yii::$app->params['uploadPath'] . basename($model->photo)),
                    //'width' => '120px',
                    //'url' => Url::to(['/teachers/file-delete']),
                    // ключ для удаления
                    //'key' => Yii::$app->params['uploadPath'] . basename($model->photo),
                 ]
            ],
            'maxFileSize' => 1200, // КБ
            'overwriteInitial'=>true,
            'initialPreviewAsData'=>true,
            'pluginEvents' => [
                'fileclear' => 'function() { console.log("fileclear"); }',
                'filereset' => 'function() { console.log("filereset"); }',
                'filepreupload' => 'function() { console.log("filepreupload"); }',
                'fileuploaded' => 'function() { console.log("fileuploaded"); }',
                'filepredelete' => 'function() { console.log("filepredelete"); }',
                'filedeleted' => 'function() { console.log("filedeleted"); }',
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seminars_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
