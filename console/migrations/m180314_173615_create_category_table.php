<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180314_173615_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'desc' => $this->string()->null(),
            'type' => $this->integer()->null(),
            'parent_id' => $this->integer()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ],$tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
