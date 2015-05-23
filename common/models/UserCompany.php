<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_company".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $company_id
 * @property integer $is_default
 * @property integer $is_admin
 */
class UserCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'company_id'], 'required'],
            [['is_default', 'is_admin'], 'integer'],
            [['user_id', 'company_id'], 'integer'],



        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'company_id' => 'Company ID',
            'is_default' => 'Default',
            'is_admin' => 'Is Admin',
        ];
    }

    /**
     * Relations
     */
    public function getCompany(){
       return  $this->hasOne(Company::className(),['id' =>'company_id']);
    }

    public function getUser(){
       return  $this->hasOne(User::className(),['id'=>'user_id']);
    }

    /**
     * Options for is_default
     */

    public static function optionsDefault(){
        return[
          0=>'Ne',
          1=>'Da'
        ];
    }

    public function defaultValidate(){
        if($this->is_default == 0){
            $this->addError('Default', 'Ne mozete da promeniti Default na "Ne". Izaberite firmu koju zelite da vam bude Default i promenite polje na "Da" ');
            return false;
        }else{
            $allCompany = UserCompany::findAll(['user_id'=>Yii::$app->user->identity->id]);
            foreach($allCompany as $c){
                $c->is_default = 0;
                $c->save(false);
            }
            return true;
        }
    }

}
