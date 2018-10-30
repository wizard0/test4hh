<?php

namespace common\models;

use Yii;
use linslin\yii2\curl;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Json;

/**
 * This is the model class for table "weather_data".
 *
 * @property int $id
 * @property int $city_id
 * @property string $temperature
 * @property int $updated_at
 */
class WeatherData extends \yii\db\ActiveRecord
{
    public $city = "";
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weather_data';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'temperature', 'updated_at'], 'required'],
            [['city_id', 'updated_at'], 'integer'],
            [['temperature'], 'string', 'max' => 255],
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
            'temperature' => 'Temperature',
            'updated_at' => 'Updated At',
        ];
    }

    public static function updateData()
    {
        $cities = WeatherCities::find()->all();
        $curl = new curl\Curl();
        foreach ($cities as $city) {
            $response = $curl->get("api.openweathermap.org/data/2.5/weather?id=" . $city->city_id .
            "&APPID=0e0bd5c0c3c6e3dc5a4686695a3f85e2");
            if (!$data = self::find()->where(['city_id' => $city->city_id])->one()) {
                $data = new self();
                $data->city_id = $city->city_id;
            }
            $data->temperature = Json::decode($response)['main']['temp'];
            $data->save(false);
        }
    }

    public function getWeatherCity()
    {
        return $this->hasOne(WeatherCities::className(), ['city_id' => 'city_id']);
    }
}
