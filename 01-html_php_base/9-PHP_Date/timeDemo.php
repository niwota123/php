<?php
/**
 * @Author: superking
 * @Date:   2017-08-02 16:51:03
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-02 16:51:09
 */
function post_time($time)
{
    $msg = '';
    //1,将参数传递来的时间,转换成时间戳
    $timestap = strtotime($time);

    //2,判断时间格式是否正确
    if ($timestap===false) {
        $msg = '时间格式错误!';
        return $msg;
    }

    //3,获得参数时间和当前时间的差值
    $diff = time()-$timestap;
    if ($diff<0) {
        $msg = '时间超前,参数有误';
        return $msg;
    }

    //4,根据不同的差值,返回不同的状态
    if ($diff<=5*60) { //5分钟之内,显示刚刚

        $msg = '刚刚';

    }elseif ($diff<=60*60) {//一小时之内,显示多少分钟之前

        $minutes = $diff/60;
        //floor 舍去法取整数,将小数点舍去
        //ceil 进位法取整数,不管小数是多少,小数进一位
        $minutes = floor($minutes);
        $msg = "$minutes 分钟之前";

    }elseif ($diff<=24*60*60) {//一天之内,显示多少小时多少分钟之前

        $hours = $diff/(60*60);
        $hours = floor($hours);
        $minutes = ($diff%(60*60))/60;
        $minutes = floor($minutes);
        $msg = "$hours 小时 $minutes 分钟之前";

    }elseif ($diff<=30*24*60*60) {//一个月之内,显示几天之前

        $days = $diff/(24*60*60);
        $days = floor($days);
        $msg = "$days 天之前";

    }else {//几个月之前
        $months = $diff/(30*24*60*60);
        $months = ceil($months);
        $msg = "$months 月之前";
    }

    return $msg;
}