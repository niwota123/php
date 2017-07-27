<?php
/**
 * @Author: superking
 * @Date:   2017-07-17 09:36:15
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-17 14:16:39
 */

// 数据库
// 增删改查
// 增
// insert into 表名 (字段1,字段2) values (值1,值2)
// insert into 表名 values (值1,值2)
// 查
// select *  from 表名;
// select 列名 from 表名 where 条件;
// 改
// update 表名 set 字段=新值 where 条件
// 删除
// delete from 表名 where 条件


/*
+----+------+-----+-------------+--------------+
| id | name | age | tel         | address      |
+----+------+-----+-------------+--------------+

+----+------+-----+-------------+--------------+
 */

//1,建立数据库连接
$connect = mysqli_connect('localhost', 'root', '123456', 'test');

if (!$connect) {
    echo "数据库连接失败".mysqli_error($connect);
}

//sql语句
//注意:第二个括号内字段的位置,应该跟第一个括号内字段的位置和数量保持一致
// $sql = "INSERT INTO student (id,name,age,tel,address)VALUES(null,'小李1','23','13989800987','河南省郑州市经开区')";

//$sql = "INSERT INTO student (name)VALUES('小李2')";

//注意:括号内的字段顺序必须和表中字段顺序保持一致
$sql = "INSERT INTO student VALUES (null,'小王1','23','19889898989','智游教育');";
$sql .= "INSERT INTO student VALUES (null,'小王2','23','19889898989','智游教育');";
$sql .= "INSERT INTO student VALUES (null,'小王3','23','19889898989','智游教育');";
$sql .= "INSERT INTO student VALUES (null,'小王4','23','19889898989','智游教育');";

//执行单条sql语句
// mysqli_multi_query($connect,$sql)
$res = mysqli_multi_query($connect, $sql);
if ($res) {
    echo "插入成功";
}else{
    echo "插入失败!请查找原因";
}
mysqli_close($connect);

//执行多条sql语句
//mysqli_multi_query(link, query);