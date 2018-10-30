<?php

namespace frontend\controllers;

use common\models\User;
use common\models\WeatherData;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * Class WeatherController
 *
 * @package \frontend\controllers
 */
class WeatherController extends Controller
{
    public function actionIndex()
    {
        if ($token = \Yii::$app->request->get('token')) {
            if (User::find()->where(['token' => $token])->one()) {
                $weatherData = WeatherData::find()->all();
                $arrayToReturn = [];
                foreach ($weatherData as $data) {
                    $arrayToReturn[] = [
                        'city' => $data->weatherCity->city_name,
                        'current_temp' => $data->temperature
                    ];
                }

                $message = $arrayToReturn;
            } else {
                $message = ['error' => 'Token is invalid'];
            }
        } else {
            $message = ['error' => 'There must be GET param named token'];
        }

        return Json::encode($message);
    }
}
