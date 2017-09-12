<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SignupForm;

class UserController extends Controller
{
    public function actionSignup()
    {
        $model = new SignupForm;
        if ($model->load(Yii::$app->request->post())
            && null != ($user = $model->signup())
            && Yii::$app->getUser()->login($user)
        ) {
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
