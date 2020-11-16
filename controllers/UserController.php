<?php

namespace app\controllers;

use Yii;
use app\models\User;

class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = new User();
        if ($user->load(Yii::$app->request->post()) && $user->login()) {
            return $this->goBack();
        }

        $user->password = '';
        return $this->render('login', [
            'user' => $user,
        ]);
    }

    public function actionRegister()
    {
        $user = new \app\models\User();

        if ($user->load(Yii::$app->request->post())) {
            if ($user->validate()) {
                // form inputs are valid, do something here
                $user->save();
                Yii::$app->getSession()->setFlash('success', 'Account Was Crated');
                return $this->redirect('index.php');
            }
        }

        return $this->render('register', [
            'user' => $user,
        ]);
    }

}
