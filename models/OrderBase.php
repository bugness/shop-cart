<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $delivery_address
 * @property string $notes
 * @property string $total_amount
 * @property string $status
 * @property string $shipped_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Item[] $items
 */
class OrderBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'created_at', 'updated_at'], 'required'],
            [['delivery_address', 'notes', 'status'], 'string'],
            [['total_amount'], 'number'],
            [['shipped_at', 'created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 100],
            [['first_name', 'last_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'delivery_address' => Yii::t('app', 'Delivery Address'),
            'notes' => Yii::t('app', 'Notes'),
            'total_amount' => Yii::t('app', 'Total Amount'),
            'status' => Yii::t('app', 'Status'),
            'shipped_at' => Yii::t('app', 'Shipped At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['order_id' => 'id'])->inverseOf('order');
    }

    /**
     * @inheritdoc
     * @return \app\models\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\OrderQuery(get_called_class());
    }
}
