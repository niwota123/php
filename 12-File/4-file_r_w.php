<?php
/**
 * @Author: superking
 * @Date:   2017-08-07 16:31:07
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-07 17:56:24
 */
// 文件的读写
//读
//file_get_contents 一次全部读取文件的内容
//file 将文件内容读到数组中
//readfile 读到内容并输出
$arr = file('3-fileMode.php');
//var_dump($arr);

// htmlspecialchars(readfile('chmod.txt'));

//写
//
//file_put_contents('chmod.txt','abc',FILE_APPEND);
// readfile('chmod.txt');

//资源类型---fopen()
//获得文件的资源,对资源进行处理,
// 获得文件资源
// fopen
// 读  r
//     r+
//     w+
//     a+

// 写
//  r+ 指针指向头(覆盖原内容)  文件不存在不会创建
//  w  指向头(清空原内容)       会创建
//  w+ 指向头(清空原内容)       会创建
//  a  指向尾部     会创建
//  a+ 指向尾部       会创建

// 注意:使用w打开文件的时候会清空原来的数据,千万不要使用w打开一些重要的文件,文件数据会丢失


$file = 'rwDemo.txt';
$fr = fopen($file,'r+');

//资源类型读写
// fwrite(fp, str, length)
// fread(fp, length)

$rs = fwrite($fr,'abc');

//重置文件指针
rewind($fr);

var_dump(fread($fr,500));

//关闭资源
fclose($fr);


// 资源类型打开以后
// 写
// 参数:1,资源 2,内容 [3,长度]
// fwrite();
// fputs();别名

// 读
// fread() 按照设定的长度读 参数:1,资源 2,长度
// fgetc() 逐个字符读 参数:1,资源
// fgets() 逐行读 参数:1,资源

echo '<hr>';
$fr = fopen('rwDemo.txt','r');

// var_dump(fread($fr,1));
// var_dump(fread($fr,1));
// var_dump(fread($fr,1));

// var_dump(fgetc($fr));
// var_dump(fgetc($fr));
// var_dump(fgetc($fr));

var_dump(fgets($fr));
var_dump(fgets($fr));
var_dump(fgets($fr));

fclose($fr);

// 晚上作业
// 写一个代码检测工具,检测出有效代码行数和注释代码的行数