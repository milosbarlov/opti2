<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $supplier_id
 * @property string $code
 * @property string $name
 * @property string $tax
 * @property integer $coefficient
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'code', 'name', 'tax'], 'required'],
            [['supplier_id', 'coefficient'], 'integer'],
            [['code'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 255],
            [['tax'], 'string', 'max' => 2]
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
            'code' => 'Code',
            'name' => 'Name',
            'tax' => 'Tax',
            'coefficient' => 'Coefficient',
        ];
    }
}
