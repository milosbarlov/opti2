<?php

namespace frontend\controllers;

use Yii;
use common\models\Optometrist;
use common\models\search\OptometristSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Pacient;
/**
 * OptometristController implements the CRUD actions for Optometrist model.
 */
class OptometristController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Optometrist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OptometristSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Optometrist model.
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
     * Creates a new Optometrist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Optometrist();
        $pacients = Pacient::find()->where(['company_id'=>Yii::$app->company->id])->all();

        $data = [];
        foreach($pacients as $pacient){
            $data[]=['label'=>$pacient->first_name.' '.$pacient->last_name ,'id'=>$pacient->id];
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = strtotime($model->created_at);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }


        return $this->render('create', [
            'model' => $model,
            'data'=>$data,
        ]);

    }

    /**
     * Updates an existing Optometrist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pacients = Pacient::find()->where(['company_id'=>Yii::$app->company->id])->all();

        $data = [];
        foreach($pacients as $pacient){
            $data[]=['label'=>$pacient->first_name.' '.$pacient->last_name ,'id'=>$pacient->id];
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }
        return $this->render('update', [
            'model' => $model,
            'data'=>$data,
        ]);

    }

    /**
     * Deletes an existing Optometrist model.
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
     * Finds the Optometrist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Optometrist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Optometrist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
