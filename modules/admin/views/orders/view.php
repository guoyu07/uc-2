<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'phone',
            'agency',
            'question:ntext',
            [
                'attribute' =>   'seminar.name',
                'format' => 'text',
                'label' => 'Семинар',
                'value' => $model->seminar->name
            ],
            'enable:boolean',
            [
                'attribute' =>   'ordersType.name',
                'format' => 'text',
                'label' => 'Тип',
                'value' => $model->ordersType->name
            ],
            'passport',
            'address',
            'businessType.name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
