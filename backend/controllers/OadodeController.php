<?php

namespace backend\controllers;

use Yii;
use common\models\Oadode;
use common\models\OadodeSearch;
use common\models\GoodsDescription;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OadodeController implements the CRUD actions for Oadode model.
 */
class OadodeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Oadode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OadodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Oadode model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function saveModel($model)
    {
        // Here is called getQuantArray() getter from TakMolForm model
        $model->quant = implode(',', $model->quantArray);

        return $model->save();    
    }

    /**
     * Creates a new Oadode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Oadode();

        $good = new GoodsDescription();

        //Find out how many goods have been submitted by the form
        $count = count(Yii::$app->request->post('GoodsDescription', [])) ? count(Yii::$app->request->post('GoodsDescription', [])) : 5;

        //Send at least one model to the form
        $goods = [new GoodsDescription()];

        //Create an array of the goods submitted
        for($i = 1; $i < $count; $i++) {
            $goods[] = new GoodsDescription();
        }

        $at_least_one_good = false;

        //Load and validate the multiple models
        if (GoodsDescription::loadMultiple($goods, Yii::$app->request->post(), 'GoodsDescription')) {
            foreach ($goods as $good) {
                if ($good->validate()) {
                    $good->application_id = 1;
                    $good->customer_id = 2;
                    $good->user_id = 1;
                    $good->save(false);
                    $at_least_one_good = true;
                }
            }
        }

        if ($at_least_one_good) {
            if ($model->load(Yii::$app->request->post())) {
                $business_title = implode(',', $model->business_title);
                $model->business_title = $business_title;
                $model->application_id = 1;
                $model->customer_id = 2;
                $model->user_id = 1;

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'goods' => $goods,
        ]);
    }

    /**
     * Updates an existing Oadode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Oadode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Oadode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Oadode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Oadode::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
