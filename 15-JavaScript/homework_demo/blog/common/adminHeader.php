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
    <link rel="stylesheet" href="./static/adminBlog.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>blog管理后台</h1>
            <p>http://www.php5.com</p>
        </div>
        <div class="content">
            <!--导航-->
           <div class="navBar">
               <ul>
                   <li><a href="admin.php?action=home">首页</a></li>
                   <li><a href="admin.php?action=list">列表</a></li>
                   <li><a href="admin.php?action=category">分类</a></li>
                   <li><a href="admin.php?action=add">发布</a></li>
               </ul>
           </div>