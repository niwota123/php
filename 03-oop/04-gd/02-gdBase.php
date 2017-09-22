<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 9:56
 */

//gd库的基本使用
//1,生成画板
//2,选择颜色和画笔
//3,开始画
//4,告诉浏览器以什么样的格式展示图像
//5,销毁画板

$w = 500;
$h = 200;
//画板
$imageContent = imagecreatetruecolor($w,$h);

//填充白色
imagefill($imageContent,0,0,imagecolorallocate($imageContent,255,255,255));
//选择颜色
$red = imagecolorallocate($imageContent,255,0,0);

//开始画,画一个字符
//imagechar($imageContent,30,50,50,'H',$red);

//画一句话
imagestring($imageContent,30,50,50,'Hello PHP',$red);
//画一个线
imageline($imageContent,50,70,150,70,$red);
//使用字体
imagettftext($imageContent,30,45,50,120,$red,'Lobster-Regular.ttf','Hello PHP');

//告诉浏览器,以jped的方式显示画
header('content-type:image/jpeg');
//输出画的东西
imagejpeg($imageContent);
//imagepng();
//imagegif();

//销毁画板
imagedestroy($imageContent);
