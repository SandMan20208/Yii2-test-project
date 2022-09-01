<?php

use yii\db\Migration;

/**
 * Class m220831_212050_frontend_users
 */
class m220831_212050_frontend_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%frontend_users}}', [
        'id' => $this->primaryKey(),
        'username' => $this->string()->unique(),
        'password' => $this->string(32)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%frontend_users}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220831_212050_frontend_users cannot be reverted.\n";

        return false;
    }
    */
}
