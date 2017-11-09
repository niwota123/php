<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 14:58
 */

namespace app\user\model;


use think\Model;

class City extends Model {

    public function topics(){
        return $this->hasManyThrough('Topic','User');
    }
}