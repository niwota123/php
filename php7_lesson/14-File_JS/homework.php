<?php
/**
 * @Author: superking
 * @Date:   2017-08-09 09:16:07
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-09 09:49:58
 */
//文件夹的删除
//文件夹的复制

//1,遍历文件夹
//2,删除文件
//3,删除文件夹(文件夹为空才能删)

function del_dir($path){

    //1,文件夹是否
    if (file_exists($path)) {
        //打开文件夹
        $dir = opendir($path);
        //遍历
        while ($file_name = readdir($dir)) {
            //过滤
            if ($file_name=='.'||$file_name=='..') {
                continue;
            }
            //拼接完整的相对地址
            $file_path = $path.DIRECTORY_SEPARATOR.$file_name;
            if (is_file($file_path)) {
                unlink($file_path);
            }else {
                //删除文件夹
                del_dir($file_path);
            }
        }
        //关闭文件夹
        closedir($dir);
        //文件夹内的东西清空完毕-删除文件夹
        rmdir($path);
    }
}

del_dir('./phpmyadmin');


//s 源文件
//d 目标路径
function copy_dir($s_path,$d_path){
    //如果要copy的目录不存在直接返回
    if (!file_exists($s_path)) {
        return ;
    }

    //目标目录是否存在-不存在-创建
    if (!file_exists($d_path)) {
        mkdir($d_path);
    }
    //遍历原目录
    $dir = opendir($s_path);
    while ($s_fileName = readdir($dir)) {
        //过滤
        if ($s_fileName=='.'||$s_fileName=='..') {
            continue;
        }
        //拼接完整的相对路径
        $s_filePath = $s_path.DIRECTORY_SEPARATOR.$s_fileName;
        $d_filePath = $d_path.DIRECTORY_SEPARATOR.$s_fileName;
        if (is_file($s_filePath)) {
            copy($s_filePath, $d_filePath);
        }else{
            copy_dir($s_filePath,$d_filePath);
        }
    }
    //关闭文件夹
    closedir($dir);
}