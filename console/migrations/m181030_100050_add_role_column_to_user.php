<?php

use yii\db\Migration;

/**
 * Class m181030_100050_add_role_column_to_user
 */
class m181030_100050_add_role_column_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'role', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181030_100050_add_role_column_to_user cannot be reverted.\n";

        return false;
    }
    */
}
