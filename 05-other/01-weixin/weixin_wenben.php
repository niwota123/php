<?php

//1,获取xml
$postXml = $GLOBALS['HTTP_RAW_POST_DATA'];
//2,处理
$postObj = simplexml_load_string($postXml);

//自定义关键字回复
if ($postObj->MsgType == 'text') {
    //处理关键字
    $key = $postObj->Content;

    switch ($key) {
        case '1':
            $r_content = '我是数字1的返回';
            break;
        case '2':
        $r_content = "<a href = 'http://wwww.baidu.com'>baidu地址</a>";
            break;
        case '3':
            $r_content = '功能测试结束啦!';
            break;

        default:
            # code...
            break;
    }

    $toUser = $postObj->FromUserName;
    $fromUser = $postObj->ToUserName;
    $time = time();

    $template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";

    echo  sprintf($template, $toUser,$fromUser,$time,$r_content);

}

?>