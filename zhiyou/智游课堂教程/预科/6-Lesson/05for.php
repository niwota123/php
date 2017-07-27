<?php
// for循环
//0-10输出
//for(循环的开始;循环的结束;循环的动力)
for ($i=1; $i <=10; $i++) { 
	
	echo "<br>$i";
}

//循环也是可以嵌套使用
// echo "*";


//第一个循环决定由几排
for ($i=0; $i < 9 ; $i++) { 
	echo "<br>";

	// 第二循环决定每行有几个
	for ($j=0; $j <= $i ; $j++) { 

		echo "*";
	}
	
}



// *
// **
// ***
// ****
// *****

for ($a=1; $a <=9 ; $a++) { 
	echo "<br>";
	
	for ($b=1; $b <= $a ; $b++) { 
		echo "$a * $b =".$a*$b.'&nbsp;';
	}
}
echo "<hr>";
for ($a=9; $a >=1 ; $a--) { 
	echo "<br>";
	
	for ($b=1; $b <= $a ; $b++) { 
		echo "$a * $b =".$a*$b.'&nbsp;';
	}
}

echo "<hr>";
//break  中断
for ($i=0; $i <100 ; $i++) { 
	echo $i;
	//在第五次循环的时候结束循环
	if ($i == 5) {
		break;
	}
}


//continue  跳过单次循环
for ($i=0; $i <10; $i++) { 

	if ($i == 5) {
		continue;//跳过本次循环
	}

	echo '<br>'.$i;
}

echo "<hr>";
//练习
//用户随便输一个 个位数字 
//你需要返回0-100内 个位数字和用户输入的个位数组相同的数

$number = 2;
for ($i=0; $i <100; $i++) { 
	if ($number == $i%10) {
		echo "<br>$i";
	}
}


// 我国古代数学家张邱建在《算经》中出了一道“百钱买百鸡”的问题，题意是这样的：
// 5文钱可以买一只公鸡，3文钱可以买一只母鸡，1文钱可以买3只雏鸡。现在用100文钱买100只鸡，那么各有公鸡、母鸡、雏鸡多少只？请编写程序实现。
echo "<hr>";
//全买公鸡
for ($g=0; $g <=20 ; $g++) { 
	//全买母鸡
	for ($m=0; $m <=33; $m++) { 
		//全买雏鸡
		for ($c=0; $c <=300 ; $c++) { 
			//满足条件,1,鸡的价钱 2,鸡的数量
			if ($g*5+$m*3+$c/3==100 && $g+$m+$c ==100) {
				echo "公鸡 $g";
				echo "母鸡 $m";
				echo "雏鸡 $c";
				echo "<hr>";
			}
		}
	}
}

















?>