<?php
/*
1）将token、timestamp、nonce三个参数进行字典序排序
2）将三个参数字符串拼接成一个字符串进行sha1加密
3）开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
 */

//微信发来的参数
/*
signature   微信加密签名，signature结合了开发者填写的token参数和请求中的timestamp参数、nonce参数。
timestamp   时间戳
nonce   随机数
echostr 随机字符串
 */
//微信服务get的方式,请求这个文件
$token ='superking';
$signature = $_GET['signature'];
$nonce =     $_GET['nonce'];
$timestamp = $_GET['timestamp'];
$echostr =   $_GET['echostr'];

$array = [$nonce,$token,$timestamp];
//1,数组字典排序
sort($array);
//2,拼接成字符串并sha1加密
$str = sha1(implode($array));

//3,对比
if ($str == $signature && $echostr) {
    //第一次接入微信.配置完成
    echo $echostr;
    exit;
}else {
    //第一次之外的,微信发来的消息
    //微信发来的消息是xml的格式(iM xmpp协议-xml数据)
    //接受xml格式的数据
    //1,获取xml数据
    $postXml = $GLOBALS['HTTP_RAW_POST_DATA'];
    /*
        <xml>
            <ToUserName><![CDATA[toUser]]></ToUserName>
             <FromUserName><![CDATA[fromUser]]></FromUserName>
             <CreateTime>1348831860</CreateTime>
             <MsgType><![CDATA[text]]></MsgType>
             <Content><![CDATA[this is a test]]></Content>
             <MsgId>1234567890123456</MsgId>
        </xml>
     */
    //2,处理数据
    //xml转换成PHP对象
    $postObj = simplexml_load_string($postXml);
    //文本类型数据
    if ($postObj->MsgType == 'text') {

        //回复
            $content = '你发了1!';
            $time = time();
            $rMsg = "<xml>
            <ToUserName><![CDATA[{$postObj->FromUserName}]]></ToUserName>
            <FromUserName><![CDATA[{$postObj->ToUserName}]]></FromUserName>
            <CreateTime>{$time}</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[{$postObj->Content}]]></Content>
            </xml>";

            echo $rMsg;


        // if ($postObj->Content == '1') {

        // }
    }


}

?>