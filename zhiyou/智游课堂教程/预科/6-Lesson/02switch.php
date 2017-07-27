<?php
//需求,商场导购,告诉用户每一层具体卖什么
//用户只需要输入楼层号
//获取表单提交的数据
//1,判断是否有数据

$floor = 0;
if (isset($_POST['floor'])) {
	$floor = (int)$_POST['floor'];
}



if ($floor>0) {

	//写逻辑 :1,2:珠宝 3,4:电器 5.6:服装 7:游乐场 8:美食
	//确定一个变量不停变换,可以用switch语句来捕获变换

	switch ($floor) {
		case 1:
		case 2:{
			echo "珠宝";
			break;//中断-switch语句
		}

		case 3:
		case 4:{
			echo "电器";
			break;
		}
		case 5:
		case 6:{
			echo "服装";
			break;
		}
		case 7:{
			echo "游乐场";
			break;
		}
		case 8:{
			echo "美食";
			break;
		}
		default:
			echo "已经到楼顶啦!!!";
			break;
	}
}

// 练习:电脑通过不同的指令,执行不同的任务
// 0:关机 1:开机 2:注销 3:重启 4:休眠 
// switch语句写:

//switch变种:不写break
//计算本周还剩余那几天
$week = 'Wednesday';

switch ($week) {
	case 'Monday':
		echo "<br>星期一";

	case 'Tuesday':
		echo "<br>星期二";

	case 'Wednesday':
		echo "<br>星期三";

	case 'Thursday':
		echo "<br>星期四";

	case 'Friday':
		echo "<br>星期五";

	case 'Saturday':
		echo "<br>星期六";

	default:
		# code...
		break;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商场导购</title>
</head>
<body>
	<!-- action提交的位置就是你的处理逻辑的php文件名字 -->
	<!-- method http的post请求方法 -->
	<form action="02switch.php" method="post">
		<label>输入楼层</label>
		<!-- 给输入框的数据,起一个名字,方便在PHP中根据名字获取数据 -->
		<input type="text" name="floor">
		<!-- value是提交按钮上面的字体 -->
		<!-- 如果不填默认是提交 -->
		<input type="submit" value="提交楼层">
	</form>
</body>
</html>