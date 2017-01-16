<?php

namespace app\controllers;

use app\components\MailMe;
use app\models\News;
use app\models\Orders;
use app\models\Seo;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\VarDumper;
use yii\db\Expression;
use \app\components\Meta;
use yii\web\Response;
use \yii\widgets\ActiveForm;

class SiteController extends Controller
{
    //public $layout = '@app/views/layouts/site';

    public function beforeAction($action)
    {
        // основной маршрут
        $route = $action->controller->id . "/". $action->id;

        // статические страницы
        if($action->id === 'static') {
            $route = $action->id ."/". Yii::$app->getRequest()->getQueryParam('path');
        }

        // экшены с карточками
        if($action->id === 'news-view') {
            //$route = ltrim(\yii\helpers\Url::to(['site/news', 'id' => Yii::$app->getRequest()->getQueryParam('id') ]), '/');
            $route = 'site/news';
        }

        // получение данныъ
        $seo = \app\models\Seo::find()->where(["route" => $route, "enabled" => 1])->one();


        // для доступа из вьюхи
        $this->view->params['seo'] = $seo;

        // создание метатегов
        if ($seo) {
            $seo->keywords = mb_strtolower($seo->keywords);

            // не экшен с карточками
            if ($action->id !== 'news-view') {
                //var_dump($seo);
                $title = $seo->title . ' | ' . strip_tags(\Yii::$app->params["siteBrand"]);
                $description = $seo->description;
                $keywords = $seo->keywords;
                $url = Url::to([$seo->route], true);
                //$image = $seo->image;

                $this->view->title = $title;
                Meta::registerTags($title, $description, $keywords, $url);
            }
        }
        else {
            Meta::registerTags(
                strip_tags(\Yii::$app->params["siteBrand"]),
                \Yii::$app->params["siteBrandLid"],
                strip_tags(\Yii::$app->params["siteBrand"]));
        }

        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays reviews.
     *
     * @return string
     */


    public function actionReviews()
    {
        $model = new \app\models\Reviews();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->save()) {

                    // событие - реакция на добавление отзыва (отправка емейл)
                    \Yii::$app->mailme->trigger(MailMe::EVENT_REVIEW_SENT, new \app\components\MailMeEvent($model));

                    return $this->redirect(['reviews']);
                }
            }
        }
        else {
            $dataProvider = new ActiveDataProvider([
                'query' => \app\models\Reviews::find()
                    ->joinWith('seminar')
                    ->joinWith('status')
                    ->where(["reviews_status.name" => 'публикация'])
                    ->orderBy(['seminars.name' => SORT_ASC, 'name' => SORT_ASC]),
                'pagination' => [
                    'pageSize' => 50,
                ],
            ]);

            return $this->render('reviews', [
                'dataProvider' => $dataProvider,
                'model' => $model,
            ]);
        }
    }


    public function actionStatic($path = null)
    {
        //var_dump($path);

        if($path) {
            $model = \app\models\StaticPage::find()->where(['route' => $path])->one();
            if($model) {
                return $this->render('static', [
                    'model' => $model,
                ]);
            }
        }

        throw new \yii\web\NotFoundHttpException();
    }

    public function actionSeminarsValidate()
    {
        $model = new Orders();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionSeminarsSave()
    {
        $model = new Orders();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['success' => $model->save(), 'attributes' => $model->attributes];
        }

        return $this->renderAjax('registration', [
            'model' => $model,
        ]);
    }

    public function actionSeminars()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => \app\models\Seminars::find()->joinWith(['dates' => function(\yii\db\ActiveQuery $query) {
                    $query->where(['>=' , 'date', new Expression('date(NOW())')])->orderBy('date ASC');
                }])
                ->where(['enabled' => 1])
                ->orderBy(['dates.date' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $orders = new Orders();
        $questions = new Orders();

        return $this->render('seminars', [
            'dataProvider' => $dataProvider,
            'orders' => $orders,
            'questions' => $questions
        ]);
    }

    public function actionTeachers()
    {
        $model =  \app\models\Teachers::find()->all();

        return $this->render('teachers', [
            'model' => $model,
        ]);
    }

    public function actionPlans()
    {
        return $this->render('plans');
    }

    public function actionNews()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => News::find(),
            'pagination' => array('pageSize' => 10),
        ]);

        return $this->render('news', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionNewsView($id)
    {
        $model = News::find()->where(['id' => $id])->one();

        if ($model) {
            $this->view->title = $model->title;
            Meta::registerTags($this->view->title,
                $model->title . ' | ' . $this->view->params['seo']->description,
                $this->view->params['seo']->keywords . ',' . $model->title,
                Url::to([$this->view->params['seo']->route, 'id' => $model->id ], true));

            return $this->render('news_view', [
                'model' => $model,
            ]);
        }

        throw new \yii\web\NotFoundHttpException();
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //return $this->render('index');
        $model = \app\models\StaticPage::find()->where(['route' => 'about'])->one();
        if($model) {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}
