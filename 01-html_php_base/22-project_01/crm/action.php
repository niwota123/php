<?php

//跳转处理
/**
 * @Author: superking
 * @Date:   2017-08-29 10:59:12
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-29 11:39:17
 */

if (isset($_GET['act'])) {
    $_GET['act']();
}

function info(){


    if (!isset($_GET['step'])) {
        //显示客户首页
        include 'info.php';

    }else {
        //具体的功能操作
        $step =$_GET['step'];
        switch ($step) {
            case 'add':

                if (!isset($_POST['submit'])) {
                    //界面显示
                    include 'info_detail.php';

                }else{
                    //具体的操作
                    var_dump($_POST);
                    //数据库操作
                    //跳转
                }

                 break;
            case 'edit':

                 break;
            case 'del':

                 break;


             default:

                 break;
         }
    }

}


function care(){
    include 'care.php';
}

function type(){
    include 'type.php';
}