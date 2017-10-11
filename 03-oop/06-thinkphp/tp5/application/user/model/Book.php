<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 17:15
 */

namespace app\user\model;


use think\Model;

class Book extends Model {
    //添加多态的关联
    public function comments(){
        return $this->morphMany('Comment','commentable');
    }
}