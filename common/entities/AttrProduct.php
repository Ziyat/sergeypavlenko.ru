<?php

namespace common\entities;

use Yii;

/**
 * This is the model class for table "attr_product".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property int $product_id
 *
 * @property Category $product
 */
class AttrProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attr_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'product_id'], 'required'],
            [['product_id'], 'integer'],
            [['key', 'value'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Category::className(), ['id' => 'product_id']);
    }
}
