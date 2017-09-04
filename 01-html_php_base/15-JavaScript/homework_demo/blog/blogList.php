<?php
//1,从数据库获取数据
 $mysqli = new mysqli('127.0.0.1','root','123456','demodb');
 $result = $mysqli->query("SELECT * FROM blog");

 $arr = array();
 //while如果条件满足，一直查询数据
 while ($row = $result->fetch_assoc()) {
     //将查询的数据放在数组中
     $arr[]=$row;
 }

 //$arr数组里面放到，所有的blog数据

 //从get请求中获取传递过来的id数据
$id = 0;
if($_GET){
    $id = $_GET['blogid'];
}

?>

<!--include 相当于将include文件的代码放在当前位置-->
<?php include"./common/header.php"?>

        <!--左边栏-->
           <div class="sidebarLeft">
               <!--博客文章-->
               <div class="frame">
                   <div class="title">博客文章</div>
                   <ul class="list">
                       <!--动态数据-->
                       <?php foreach ($arr as $value):?>
                       <li>
                           <!--数据的传递-->
                           <a href="blogList.php?blogid=<?php echo $value['id']?>">
                               <?php echo $value['title']?>
                            </a>
                       </li>
                       <?php endforeach?>
                   </ul>
               </div>
           </div>
           <!--中间内容-->
           <div class="mainContent">
               <div class="frame">
                   <div class="title">博文</div>
                   <div>
                       <h3><?php echo $arr[$id]['title']?></h3>
                       <p><?php echo $arr[$id]['content']?></p>
                   </div>
               </div>
           </div>

<?php include"./common/footer.php"?>
