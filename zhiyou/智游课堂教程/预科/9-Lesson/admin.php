<?php
/**
 * @Author: superking
 * @Date:   2017-07-18 17:13:52
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-18 19:10:39
 */
//判断是处理登录请求还是注册请求
if (isset($_GET['action'])) {

    $action = $_GET['action'];
    switch ($action) {
        case 'login':
        //判断用户名和密码
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        if ($user&&$pwd) {
            // 跳转
            // include 相当于将 2blogindex.php 的全部内容放在了第19行这个位置
            // 可以达到 admin.php 和 2blogindex.php 文件链接的效果
            include '2blogindex.php';
        }
        //跳转到后台首页

            break;
        case 'register':
            break;

        default:
            # code...
            break;
    }
}