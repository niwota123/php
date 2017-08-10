


<?php include"./common/adminHeader.php"?>
<div class="mainContent">
    <div class="frame">
        
        <table>
            <tr>
                <td>ID</td>
                <td>标题</td>
                <td>分类</td>
                <td>操作</td>
            </tr>
            <?php foreach ($arr as  $row) :?>
            <tr>    
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['category']?></td>
                <td><a href="admin.php?action=edit&blogid=<?php echo $row['id']?>">修改</a>/
                <a href="admin.php?action=del&blogid=<?php echo $row['id']?>">删除</a></td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
</div>
<?php include"./common/footer.php"?>