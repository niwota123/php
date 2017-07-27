<?php 
//数组的遍历
$a = ['a','b','c','d','e','f','g','p'];

//使用h1标签修饰数组内元素,并逐个打印输出
//建议使用循环结构

//如何动态获取数组中元素的个数
var_dump(count($a));
echo "<hr>";

for ($i=0; $i <count($a) ; $i++) { 
	echo $a[$i];
}

//二维数组的遍历
$a = ['18888888','888@888.com'];
$b = ['16666666','666@666.com'];

$c = [$a,$b];
//使用循环逐个遍历数组中的数据
for ($i=0; $i < count($c) ; $i++) { 
	
	$arr = $c[$i];

	for ($j=0; $j < count($arr) ; $j++) { 
		echo "<br>";
		echo $arr[$j];
	}
}

//关联数组的遍历
$a = ['name'=>'小王','age'=>25,'phone'=>'1878887879'];

//关联数组使用 foreach 语句遍历
// $variable:需要遍历的关联数组
// $key=>$value :遍历的基本结构,以什么样的方式来遍历数组
// foreach ($variable as $key => $value) {
	
// }
echo "<hr>";
foreach ($a as $key => $value) {
	echo "key: $key &nbsp;";
	echo "value: $value";
	echo "<br>";
}

echo "<hr>";
foreach ($a as $key) {
	echo $key;
	echo "<br>";
}




 ?>