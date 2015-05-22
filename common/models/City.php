<?php

namespace common\models;


use Yii;
use  yii\helpers\ArrayHelper;




/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 * @property string $zip
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['name', 'zip'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['zip'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'name' => 'Name',
            'zip' => 'Zip',
        ];
    }

    /**
     * Relations
     */

    public function getCompanies(){
        return $this->hasMany(Company::className(),['city_id'=>'id']);
    }

    public function getSuppliers(){
        return $this->hasMany(Supplier::className(),['city_id'=>'id']);
    }


    /**
     *  Return all city key=>value(id=>name)
     */

    public static function getAllCity(){
        $cityName = ArrayHelper::map(City::find()->all(),'id','name');
        return $cityName;
    }

    /**
     * @param $id   City id
     * @return string  Return city name
     */

    public static function getCityName($id){
        $model = City::findOne($id);
        return $model->name;
    }


}
