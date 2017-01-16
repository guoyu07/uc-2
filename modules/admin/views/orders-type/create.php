<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrdersType */

$this->title = 'Создать тип заявки';
$this->params['breadcrumbs'][] = ['label' => 'Тип заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
