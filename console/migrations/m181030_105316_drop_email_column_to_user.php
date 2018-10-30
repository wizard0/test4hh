<?php

use yii\db\Migration;

/**
 * Class m181030_105316_drop_email_column_to_user
 */
class m181030_105316_drop_email_column_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('user', 'email');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('user', 'email', $this->string()->notNull()->unique());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181030_105316_drop_email_column_to_user cannot be reverted.\n";

        return false;
    }
    */
}
