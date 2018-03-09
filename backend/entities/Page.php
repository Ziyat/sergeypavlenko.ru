<?php

namespace backend\entities;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $status
 * @property string $alias
 * @property int $created_at
 * @property int $updated_at
 */
class Page extends \yii\db\ActiveRecord
{

    const PUBLISHED = 1;
    const UNPUBLISHED = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status', 'alias'], 'required'],
            [['text'], 'string'],
            [['status'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Основной текст',
            'status' => 'Статус',
            'alias' => 'ссылка',
            'created_at' => 'дата создания',
            'updated_at' => 'дата обновления',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ]
        ];
    }

    public static function getStatusArray(){
        return [self::PUBLISHED => 'Опубликованный', self::UNPUBLISHED => 'Не опубликованный'];

    }
}
