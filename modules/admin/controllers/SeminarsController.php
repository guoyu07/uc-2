<?php

namespace app\modules\admin\controllers;

use app\models\base\Dates;
use Yii;
use app\models\Seminars;
use app\models\SeminarsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\UploadedFile;


/**
 * SeminarsController implements the CRUD actions for Seminars model.
 */
class SeminarsController extends \app\modules\admin\controllers\base\BaseAdminController
{
    /**
     * Lists all Seminars models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeminarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seminars model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Seminars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seminars();

        if ($model->load(Yii::$app->request->post())) {

            // Загрузить файл
            $model->upload();

            $dates = $model->getDatesArray();
            $model->start = $dates && isset($dates[0]) ? $dates[0] : null;
            $model->end = $dates && isset($dates[count($dates) - 1]) ? $dates[count($dates) - 1] : null;
            $model->onlyMonth = $model->dates_type_id == 3 ? 1 : 0;

            if($model->save()) {
                $model->writeDates();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Seminars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {

            if ($model->deleteUploaded != 1) {
                // Загрузить файл
                $model->upload();
            }
            else {
                $model->file = null;
            }

            $dates = $model->getDatesArray();
            $model->start = $dates && isset($dates[0]) ? $dates[0] : null;
            $model->end = $dates && isset($dates[count($dates) - 1]) ? $dates[count($dates) - 1] : null;
            $model->onlyMonth = $model->dates_type_id == 3 ? 1 : 0;

            if($model->save()) {

                $model->writeDates();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Seminars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seminars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seminars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seminars::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
