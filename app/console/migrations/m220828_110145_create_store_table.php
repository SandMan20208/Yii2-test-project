<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%store}}`.
 */
class m220828_110145_create_store_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%store}}', [
            'id' => $this->primaryKey(),
            'store_name' => $this->string()->unique(),
            'created_at' => $this->integer(11)->notNull()
        ]);
        

        $this->createIndex(
            'idx-store_id',
            'device',
            'store_id'
        );

        $this->addForeignKey(
            'fk-store_id', 
            'store', 
            'id', 
            'device', 
            'store_id', 
            'RESTRICT',
            'RESTRICT'
        );

    }

    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-store_id', 'store');

        $this->dropTable('{{%store}}');

    }
}
