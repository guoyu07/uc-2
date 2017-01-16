<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SeminarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Семинары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить семинар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
           // 'start:date',
//            [
//                'attribute' =>   'datesType.name',
//                'format' => 'raw',
//                'label' => Yii::t('app', 'Dates Type ID')
//            ],
            [
                'attribute' =>   'datesarray',
                'label' => 'Даты семинара',
                'format' => 'html',
                'value' => function($model) { return implode(',', $model->getModelDatesArray()); }
            ],
            'price',
            'enabled:boolean',
            // 'created_at',
            // 'updated_at',
            // 'speakers:ntext',
            // 'description:ntext',
            // 'subscription:ntext',
            // 'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
