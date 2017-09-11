<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Item;
use app\models\OrderForm;
use app\models\Product;

class CartController extends Controller
{
    public function actionAdd($id)
    {
        if (null === ($product = Product::findOne($id))) {
            return new NotFoundHttpException;
        }

        Yii::$app->cart->add($product);

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

    public function actionCheckout()
    {
        $form = new OrderForm;

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $form->createOrder();
            Yii::$app->session->setFlash('success', Yii::t('app', 'Order has been submitted'));
            return $this->goHome();
        }

        return $this->render('checkout', [
            'model' => $form,
        ]);
    }
}
