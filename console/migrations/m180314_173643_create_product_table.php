<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180314_173643_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'desc' => $this->string()->notNull(),
            'category_id' => $this->integer()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ],$tableOptions);

        $this->createIndex('{{%idx-product-category_id}}', '{{%product}}', 'category_id');
        $this->addForeignKey('{{%fk-product-category_id}}', '{{%product}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
