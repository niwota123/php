<?php
/**
 * 注：本邮件类都是经过我测试成功了的，如果大家发送邮件的时候遇到了失败的问题，请从以下几点排查：
 * 1. 用户名和密码是否正确；
 * 2. 检查邮箱设置是否启用了smtp服务；
 * 3. 是否是php环境的问题导致；
 * 4. 将26行的$smtp->debug = false改为true，可以显示错误信息，然后可以复制报错信息到网上搜一下错误的原因；
 */
require_once "email.class.php";

$url = 'http://localhost/Lesson/03-oop/05-gd&email/email/changePwd.php';

$userid = 'root';//用户名
$code = '123456';//密码
$code = md5($code);
$time = time();//时间戳

session_start();
$_SESSION['code'] = $code;
$_SESSION['userid'] = $userid;

//var_dump($_SESSION);

//邮件的内容
$content = "请点击以下链接修改密码: {$url}?code={$code}&userid={$userid}&time={$time}";

//******************** 配置信息 ********************************
$smtpserver = "smtp.163.com"; //SMTP服务器
$smtpserverport = 25; //SMTP服务器端口
$smtpusermail = "18538008237@163.com"; //SMTP服务器的用户邮箱
$smtpemailto = "413243015@qq.com"; //发送给谁
$smtpuser = "18538008237@163.com"; //SMTP服务器的用户帐号
$smtppass = "123456abc"; //SMTP服务器的用户密码(这里是授权码)
$mailtitle = "找回密码"; //邮件主题
$mailcontent = "<h1>" . $content . "</h1>"; //邮件内容
$mailtype = "HTML"; //邮件格式（HTML/TXT）,TXT为文本邮件
//************************ 配置信息 ****************************
$smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = false; //是否显示发送的调试信息
$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

echo "<div style='width:300px; margin:36px auto;'>";
if ($state == "") {
    echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
    echo "<a href='index.html'>点此返回</a>";
    exit();
}

header("refresh:3;url=http://localhost/chapter/10.gd_curl/2changePwd/");

echo "恭喜！邮件发送成功3秒后自动返回！！";
echo "<a href='index.html'>点此返回</a>";
echo "</div>";

//header('location:http://localhost/chapter/10.gd_curl/2changePwd/');
?>