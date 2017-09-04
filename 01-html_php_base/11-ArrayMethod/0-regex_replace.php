<?php
/**
 * @Author: superking
 * @Date:   2017-08-04 10:50:04
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-04 14:10:26
 */
//正则替换
//preg_replace 使用正则替换
//参数:
//1,正则
//2,替换的内容
//3,搜索的目标
//4,替换的次数
//5,替换次数统计
//preg_replace(regex, replace, subject, limit, &count)
//返回值
// 如果subject是一个数组， preg_replace()返回一个数组， 其他情况下返回一个字符串。



//剔除字符串中的数字
$str = 'abcdeft012345aabbcc';
$regex = '#\d#';
$replace = '';

$rs = preg_replace($regex, $replace, $str,-1,$count);
echo $rs;
echo "次数{$count}";

//位置替换
$str = "april 15 2017";//2017 15 april
$regex = "#(\w+) (\d+) (\d+)#";
//$replace = '\3 \2 \1'; //等价 $3 $2 $1
$replace = '$3 $1 $2'; //等价 $3 $2 $1
$rs = preg_replace($regex, $replace, $str,-1,$count);
echo '<br>';
echo $rs;

//练习
$str = "<startData>=1999-5-27"; // startData=27/5/1999
$regex = "#<(\w+)>=(\d+)-(\d+)-(\d+)#";
$replace = '$1=$4/$3/$2';
$rs = preg_replace($regex, $replace, $str,-1,$count);
echo '<br>';
echo $rs;

//数组替换,正则是数组,替换是数组
$regexArr = ['#<(\w+)>=#'
        ,'#(\d+)-(\d+)-(\d+)#'];
$replaceArr = ['$1=',
             '$3/$2/$1'];

$rs = preg_replace($regexArr, $replaceArr, $str,-1,$count);
echo '<br>';
echo $rs;

//数组替换,目标是数组,正则是数组,替换是数组
$strArr = ['abc@163.com','abc@sina.com'];//user: abc email:163.com
$regexArr = ['#(\w+)@#','#@(\w+\.\w+)#'];

$replaceArr = ['user:$0',' email:$1'];
//替换数组第二个元素会在,第一个元素替换结果的基础上替换
//$0 完整的正则匹配结果
//$1 模式单元的匹配结果

$rs = preg_replace($regexArr, $replaceArr, $strArr,-1,$count);
echo '<br>';
var_dump($rs);

$s = ['1','a','2','b','3','A','B','4'];
$rexgex= ['#\d#','#[a-z]#','#[1a]#'];
$replace = ['A:$0','B:$0','C:$0'];
$rs = preg_replace($rexgex,$replace,$s);
var_dump($rs);
//A:1 a A:2 b A:3 A B A:4
//A:1 B:a A:2 B:b A:3 A B A:4
//A:C:1 B:C:a A:2 B:b A:3 A B A:4
/*
array(8) {
  [0]=>
  string(5) "A:C:1"
  [1]=>
  string(5) "B:C:a"
  [2]=>
  string(3) "A:2"
  [3]=>
  string(3) "B:b"
  [4]=>
  string(3) "A:3"
  [5]=>
  string(1) "A"
  [6]=>
  string(1) "B"
  [7]=>
  string(3) "A:4"
}
 */