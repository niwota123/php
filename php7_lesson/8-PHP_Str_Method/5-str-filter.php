<?php
/**
 * @Author: superking
 * @Date:   2017-08-01 15:49:48
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-01 16:29:56
 */
//过滤
// trim(修剪)
// 过滤空格
$str = '    php     ';
var_dump($str);
var_dump(ltrim($str));//过滤左
var_dump(rtrim($str));//过滤右
var_dump(trim($str));//过滤两端

echo '<hr>';
//过滤指定字符
$str = '1234php!!!';
var_dump($str);
var_dump(ltrim($str,'0..9'));//左剔除特定字符
var_dump(rtrim($str,'!'));//右边剔除
//同时剔除123 !
var_dump(trim($str,'0..9!'));//0..9 表示0-9

//剔除html和PHP标签
$str = "<a href='#'> hello a </a> <p>php</p>";
$res = strip_tags($str,'<a>');
echo '<br>'.$res;//

//自动转义
$str = "insert i'm ";
$str = 'insert "im" ';

$res  = addslashes($str);//本质,让具有特殊意义的符号,转义成普通字符
echo '<br />'.$res;


//将特殊字符转换成html实体
$str = "php + java = <html>";
echo '<br>'.htmlentities($str);//

$str = "<h1>你好</h1>";
echo htmlentities($str);

echo '<hr>';
//将百度的页面源码显示出来
$baiDuContent = file_get_contents('http://www.baidu.com');
echo htmlentities($baiDuContent);