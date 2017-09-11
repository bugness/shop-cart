<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * @inheritdoc
 */
class Product extends ProductBase
{
    /**
     * @param string $prefix
     * @return string
     */
    public function getPrice($prefix = '')
    {
        return $prefix . number_format($this->price, 2);
    }
}
