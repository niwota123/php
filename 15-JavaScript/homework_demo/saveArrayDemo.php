<?php
/**
 * @Author: superking
 * @Date:   2017-07-28 20:49:29
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-28 20:55:00
 */
//将数组保持到文件
//1,保存到文件
$arr = ['user'=>'wang','age'=>'22','tel'=>'12322232322'];
// 数组写入文件
$filename = 'msg.txt';

file_put_contents($filename, serialize($arr));

//2,读取(将文件数据读取成数组)
$content = file_get_contents($filename);
$fileArr = unserialize($content);
var_dump($fileArr);