<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26
 * Time: 9:28
 */
//1,composer中文网
//http://www.phpcomposer.com/

//-如何安装composer
//-如何使用中文镜像
//-如何使用composer
//-实例使用composer的例子

//http://docs.phpcomposer.com/00-intro.html#Installation-Windows
//安装 - Windows
//使用安装程序
//这是将 Composer 安装在你机器上的最简单的方法。
//
//下载并且运行 Composer-Setup.exe(https://getcomposer.org/Composer-Setup.exe)，它将安装最新版本的 Composer ，并设置好系统的环境变量，因此你可以在任何目录下直接使用 composer 命令。

//安装三方库的方式
//1,使用composer命令
//composer require 库的名字;//自动生成 composer.json并解自动安装三方库到工程目录
//2,使用配置 composer.json文件的方式
//2.1-在composer.json文件中添加三方库
//{
\

//    "require": {
//    "filp/whoops": "^2.1",
//    "symfony/var-dumper":"*"
//    }
//}
//2.2,在当前目录执行 composer update 命令,进行三分的库的安装
//
//3,三方库安装完后的使用
//直接 include "vendor/autoload.php";
//自动将我们需要的三方库的头文件导入到当前文件中

//4,如果是个空的工程,配置完composer.json后,可以使用
//composer install命令进行安装三方库