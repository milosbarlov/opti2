<?php

namespace common\models;

use Yii;
use yii\web\User;

/**
 * This is the model class for table "prodaja".
 *
 * @property integer $id
 * @property integer $pacient_id
 * @property integer $company_id
 * @property integer $date
 * @property integer $user_id
 * @property string $diopter
 * @property string $glasses
 * @property string $frame
 * @property string $glasses_price
 * @property string $frame_price
 * @property string $total_price
 * @property string $napomena
 */
class Prodaja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prodaja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pacient_id', 'company_id', 'date', 'user_id', 'diopter', 'glasses', 'frame', 'glasses_price', 'frame_price', 'total_price', 'napomena'], 'required'],
            [['pacient_id', 'company_id', 'date', 'user_id'], 'integer'],
            [['glasses_price', 'frame_price', 'total_price'], 'number'],
            [['napomena'], 'string'],
            [['diopter', 'glasses', 'frame'], 'string', 'max' => 155]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pacient_id' => 'Pacient ID',
            'company_id' => 'Company ID',
            'date' => 'Date',
            'user_id' => 'User ID',
            'diopter' => 'Diopter',
            'glasses' => 'Glasses',
            'frame' => 'Frame',
            'glasses_price' => 'Glasses Price',
            'frame_price' => 'Frame Price',
            'total_price' => 'Total Price',
            'napomena' => 'Napomena',
        ];
    }
    /*
     * Relations
     */

    public function getCompany(){
        return $this->hasOne(Company::className(),['id'=>'company_id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function getPacient(){
        return $this->hasOne(Pacient::className(),['id'=>'pacient_id']);
    }
}
