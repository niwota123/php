<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 16:57
 */

namespace tow;

//多文件使用namespace,第一步将文件导入
require_once '08-namespace3.php';

const PI = 2.222;
function Fnc(){
    echo 'tow',__FUNCTION__;
}

class TestClass{
    function __construct()
    {
        echo 'tow instance';
    }
}

\three\Fnc();

