<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Reviews */
/* @var $form ActiveForm */

$h1 = $this->params["seo"] ? $this->params["seo"]->h1 : $model->title;
$this->params['breadcrumbs'][] = $this->params["seo"] ? $this->params["seo"]->breadcrumbs : $model->title;
?>
<div class="site-reviews">
    <h1><?= Html::encode($h1) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'reviews-list'
        ],
        'itemView' => function ($model, $key, $index, $widget) {
            static $prevgroup = null;

            $out = $widget->view->render('_listreviews',
            [
                'model'=>$model,
                'prevgroup' => $prevgroup != $model->seminar->name
            ]);

            $prevgroup = $model->seminar->name;

            return $out;
        },
        'summary' => false
    ]);
    ?>

    <div class="panel panel-info offset-top-20">
        <div class="panel-heading">
            <h3 class="panel-title">Оставить отзыв о семинаре</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'seminar_id')->dropdownList(
                yii\helpers\ArrayHelper::map(\app\models\Seminars::find()->all(), 'id', 'name'),
                ['prompt'=>'Выберите семинар']
            )->label('Семинар') ?>
            <?= $form->field($model, 'text')->textArea(['rows' => '6']) ?>
            <?= $form->field($model, 'agency') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'phone') ?>

            <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className())->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Review Send'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div><!-- site-reviews -->
