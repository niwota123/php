<?php
//1,获取xml
$postXml = $GLOBALS['HTTP_RAW_POST_DATA'];


//2,处理
$postObj = simplexml_load_string($postXml);

file_put_contents($postObj->FromUserName,$postXml);
//关注事件
/*<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[FromUser]]></FromUserName>
<CreateTime>123456789</CreateTime>
<MsgType><![CDATA[event]]></MsgType>
<Event><![CDATA[CLICK]]></Event>
<EventKey><![CDATA[EVENTKEY]]></EventKey>
</xml>*/
if ($postObj->MsgType == 'event'&&strtolower($postObj->Event) =='click') {
    $from_user = $postObj->ToUserName;
    $to_user = $postObj->FromUserName;
    $time = time();
    $content = '高手啊,终于等到你!';
    $template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";

    echo sprintf($template,$to_user,$from_user,$time,$content);
}
?>