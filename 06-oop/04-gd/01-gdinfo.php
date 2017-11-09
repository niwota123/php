<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 9:49
 */

//GD库用来处理图片和画图，它是PHP的一个扩展（extension）
//可以实现的功能包括:
//1,给图片添加水印
//2,生成图片缩略图
//3,生成验证码图片

//验证gd是否被安装
var_dump(gd_info());

if (extension_loaded('gd')){
    echo 'gd库已经被加载';
}