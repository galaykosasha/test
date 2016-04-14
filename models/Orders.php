<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property integer $order_id
 * @property integer $order_state
 * @property string $order_add_time
 * @property integer $order_good
 * @property string $order_client_phone
 * @property string $order_client_name
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_state', 'order_good'], 'integer'],
            [['order_add_time'], 'safe'],
            [['order_good', 'order_client_phone', 'order_client_name', 'order_state'], 'required'],
            [['order_client_phone'], 'string', 'max' => 12],
            [['order_client_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => Yii::t('app', 'Order ID'),
            'order_state' => Yii::t('app', 'Order State'),
            'order_add_time' => Yii::t('app', 'Order Add Time'),
            'order_good' => Yii::t('app', 'Order Good'),
            'order_client_phone' => Yii::t('app', 'Order Client Phone'),
            'order_client_name' => Yii::t('app', 'Order Client Name'),
        ];
    }

    public function getGood()
    {
        return $this->hasOne(Goods::className(), ['good_id' => 'order_good']);
    }

    public function getState()
    {
        return $this->hasOne(States::className(), ['state_id' => 'order_state']);
    }
}
