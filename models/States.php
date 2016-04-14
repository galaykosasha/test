<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%states}}".
 *
 * @property integer $state_id
 * @property string $state_name
 * @property string $state_slug
 */
class States extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%states}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_name', 'state_slug'], 'required'],
            [['state_name', 'state_slug'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => Yii::t('app', 'State ID'),
            'state_name' => Yii::t('app', 'State Name'),
            'state_slug' => Yii::t('app', 'State Slug'),
        ];
    }
}
