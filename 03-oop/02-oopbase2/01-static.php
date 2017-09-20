<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 9:15
 */

//修饰静态方法和静态属性的关键字 static
//注意:
//1,不能使用实例化对象访问静态属性
//2,类的内部使用静态属性时,不能用$this,要使用self关键字
//3,静态的方法,可以使用类名调用,也可以使用对象调用
//4,静态的属性,属于类,它的值共享与类的对象

class Pan{

    //声明一个静态属性
    static public $type = '钢笔';
    static public $num = 0;

    function __construct()
    {
        self::$num++;
    }

    //普通的函数
    function showPan(){
        //$this->type 错误的
        //使用self关键字,表示当前的类
        echo '漂亮的',self::$type;
    }
    //静态函数
    static public function buyPan(){
        echo '购买了',self::$type;
    }

}

//外部如何调用静态属性:1,不需要实例化对象,直接类名调用2,使用::操作符号
echo Pan::$type;

//外部调用静态方法;使用类名:: 调用
Pan::buyPan();


$p = new Pan();
$p->showPan();
$p->buyPan();//静态方法使用对象也可以调用
//$p->type;对象不能访问静态属性

$p1 = new Pan('毛笔');
$p2 = new Pan();
$p3 = new Pan();

echo Pan::$num;//4

echo '<hr>';
//后期静态绑定
//static:: 不再被解析为定义当前方法所在类,而是根据实际的运行计算,得到当前调用方法的类.
//self::的局限,只能表示定义当前方法所在的类
class A {
    static public function who(){
        echo __CLASS__;
    }
    static public function test(){
        static::who();
    }
}

class B extends A{
    static public function who(){
        echo __CLASS__;
    }
}

B::test();//A

echo '<hr>';
//后期静态绑定的原理通过 get_called_class() 实现

class foo {
    static public function test() {
        var_dump(get_called_class());
    }
}

class bar extends foo {
}

foo::test();
bar::test();



//练习,声明一个类,类中包含静态属性和静态方法,还有一个子类,子类调用父类静态方法,使用后期静态绑定的方式.

//父类的静态属性,子类可以共享,子类也可以重载生成自己的静态属性
class O{
    static public $num = 0;
    function __construct()
    {
        self::$num ++;
    }
}

class X extends O{
    //static public $num = 0;//子类重载覆盖父类的静态属性
    function __construct()
    {
        self::$num++;
    }
}


new O();
new O();
new O();

new X();
new X();
new X();
echo O::$num;//










































