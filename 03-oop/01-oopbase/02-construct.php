<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 10:33
 */
//编码规范
//类名:大驼峰
//属性名:小驼峰或者_
//方法名:小驼峰或者_

//如何在类的内部访问,属性和方法
class People{
    public $name='小明';
    public $age='20';
    public $sex='男';

    //类的内部使用属性,需要用到 $this:表示当前类的内部对象,表示自己
    public function speak(){
        echo $this->name.'说话';
    }

    //小明喜欢什么
    public function like(){
        echo '喜欢',$this->speak();
    }

}

$xiaom = new People();
$xiaom->speak();
$xiaom->like();

echo '<hr>';
//构造函数/析构函数(魔术方法)
//构造函数:对象new的时候,自动调用
//析构函数:对象销毁的时候,自动调用

class Computer{
    public $type;
    public $price;
    public $cpu;

    //__CLASS__ 表示当前的类
    //__FUNCTION__表示当前方法
    public function zu_zhuang(){
        echo $this->type,'价格',$this->price,'cpu',$this->cpu,'<br>';
    }

    //构造函数
    function __construct($t,$p,$c)
    {
        //属性使用,构造函数赋值
        $this->type = $t;
        $this->price = $p;
        $this->cpu = $c;

        echo $this->type,'---对象创建了<br>';
    }

    //析构
    function __destruct()
    {
        echo $this->type,'---对象销毁了<br>';
    }
}

$c1 = new Computer('thinkpad','5000','i7');
$c1->zu_zhuang();

$c2 = new Computer('macbook pro','8000','i7');
$c2->zu_zhuang();


