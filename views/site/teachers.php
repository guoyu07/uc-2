<?php

use yii\helpers\Html;
use app\models\Teachers;

$h1 = $this->params["seo"] ? $this->params["seo"]->h1 : $model->title;
$this->params['breadcrumbs'][] = $this->params["seo"] ? $this->params["seo"]->breadcrumbs : $model->title;
?>
<div class="site-teachers">
    <h1><?= Html::encode($h1) ?></h1>

    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <?php foreach ($model as $teacher) { ?>
                <tr>
                    <td><?= $teacher->name ?></td>
                    <td><?= $teacher->getImageTag() ?></td>
                    <td><?= $teacher->position ?></td>
                    <td><?= $teacher->seminars_text ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div><!-- site-teachers -->
