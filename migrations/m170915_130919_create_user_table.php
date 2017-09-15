<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170915_130919_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'email' => $this->string(100)->unique()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password' => $this->string(60)->notNull(),
            'reset_token' => $this->string(100)->unique(),
            'status' => $this->smallinteger()->notNull()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
