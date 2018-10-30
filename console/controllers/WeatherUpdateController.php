<?php

namespace console\controllers;

use common\models\WeatherData;
use Yii;
use yii\console\Controller;

/**
 * Class WeatherUpdate
 *
 * @package \console\controllers
 */
class WeatherUpdateController extends Controller
{
    public function actionIndex() {
        WeatherData::updateData();
    }
}
