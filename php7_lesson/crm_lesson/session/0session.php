<?php
/**
 * @Author: superking
 * @Date:   2017-08-30 16:22:00
 * @Last Modified by:   superking
 * @Last Modified time: 2017-08-30 17:17:28
 */

//session 本质,也是将用户需要的数据,保持到本地(服务器)
//cookie所说的本地(客户端所在的电脑)
//session的运行原理,是session_start时,系统自动生成session_id 和对应的文件来保持数据
//并将session_id保持在cookie中,当浏览器关闭的时候cookie失效,session就无法使用(其实文件并没有被删除)
//可以使用自己添加cookie的方式,保持住session的生命周期
//从运行机制中我们可以看出,session是依赖cookie而存活的,如果cookie失效了,那么session也不能使用了



//session的使用
//开启会话
session_start();
//存数据
$_SESSION['user'] = 'xiaozhang';

//自定义保持session_id在cookie中的时间,就可以持续的拥有session
setcookie(session_name(), session_id(), time()+3600);

//session的销毁