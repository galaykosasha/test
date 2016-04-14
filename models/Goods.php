<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property integer $good_id
 * @property string $good_name
 * @property string $good_price
 * @property integer $good_advert
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['good_name', 'good_price', 'good_advert'], 'required'],
            [['good_price'], 'number'],
            [['good_advert'], 'integer'],
            [['good_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'good_id' => Yii::t('app', 'Good ID'),
            'good_name' => Yii::t('app', 'Good Name'),
            'good_price' => Yii::t('app', 'Good Price'),
            'good_advert' => Yii::t('app', 'Good Advert'),
        ];
    }

    public function getAdvert()
    {
        return $this->hasOne(Adverts::className(), ['user_id' => 'good_advert']);
    }
}
