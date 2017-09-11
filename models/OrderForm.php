<?php

namespace app\models;

use Yii;

/**
 * @inheritdoc
 */
class OrderForm extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'delivery_address'], 'required'],
            [['delivery_address', 'notes'], 'string'],
            [['email'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['first_name', 'last_name'], 'string', 'max' => 60],
        ];
    }

    public function createOrder()
    {
        $this->total_amount = Yii::$app->cart->total();
        $this->status = Order::STATUS_PENDING;
        $this->save();

        $items = Yii::$app->cart->items();
        foreach ($items as $item) {
            $item->session = null;
            $item->order_id = $this->id;
            $item->save();
        }
    }
}
