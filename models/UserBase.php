<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $auth_key
 * @property string $password
 * @property string $reset_token
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class UserBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'auth_key', 'password', 'created_at', 'updated_at'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email', 'reset_token'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 60],
            [['email'], 'unique'],
            [['reset_token'], 'unique'],
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
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'reset_token' => Yii::t('app', 'Reset Token'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
