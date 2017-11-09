<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 11:17
 */
//访问控制
//访问控制的封装,才是面向对象中三大特性中的封装,就是将属性和方法封装到类中,外部无法访问

//使用一些关键字,限制,属性和方法是否可以被外部访问
//var
//public :公共的       都可以访问,公开的
//private :私有的      只有类自己内部可以访问
//protected :受保护的   外部不可能访问,自己和

class Dog{
    private $price = 100;
    protected $type = '哈士奇';
    public $sex = '公';

    public function shopPrice(){
        //私有属性内部可以任意访问
        return $this->price*10;
    }

    public function getType(){
        //受保护的属性,内部可以访问
        return '纯种'.$this->type;
    }

    private function ad(){
        return '绝对'.$this->getType().'价格公道'.'挥泪甩卖'.$this->shopPrice()*0.8;
    }
    protected function ad_second(){
        return '绝对'.$this->getType().'价格公道'.'假一赔十'.$this->shopPrice()*1.5;
    }

    public function show_ad(){
        //私有方法,内部调用
//        echo $this->ad();
        //受保护的方法,内部调用
        echo $this->ad_second();
    }
}

$d1 = new Dog();
//$d1->price;//私有属性不可以被外部访问
//$d1->type;//受保护的属性不可以被外部访问
echo $d1->sex;
echo $d1->getType();
echo $d1->shopPrice();
echo '<hr>';
$d1->show_ad();

//echo $d1->ad();私有方法不能外部访问
//echo $d1->ad_second();受保护的方法不能外部访问