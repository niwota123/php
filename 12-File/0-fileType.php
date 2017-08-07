<?php
/**
 * @Author: superking
 * @Date:   2017-08-07 10:49:20
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-07 11:58:18
 */
/*
PHP文件系统处理
文件系统基于linux

文件处理的作用:
 1,项目中都有文件处理
 2,长时间的存储数据
 3,临时缓存


文件类型 (在linux一切东西都是以文件的形式存在)
block :块 ,设置文件,磁盘分区,软驱,cd-rom 等
char : 字符设备 , 键盘,打印机
dir : 目录
fifo :命名通道,用于进程间通信
file : 文件
link : 软连接
unknown : 未知,无法识别
window下识别:file dir unknown
linux下全部识别,(基于linux)

文件的属性
文件是否存在
file_exists(filename);
文件的大小
filesize(filename);
is_writable(filename);
is_readable(filename);

fileatime(filename);// 访问
filemtime(filename);//modify 修改
filectime(filename);//creat 创建

stat(filename);//获得文件属性的数组
 */

$fileName = 'fileDemo.txt';
//获得文件属性
$fileArr = stat($fileName);
var_dump($fileArr);

//文件的类型获取
 echo '<br>'.filetype($fileName);
 echo '<br>'.filetype("fileDir");

//类型的判断
// is_file(filename)
// is_dir(filename)
// is_link(filename)
// is_executable(filename) 判断是否可执行
// is_uploaded_file(path) 是否是上传的文件

//可写可读
// is_readable();
// is_writable();
//大小
// filesize();
//时间
// fileatime
// filectime
// filemtime
//封装一个方法:获得文件的属性:文件的大小(正常的形式),文件的各种时间(正常显示),文件还是文件夹,是否可读写
function getFileInfo($filename)
{
    if (!file_exists($filename)) {
        return '文件不存在';
    }
    if (is_dir($filename)) {
        return '文件夹';
    }

    if (is_file($filename)) {
        $info =null;
        if (is_readable($filename)) {
            $info['isRead'] = true;
        }else {
            $info['isRead'] = false;
        }
        if (is_writeable($filename)) {
            $info['isWrite'] = true;
        }else {
            $info['isWrite'] = false;
        }

        $formart = 'Y/m/d H:i:s';
        $info['ctime'] = date($formart, filectime($filename));
        $info['mtime'] = date($formart, filemtime($filename));
        $info['atime'] = date($formart, fileatime($filename));

        $info['size'] = getFileSize(filesize($filename));

        return $info;
    }

    return '未知类型';
}

function getFileSize($size){
    $dw = 'Bytes';
    if ($size>=pow(2,40)) {//tb
        $size = round($size/pow(2,40),2);
        $dw = 'TB';
    }elseif ($size>=pow(2,30)){//gb
        $size = round($size/pow(2,30),2);
        $dw = 'GB';
    }elseif ($size>=pow(2,20)){//mb
        $size = round($size/pow(2,20),2);
        $dw = 'MB';
    }elseif ($size>=pow(2,10)){//kb
        $size = round($size/pow(2,10),2);
        $dw = 'KB';
    }else{
        $size = $size;
    }

    return $size.$dw;
}


var_dump(getFileInfo('fileDemo.txt'));