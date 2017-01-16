<?php

use yii\helpers\Html;

$h1 = $this->title ? $this->title : $model->title;
$this->title = $h1 . ' | ' . strip_tags(\Yii::$app->params["siteBrand"]);

$this->params['breadcrumbs'][] = ['label' => $this->params['seo'] ? $this->params['seo']->breadcrumbs :
    Yii::t('app', 'News'), 'url' => ['site/news']];
$this->params['breadcrumbs'][] = $h1;
?>

<div class="site-new-view-<?= $model->id ?>">
    <h1><?= Html::encode($h1) ?></h1>

    <div class="html-content">
        <?= $model->text ?>
    </div>
</div>
