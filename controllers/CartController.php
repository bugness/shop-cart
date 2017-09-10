<?php

namespace app\controllers;

use Yii;
use app\models\Item;
use app\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CartController extends Controller
{
    public function actionAdd($id)
    {
        if (null === ($product = Product::findOne($id))) {
            return new NotFoundHttpException;
        }

        Yii:$app->cart->add($product);

        return $this->goBack();
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'items' => Yii::$app->cart->items(),
        ]);
    }

    public function actionRemove($id)
    {
        if (null === ($item = Item::findOne($id))) {
            return new NotFoundHttpException;
        }

        $item->delete();

        return $this->redirect(['cart/index']);
    }

}
