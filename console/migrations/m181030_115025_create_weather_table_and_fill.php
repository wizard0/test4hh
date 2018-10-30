<?php

use yii\db\Migration;

/**
 * Class m181030_115025_create_weather_table_and_fill
 */
class m181030_115025_create_weather_table_and_fill extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('weather_cities', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'city_name' => $this->string(255)->notNull(),
            'active' => $this->smallInteger()->notNull()->defaultValue('1')
        ], $tableOptions);

        $citiesArray = [
            ['id' => 1689973, 'name' => 'San Francisco'],
            ['id' => 2643741, 'name' => 'City of London'],
            ['id' => 2988507, 'name' => 'Paris'],
            ['id' => 4219762, 'name' => 'Rome'],
            ['id' => 524901, 'name' => 'Moscow'],
            ['id' => 694423, 'name' => 'Sevastopol']
        ];

        foreach ($citiesArray as $city) {
            $this->insert('weather_cities', [
                'city_id' => $city['id'],
                'city_name' => $city['name']
            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('weather_cities');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181030_115025_create_weather_table_and_fill cannot be reverted.\n";

        return false;
    }
    */
}
