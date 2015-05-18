<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supplier_info".
 *
 * @property integer $id
 * @property integer $supplier_id
 * @property string $data
 * @property integer $is_default
 * @property string $type
 */
class SupplierInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'data', 'type'], 'required'],
            [['supplier_id', 'is_default'], 'integer'],
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
            'supplier_id' => 'Supplier ID',
            'data' => 'Data',
            'is_default' => 'Is Default',
            'type' => 'Type',
        ];
    }
}
