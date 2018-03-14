<?php

namespace common\entities;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property int $type
 * @property int $parent_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Article[] $articles
 * @property AttrProduct[] $attrProducts
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'updated_at'], 'required'],
            [['type', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'type' => 'Type',
            'parent_id' => 'Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrProducts()
    {
        return $this->hasMany(AttrProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
