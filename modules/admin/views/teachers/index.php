<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Teachers;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeachersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teachers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Teachers'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'photo',
            /*
        [
            'attribute' =>   'photo',
            'format' => ['image',['width' => Teachers::$thumb_size]],
            'value' => function ($model) { return $model->getImageUrl();}
        ],*/
            [
                'attribute' =>   'photo',
                'format' => 'raw',
                'value' => function ($model) { return $model->getImageTag();}
            ],
            'position',
            'seminars_text:ntext',
            // 'created_at',
            // 'updated_At',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
