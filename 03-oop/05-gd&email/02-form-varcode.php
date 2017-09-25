<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 10:00
 */

if (isset($_POST['varcode'])){
    session_start();
    $postCode = $_POST['varcode'];
    $sessionCode = $_SESSION['varcode'];
    //处理空格和大小写
    $postCode = trim(strtolower($postCode));
    $sessionCode = trim(strtolower($sessionCode));

    if ($postCode===$sessionCode){
        echo '验证码正确';
    }else{
        echo '验证码错误';
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
</head>
<body>
<form action="02-form-varcode.php" method="post">
    <label>用户名:</label>
    <input type="text" name="user">
    <br/>
    <label>密码:</label>
    <input type="text" name="pwd">
    <br/>
    <label>验证码:</label>
    <input type="text" name="varcode">
    <image id="img"  src='01-full-varCode.php'>
    <a href="javascript:void(0)" onclick="document.getElementById('img').src ='01-full-varCode.php?'+Math.random()">看不清</a>
    <br/>
    <input type="submit" value="登录">
</form>
</body>
</html>
