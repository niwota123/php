<?php 
//php和html的融合
//数据由PHP提供
//由html显示数据

//练习:新闻列表
// $news = ['习近平会见加拿大总督',
// 		'李克强:人类的重大科学发现都不是计划出来的',
// 		'新华社发文警告印度越界：不要执迷不悟',
// 		'朝鲜被指钻制裁空子向中国出口铁矿石 中方回应',
// 		'中央气象台今晨发布高温橙色预警 局地可超过40℃',
// 		'中央气象台今晨发布高温橙色预警 局地可超过40℃'];

$header = ['姓名','电话','城市','年龄'];
$student_1 = ['小王','18534339090','郑州',28];
$student_2 = ['小李','18534339090','北京',21];
$student_3 = ['小金','18534339090','广州',22];
$student_4 = ['小豪','18534339090','杭州',24];
$student_5 = ['小烈','18534339090','东京',23];

$datas = [$header,$student_1,$student_2,$student_3,$student_4,$student_5,$student_2,$student_2,$student_2];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻列表</title>
	<style>
		table{
			width: 800px;
			margin: 0 auto;
			padding: 0;
		}
	</style>
</head>
<body>
	<table border="1">
		<?php
			//第一个循环决定行
			foreach ($datas as $student) {
				echo "<tr>";
				//第二个循环决定每行多少个
				foreach ($student as $value) {
					echo "<td> $value </td>";
				}
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>