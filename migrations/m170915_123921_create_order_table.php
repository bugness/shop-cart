<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m170915_123921_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'email' => $this->string(100)->notNull(),
            'first_name' => $this->string(60),
            'last_name' => $this->string(60),
            'delivery_address' => $this->text(),
            'notes' => $this->text(),
            'total_amount' => $this->decimal(10,2)->defaultValue('0.00'),
            'status' => "ENUM('pending', 'paid', 'shipped', 'completed', 'canceled') DEFAULT 'pending'",
            'shipped_at' => $this->dateTime(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
