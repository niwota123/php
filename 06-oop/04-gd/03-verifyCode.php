<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 10:56
 */


//随机的颜色
function rangColor($content){
    return imagecolorallocate($content,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
}

//随机的大小
function rangFont(){
    return mt_rand(20,30);
}


//验证码

//获取随机的字符
//1,通过数组的方式获取
//
$a = range('a','z');
$b = range('A','Z');
$c =range(0,9);

$charArr = array_merge($a,$b,$c);
////翻转数组
//$charArr = array_flip($charArr);
////从数组中随机取一个
//$char = array_rand($charArr);//得到是键名,先对内容数组翻转
//var_dump($char);

////2,通过字符串的方如何去一个随机字符
////implode拼接字符串
//$charStr = implode('',$charArr);
////str_shuffle:打乱字符串
//$charStr = str_shuffle($charStr);
//session_start();
//$_SESSION['charStr']=$charStr;

//3,中文的
$charArr = array('中','华','人','民','共','和','国');
$charStr = join('',array_rand(array_flip($charArr),4));



$image = imagecreatetruecolor(200,100);
//背景填充成白色
imagefill($image,0,0,imagecolorallocate($image,255,255,255));

$num = 4;

for ($i = 0;$i<$num;$i++){
    $sub = 40;//字体间距加宽度
    $x = 50+$sub*$i;//变化
    $y = 50;
    $char = mb_substr($charStr,$i,1,'utf-8');

    imagettftext($image,rangFont(),mt_rand(-90,90),$x,$y,rangColor($image),'simkai.ttf',$char);


}

//干扰元素
//点
for ($i = 0;$i<100;$i++){
    imagesetpixel($image,mt_rand(50,200),mt_rand(20,50),rangColor($image));
}
//线
for ($i = 0;$i<5;$i++){
    //开始点
    //结束点
    imageline($image,mt_rand(40,100),mt_rand(20,50),mt_rand(100,200),mt_rand(20,50),rangColor($image));
}

header('content-type:image/png');
imagepng($image);
imagedestroy($image);











