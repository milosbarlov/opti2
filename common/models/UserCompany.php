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
            [['user_id', 'company_id'], 'string', 'max' => 10]
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
            'is_default' => 'Is Default',
            'is_admin' => 'Is Admin',
        ];
    }
}
