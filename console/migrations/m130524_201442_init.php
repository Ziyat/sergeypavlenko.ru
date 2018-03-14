<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()

    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'username' => 'cp_admin',
            'name' => 'Администратор',
            'auth_key' => \Yii::$app->security->generateRandomString(),
            'password_hash' => \Yii::$app->security->generatePasswordHash('z1x2c3v4b5'),
            'email' => 'termit_90@mail.ru',
            'created_at' => time(),
            'updated_at' => time(),

        ]);
    }
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
