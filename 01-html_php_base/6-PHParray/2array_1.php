<?php
/**
 * @Author: superking
 * @Date:   2017-07-28 14:12:47
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-28 14:29:45
 */

echo '<pre>';

//快速创建索引数组 range(范围)
//参数:1,开始 2,结束 3,步长
$arr = range(5, 10);
print_r($arr);
$arr = range(1.1, 6.6);
print_r($arr);

//字母
$arr = range('a', 'z');
print_r($arr);
//步长
$arr = range(0, 100, 10);
print_r($arr);

//快速创建 ,关联数组 (compact紧凑的 合约)
$user = 'xiaoming';
$pwd = '123456';
$tel = '13232388989';

$arr = compact('user','pwd','tel');
print_r($arr);

echo '</pre>';
