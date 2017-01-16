<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = strip_tags(\Yii::$app->params['siteBrand']);

$h1 = $this->params["seo"] ? $this->params["seo"]->h1 : $model->title;
?>
<div class="html-content static-<?= Yii::$app->request->get('path') ?>">
    <h1><?= Html::encode($h1) ?></h1>

    <p>
        <?= $model->html ?>
    </p>
</div>

