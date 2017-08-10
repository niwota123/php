<?php
/**
 * @Author: superking
 * @Date:   2017-07-28 14:57:34
 * @Last Modified by:   superking
 * @Last Modified time: 2017-07-28 16:19:06
 */
// 数组的遍历
$arr = range('a', 'z');
//如何遍历
//通过方法获取数组内元素的个数 count(计数)
for ($i=0; $i <count($arr) ; $i++) {
    if ($i%2==0) {
        continue;
    }
    echo $i.'--------'.$arr[$i].'<br/>';
}

echo '<pre>';

//array_flip 数组的key-value对调
$arr = array_flip($arr);
print_r($arr);
//如何遍历关联数组
//PHP 提供遍历关联数组的方式
foreach ($arr as $key => $value) {
   print_r($key);
   print_r($value);
}

//练习:商品列表
$product0 = ['编号','品牌','价格','型号'];
$product1 = ['001','iPhone','5666','7'];
$product2 = ['002','huawei','3500','P9plus'];
$product3 = ['003','vivo','2999','x9plus'];
$product4 = ['004','oppo','2999','R11pro'];
$product5 = ['005','meizu','2566','6pro'];
$product6 = ['006','xiaomi','3500','6mix'];


$products = [$product0,$product1,$product2,$product3,$product4,$product5,$product6];

// 使用table,将数据显示到网页上

echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <table border="1" rules="all">
        <?php
            foreach ($products as $key => $product) {
                echo '<tr>';

                    foreach ($product as $pk => $pv) {
                        echo "<td>$pv</td>";
                    }

                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>