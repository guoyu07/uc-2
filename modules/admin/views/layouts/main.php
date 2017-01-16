<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://use.fontawesome.com/6d20ca64cd.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!-- main menu -->
    <?php

    if(!Yii::$app->user->isGuest)  {
        $arrItems[] = ['label' => Yii::t('app', 'Seminars'), 'items' => [
            ['label' => Yii::t('app', 'Seminars'), 'url' => ['/admin/seminars/index']],
            ['label' => Yii::t('app', 'Orders'), 'url' => ['/admin/orders/index']],
            ['label' => Yii::t('app', 'Reviews'), 'url' => ['/admin/reviews/index']],
            ['label'  => Yii::t('app', 'Teachers'), 'url' => ['/admin/teachers/index']]
        ]];
        $arrItems[] = ['label' => Yii::t('app', 'News'), 'url' => ['/admin/news/index']];

        $pages = \app\models\StaticPage::find()->select('route,title')->all();
        $pagesmenu = [['label' => Yii::t('app', 'Static Pages'), 'url' => ['/admin/static-page/index']]];
        foreach ($pages as $page) {
            $one = [];
            $one['label'] = '* '.$page->title;
            $one['url'][] = 'static/' . $page->route;
            $pagesmenu [] = $one;
        }
        $arrItems[] = ['label' => Yii::t('app', 'Static Pages'), 'items' => $pagesmenu];

        $arrItems[] = ['label' => Yii::t('app', 'Lists'), 'items' => [
            ['label' => Yii::t('app', 'Slider'), 'url' => ['/admin/slider/index']],
            ['label' => Yii::t('app', 'Settings'), 'url' => ['/admin/settings/index']],
            ['label' => Yii::t('app', 'Seos'), 'url' => ['/admin/seo/index']],
            ['label' => Yii::t('app', 'Menu'), 'url' => ['/admin/menu/index']],
            ['label' => Yii::t('app', 'Business Type'), 'url' => ['/admin/business-type/index']],
            ['label' => Yii::t('app', 'Orders Type'), 'url' => ['/admin/orders-type/index']],
            ['label' => Yii::t('app', 'Reviews Status'), 'url' => ['/admin/reviews-status/index']],
        ]];
    }

    if (Yii::$app->user->isGuest) {
        $arrItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/admin/login']];
    }
    else  {
                $arrItems[] = '<li>'
                        . Html::beginForm(['/admin/logout'], 'post')
                        . Html::submitButton(
                            Yii::t('app', 'Logout').' (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
    }

    NavBar::begin([
        'brandLabel' => \Yii::$app->params['siteBrand'],
        'brandUrl' => Url::to(['/dashboard']),
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $arrItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink'=> [
                'label' => Yii::t('yii', 'Главная'),
                'url' => Url::to(['/admin/index']),
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; <?= \Yii::$app->params['siteBrand'] ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
