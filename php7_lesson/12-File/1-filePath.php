<?php
/**
 * @Author: superking
 * @Date:   2017-08-07 14:08:50
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-07 14:32:51
 */
// 路径
// 相对路径
//相对于当前目录,相对于上级目录
// . 当前目录
// ..上级目录
// /fileDir/a.txt
// ./fileDir/a.txt
// ../readm.md

// 绝对路径
// 全路径 c:/wampstack/apache2/htdocs/lesson/12-file/

//linux 的路径分隔和wind的路径分隔
//win: \
//linux: /
//PHP提供一个常量来表示分隔符
//DIRECTORY_SEPARATOR
echo DIRECTORY_SEPARATOR;

//远程地址
//相对路径和本地地址的相对路径一样
//绝对路径
//本地:c:\a\b\c
//远程:http://www.baidu.com/index.html

// php路径的函数
// basename(path, suffix)//路径下文件的名字
// dirname(path)//路径下文件夹的名字
// pathinfo(path, options)//路径的一些信息

$url = './aaa/bbb/ccc/index.php';
$aUrl = "c:/aaa/bbb/ccc/aindex.php";

echo '<br>'.basename($url);
echo '<br>'.basename($aUrl);

echo '<br>'.dirname($url);
echo '<br>'.dirname($aUrl);

echo '<br>';
var_dump(pathinfo($url));
echo '<br>';
var_dump(pathinfo($aUrl));
