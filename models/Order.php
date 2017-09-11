<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * @inheritdoc
 */
class Order extends OrderBase
{
    const STATUS_PENDING = 'pending';
    const STATUS_PAID = 'paid';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELED = 'canceled';

    protected static $statuses = [
        self::STATUS_PENDING => 'Pending',
        self::STATUS_PAID => 'Paid',
        self::STATUS_SHIPPED => 'Shipped',
        self::STATUS_COMPLETED => 'Completed',
        self::STATUS_CANCELED => 'Canceled',
    ];

    /**
     * @return array
     */
    public static function getAvailableStatuses()
    {
        return array_map(function ($status) {
            return Yii::t('app', $status);
        }, self::$statuses);
    }

    /**
     * @param string|array $status
     * @return bool
     */
    public function hasStatus($status)
    {
        return (bool) (is_array($status)
            ? in_array($this->status, $status)
            : $this->status == $status
        );
    }

    /**
     * @param string $prefix
     * @return string
     */
    public function getTotalAmount($prefix = '')
    {
        return $prefix . number_format($this->total_amount, 2);
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
