<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/1
 * Time: 9:26
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface {


    //保持数据之前,生成auth_key
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }


    public static function findByUsername($username){
        return static::findOne(['username'=>$username]);
    }
    //接口方法

    //根据id找用户
    public static function findIdentity($id){
        return static::findOne($id);
    }

    //根据token获取用户
    public static function findIdentityByAccessToken($token, $type = null){
        return static::findOne(['access_token'=>$token]);
    }

    //返回用户的id
    public function getId(){
        return $this->id;
    }


    //返回认证的key
    public function getAuthKey(){
        return $this->auth_key;
    }

    //验证,authkey
    public function validateAuthKey($authKey){
        return $this->getAuthKey()===$authKey;
    }

    //密码设置和验证
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }
}