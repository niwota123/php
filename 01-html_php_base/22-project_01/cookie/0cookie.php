<?php
/**
 * @Author: superking
 * @Date:   2017-08-30 14:38:03
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-30 14:56:50
 */

//使用cookie模拟自动登录


//1,保持登录状态,需要将用户登录信息保持到本地



//2,如果本地有,则直接登录
//3,如果本地没有,就让用户登录


if ($_COOKIE['user']) {
    $user = $_COOKIE['user'];
    echo "用户{$user}自动登录了";
}else {
    echo "首次登录";
    //设置cookie
    setcookie('user', 'xiaoming', time()+60);
}


//cookie原理,就是浏览器的本地缓存文件,将数据写入到浏览器缓存目录下,下次使用的时候直接从
//缓存目录中读取
//cookie的使用
//设置cookie :  setcookie(key,value,time);
//使用cookie: $_COOKIE;


