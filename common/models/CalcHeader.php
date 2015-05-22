<?php

namespace common\models;

use common\models\search\Company;
use Yii;

/**
 * This is the model class for table "calc_header".
 *
 * @property integer $id
 * @property integer $supplier_id
 * @property integer $company_id
 * @property integer $number
 * @property integer $calc_date
 * @property integer $invoice_date
 * @property string $invoice_number
 * @property integer $invoice_total
 * @property integer $vat_1
 * @property integer $vat_2
 * @property integer $payment_date
 * @property integer $seling_total
 * @property integer $seling_vat_1
 * @property integer $selint_vat_2
 * @property integer $profit
 * @property string $is_processed
 * @property string $type
 */
class CalcHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calc_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'company_id', 'number', 'calc_date', 'invoice_date', 'invoice_number', 'invoice_total', 'vat_1', 'vat_2', 'payment_date', 'seling_total', 'seling_vat_1', 'selint_vat_2', 'profit'], 'required'],
            [['supplier_id', 'company_id', 'number', 'calc_date', 'invoice_date', 'invoice_total', 'vat_1', 'vat_2', 'payment_date', 'seling_total', 'seling_vat_1', 'selint_vat_2', 'profit'], 'integer'],
            [['invoice_number'], 'string', 'max' => 45],
            [['is_processed'], 'string', 'max' => 2],
            [['type'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supplier_id' => 'Supplier ID',
            'company_id' => 'Company ID',
            'number' => 'Number',
            'calc_date' => 'Calc Date',
            'invoice_date' => 'Invoice Date',
            'invoice_number' => 'Invoice Number',
            'invoice_total' => 'Invoice Total',
            'vat_1' => 'Vat 1',
            'vat_2' => 'Vat 2',
            'payment_date' => 'Payment Date',
            'seling_total' => 'Seling Total',
            'seling_vat_1' => 'Seling Vat 1',
            'selint_vat_2' => 'Selint Vat 2',
            'profit' => 'Profit',
            'is_processed' => 'Is Processed',
            'type' => 'Type',
        ];
    }
    /**
     * Relations
     */

    public function getCalcDetails(){
        return  $this->hasMany(CalcDetails::className(),['calc_header_id'=>'id']);
    }

    public function getCompany(){
        return $this->hasOne(Company::className(),['id'=>'company_id']);
    }

    public function getSupplier(){
        return $this->hasOne(Supplier::className(),['id'=>'supplier_id']);
    }
}
