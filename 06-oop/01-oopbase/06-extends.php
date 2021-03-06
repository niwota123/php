<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 16:28
 */
//动物类
class Animal{
    private $name;//private只能本类内部访问
    protected $age = 2;//protected 除了可以在内部访问,还可以在子类中进行访问
    public $eyes;
    public $foot = '4';
    public $type;

    function active(){
        echo '我会动';
    }
    function eat(){
        echo '会吃';
    }
}

//extends 继承关键字
//类的继承
//狗类继承动物类,就继承了父类所有的属性和方法(private修饰的属性没有访问权限)
class Dog extends Animal {


    //属性的重载-重载的属性的访问控制权限,必须和父类的权限一致或者更宽松(例子,父类权限是protected 子类的权限必须是protected或者public,不能是private)
    public $foot = '3';
    public $name = 'aa';
    //方法的重载,子类重载父类的方法
    function eat()
    {
        //使用 parent 子类中表示父类的关键字
        //::属于操作符
        parent::eat();

        //echo parent::foot;//不可以用::操作符,操作父类属性

        echo '骨头';
    }

    function home(){
        echo '看家';
    }

}

$dog = new Dog();
var_dump($dog);
//公共的
$dog->eyes = '2眼睛';
$dog->eat();
$dog->home();
//私有的
//$dog->name = '吉娃娃';//父类私有的属性不能被外部访问

var_dump($dog);

//猫类
class Cat extends Animal {

    function eat()
    {
        parent::eat();
        echo '鱼';
    }

    function mouse(){
        //父类的 protected属性,可以在子类内部访问
        echo $this->age,'岁开始抓老鼠';
    }
}

$cat = new Cat();
//$cat->age = 100;//受保护的属性不能再外面访问
$cat->mouse();
$cat->eat();

//PHP中的继承,单继承,一个类只能有一个父类
//面向对象的三大特性,封装,继承,多态
//多态:多个子类继承与同一个父类,单是每个子类又表现出自身的独有的特性,这就是多态











