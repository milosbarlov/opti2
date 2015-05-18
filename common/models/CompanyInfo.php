<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_info".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $data
 * @property integer $is_default
 * @property string $type
 */
class CompanyInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'data', 'type'], 'required'],
            [['company_id', 'is_default'], 'integer'],
            [['data'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'data' => 'Data',
            'is_default' => 'Is Default',
            'type' => 'Type',
        ];
    }
}
