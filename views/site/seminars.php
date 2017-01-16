<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

$h1 = $this->params["seo"] ? $this->params["seo"]->h1 : $model->title;
$this->params['breadcrumbs'][] = $this->params["seo"] ? $this->params["seo"]->breadcrumbs : $model->title;
?>
<div class="site-seminars">
    <h1><?= Html::encode($h1) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'seminars-list'
        ],
        'itemView' => '_listseminars',
        'viewParams' => [ 'orders' => $orders, 'questions' => $questions ],
        'summary' => false
    ]);
    ?>

</div><!-- site-teachers -->
