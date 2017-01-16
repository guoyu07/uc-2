<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seminars */

$this->title = 'Добавить семинар';
$this->params['breadcrumbs'][] = ['label' => 'Семинары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
