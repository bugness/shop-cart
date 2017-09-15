<?php

use yii\db\Migration;

/**
 * Handles the creation of table `item`.
 * Has foreign keys to the tables:
 *
 * - `product`
 * - `order`
 */
class m170915_124808_create_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('item', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'product_id' => $this->integer()->unsigned(),
            'order_id' => $this->integer()->unsigned(),
            'session' => $this->string(45),
            'amount' => $this->decimal(10,2)->defaultValue('0.00'),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-item-product_id',
            'item',
            'product_id'
        );

        // add foreign key for table `product`
        $this->addForeignKey(
            'fk-item-product_id',
            'item',
            'product_id',
            'product',
            'id',
            'SET NULL'
        );

        // creates index for column `order_id`
        $this->createIndex(
            'idx-item-order_id',
            'item',
            'order_id'
        );

        // add foreign key for table `order`
        $this->addForeignKey(
            'fk-item-order_id',
            'item',
            'order_id',
            'order',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `product`
        $this->dropForeignKey(
            'fk-item-product_id',
            'item'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-item-product_id',
            'item'
        );

        // drops foreign key for table `order`
        $this->dropForeignKey(
            'fk-item-order_id',
            'item'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-item-order_id',
            'item'
        );

        $this->dropTable('item');
    }
}
