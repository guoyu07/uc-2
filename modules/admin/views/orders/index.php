<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Orders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' =>   'name',
                'format' => 'text',
                'label' => 'ФИО'
            ],
            [
                'attribute' =>   'ordersType.name',
                'format' => 'text',
                'label' => 'Тип',
                'value' => function($model) {
                    return $model->ordersType->name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'orders_type_id',
                    yii\helpers\ArrayHelper::map(\app\models\OrdersType::find()->all(), 'id', 'name'),
                    ['class' => 'form-control', 'prompt' => '']),
            ],
            [
                'attribute' =>   'seminar.name',
                'format' => 'text',
                'label' => 'Семинар',
                'value' => function($model) {
                    return $model->seminar->name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'seminar_id',
                    yii\helpers\ArrayHelper::map(\app\models\Seminars::find()->all(), 'id', 'name'),
                    ['class' => 'form-control', 'prompt' => '']),
            ],
            'email:email',
            'created_at',
            //'enable:boolean',
            // 'seminar_id',
            // 'orders_type_id',
            // 'passport',
            // 'address',
            // 'business_type_id',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
