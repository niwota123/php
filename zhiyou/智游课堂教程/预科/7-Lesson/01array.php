<?php 
// $name = '小王';
// $age = 22;
// $compnay = 'taobao';
// $tel = '12343434567';
// $email = 'aaa@sina.com';

// //数组-容器类数据类型
// // 将数据打包成一个变量,进行传递
// //如何创建一个数组
// //1,使用[]修饰来创建一个数组
// $arr = [$name,$age,$compnay,$tel,$email];
// //只要是数组,用var_dump来输出
// var_dump($arr);

// echo "<br>";
// //2,array() 方式来创建数组
// $arr = array($name,$age,$compnay,$tel,$email);
// var_dump($arr);

// //3,索引数组,往数组中添加数据时,会自动给数据添加索引
// // 索引的值从0开始,按照数据添加的顺序自动递增

// //索引可以干什么?
// //提取数组中的数据
// $str = $arr[3];
// echo "<br>";
// var_dump($str);
// //修改数组中数据
// $arr[0] = '小明';
// echo "<br>";
// var_dump($arr);

// $arr[0]='';
// echo "<br>";
// var_dump($arr);

// //unset 释放变量   isset检测变量是否为空 
// unset($arr[0]);
// echo "<br>";
// var_dump($arr);

//练习:写一个数组用来存放学生的基本信息
// 基本信息包括:姓名 学号 年龄 专业
// 要求至少包含10名同学的信息

for ($i=0; $i <10 ; $i++) { 
	$name = 'aa'.$i;
	$age = $i;
	$zy = '计算机'.$i;

	//单个学生的信息
	$sArr = [$name,$age,$zy];
	//将单个学生的信息放到总的数组中
	$all_arr[] =$sArr; 
}

echo "<br>";
var_dump($all_arr);//可以打印吗

//二维数组的取值方式
echo "<br>".$all_arr[9][1];

//新的赋值方式
// $a[] = 'a';
// $a[] = 'b';
// $a[] = 'c';
// $a[] = 'e';
// $a[] = 'f';
// $a[] = 'g';

// var_dump($a);

echo "<hr>";
//关联数组
//关联数组:它的索引可以是任意类型的值,由程序员自定义添加
//索引数组:它的索引是int,由系统自动添加
$student_arr = ['name'=>'小王',
                'age'=>22,
                'zy'=>'计算机'];
var_dump($student_arr);
//问题,如何获得数组中 名字这个数据
var_dump($student_arr['name']);
//如何修改数组中的数据
$student_arr['age'] = 30;
var_dump($student_arr);












 ?>