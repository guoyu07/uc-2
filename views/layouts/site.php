<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\SiteAsset;
use branchonline\lightbox\LightboxAsset;

// default title
$this->title = $this->title ? $this->title : strip_tags(\Yii::$app->params['siteBrand']);

LightboxAsset::register($this);
SiteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="container-fluid social black-bg">
        <div class="container">
            <style>.social .icon { background-image: url(<?= Yii::$app->params["remoteSave"] ? cloudinary_url("site/social") : '/images/social.svg' ?>); }</style>
            <a href="<?= \Yii::$app->params['socialVK'] ?>" target="_blank" class="pull-right icon vk"></a>
            <a href="<?= \Yii::$app->params['socialFB'] ?>" target="_blank" class="pull-right icon fb"></a>
            <a href="<?= \Yii::$app->params['socialTW'] ?>" target="_blank" class="pull-right icon tw"></a>
        </div>
    </div>
    <div class="container">
        <header class="row">
            <div class="col-sm-2 text-center">
                <?php if (Yii::$app->params["remoteSave"]) {
                    ?><a href="/"><?= cl_image_tag("site/Logo_big_nckubz", ["format" => "png", "alt" => strip_tags(\Yii::$app->params['siteBrand'])]); ?></a><?php
                }
                else {
                    ?><a href="/"><img src="/images/logo.png" alt="<?= strip_tags(\Yii::$app->params['siteBrand']) ?>" /></a><?php
                } ?>
            </div>
            <div class="col-sm-10 brand">
                <div class="strong"><?= \Yii::$app->params['siteBrand'] ?></div>
                <span><?= \Yii::$app->params['siteBrandLid'] ?></span>
            </div>
        </header>
    </div>
    <div class="container-fluid slider-images">
        <div class="container">
            <div class="row">
                <div class="col-md-12 column">
                    <?= \app\components\CarouselMe::widget(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <aside>

                    <?= app\components\SideMenuWidget::widget() ?>

                </aside>
            </div>
            <div class="col-sm-9">

                <?= Breadcrumbs::widget([
                    'homeLink'=> [
                        'label' => Yii::t('yii', 'Главная'),
                        'url' => Yii::$app->homeUrl,
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <main class="panel panel-default">
                    <div class="panel-body site-content"><?= $content ?></div>
                </main>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container-fluid black-bg white-color info">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>Санкт-Петербургское <br>
                        Государственное бюджетное учреждение <br><strong>Горжилобмен</strong> © 1927-<?= date('Y') ?><br>
                    </p>
                </div>
                <div class="col-sm-6">
                    <p>
                        <?= Yii::$app->params["siteAddress"] ?><br>
                        Телефон/ факс: <strong><?= Yii::$app->params["sitePhone"] ?></strong> <br>
                        E-mail: <strong><a href="mailto:<?= Yii::$app->params["siteEmail"] ?>"><?= Yii::$app->params["siteEmail"] ?></a></strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container copyright">
        <p class="text-center">&copy; <?= \Yii::$app->params['siteBrand'] ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

<?= isset(Yii::$app->params["venyoo"]) ? Yii::$app->params["venyoo"] : '' ?>

</body>
</html>
<?php $this->endPage() ?>
