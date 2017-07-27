<?php
/**
 * @Author: superking
 * @Date:   2017-07-17 15:26:12
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-17 20:38:38
 */

$connect = mysqli_connect('localhost', 'root', '123456', 'test');

if (!$connect) {

   var_dump(mysqli_error($connect)) ;

}

//sql语句
$sql = 'select * from blog';

//结果集
$data = array();
//下旬
$res = mysqli_query($connect, $sql);
//mysqli_num_rows 检查结果集的数量
if (mysqli_num_rows($res)>0) {
    //mysqli_fetch_assoc获取单条数据
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
}
var_dump($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <ul>

        <!-- 开始{ 使用 : 代替 -->
        <!-- 结束} 使用 endforeach 代替 -->
        <?php foreach ($data as $item):?>
            <li><?php echo $item['title']; ?></li>
        <?php endforeach?>


        <?php
        // 遍历数据数组,获得单条blog数据
        foreach ($data as $item) {

            $title = $item['title'];
            echo "<li>$title</li>";
        }
        ?>
    </ul>
</body>
</html>
