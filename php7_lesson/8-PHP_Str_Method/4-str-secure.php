<?php
/**
 * @Author: superking
 * @Date:   2017-08-01 15:09:34
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-01 15:23:10
 */
//md5
$pwd = '123456';
$md5Str = md5($pwd);
echo '<br>'.$md5Str;
//sha1
$sha1 = sha1($pwd);
echo '<br>'.$sha1;

//加密
//rsa
//des