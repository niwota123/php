<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18
 * Time: 15:05
 */

namespace app\biz\model;
use traits\model\SoftDelete;

use think\Model;

class Biz extends Model {

    //时间戳
    protected $autoWriteTimestamp = 'datetime';
    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //根据经纬度范围获取,列表
    function getList($range){
        //min_x(纬度lat) min_y(精度lng) max_x max_y
        $res = $this->field("b_id as seller_id, b_name as seller_name, b_address as seller_address, b_lng as seller_lng, b_lat as seller_lat")
            ->where("b_lng", [">=", $range['min_lng']], ["<=", $range['max_lng']])
            ->where("b_lat", [">=", $range['min_lat']], ["<=", $range['max_lat']])
            ->select();
        return collection($res)->toArray();
    }

}