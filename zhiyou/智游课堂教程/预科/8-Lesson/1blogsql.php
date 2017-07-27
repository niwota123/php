<?php
/**
 * @Author: superking
 * @Date:   2017-07-17 14:44:15
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-17 15:25:50
 */
/*
+-------------+---------------+------+-----+---------+----------------+
| Field       | Type          | Null | Key | Default | Extra          |
+-------------+---------------+------+-----+---------+----------------+
| id          | int(11)       | NO   | PRI | NULL    | auto_increment |
| title       | varchar(100)  | NO   |     | NULL    |                |
| content     | varchar(1000) | NO   |     | NULL    |                |
| author      | varchar(10)   | NO   |     | NULL    |                |
| creattime   | datetime      | NO   |     | NULL    |                |
| category_id | int(11)       | NO   |     | NULL    |                |
+-------------+---------------+------+-----+---------+----------------+

 */
//设置时区
date_default_timezone_set("PRC");

$sql = '';
//10条数据
for ($i=1; $i <= 10 ; $i++) {

    //分类id
    $category_id = $i%3;
    //时间
    $date = date('Y-m-d H:i:s',time());

    $sql .= "INSERT INTO blog VALUES (null,'title-$i','content-$i','author-$i','$date',$category_id);";
}
//数据库连接
$connect = mysqli_connect('localhost','root','123456','test');
if (!$connect) {
    echo "error link sql";
}

//数据库多行插入
if (mysqli_multi_query($connect, $sql)) {
    echo "插入成功";
}else {
    echo "插入失败";
}
mysqli_close($connect);
