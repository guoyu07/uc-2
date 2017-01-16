<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\StaticPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="static-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $this->registerJs("CKEDITOR.plugins.addExternal('font', '/ckeditor/font/plugin.js', '');") ?>
    <?= $this->registerJs("CKEDITOR.plugins.addExternal('colorbutton', '/ckeditor/colorbutton/plugin.js', '');") ?>
    <?= $this->registerJs("CKEDITOR.plugins.addExternal('uploadimage', '/ckeditor/uploadimage/plugin.js', '');") ?>

    <?= $form->field($model, 'html')->widget(CKEditor::className(), [
        'preset' => 'full', 'clientOptions' => [
            'extraPlugins' => 'font,colorbutton,uploadimage',
            'toolbarGroups' => [
                ['name' => 'undo'],
                //['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                //['name' => 'colorbutton'],
                //['name' => 'links', 'groups' => ['links', 'insert']],
                ['name' => 'others', 'groups' => ['others', 'about']],

               // ['name' => 'font'] // <--- OUR NEW PLUGIN YAY!
            ],
            'filebrowserImageBrowseUrl'=>Url::to(['ckeditor/uploaded-images']),
            'filebrowserImageUploadUrl'=>Url::to(['ckeditor/upload-image', ['type' => 'Images']]),
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
