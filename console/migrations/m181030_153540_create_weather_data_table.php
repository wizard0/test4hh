<?php

use yii\db\Migration;

/**
 * Handles the creation of table `weather_data`.
 */
class m181030_153540_create_weather_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('weather_data', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'temperature' => $this->string()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('weather_data');
    }
}
