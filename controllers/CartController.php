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

        $item = new Item;
        $item->product_id = $product->id;
        $item->amount = $product->price;
        $item->session = Yii::$app->session->id;
        $item->save();

        return $this->goBack();
    }

    public function actionIndex()
    {
        $items = Item::find()->where([
            'session' => Yii::$app->session->id,
        ])->all();

        return $this->render('index', [
            'items' => $items,
        ]);
    }

    public function actionRemove($id)
    {
        if (null === ($item = Item::findOne($id))) {
            return new NotFoundHttpException;
        }

        $item->delete();

        return $this->goBack();
    }

}
