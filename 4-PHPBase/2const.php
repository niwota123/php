<?php
/**
 * @Author: superking
 * @Date:   2017-07-26 11:36:06
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-26 12:00:23
 */
//定义常量
define('CLASS_NUM', 7);

const CLASS_NAME = 'PHP';

// CLASS_NUM = 8;
// CLASS_NAME = 'HELLO';


echo CLASS_NUM,CLASS_NAME;


echo PHP_VERSION,PHP_OS,M_PI;
echo "<hr>";
echo __LINE__,__DIR__,__FILE__;


echo "<hr>";

$name = 'CLASS_NAME';
if (defined($name)) {
    echo constant($name);
}else {
    echo "常量未定义";
}

//获取所有的常量
$constArr = get_defined_constants(true);
var_dump($constArr);