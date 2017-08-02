<?php
/**
 * @Author: superking
 * @Date:   2017-08-01 14:18:55
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-01 15:06:40
 */
//字符截取
$str = 'abcdef';
$subStr = substr($str, 0, 1);
echo '<br>'.$subStr;//a

$str = 'abcdef';
$subStr = substr($str, 4);
echo '<br>'.$subStr;//ef

$str = 'abcdef';
$subStr = substr($str, -2);
echo '<br>'.$subStr;//ef

//替换
$str = 'abcdef';
$subStr = substr_replace($str, '1', -1, 1);
echo '<br>'.$subStr;

//a.txt
//b.png
//c.jpeg
//d.css
//f.ppp
$files = ['a.txt','B.PNG','c.jpeg','aaa','hello.exe','aa.o'];
//练习:数组中后缀替换成,.php

//替换文件的后缀
function changeFile($fileName,$ex='php'){

    $ex = '.'.$ex;

    if (strlen(stristr($fileName, '.'))>0) {
        $pos = stripos($fileName, '.');
        return substr_replace($fileName,$ex,$pos);
    }else {
        return $fileName.$ex;
    }
}

foreach ($files as $value) {
    echo '<br>'.changeFile($value,'css');
}

