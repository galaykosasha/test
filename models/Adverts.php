<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "{{%adverts}}".
 *
 * @property integer $user_id
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_login
 * @property string $user_password
 * @property string $authKey
 */
class Adverts extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey = 'keyTest';

    private $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adverts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_first_name', 'user_last_name', 'user_login', 'user_password'], 'required'],
            [['user_first_name', 'user_last_name', 'user_login', 'user_password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'user_first_name' => Yii::t('app', 'User First Name'),
            'user_last_name' => Yii::t('app', 'User Last Name'),
            'user_login' => Yii::t('app', 'User Login'),
            'user_password' => Yii::t('app', 'User Password'),
        ];
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->password = $this->user_password;

    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if($this->password !== $this->user_password)
                $this->user_password = \Yii::$app->getSecurity()->generatePasswordHash($this->user_password);

            return true;
        }
        return false;
    }

    public function getUser_fio()
    {
        return $this->user_first_name.' '.$this->user_last_name;
    }

    public static function findIdentity($user_id)
    {
        return static::findOne(['user_id' => $user_id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByLogin($user_login)
    {
        return static::findOne(['user_login' => $user_login]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->user_password);
    }
}
