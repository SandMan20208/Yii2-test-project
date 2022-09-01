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
        'password' => $this->string()->notNull()
        ]);

        $this->insert('frontend_users', [
            'username' => 'frontend',
            'password' => '$2y$10$Wesdq7nQA8Ymfq0hUJBs8e6IXc0ZpbbA/RJw9KWc3NacqZaHH4jM6',
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
