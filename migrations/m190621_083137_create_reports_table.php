<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reports}}`.
 */
class m190621_083137_create_reports_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reports}}', [
            'id' => $this->primaryKey(),
            'room' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
            'reporterId' => $this->integer()->notNull(),
            'suspectId' => $this->integer(),
            'calmDown' => $this->integer(),
            'comment' => $this->string(),
            'reported' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reports}}');
    }
}
