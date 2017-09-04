<?php
/**
 * @Author: superking
 * @Date:   2017-08-10 11:20:41
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-10 11:44:20
 */
//思路整理

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $action();//show()

    // switch ($action) {
    //     case 'show':
    //         show();
    //         break;
    //     case 'modify':
    //         modify();
    //         break;
    //     case 'delete':
    //         delete();
    //         break;
    //     case 'download':
    //         download();
    //         break;
    //     case 'move':
    //         move();
    //         break;
    //     default:

    //         break;
    // }
}else {
    list_a();
}



function list_a(){
    echo
    "
<a href='homeworkDemo.php?action=show&flepath=0' >查看</a>
<a href='homeworkDemo.php?action=modify' >修改</a>
<a href='homeworkDemo.php?action=delete' >删除</a>
<a href='homeworkDemo.php?action=download' >下载</a>
<a href='homeworkDemo.php?action=move' >移动</a>
    ";
}

function show(){
    echo __FUNCTION__;
}
function modify(){
    echo __FUNCTION__;
}
function delete(){
    echo __FUNCTION__;
}
function download(){
    echo __FUNCTION__;
}
function move(){
    echo __FUNCTION__;
}