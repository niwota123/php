<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 9:19
 */

//面向对象
//将所有的事务抽象成对象,更加符合人类的认知

//对象
//-你所见到的所有的事物都是对象,一切皆对象
//-属性(对象的一些特征特性)
//-方法(对象的一些行为,动作)
//小狗
//属性:毛发 品种 年龄 性别
//方法:跑 吃 叫

//类(抽象的)
//-同一类对象的描述
//-类是由对象抽象出来的
//-对象是类的实例
//-有了类才有对象


//如何声明类
//class关键字 + 类的名字 +{} 类的声明

//成员属性
//成员方法
class Car{

    //public 是访问控制的修饰关键字,public表示公共的

    //成员属性
    var $type;//类型属性
    public $price;//价格属性


    //成员方法
    public function drive(){
        echo '开车';
    }

    public function stop(){
        echo '停车';
    }
}

//实例化对象
//使用new关键字实例化对象(可有有小括号,可以没有)
$my_car = new Car;

//如何调用方法,如何查看属性和给属性赋值
//使用->操作符号来调用方法和查看属性,给属性赋值
$my_car->drive();
$my_car->stop();
//对属性赋值
$my_car->type = '法拉利';
$my_car->price = '1元';

echo $my_car->type;
echo $my_car->price;

$m_car = new Car();
echo $m_car->price;


//练习:根据生活中的对象,声明一个类,包含4个属性,4个方法






