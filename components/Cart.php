<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Item;
use app\models\Product;

class Cart extends Component
{
    private $count = null;

    /**
     * @return int
     */
    public function count()
    {
        if ($this->count === null) {
            $this->count = Item::find()->where([
                'session' => Yii::$app->session->id,
            ])->count();
        }
        return $this->count;
    }

    /**
     * @return array
     */
    public function items()
    {
        return Item::find()->where([
            'session' => Yii::$app->session->id,
        ])->with('product')->all();
    }

    /**
     * @param string $prefix
     * @return string
     */
    public function total($prefix = '')
    {
        return $prefix . Item::find()->where([
            'session' => Yii::$app->session->id,
        ])->sum('amount');
    }

    /**
     * @param Product $product
     * @return void
     */
    public function add(Product $product)
    {
        $item = new Item;
        $item->product_id = $product->id;
        $item->amount = $product->price;
        $item->session = Yii::$app->session->id;
        $item->save();
    }
}
