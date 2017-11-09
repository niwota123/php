<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 15:04
 */

//水印:文字水印,图片水印

//1,图片画板
$image = imagecreatefromjpeg('a.jpeg');

//2,在图片画板上写字,选择半透明的颜色
//imagettftext($image,80,0,100,100,imagecolorallocatealpha($image,255,0,0,100),'impact.ttf','ZHIYOUJIAOYU');
//3,图片的水印
//$logo = imagecreatefromjpeg('b.jpg');
$logo = imagecreatefrompng('a.png');
$color=imagecolorallocate($logo,0,0,0);
//3.设置透明
imagecolortransparent($logo,$color);
imagefill($logo,0,0,$color);

//画板和画板的融合
// ( resource $dst_im , resource $src_im , int $dst_x , int $dst_y , int $src_x , int $src_y , int $src_w , int $src_h , int $pct )
imagecopymerge($image,$logo,0,50,0,0,imagesx($logo),imagesy($logo),80);

header('content-type:image/jpeg');
imagejpeg($image);
//imagepng($logo);
imagedestroy($image);