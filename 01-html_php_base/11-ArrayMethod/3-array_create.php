<?php
/**
 * @Author: superking
 * @Date:   2017-08-04 16:00:54
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-04 16:19:33
 */
// 数组的创建
// range(low, high, step) //范围数组
// compact(var_names)//关联数组

//参数:1,开始位置 2,填充数量 3,填充内容
// array_fill(start_key, num, val)
$arr = array_fill(3,4,'php');
var_dump($arr);

// array_fill_keys(keys, val)
//参数 1,键值(数组) 2,value
$keys = ['a','b','c','d'];
$arr = array_fill_keys($keys, 'php');
var_dump($arr);


//array_combine(keys, values)
$keys = ['a','b','c','d'];
$values = ['aa','bb','cc','dd'];
var_dump(array_combine($keys,$values));

