<?php
/**
 * @Author: superking
 * @Date:   2017-07-27 15:06:02
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-27 15:32:14
 */
//条件语句
//不同的条件,处理不同的代码

//网吧 18岁

$age = 17;
//if 的条件用来判断真假的
if($age>=18)
echo'可以上网';

//if...else
if ($age>=18) {
    echo '可以lol';
}else {
    echo'回家王者';
}

$week = '周六';//可能有周一----周日

//使用 比较+逻辑运算符
//输出,周一到周五,上课
//周六,周日,睡觉

if ($week =='周六'||$week=='周日') {
   echo'休息吧';
}else{
    echo '上课';
}

