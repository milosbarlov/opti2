<?php

namespace common\models;

use common\models\search\Company;
use Yii;

/**
 * This is the model class for table "income_header".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $income_date
 */
class IncomeHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'income_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'income_date'], 'required'],
            [['company_id', 'income_date'], 'integer']
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
            'income_date' => 'Income Date',
        ];
    }

    /**
     * Relations
     */

    public function getIncomeDetails(){
        return $this->hasMany(IncomeDetail::className(),['income_header_id'=>'id']);
    }

    public function getCompany(){
        return $this->hasOne(Company::className(),['id'=>'company_id']);
    }
}
