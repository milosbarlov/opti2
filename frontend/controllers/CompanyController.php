<?php

namespace frontend\controllers;

use Yii;
use common\models\Company;
use common\models\search\Company as CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\UserCompany;
use yii\helpers\ArrayHelper;


/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
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
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
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
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();
        $userCompany = new UserCompany();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                $checkDefault = UserCompany::findAll(['user_id'=>Yii::$app->user->identity->id,'is_default'=>1]);
                $userCompany->user_id = Yii::$app->user->identity->id;
                $userCompany->company_id = $model->id;
                $userCompany->is_admin = 1;
                $userCompany->is_default = !empty($checkDefault) ? 0:1;
                if($userCompany->save()){
                    if(empty($checkDefault))
                        Yii::$app->session->set('companyId',$model->id);

                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    print_r($userCompany->errors);exit();
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionChange(){

        $model = UserCompany::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();

        $data =[];
        foreach($model as $c){
            $data[$c->company->id]=$c->company->name;
        }

        if(Yii::$app->request->isPost){
            Yii::$app->session->set('companyId',$_POST['company_id']);

            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('changeCompany',[
            'model'=>$data,
        ]);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
