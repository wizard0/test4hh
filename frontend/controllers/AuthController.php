<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * Class AuthController
 *
 * @package \frontend\controllers
 */
class AuthController extends Controller
{
    /**
     * Displays base auth form, and logging in
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->post()) {
            $jsonAuth = Yii::$app->request->post('authData');
            $authData = Json::decode($jsonAuth);

            if ($user = User::findOne(['username' => $authData['login']])) {
                if (Yii::$app->getSecurity()->validatePassword($authData['password'], $user->password_hash)) {
                    $user->token = Yii::$app->security->generateRandomString();
                    $user->save(false);
                    $message = ['token' => $user->token];
                } else {
                    $message = ['error' => 'password is incorrect'];
                }
            } else {
                $message = ['error' => 'login is incorrect'];
            }
        } else {
            $message = ['error' => 'it should be POST request'];
        }

        return Json::encode($message);
    }
}
