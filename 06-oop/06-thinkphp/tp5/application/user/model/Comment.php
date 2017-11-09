<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 14:19
 */

namespace app\user\model;


use think\Model;

class Comment extends Model {

    protected $resultSetType = 'collection';

    public function user(){
        return $this->belongsTo('User');
    }

    //反向多态关联
    public function commentable(){
        //不传参数,以方法名为,字段前缀
        //commentable_id
        //commentable_type
        return $this->morphTo();
    }
}