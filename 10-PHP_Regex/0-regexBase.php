<?php
/**
 * @Author: superking
 * @Date:   2017-08-03 09:31:34
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-03 11:41:58
 */

//什么是正则表达式
//可以理解为,有各种特殊字符组成的,一种匹配规则
//比如,邮箱规则,电话规则,身份证号规则...

// 正则表达式组成的一部分
//1,原子(普通的字符,正则表达式的最小单位,例如:abcedf,123456)
//2,元字符(有特殊功能的字符,在正则表达式中有特殊的含义)


//原子 包含哪些内容
//包括所有的大小写字母,数字,标点符号,和一些非打印字符
//非打印字符:
//\n 换行
//\r 回车
//\f 换页
//\t 制表
//\v 垂直制表


//元字符(核心) 包含哪些内容
/*
1,通用字符型-匹配相应类型的任何一个字符

\d 匹配任意数字
\D 匹配数字之外的字符

\w 匹配任意的数字,字母,下划线
\W 匹配任意的数字,字母,下划线之外的字符

\s 匹配任意的空白字符,包括空格,制表符,换行符
\S 匹配任意非空白字符

\b 匹配单词边界
\B 匹配单词边界以外的任意字符

2,限定符
限定符,限定它前面的原子必须出现的次数
* 限定前面原子出现的个数,一个或多个或没有
+ 限定前面原子出现的个数,一个或者多个
? 限定前面原子出现的个数,一个或者没有
{n}限定前面原子出现的个数,必须有n个
{n,}限定前面原子出现的个数,至少有n个
{n,m}限定前面原子出现的个数,至少有n个,至多有m个

3,边界限制
^开始限制
$结束限制

4,圆点
. 可以匹配任意一个字符

5,模式单元()
可以将多个原子组成一个大的原子,当做一个原子来使用

6,模式选择 |
用来分隔多个选择

7,原子表 []
可以定义一组彼此平等的原子,匹配的时候从原子表里面选择一个进行匹配
可以使用 - 链接ascii码的顺序,数字
可以使用 ^ 取反

8,后项引用
()模式单元中因为有多个原子,因此模式单元会被存储到缓冲区中,缓冲区的编号从1-99
可以使用 \x(x缓冲区的编号)来访问
缓冲区中的内容,只要匹配成功一次,就会更新成已经匹配的内容

12:12:12
(\d{2})(\W)\1\2\1

1缓冲区 (\d{2}) 更新12
2缓冲区 (\W)    更新:

阻止模式单元被缓冲
(?:)

9,匹配优先级
 \
 () (?:) []
 * + ? {n} {n,} {n,m}
^ $ \b \B
|



//邮箱的正则表达式
//河南邮编
//河南车牌号码
//河南的身份证
//匹配联通,电信,移动手机号码


 */