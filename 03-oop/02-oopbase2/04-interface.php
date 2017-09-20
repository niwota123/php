<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 14:35
 */

//interface 理解成协议,实现这协议的类,必须遵循协议的规定

//1,通过 interface 关键字定义接口,跟定义类类似
//2,接口中定义的方法必须都是公开的
//3,接口定义的方法,不需要实现(跟抽象方法类似)
//4,类使用implements关键字,来实现接口,这个类必须实现接口中定义的所有方法
//5,一个类,可以同时 implements 多个接口
//6,接口和接口之间可以有继承的关系,可以多继承
//7,接口中可以声明常量
//8,你可以有使用 instanceof 和 类型约束 ,检测某个对象是否遵循了某个协议

//定义接口
interface InterfaceTest{
    //接口中声明常量
     const test = 'InterfaceTest' ;
    //接口中定义方法跟抽象方法类似
     public function test();
}

//外部使用接口的常量
echo InterfaceTest::test;

//定义的第二个接口
interface InterfaceDemo{
    public function demo();
}

//接口的继承(接口可以多继承)
interface InterfaceMore extends InterfaceTest,InterfaceDemo{
    public function more();
}

//类实现接口
//类实现多个接口,每个之间使用,分隔
class ClassTest implements InterfaceTest,InterfaceDemo {
    //必须实现接口中所定义的方法
    public function test()
    {
        echo 'implements接口的方法';
    }
    public function demo()
    {
        echo 'implementsDemo接口的方法';
    }
}

$c = new ClassTest();
$c->test();

//InterfaceMore 继承了interfaceTest和interfaceDemo的 test()和demo()方法
//MoreClass 必须实现 test() demo() more()
class MoreClass implements InterfaceMore{
    public function test()
    {
        // TODO: Implement test() method.
        echo __CLASS__.__FUNCTION__;
    }

    public function demo()
    {
        // TODO: Implement demo() method.
        echo __CLASS__.__FUNCTION__;

    }

    public function more()
    {
        // TODO: Implement more() method.
        echo __CLASS__.__FUNCTION__;

    }
}

//instanceof 关键字的使用
echo '<hr>';
//1,判断对象是否遵循接口
$m = new MoreClass();
if ($m instanceof InterfaceMore){
    echo 'm 对象的类遵循了 InterfaceMore 接口</br>';
}
//2,判断对象是某个类的实例
if ($m instanceof MoreClass){
    echo 'm 是 MoreClass 的实例</br>';
}

//类型约束
//1,指定函数的参数,必须为 对象/接口/数组
//2,类型约束不可以使用标量类型 int/string

function testFun(InterfaceMore $obj){
    $obj->demo();
}

testFun($m);

//练习:使用interface实现多态
//电脑--->不同usb设备具备不同的功能
interface InterfaceUsb{
    //功能
    public function gongNeng();
}


class Mouse implements InterfaceUsb{
    public function gongNeng()
    {
        echo '鼠标点击';
    }
}

class keyboard implements InterfaceUsb{
    public function gongNeng()
    {
        echo '键盘输入';
    }
}

class Computer{
    function link(InterfaceUsb $usb){
        $usb->gongNeng();
    }
}


$m = new Mouse();
$k = new keyboard();
$c = new Computer();

$c->link($m);
$c->link($k);






















