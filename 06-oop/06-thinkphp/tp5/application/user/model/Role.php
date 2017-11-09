<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 16:27
 */

namespace app\user\model;


use think\Model;

class Role extends Model {
    public function users(){
        return $this->belongsToMany('User','Rel');
    }
}