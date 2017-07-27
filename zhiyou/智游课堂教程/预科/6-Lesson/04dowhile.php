<?php
//do...while循环

 $a = 1;
do {
	echo "<br>$a";
	$a+=2;
} while ($a<10);

//0-10 奇数--------------------
 $a = 0;
do {
	$a++;
	if ($a%2!=0) {
		echo "<br>$a";
	}
} while ($a<10);

?>