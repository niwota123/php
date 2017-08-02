<?php
/**
 * @Author: superking
 * @Date:   2017-08-02 10:11:01
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-02 16:41:53
 */

//获取微秒
echo'<br>微秒'. microtime(true);


echo '<br>'. date_default_timezone_get();
//date_default_timezone_set('Asia/Shanghai');
date_default_timezone_set('PRC');//People's Republic of China 中华人民共和国;

/*系统常量
DateTime::ATOMDATE_ATOM Atom (example: 2005-08-15T15:52:01+00:00)  DateTime::COOKIEDATE_COOKIE HTTP Cookies (example: Monday, 15-Aug-2005 15:52:01 UTC)  DateTime::ISO8601DATE_ISO8601 ISO-8601 (example: 2005-08-15T15:52:01+0000)
DateTime::RFC822DATE_RFC822 RFC 822 (example: Mon, 15 Aug 05 15:52:01 +0000)  DateTime::RFC850DATE_RFC850 RFC 850 (example: Monday, 15-Aug-05 15:52:01 UTC)  DateTime::RFC1036DATE_RFC1036 RFC 1036 (example: Mon, 15 Aug 05 15:52:01 +0000)  DateTime::RFC1123DATE_RFC1123 RFC 1123 (example: Mon, 15 Aug 2005 15:52:01 +0000)  DateTime::RFC2822DATE_RFC2822 RFC 2822 (example: Mon, 15 Aug 2005 15:52:01 +0000)  DateTime::RFC3339DATE_RFC3339 Same as DATE_ATOM (since PHP 5.1.3)  DateTime::RSSDATE_RSS RSS (example: Mon, 15 Aug 2005 15:52:01 +0000)  DateTime::W3CDATE_W3C World Wide Web Consortium (example: 2005-08-15T15:52:01+00:00)
 */
echo date(DATE_RFC2822);

//时间的显示,date()函数,对时间戳进行格式化
//时间戳 time() 19700101~当前时间的秒数
echo '<br>'.time();

echo'<br>'.date('Y年m月d日 H时i分s秒',time());
//2017--08--02 10:26:00
// 格式化符号
// ---日
//d 月份中的天 显示:01,02,03
//j 天显示:1,2,3,4
//S 天英文后缀,例: st ,nd ,rd
//z 年中第几天 0-365

echo'<br>'.date('d');//02
echo'<br>'.date('j');//2
echo'<br>'.date('S');//nd
echo'<br>'.date('z');//213

//--星期
//D 星期中第几天,英文的前三个字母例: Mon 到 Sun
//l 星期几,完整的英文 例:Sunday
//w 星期中的第几天,数字(0-6) 例:0周日
//N .... 数字(1-7) 例:1周一
//W 年份中的第几周,例:23 23周

echo'<br>'.date('D');//Wed
echo'<br>'.date('l');//Wednesday
echo'<br>'.date('w');//3
echo'<br>'.date('N');//3
echo'<br>'.date('W');//31

//月--
//F 月的完整单词
//M 月份三个字母缩写
//m 数字月份 - 自动补零
//n 数字月份  不自动补零
//t 当前月份的天数

echo'<br>'.date('F');//August
echo'<br>'.date('M');//Aug
echo'<br>'.date('m');//08
echo'<br>'.date('n');//8
echo'<br>'.date('t');//31

//年--
//Y 4位的数字年份
//y 2位的数字年份
//L 判断是否是闰年 1 闰年 0 非闰年
//o 和Y相等

echo'<br>'.date('Y');//2017
echo'<br>'.date('y');//17
echo'<br>'.date('L');//0
echo'<br>'.date('o');//2017


//时间
//时,分,秒

//上午/下午
//a am/pm
//A AM/PM

//小时
//g 小时 12时格式 不补零
//G 小时 24时格式 不补零
//h 小时 12时格式 补零
//H 小时 24时格式 补零

echo'<br>'.date('g a',time()-2*3600);
echo'<br>'.date('G a');
echo'<br>'.date('h a',time()-2*3600);
echo'<br>'.date('H');

//分
//i 分钟 补零
//秒
//s 秒 补零

echo'<br>'.date('r');

echo '<hr>';
//练习:使用正确的格式化符号,显示出下列格式的时间字符串
//1,Wednesday is the 28th
echo '<br>'.date('l \i\s \t\h\e jS');
//2,December 28,2016,11:09,am
echo'<br>'.date('F d,Y,h:m,a');
//3,2016-12-28 11:10:02
echo'<br>'.date('Y-m-d  h:i:s');
//4,Dec Wed 28 11:11:02 CST +0800
echo'<br>'.date('M D j h:i:s e O');
//5,it is the 28th
echo'<br>'.date('\i\t \i\s \t\h\e jS');


// 让特殊符号没有意义可以使用 \ 转义符号

//strtotime -- 将字符串转换成时间戳
echo '<br>'.date('c',time()-24*3600);
$timestape = strtotime('-1 day');
echo '<br>'.date('r',$timestape);

// +1 day
// week
// month
// next monday 下周一
// last Thursday 上周四

$timestape = strtotime('+2 weeks 2 days 2 hours');
echo '<br>'.date('c',$timestape);

$timestape = strtotime('next monday');
echo '<br>'.date('c',$timestape);


//mktime 取得时间的时间戳
//参数:时,分,秒 ,月,日,年 夏时令
//使用mktime获得一个固定时间的时间戳
$timestape = mktime(8, 8, 8, 8, 8, 2018);
echo '<br>'.date('c',$timestape);

//传少值的情况,
$timestape = mktime(8,8);
echo '<br>'.date('c',$timestape);


//得到时间的详细信息
//参数是时间戳,不传得到当前时间,传时间戳得到时间戳的具体信息
$dateArr = getdate();
echo '<hr>';
var_dump($dateArr);


//获得时间的详细信息--能得到微秒
$time = gettimeofday(true);
var_dump($time);


//获取微秒
echo'<br>微秒'. microtime(true);


//检测时间的真实性
$res = checkdate(2, 29, 2016);
if ($res) {
    echo '<br> 有这天';
}else {
    echo'<br>没有这天';
}



//功能
//刚刚
//5分钟前
//1小时之内 多少分钟之前
//一天之内 多小小时,多少分钟之前
//一个月之内,显示,几天前
//几个月之前
//显示 正常的时间格式

// 需要写一个函数: 参数:时间



