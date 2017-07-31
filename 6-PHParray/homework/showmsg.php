<?php
/**
 * @Author: superking
 * @Date:   2017-07-31 09:09:58
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-31 10:36:32
 */
//展示消息---首页
// 从文件读取数据1,有数据 2,没数据
$fileName = 'msg.txt';
//file_exists 判断文件是否存在
// if (file_exists($fileName)) {
//     # code...
// }
//
@$fileContent  = file_get_contents($fileName);
if ($fileContent) {
    //有数据
    $msgList = unserialize($fileContent);
}else {
    //没数据
    $msgList = array();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>留言展示</title>
</head>
<body>
    <a href="addmsg.php">添加</a>
    <table border="1" rules="all">
        <tr>
            <td>用户名</td>
            <td>留言</td>
            <td>操作</td>
        </tr>
        <?php

        // 遍历数据获得单条msg
        foreach ($msgList as  $id => $msgData) {
            list($user,$msg) = $msgData;
            echo '<tr>';
            echo "<td>$user</td>";
            echo "<td>$msg</td>";
            echo "<td><a href='#'>编辑</a>-<a href='#'>删除</a></td>";
            echo ' </tr>';
        }

         ?>

    </table>
</body>
</html>