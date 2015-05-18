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
            'tin' => 'Tin',
            'name' => 'Name',
            'city_id' => 'City ID',
            'address' => 'Address',
            'cin' => 'Cin',
            'pdv' => 'Pdv',
        ];
    }
}
