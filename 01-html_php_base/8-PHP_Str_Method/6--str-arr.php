<?php
/**
 * @Author: superking
 * @Date:   2017-08-01 17:05:09
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-01 17:56:09
 */
//拆分和组合
// explode(爆炸)(separator(分隔), str)
$str = 'a:b';
$arr = explode(":",$str);
var_dump($arr);//a b
//课下练习:
//实现 模仿系统函数 array('a:b','0:a','1:b');


// implode(内爆)(glue(粘合), pieces(零件));
$a = range('a', 'z');
$str = implode('-', $a);
echo '<br>'.$str;


//字符串转换数组
$str = 'abcdefg';
echo $str{0};//a
echo $str[0];//a
echo '<hr>';
$strArr = str_split($str,2);
var_dump($strArr);

