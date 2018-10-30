<?php

use yii\db\Migration;

/**
 * Class m181030_153107_add_temp_token_column_to_user
 */
class m181030_153107_add_temp_token_column_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'token', $this->string(32)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181030_153107_add_temp_token_column_to_user cannot be reverted.\n";

        return false;
    }
    */
}
