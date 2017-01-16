<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$h1 = $this->params["seo"] ? $this->params["seo"]->h1 : $model->title;
$this->params['breadcrumbs'][] = $this->params["seo"] ? $this->params["seo"]->breadcrumbs : $model->title;
?>
<div class="site-news">
    <h1><?= Html::encode($h1) ?></h1>

    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => [
            'class' => 'list-item panel panel-default'
        ],
        'itemView' => 'news_item',
        'options' => [
            'class' => 'list-wrapper'
        ],
        'pager' => [
            'firstPageLabel' => Yii::t('app', 'first'),
            'lastPageLabel' => Yii::t('app', 'last'),
            'prevPageLabel' => Yii::t('app', 'previous'),
            'nextPageLabel' => Yii::t('app', 'next'),
            'maxButtonCount' => 6,
        ],
    ]) ?>

</div><!-- site-news -->
