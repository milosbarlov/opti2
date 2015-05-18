<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calc_details".
 *
 * @property integer $id
 * @property integer $calc_header_id
 * @property integer $article_id
 * @property string $vat
 * @property integer $data
 * @property integer $data_type
 * @property integer $qty
 * @property integer $items
 * @property integer $incoming_price
 * @property integer $seling_price
 */
class CalcDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calc_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calc_header_id', 'article_id', 'vat', 'data', 'data_type', 'qty', 'items', 'incoming_price', 'seling_price'], 'required'],
            [['calc_header_id', 'article_id', 'data', 'data_type', 'qty', 'items', 'incoming_price', 'seling_price'], 'integer'],
            [['vat'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'calc_header_id' => 'Calc Header ID',
            'article_id' => 'Article ID',
            'vat' => 'Vat',
            'data' => 'Data',
            'data_type' => 'Data Type',
            'qty' => 'Qty',
            'items' => 'Items',
            'incoming_price' => 'Incoming Price',
            'seling_price' => 'Seling Price',
        ];
    }
}
