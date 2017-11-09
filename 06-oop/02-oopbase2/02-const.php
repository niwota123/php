<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 10:51
 */
//类常量
//const PI = 3.14;
//常量的编码规范:一般使用全大写定义常量

class TestConst{
    //定义一个类常量
    const const_var = 'const';

    //1,如何在类的内部使用常量:使用self关键字
    function show(){
        //4,static可以访问常量
        //echo '我是常量-',self::const_var;
        echo '我是常量-',static::const_var;
    }
}

//2,如何在外部使用类常量:类名+常量
echo TestConst::const_var;

$t = new TestConst();
$t->show();

//3,对象可以直接调用常量吗?不可以
//$t->const_var;
