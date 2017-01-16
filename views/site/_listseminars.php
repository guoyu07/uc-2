<?php

use \yii\helpers\Html;
use \yii\helpers\Url;
use \app\components\Stuff;
use \yii\widgets\ActiveForm;

?>

<div class="panel panel-info offset-top-20">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $model->name ?></h3>
    </div>
    <div class="panel-body">

        <?php $dates = $model->getModelDatesArray() ?>

        <div class="clearfix">
            <?php if($dates) { ?>
                <div class="dates label label-default pull-left"><?= implode(', ', $dates) ?></div>
            <?php } ?>

            <?php if($model->price) { ?>
                <div class="price label label-success pull-right"><?= $model->price == 0 ? 'Бесплатно' : $model->price . ' &#8381;' ?></div>
            <?php } ?>
        </div>

        <?php if($model->speakers) { ?>
        <div class="bs-callout bs-callout-success html-text-field">
            <?= $model->speakers ?>
        </div>
        <?php } ?>

        <?php if($model->description) { ?>
        <div class="bs-callout bs-callout-info html-text-field">
            <?= $model->description ?>
        </div>
        <?php } ?>

        <div class="bs-callout bs-callout-danger html-text-field">
            <?= $model->subscription ?>

            <br/>

            <?= Html::a('Подать заявку <span class="caret"></span>', 'javascript: void(0)', [
                    'class' => 'btn btn-primary btn-lg order one-form-show offset-bottom-10',
                    'data-seminar' => $model->id,
                    'data-type-id' => 1]) ?>

            <div class="panel panel-default panel-form order">
                <div class="panel-body">
                    <?php $form = ActiveForm ::begin([
                        'action' => '/site/seminars-save',
                        'enableAjaxValidation' => true,
                        'validationUrl' => '/site/seminars-validate',
                    ]); ?>

                    <?= $form->field($orders, 'name')->label('ФИО') ?>

                    <?php $orders->business_type_id = 1; ?>
                    <?= $form->field($orders, 'business_type_id')->dropdownList(
                        yii\helpers\ArrayHelper::map(\app\models\BusinessType::find()->all(), 'id', 'name'),
                        ['prompt'=>'Выберите статус']
                    ) ?>

                    <?= $form->field($orders, 'orders_type_id')->hiddenInput(['value' => 1])->label(false) ?>

                    <?php $orders->seminar_id = $model->id; ?>
                    <?= $form->field($orders, 'seminar_id')->dropdownList(
                        yii\helpers\ArrayHelper::map(\app\models\Seminars::find()->all(), 'id', 'name'),
                        ['prompt'=>'Выберите семинар', 'class' => 'hidden']
                    )->label(false) ?>
                    <?= $form->field($orders, 'passport')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($orders, 'address')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($orders, 'agency')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($orders, 'question')->textarea(['rows' => 6]) ?>
                    <?= $form->field($orders, 'phone')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($orders, 'email')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Order Send'), ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>

            <?= Html::a('Задать вопрос <span class="caret"></span>', 'javascript: void(0)', [
                    'class' => 'btn btn-primary btn-lg question one-form-show offset-bottom-10',
                    'data-seminar' => $model->id,
                    'data-type-id' => 2]) ?>


            <div class="panel panel-default panel-form question">
                <div class="panel-body">
                    <?php $form = ActiveForm ::begin([
                        'action' => '/site/seminars-save',
                        'enableAjaxValidation' => true,
                        'validationUrl' => '/site/seminars-validate',
                    ]); ?>

                    <?= $form->field($questions, 'name')->label('ФИО') ?>
                    <?= $form->field($questions, 'email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($questions, 'agency')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($questions, 'orders_type_id')->hiddenInput(['value' => 2])->label(false) ?>
                    <?= $form->field($questions, 'phone')->hiddenInput(['value' => '000'])->label(false) ?>

                    <?php $questions->seminar_id = $model->id; ?>
                    <?= $form->field($questions, 'seminar_id')->dropdownList(
                        yii\helpers\ArrayHelper::map(\app\models\Seminars::find()->all(), 'id', 'name'),
                        ['prompt'=>'Выберите семинар', 'class' => 'hidden']
                    )->label(false) ?>
                    <?= $form->field($questions, 'question')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Question Send'), ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>


            <?= $model->file ? Html::a('Скачать программу <span class=""></span>', Url::to($model->getWebUrlToFile(), true), ['class' => 'btn btn-default btn-lg offset-bottom-10']) : '' ?>

        </div>
    </div>
</div>