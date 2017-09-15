<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m170915_122531_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'name' => $this->string(200)->notNull(),
            'price' => $this->decimal(10,2)->defaultValue('0.00'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
