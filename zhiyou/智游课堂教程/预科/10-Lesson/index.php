<?php
/**
 * @Author: superking
 * @Date:   2017-07-19 09:23:32
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-19 11:28:03
 */
// 只要名字是index ,代表默认首页

// blog前台的处理逻辑组织
//数据库连接
$connect = mysqli_connect('localhost','root','123456','test');

if (!$connect) {
    echo "link error".mysql_error($connect);
}


//查询-blog-全部数据
$sql = "SELECT * FROM blog";
//定义一个空的数组,用来接收查询的数据
$data = array();
$res = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}

//newblog改成动态的数据,如果用户没有点击,显示最新的blog
//如果用户点击了,显示用户点击的数据

if (isset($_GET['blogid'])) {
   //如何根据blogid,获取blog的数据
   $blogid = $_GET['blogid'];
   $sql = "SELECT * FROM blog WHERE id = $blogid";
   $res = mysqli_query($connect,$sql);
   $newBlog = mysqli_fetch_assoc($res);
}else {
    //获取最新一条blog数据
    $newBlog = $data[count($data)-1];
}


//查询分类的信息
$sql = "SELECT * FROM category";
$category_data = array();
$res = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $category_data[] = $row;
}

//查询各分类的数量
$sql = "SELECT category_id, COUNT(*) as num FROM blog GROUP BY category_id";
$category_num = array();
$res = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $category_num[] = $row;
}

mysqli_close($connect);


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'bloglist') {
        include "bloglist.html";
    }
}else{
    // 默认进入首页
    include 'blogindex.html';
}


