<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 14:19
 */

//属性都是私有的,如何去访问和修改

class Phone {
    private $type;
    private $price;
    private $color;

    public function getType(){
        return '手机类型'.$this->type;
    }
    public function setType($type){
        $this->type = $type;
    }

    public function getPrice(){
        return '手机价格'.$this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    public function getColor(){
        return '手机颜色'.$this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
}

$apple = new Phone();
$apple->setType('iphone X');
$apple->setColor('星空灰');
$apple->setPrice('¥8999');
echo $apple->getType();
echo $apple->getColor();
echo $apple->getPrice();
var_dump($apple);

echo '<hr>';
//使用魔术方法,重载属性
//__get()
//__set()
//当对象外部,想访问不可访问的属性时,会自动调用

class Test{
    private $private_var;

    function __get($name)
    {
        echo '访问不可访问的属性'.$name,'<br>';
    }

    function __set($name, $value)
    {
        echo '设置不可访问的属性'.$name,'新值'.$value,'<br>';
    }
}

$t = new Test();
$t->private_var;//对象去访问不可访问的属性--->触发__get()魔术方法
$t->private_var = '哈哈';//对象,设置不可访问的顺序--->触发__set()魔术方法

//访问不存在的属性(也属于不可访问的属性)
$t->type;
$t->type = '不存在';

//练习:将上面Phone类,修改成使用 __get() __set() 获取和修改私有属性的值
class Phone_t{
    private $type;
    private $price;
    private $color;

    function __get($name)
    {
//        if ('type'==$name){
//            return $this->type;
//        }elseif ('price'==$name){
//            return $this->price;
//        }elseif ('color'==$name){
//            return $this->color;
//        }
        return $this->$name;
    }

    function __set($name, $value)
    {
//        if ('type'==$name){
//             $this->type = $value;
//        }elseif ('price'==$name){
//             $this->price = $value;
//        }elseif ('color'==$name){
//             $this->color = $value;
//        }
        $this->$name = $value;
    }
}

$p = new Phone_t();
$p->type = 'iphonex';
$p->price = '8999';
$p->color = '白色';

echo  $p->type;
echo   $p->price;
echo  $p->color;

var_dump($p);















