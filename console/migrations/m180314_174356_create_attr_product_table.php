<?php

use yii\db\Migration;

/**
 * Handles the creation of table `attr_product`.
 */
class m180314_174356_create_attr_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%attr_product}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->notNull(),
            'value' => $this->string()->null(),
            'product_id' => $this->integer()->notNull(),
        ],$tableOptions);

        $this->createIndex('{{%idx-attr_product-product_id}}', '{{%attr_product}}', 'product_id');
        $this->addForeignKey('{{%fk-attr_product-product_id}}', '{{%attr_product}}', 'product_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%attr_product}}');
    }
}
