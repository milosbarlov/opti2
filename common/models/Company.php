<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $tin
 * @property string $name
 * @property integer $city_id
 * @property string $address
 * @property string $cin
 * @property integer $pdv
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tin', 'name', 'city_id', 'address'], 'required'],
            [['city_id', 'pdv'], 'integer'],
            [['tin', 'cin'], 'string', 'max' => 15],
            [['name', 'address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tin' => 'Pib',
            'name' => 'Name',
            'city_id' => 'City',
            'address' => 'Address',
            'cin' => 'Maticni broj',
            'pdv' => 'Pdv',
        ];
    }

    /*
     *  Relations
     */

    public function getCalcHeaders(){
        return $this->hasMany(CalcHeader::className(),['company_id'=>'id']);
    }

    public function getCity(){
        return $this->hasOne(City::className(),['id'=>'city_id']);
    }

    public function getCompanyInfos(){
        return $this->hasMany(CompanyInfo::className(),['company_id'=>'id']);
    }

    public function getIncomeHeader(){
        return $this->hasMany(IncomeHeader::className(),['company_id'=>'id']);
    }

    public function getPacients(){
        return $this->hasMany(Pacient::className(),['company_id'=>'id']);
    }

    public function getUserCompanies(){
        return $this->hasMany(UserCompany::className(),['company_id'=>'id']);
    }

    /**
     * @return array Pdv for dropdown menu
     */

    public function getPdvStatus(){
        return [
            0 =>'Ne',
            1=>'Da'
        ];
    }

    /**
     * @param $id  Value of Pdv
     * @return string Name Pdv
     */

    public function getPdvName($id){

        return $id == 0 ? 'Ne':'Da';
    }
}
