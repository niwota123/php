<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 11:56
 */

namespace app\user\model;


use think\Model;

class Profile extends Model {
    public function user()
    {
        return $this->belongsTo('User');
    }
}