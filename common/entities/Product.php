<?php

namespace common\entities;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property int $category_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'desc', 'created_at', 'updated_at'], 'required'],
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'desc'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
