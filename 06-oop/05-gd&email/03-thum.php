<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 11:19
 */
//缩略图
//1,创建图片画板
//2,重采样到第二个画板(输出图像)
//3,在重采样的过程中,修改的图片的大小(等比缩放)


//$fileName = 'a.jpeg';
//
////使用方法得当图片的宽和高
////$imageInfo = getimagesize($fileName);
////var_dump($imageInfo);exit;
//
//
////根据图片创建画板
//$imageJpeg = imagecreatefromjpeg($fileName);
//$w =  imagesx($imageJpeg);
//$h = imagesy($imageJpeg);
//
////等比
//$scal = $w/$h;
//
//$dst_w = 600;
//$dst_h = $dst_w/$scal;
//
//
////空画板
//$dst_content = imagecreatetruecolor($dst_w,$dst_h);
//
////重采样
//imagecopyresampled($dst_content,$imageJpeg,0,0,0,0,$dst_w,$dst_h,$w,$h);
//
////跟画板功能一样,可以写字
////imagechar($imageJpeg,5,0,0,'H',imagecolorallocate($imageJpeg,255,0,0));
////imagechar($imageJpeg,5,100,30,'H',imagecolorallocatealpha($imageJpeg,255,0,0,60));
//
//header('content-type:image/jpeg');
//imagejpeg($dst_content);
//
//imagedestroy($imageJpeg);
//imagedestroy($dst_content);

thum('a.jpeg');
//练习
//写一个方法,自动将图片生成 100 300 500 三种规格的缩略图
//考虑,用户可能给你的的图片不是固定格式的
function thum($fileName){
    //处理文件信息
    $info = getimagesize($fileName);
    //获得大小和mime类型数据
    list($src_w,$src_h) = $info;
    $src_mime_type = $info['mime'];

    //根据mime类型进行函数判断
    $createMethod = str_replace('/','createfrom',$src_mime_type);
    $saveMethod = str_replace('/','',$src_mime_type);
    //设置header
    header("content-type:{$src_mime_type}");


    //可变函数
    $src_content = $createMethod($fileName);
    //比例
    $scale = $src_w/$src_h;

    //计算输出缩略图的宽高
    $dst_w_500 = '500';
    $dst_w_300 = '300';
    $dst_w_100 = '100';

    $dst_h_500 = $dst_w_500/$scale;
    $dst_h_300 = $dst_w_300/$scale;
    $dst_h_100 = $dst_w_100/$scale;

    //空白画板
    $dst_image_500 = imagecreatetruecolor($dst_w_500,$dst_h_500);
    $dst_image_300 = imagecreatetruecolor($dst_w_300,$dst_h_300);
    $dst_image_100 = imagecreatetruecolor($dst_w_100,$dst_h_100);

    imagecopyresampled($dst_image_500,$src_content,0,0,0,0,$dst_w_500,$dst_h_500,$src_w,$src_h);
    imagecopyresampled($dst_image_300,$src_content,0,0,0,0,$dst_w_300,$dst_h_300,$src_w,$src_h);
    imagecopyresampled($dst_image_100,$src_content,0,0,0,0,$dst_w_100,$dst_h_100,$src_w,$src_h);

    $fileName = str_replace('/','.',$src_mime_type);
    $saveMethod($dst_image_500,"500_{$fileName}");
    $saveMethod($dst_image_300,"300_{$fileName}");
    $saveMethod($dst_image_100,"100_{$fileName}");

    imagedestroy($dst_image_500);
    imagedestroy($dst_image_300);
    imagedestroy($dst_image_100);
    imagedestroy($src_content);
}





















