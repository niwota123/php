<?php

// 接受数据---debug
// if (isset($_GET['blogid'])) {
//     var_dump($_GET);
//     exit;
// }



//查询数据库并获取数据
//blog的数据
//分类信息的数据
//html中直接使用查到数据


//数据库连接
$connect = mysqli_connect('localhost','root','123456','test');

if (!$connect) {
    echo "link error".mysql_error($connect);
}
//查询各分类的数量
$sql = "SELECT category_id, COUNT(*) as num FROM blog GROUP BY category_id";
$category_num = array();
$res = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $category_num[] = $row;
}

// var_dump($category_num);
//常用语调试代码,exit,退出当前的脚本
// exit;


//查询-blog
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


//查询category的信息
$sql = "SELECT * FROM category";
$category_data = array();
$res = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $category_data[] = $row;
}
// var_dump($category_data);

mysqli_close($connect);





?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>我的blog</title>
        <style>
            /* 全局样式 */
            body{
                margin: 0;
                padding: 0;
                /* 文本居中 */
                text-align: center;
                /* 字体大小 */
                font-size: 13px;
                background-image: url('10.jpeg');
                background-size: cover;
                /* width:100%; */
            }

            div{
                /* border: solid 1px red;
                background-color: yellow; */
            }

            /* 整体容器设置样式 */
            .container{
                width: 800px;
                /* 居中 */
                margin:0 auto;
            }
            /* 修改头部信息 */
            .header{
                text-align:left;
            }
            /* 导航样式 */
            .navBar{
                margin:0;
                padding:0;
                height: 50px;
            }

            .navBar li {
                /* 去掉样式 */
                list-style-type: none;
                /* 浮动 */
                float: left;

                width:100px;
                /* 背景 */
                background-color:black;
                /* 字体大小 */
                font-size:15px;
                /* 内边距 */
                padding:5px;

            }

            .navBar li a{
                /* 字体颜色 */
                color: white;
                /* 文本修饰 */
                text-decoration: none;
            }

            .navBar li a:hover{
                color:red;
            }

            /* 内容布局 */
            /* 左侧边 */
            .leftSide{
                float:left;
                width:200px;
                /* height:500px; */
            }

            .main{
                float:left;
                /* height:500px; */
                width:380px;
                margin: 0px 5px;

            }
            .rightSide{
                width:200px;
                /* height:500px; */
                float:left;
            }

            /* 小面板样式 */
            .frame{
                opacity: 0.7;
                width:100%;
                background-color:yellow;
                border:solid 1px red;
                margin-bottom: 5px;
            }
            .title{
                background-color:green;
                /* 加粗 */
                font-weight: bold;
                padding:5px;

            }

            .list{
                list-style-type:none;
                padding:5px;
                margin:0px;
            }

            .list li{

                /* 下线 */
                border-bottom: dotted 1px red;
            }

            /* 底部 */
            .footer{
                clear: both;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>我的blog</h1>
                <p><a href="#">http://www.php7.com</a></p>
            </div>

            <div class="content">
                <div class="navBar">
                    <ul>
                        <li><a href="#">导航1</a></li>
                        <li><a href="#">导航2</a></li>
                        <li><a href="#">导航3</a></li>
                        <li><a href="#">导航4</a></li>
                    </ul>
                </div>
                <div class="leftSide">

                    <div class="frame">
                        <div class="title">个人信息</div>
                        <p>我的个人简介</p>
                    </div>

                    <!-- 点击博客列表业务逻辑 -->
                    <!-- 当用户点击blog列表时,html请求服务器并传递单条blog_id给服务器 -->
                    <!-- 服务器拿到blog_id后根据id查询数据,并显示在网页 -->
                    <div class="frame">
                        <div class="title">博客列表</div>
                        <ul class="list">
                        <!--  如何通过超链接的方式将数据id传给服务器
                            http请求中get的方式
                            get请求:就是将数据追加到url中,传递给服务器
                            追加的方式 url?id=idvalue&id2=id2value; -->

                           <?php foreach ($data as $value):?>
                            <li><a href="2blogindex.php?blogid=<?php echo $value['id']; ?>">

                                <?php echo $value['title']; ?>
                            </a></li>
                           <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
                <div class="main">
                    <div class="frame">
                        <div class="title">博客文章</div>
                        <h3><?php echo $newBlog['title']; ?></h3>
                        <p style="text-align:left"><?php echo $newBlog['content']; ?></p>
                    </div>
                </div>
                <div class="rightSide">
         <div class="frame">
            <div class="title">文章分类</div>
            <ul class="list">
                <?php foreach ($category_data as $value):?>
                    <li>
                    <a href="">
                    <?php echo $value['category']; ?>

                    <!-- 等效 -->
                    <?php
                        foreach ($category_num as $c) {
                           if ($value['id']==$c['category_id']) {
                              $num = $c['num'];
                               echo "<span>($num)</span>";
                           }
                        }
                     ?>


                    </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
                     <div class="frame">
                        <div class="title">友情链接</div>
                        <ul class="list">
                            <li><a href="http://192.168.12.243/test/blogs/bloglist.php">英豪</a></li>
                            <li><a href="http://192.168.12.253/7.18/bokecaru.php">金灿</a></li>
                            <li><a href="http://192.168.12.237/php/formalweek1/day2/boke.php">董辉</a></li>
                        </ul>
                    </div>
                     <div class="frame">
                        <div class="title">访客统计</div>
                        <ul class="list">
                            <li>列表1</li>
                            <li>列表2</li>
                            <li>列表3</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>blog 意见反馈 电话:400000000</p>
                <p>简介 | 关于我们 | 广告服务 | 联系我们</p>
                <p>PHP公司版权所有</p>
            </div>
        </div>
    </body>
</html>