<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pacient".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $birthday
 * @property integer $city_id
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $pin
 */
class Pacient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pacient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'first_name', 'last_name', 'birthday'], 'required'],
            [['company_id','pin', 'city_id'], 'integer'],
            [['first_name'], 'string', 'max' => 45],
            [['last_name', 'phone'], 'string', 'max' => 100],
            [['address', 'email'], 'string', 'max' => 255],
            [['pin'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthday' => 'Birthday',
            'city_id' => 'City',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'pin' => 'Maticni broj',
        ];
    }

    /*
     * Relations
     */

    public function getOptometrist(){
        return $this->hasMany(Optometrist::className(),['pacient_id'=>'id']);
    }

    public function getCompany(){
        return $this->hasOne(Company::className(),['id'=>'company_id']);
    }

    public function getCity(){
        return $this->hasOne(City::className(),['id'=>'city_id']);
    }
}
