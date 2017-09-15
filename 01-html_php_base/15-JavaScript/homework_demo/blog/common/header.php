<!--文件夹下如果有index命名的文件，会作为默认首页显示-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的blog</title>
    <!--blog.css index.php和blog.css 在同一个文件夹下面时-->
    <!--
    .表示当前文件夹
    ..表示当前文件夹的上层文件夹
    这种路径属于
    相对路径./static/blog.css
    绝对路径 C:/wampstack-5.6.19-0/apache2/htdocs/Chapter/11.30-ch10/static-->
    <link rel="stylesheet" href="./static/blog.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>PHP五期的blog</h1>
            <p>http://www.php5.com</p>
        </div>
        <div class="content">
            <!--导航-->
           <div class="navBar">
               <ul>
                   <li><a href="index.php">首页</a></li>
                   <li><a href="blogList.php">博客</a></li>
                   <li><a href="#">文章</a></li>
                   <li><a href="login.html">管理</a></li>
               </ul>
           </div>