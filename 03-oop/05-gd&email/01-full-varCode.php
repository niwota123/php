<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 9:08
 */
//验证码
//类型:1,数字 2,字母 3,图片 4,混合

//根据不同的类型,生成验证码元数据

//type:验证码类型
$type = 4;
$length = 4;//验证码的长度

//1,弄一堆数据
//2,从一堆数据总取4个

$data = array();
switch ($type){
    case 1://数字
        $data = range(0,9);

        break;
    case 2://字母
        $data = array_merge(range('a','z'),range('A','Z'));

        break;
    case 4://混合
        $data = array_merge(range(0,9),range('a','z'),range('A','Z'));

        break;
    default:
        break;
}

//得到验证码
$varCode = randVarCode($data,$length);

//将生成的验证码,存放在session中
session_start();
$_SESSION['varcode'] = $varCode;

outPutVarCode($varCode,$length);


//从数组中,随即取$length个字符,并拼接成字符串
function randVarCode($data,$length=4){
    //1,翻转
    $data = array_flip($data);
    //2,随机取
    $randData = array_rand($data,$length);
    //3拼接
    return join('',$randData);
}

//输出验证码图像
function outPutVarCode($varCode,$length){
    //1,画板
    $w = 100;
    $h= 30;
    $imageContent= imagecreatetruecolor($w,$h);
    //填充白色
    imagefill($imageContent,0,0,imagecolorallocate($imageContent,255,255,255));
    //3,开始画
    for ($i=0;$i<$length;$i++){
        //取出单个的字符
        $char = mb_substr($varCode,$i,1,'utf-8');
        $x = ($w/$length)*$i+5;
        $y = mt_rand(5,$h/2);
        imagechar($imageContent,50,$x,$y,$char,randColor($imageContent));
    }
    //4输出
    header('content-type:image/png');
    imagepng($imageContent);
    imagedestroy($imageContent);
}

//随即的颜色
function randColor($imageContent){
    return imagecolorallocate($imageContent,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
}











