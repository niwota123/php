<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 16:06
 */

//策略模式

//行为分离
interface FlyBehavior{
    function fly();
}

interface QuackBehavior{
    function quack();
}

//飞行类
class FlyWithWings implements FlyBehavior{
    function fly()
    {
        echo '正常飞';
    }
}

class FlyNoWay implements FlyBehavior{
    function fly()
    {
        echo '不飞';
    }
}

class Rack implements FlyBehavior{
    function fly()
    {
        echo '火箭飞';
    }
}

//叫类
class Quacking implements QuackBehavior{
    function quack()
    {
        echo '呱呱叫';
    }
}

class Squeak implements QuackBehavior{
    function quack()
    {
        echo '吱吱叫';
    }
}

class NoQueck implements QuackBehavior{
    function quack()
    {
        echo '不会叫';
    }
}


//超类

abstract class Duck{

    //承载的属性
    protected  $flyBehavior;//承载实现fly接口的对象
    protected  $quackBehavior;//承载实现qauck接口的对象

    //执行叫
    function performQuack(){
        $this->quackBehavior->quack();
    }

    //执行飞
    function performFly(){
        $this->flyBehavior->fly();
    }

    //设置飞
    function setFlyOption(FlyBehavior $option){
        $this->flyBehavior = $option;
    }
    //设置叫
    function setQuackOption(QuackBehavior $option){
        $this->quackBehavior = $option;
    }


    abstract function display();
}


//不同的鸭子
class MallardDuck extends Duck{

    function __construct()
    {
        //设定行为
        $this->flyBehavior = new Rack();
        $this->quackBehavior = new NoQueck();
    }

    function display()
    {
       echo '绿头鸭子';
    }
}

class RedheadDuck extends Duck{
    function __construct()
    {
        //设定行为
        $this->flyBehavior = new FlyWithWings();
        $this->quackBehavior = new Quacking();
    }

    function display()
    {
        echo '红头鸭子';
    }
}

class RubberDuck extends Duck{

    function __construct()
    {
        //设定行为
        $this->flyBehavior = new FlyNoWay();
        $this->quackBehavior = new NoQueck();
    }

    function display()
    {
        echo '橡皮鸭';
    }
}




echo '<hr>';

$red = new RedheadDuck();

$red->setFlyOption(new Rack());
$red->setQuackOption(new Squeak());

$red->performFly();
$red->performQuack();

















