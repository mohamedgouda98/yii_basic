<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\model;
use yii\base\security;

class User extends ActiveRecord implements IdentityInterface
{
    public $password_repeat;
    /**
     * @var mixed|string|null
     */

    public static function tableName()
    {
        return 'user';
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],

            // password is validated by validatePassword()
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }


    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    public function beforeSave($insert)
    {
         if(parent::beforeSave($insert)){
             if($this->isNewRecord){
                 $this->authKey = \yii::$app->security->generateRandomString();
             }

             if(isset($this->password)){
                 $this->password = md5($this->password);
                 return parent::beforeSave($insert);
             }
         }
         return true;
    }


    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    public static function findByUsername($username){
        return User::findOne(['username'=> $username]);
    }


    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->findByUsername($this->username));
        }
        return false;
    }

}