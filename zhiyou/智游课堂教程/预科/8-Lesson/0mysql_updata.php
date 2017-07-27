<?php
/**
 * @Author: superking
 * @Date:   2017-07-17 10:47:03
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-17 10:52:31
 */
//链接
$connect = mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo "链接失败".mysqli_error($connect);
}

//update
$sql= "UPDATE student SET age = '30' WHERE name ='小王'";

if (mysqli_query($connect,$sql)) {
    echo "更新成功";
}else{
    echo "更新失败";
}

mysqli_close($connect);
