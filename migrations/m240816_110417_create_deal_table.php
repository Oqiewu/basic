<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%deal}}`.
 */
class m240816_110417_create_deal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%deal}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'amount' => $this->integer()->notNull(),
            'contact_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-deal-contact_id',
            '{{%deal}}',
            'contact_id'
        );

        $this->addForeignKey(
            'fk-deal-contact_id',
            '{{%deal}}',
            'contact_id',
            '{{%contact}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-deal-contact_id',
            '{{%deal}}'
        );

        $this->dropIndex(
            'idx-deal-contact_id',
            '{{%deal}}'
        );

        $this->dropTable('{{%deal}}');
    }
}
