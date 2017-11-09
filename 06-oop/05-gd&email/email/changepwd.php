<?php
//var_dump($_GET);
//根据用户名和密码对比是否可以修改
//根据time判断链接是否超时
if (isset($_GET['code'])) {
    $g_code = $_GET['code'];
    $g_user = $_GET['userid'];
    $time = $_GET['time'];
    
    session_start();
    var_dump($_SESSION);
    $s_code = $_SESSION['code'];
    $s_user = $_SESSION['userid'];
            
    if (($g_code===$s_code)&&($g_user===$s_user)) 
    {
        die('有修改密码的权限');
    }
 else {
        die('链接失效');    
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="action">
            密码:<input type="text"><br/>
            重复:<input type="text">
            <input type="submit" value="重置">
        </form>
    </body>
</html>
