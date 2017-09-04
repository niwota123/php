<!--include 相当于将include文件的代码放在当前位置-->
<?php include"./common/header.php"?>

<!--左边栏-->
           <div class="sidebarLeft">
               <!--个人资料-->
               <div class="frame">
                    <div class="title">个人资料</div>
                    <div>
                        <img src="icon.jpg" alt="图片" width="200">
                        <p>王某某</p>
                    </div>
               </div>
               <!--博客文章-->
               <div class="frame">
                   <div class="title">博客文章</div>
                   <ul class="list">
                       <li>html介绍</li>
                       <li>css的介绍</li>
                       <li>php的介绍</li>
                   </ul>
               </div>
           </div>
           <!--右边栏-->
           <div class="sidebarRight">
               <div class="frame">
                   <div class="title">友情链接</div>
                   <ul class="list">
                       <li>刘德华的博客</li>
                       <li>刘德华的博客</li>
                       <li>刘德华的博客</li>
                   </ul>
               </div>
               <div class="frame">
                   <div class="title">访客统计</div>
                   <ul class="list">
                       <li>总共访客数量999</li>
                       <li>今日访客数量9</li>
                   </ul>
               </div>
           </div>
           <!--中间内容-->
           <div class="mainContent">
               <div class="frame">
                   <div class="title">博文</div>
                   <div>
                       <h3>我的第一篇blog</h3>
                       <p>
                           我的第一篇blog我的第一篇blog我的第一篇blog我的第一篇blog
                           我的第一篇blog我的第一篇blog我的第一篇blog我的第一篇blog
                           我的第一篇blog我的第一篇blog我的第一篇blog我的第一篇blog
                       </p>
                   </div>
               </div>
           </div>

<?php include"./common/footer.php"?>
