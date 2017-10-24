<?php
$config = array (
		//应用ID,您的APPID。
		'app_id' => "2016080800192937",

		//商户私钥
		'merchant_private_key' => "MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQCUlHHj7LfZHw3dXG0liRFU+FTgWSsv6lUmSgUDX49lCUpseWQuahnnJBTpSpDH34NlypKrgx8oNmaLL4pZljPmpbyyTCywoHGJat9EGz0/WsDBrrtebIwIPahsuYoGZlu02ZrJ5mgNQWq6EknNnfOHDtF3TzR/JZ5i4wSo3jh29GtcZ0jx+3TzgKUk/yCHRG5vghKhnjclbVGlEJ16ssY+4LZiASPPUqJOXEgkQwwobZI4zr4haSJxuDZOy1yt1W13exiK27Jq81uJd0Rxya/V6Fq7es0N7rQGpned9/X8SxkS6AT4nqFGEZwkW2d2T8vKll5/ylmlNdp8m9c//p9JAgMBAAECggEAQpuZwxgoA0oMqSP6Ok2MW49IXZsb5UskCRo9zRlV63GSz7ZL1xLxsdFXHo6zASeOfF+oCQOrQBfDOLqDR04yzj+WrEfB8Ry8SWKD3MBpYLGKoEl47gezby5VBwjWe6//hL/YyJJmKysccXYpZ+hbeDyIYvg7DJUMwEANorackZan+KqLxRGVE0BvLvIQXV1cTgLQgZZY+oFCY5xBcgPTyoHSfX4f9tnxAjwgLuDa8ZJW9V/GP3p22NLpiLwWHrPJmAXzZlwPgLSiIyoagL5flf+lw9iorjn0yPMznYe+9p9n87urTG24GySDShqmJ6fDcmb4s85n+yeeKTm24KZfUQKBgQDnDnli9nScAOXv7y1rgEoCn1ZrUV29O0pFhlZ6zcUJMgoHY4Ijk5Vin6ydsTt/zffgkhQbwHhT1BGqoUbOms7kkuHKP7g8agQTTJa02xvG4hOvKOgz0/zDSD2jmEMNR07Fdao9Sga81bHNvqGsLTLYz0KegcahCLMt0OhfA+YKzwKBgQCknqDeNqleZR7ILQ9ehocKgdywKa3KLNPISYoHOdSypLd7Gl+noHwJ77+AztMupUeCHQiJFNlUkIe/0mnm5FcCXAvXBYpeFl5WAbp8dsfWlNOOlCegzJ7/UnfGhw3Z6Ixjnpqai7Iq1febhenTzW+GdqcyiC6guRgLtZDTAgTaZwKBgQCiEHT0BQolojul341sKb+/tyNWguvNHxkpSuC9ojbiDEcch59wdMQDORxKP1YMftuumMeh7452vfjmRdj0cYFMsfnNcoQ3W+Uf5EiQ8l65UTmdUoQMVlSkZLdXWCUv2yRVPAL8mj+/k+Py/BNKQSm5CSchJsW7je6f5DgY7RMd4QKBgQCVKWMMVq066hdtPF8bwHvmSmskeG+PrPStG+1kxML0qAnVEr2vztv1yPZWCZITRxG3VQVh6LFQTbGjX040N5ybd7oGuG9693u9JM3Mb3h999aF77rEmgRLx3bePYuQcoWa0qC1/nSPGdfFZR7Nmu0+Ao9XW0wct/qQyZETkVXCawKBgQCeNFxiVjTrI5/hUMWyg47rW+ytPMqXnLWL4IgHFnxQ5sMEuIbEFMDyfnunM800pt1BRAVAjnLNHqjsFvGVR7k+Coe2G/SuHmwSCAQh4WQU/hWCRHMfF+0QC1olN7LgSJXMApp98GYD9XHo1cBGkfwk4bNaMQbXC8WlQ0qL9Po7gA==",

		//异步通知地址
		'notify_url' => "http://127.0.0.1/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",

		//同步跳转
		'return_url' => "http://127.0.0.1/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		//https://openapi.alipaydev.com/gateway.do
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlJRx4+y32R8N3VxtJYkRVPhU4FkrL+pVJkoFA1+PZQlKbHlkLmoZ5yQU6UqQx9+DZcqSq4MfKDZmiy+KWZYz5qW8skwssKBxiWrfRBs9P1rAwa67XmyMCD2obLmKBmZbtNmayeZoDUFquhJJzZ3zhw7Rd080fyWeYuMEqN44dvRrXGdI8ft084ClJP8gh0Rub4ISoZ43JW1RpRCderLGPuC2YgEjz1KiTlxIJEMMKG2SOM6+IWkicbg2TstcrdVtd3sYituyavNbiXdEccmv1ehau3rNDe60BqZ3nff1/EsZEugE+J6hRhGcJFtndk/LypZef8pZpTXafJvXP/6fSQIDAQAB",
);