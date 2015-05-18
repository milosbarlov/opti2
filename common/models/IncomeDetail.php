<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "income_detail".
 *
 * @property integer $id
 * @property integer $income_header_id
 * @property string $data_name
 * @property integer $data_value
 * @property integer $data_type
 */
class IncomeDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'income_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['income_header_id', 'data_name', 'data_value'], 'required'],
            [['income_header_id', 'data_value', 'data_type'], 'integer'],
            [['data_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'income_header_id' => 'Income Header ID',
            'data_name' => 'Data Name',
            'data_value' => 'Data Value',
            'data_type' => 'Data Type',
        ];
    }
}
