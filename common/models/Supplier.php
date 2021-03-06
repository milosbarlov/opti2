<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $tin
 * @property string $name
 * @property integer $city_id
 * @property string $address
 * @property string $cin
 * @property integer $data_type
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tin', 'name', 'city_id'], 'required'],
            [['city_id', 'data_type'], 'integer'],
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
            'tin' => 'Tin',
            'name' => 'Name',
            'city_id' => 'City ID',
            'address' => 'Address',
            'cin' => 'Cin',
            'data_type' => 'Data Type',
        ];
    }

    /**
     * Relations
     */

    public function getArticles(){
        return $this->hasMany(Article::className(),['supplier_id'=>'id']);
    }

    public function getCalcHeader(){
        return $this->hasMany(CalcHeader::className(),['supplier_id'=>'id']);
    }

    public function getCity(){
        return $this->hasOne(City::className(),['id'=>'city_id']);
    }

    public function getSupplierInfo(){
        return $this->hasMany(SupplierInfo::className(),['supplier_id'=>'id']);
    }
}
