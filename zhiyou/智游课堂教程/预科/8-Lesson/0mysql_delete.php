<?php
/**
 * @Author: superking
 * @Date:   2017-07-17 10:59:49
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-17 11:00:50
 */
$connect = mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo "链接失败".mysqli_error($connect);
}

//delete
$sql= "DELETE FROM student WHERE name='小王'";

if (mysqli_query($connect,$sql)) {
    echo "删除成功";
}else{
    echo "删除失败";
}

mysqli_close($connect);