<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use linslin\yii2\curl;

/**
 * Class ApiTest
 *
 * @package \frontend\controllers
 */
class ApiTestController extends Controller
{
    public function actionIndex()
    {
        $authResponse = "";
        $weatherResponse = "";

        if (Yii::$app->request->post('authTest')) {

        } elseif (Yii::$app->request->post('weatherTest')) {

        }

        return $this->render('index', [
            'authResponse' => $authResponse,
            'weatherResponse' => $weatherResponse
        ]);
    }
}
