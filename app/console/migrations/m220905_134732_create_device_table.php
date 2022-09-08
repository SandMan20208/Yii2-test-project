<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m220905_134732_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string()->notNull()->unique(),
            'store_id' => $this->integer()->defaultValue(null),
            'created_at' => $this->dateTime()->notNull()
        ]);

        $this->addForeignKey(
            'fk-store_id', 
            'device', 
            'store_id', 
            'store', 
            'id', 
            'SET NULL',
            'SET NULL'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-store_id', 'device');
        $this->dropTable('{{%device}}');
    }
}
