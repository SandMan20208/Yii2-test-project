<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m220828_110107_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'serial_numb' => $this->integer()->notNull()->unique(),
            'store_id' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer(11)->notNull()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%device}}');
    }
}
