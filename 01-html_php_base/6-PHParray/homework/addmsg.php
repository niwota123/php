<?php
/**
 * @Author: superking
 * @Date:   2017-07-31 09:10:04
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-31 09:55:14
 */
// 添加
//1,获得用户提交的数据,添加到数组
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'add') {
        if ($_POST['user']&&$_POST['msg']) {
            //先组织每条留言的数据
            $msg = [$_POST['user'],$_POST['msg']];


            //组织完留言数据后写入本地,1,本地已有数据2,本地没有数据
            $filename = 'msg.txt';
            @$fileContent = file_get_contents($filename);
            if ($fileContent) {
                //本地有数据-将文件的内容,反序列化成数组
                $msgList = unserialize($fileContent);
            }else{
                //本地没数据
                $msgList = array();
            }

             //再组织留言列表的数据
            $msgList[]= $msg;

            //将最新的数据写入本地
            $res = file_put_contents($filename,serialize($msgList));
            if ($res) {
                echo "写入成功 3秒后跳转首页!<br>";
                echo '<meta http-equiv="refresh" content="3;url=showmsg.php"/>';
            }else{
                echo '写入失败';
            }

        }
        else {
            echo '用户名和留言,不能为空';

        }
    }
}
//2,将数组写入文件
//3,自动跳转首页
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <!-- 自动跳转 -->
    <!-- <meta http-equiv="refresh" content="3:url=showmsg.php"/> -->
    <title>添加留言</title>
</head>
<body>
    <form action="addmsg.php?action=add" method="post">
        用户:
        <input type="text" name="user" /><br />
        留言:
        <textarea name="msg"  cols="30" rows="10"></textarea>
        <input type="submit" value="提交留言" />
    </form>
</body>
</html>