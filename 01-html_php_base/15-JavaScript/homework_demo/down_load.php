<?php
/**
 * @Author: superking
 * @Date:   2017-08-09 00:17:10
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-09 00:21:08
 */

$filename = "aa.html";
header('Content-Type:text/html'); //指定下载文件类型
header('Content-Disposition: attachment; filename="'.$filename.'"'); //指定下载文件的描述
header('Content-Length:'.filesize($filename)); //指定下载文件的大小

//将文件内容读取出来并直接输出，以便下载
readfile($filename);

