<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "weather_cities".
 *
 * @property int $id
 * @property int $city_id
 * @property string $city_name
 * @property int $active
 */
class WeatherCities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weather_cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'city_name'], 'required'],
            [['city_id', 'active'], 'integer'],
            [['city_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'city_name' => 'City Name',
            'active' => 'Active',
        ];
    }
}
