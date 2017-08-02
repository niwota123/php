<?php
/**
 * @Author: superking
 * @Date:   2017-08-02 15:24:48
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-02 16:49:32
 */
//计算月demo

//计算月数
function months($sTime,$eTime){
    $sTime = strtotime($sTime);
    $eTime = strtotime($eTime);

    $s_m = (int)date('m',$sTime);
    $e_m = (int)date('m',$eTime);
    return $e_m-$s_m;
}

//计算月精确天数
function months_day($sTime,$eTime){
    $sTime = strtotime($sTime);
    $eTime = strtotime($eTime);

    $s_m = (int)date('m',$sTime);
    $e_m = (int)date('m',$eTime);

    $day = 0;
    for ($i=$s_m; $i < $e_m ; $i++) {

        $timestape = mktime(0, 0, 0, $i, 1, (int)date('y',$sTime));
        // echo "{$i}月";
        // echo (int)date('t', $timestape) .'<br>';
        $day += (int)date('t', $timestape);
    }
    return $day;
}

//计算天数
function days($sTime,$eTime){
    $sTime = strtotime($sTime);
    $eTime = strtotime($eTime);
    return ceil(abs(($eTime-$sTime)/(24*3600)));
}

//逻辑处理
function posttime($sTime,$eTime){

    if (!strtotime($sTime)&&!strtotime($eTime)) {
        return '时间格式错误';
    }
    if (strtotime($eTime)-strtotime($sTime)<0) {
       return '开始时间大于结束时间';
    }

    if (date('y',strtotime($sTime)) != date('y',strtotime($eTime))) {
        return date('c',$sTime);
    }

    $days = days($sTime,$eTime);
    $m_days = months_day($sTime,$eTime);
    $months = months($sTime,$eTime);

    if ($days>=$m_days) {
        $lastDay = $days-$m_days;
        return "{$months}月{$lastDay}天之前";
    }else {
        if ($months>1) {
            $months -=1;
            $lastDay = ((int)date('t',strtotime($eTime)))-($m_days-$days);
            return "{$months}月{$lastDay}天之前";
        }else{
            return "{$days}天之前";
        }
    }
}
echo '<hr>';
echo posttime('20170101','20170802');
