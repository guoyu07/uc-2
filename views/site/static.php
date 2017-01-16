<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $this->title ? $this->title : $model->title;

$h1 = $this->params["seo"] ? $this->params["seo"]->h1 : $model->title;
$this->params['breadcrumbs'][] = $this->params["seo"] ? $this->params["seo"]->breadcrumbs : $model->title;

?>
<div class="html-content static-<?= Yii::$app->request->get('path') ?>">
    <h1><?= Html::encode($h1) ?></h1>

    <p>
        <?= $model->html ?>
    </p>
</div>