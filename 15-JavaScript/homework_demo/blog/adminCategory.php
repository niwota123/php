

<?php include"./common/adminHeader.php"?>
<div class="mainContent">
    <div class="frame">
        
        <table>
            <tr>
                <td>ID</td>
                <td>名字</td>
                <td>操作</td>
            </tr>
            <?php foreach ($categoryArr as $key =>$row) :?>
            <tr>    
                <td><?php echo $key ?></td>
                <td><?php echo $row['category']?></td>
                <td>修改/删除</td>
                <!--$row=["id"=>0,"title"=>"bl",'content'=>'sdfsfsdfasf','category'=>'日记']-->
            </tr>
            <?php endforeach?>
        </table>
    </div>
</div>
<?php include"./common/footer.php"?>