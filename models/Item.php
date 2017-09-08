<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $session
 * @property string $amount
 *
 * @property Product $product
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['amount'], 'number'],
            [['session'], 'string', 'max' => 45],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'session' => 'Session',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
