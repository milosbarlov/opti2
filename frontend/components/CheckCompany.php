<?php
/**
 * Created by PhpStorm.
 * User: Milos Barlov <mbarlov> milosbarlov@gmail.com
 * Date: 22.5.15. \
 * Time: 19.21
 */
namespace frontend\components;

use Yii;
use yii\base\Object;
use common\models\UserCompany;



class CheckCompany extends Object{

    public static function haveCompany(){

        if(!Yii::$app->user->isGuest){
            $model= UserCompany::findAll(['user_id'=>Yii::$app->user->identity->id]);
            if(empty($model) && Yii::$app->controller->action->id !='create' && Yii::$app->controller->action->id != 'logout'){
                Yii::$app->controller->redirect(['company/create']);
            }

        }

    }
}
