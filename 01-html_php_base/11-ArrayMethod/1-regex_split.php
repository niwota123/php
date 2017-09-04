<?php
/**
 * @Author: superking
 * @Date:   2017-08-04 14:11:34
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-04 15:09:52
 */
// preg_split(pattern, subject, limit, flags)
// 使用正则 分隔字符串
// 参数:
// 1,正则
// 2,匹配目标
// 3,次数 默认-1(不限次数)
// 4,配置


//使用空格分隔
$str = "hello php is hypertext language,programing";
$regex = '#[\s,]+#';//分隔符
$rs = preg_split($regex, $str);
var_dump($rs);

//配置
//PREG_SPLIT_NO_EMPTY 返回非空结果

$str = 'programing';
$regex = '##';
$rs = preg_split($regex, $str, -1, PREG_SPLIT_NO_EMPTY);
var_dump($rs);

//PREG_SPLIT_OFFSET_CAPTURE 偏移量
$str = "hello php is hypertext language,programing";
$regex = '#[\s,]+#';//分隔符
$rs = preg_split($regex, $str,-1,PREG_SPLIT_OFFSET_CAPTURE);
var_dump($rs);

//PREG_SPLIT_DELIM_CAPTURE 模式()中的结果会返回
$str = "hello123php234is2344hypertext45language456programing";
$regex = '#(\d+)#';//分隔符
$rs = preg_split($regex, $str,-1,PREG_SPLIT_DELIM_CAPTURE);
var_dump($rs);

//练习
// <td colspan="2" rowspan="2" bgcolor="red">
// 获得属性和属性的值,并存储在一个数组中,属性key 值为value

 //td 去掉td 和 <>
 $str = '<td colspan="2" rowspan="2" bgcolor="red">';
 $str= trim($str, '<td>');
 //使用空格分隔 得到 单独的属性
 $res = preg_split('#\s#', $str, -1, PREG_SPLIT_NO_EMPTY);

 //对单独属性字符串进行处理
 foreach ($res as $value) {
    //使用= 号 爆炸
     //$arr = explode('=', $value);
     //还可以用preg_slit分隔
     $arr = preg_split('#=#', $value);

     list($key,$value) = $arr;
     $data[$key] = trim($value,'"');
 }

 var_dump($data);
 /*
 array(3) {
  ["colspan"]=>
  string(1) "2"
  ["rowspan"]=>
  string(1) "2"
  ["bgcolor"]=>
  string(3) "red"
}
  */