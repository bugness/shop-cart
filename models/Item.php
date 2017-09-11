<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * @inheritdoc
 */
class Item extends ItemBase
{
    /**
     * @param string $prefix
     * @return void
     */
    public function getAmount($prefix = '')
    {
        return $prefix . number_format($this->amount, 2);
    }
}
