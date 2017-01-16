<?php
use yii\helpers\Html;
?>

<div class="panel-body">
    <div class="row">
        <div class="col-sm-2"><?= $model->getImageTag() ?></div>
        <div class="col-sm-10">
            <a href="<?= \yii\helpers\Url::to(['site/news', 'id' => $model->id ]) ?>">
                <strong><?= $model->title ?></strong><br/>
                <?= $model->lid ?>
            </a>
        </div>
    </div>
</div>

