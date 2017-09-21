<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 14:11
 */

//trait(特性):一种代码的复用机制
//1,声明trait,方式跟class的声明方式类似
//2,不可以实例化
trait Common{
    function helloTrait(){
        echo 'helloTrait<br/>';
    }
}

//3,使用use关键字,在类中使用trait
class TraitClass{
    use Common;
}

class TraitDemo{
    use Common;
}

$a = new TraitClass();
$b = new TraitDemo();

$a->helloTrait();
$b->helloTrait();

//优先级问题
//1,从父类继承的方法会被 trait方法覆盖
//2,trait方法会被本类中的方法覆盖

class Base{
    public function hello(){
        echo 'hello<br/>';
    }
}

trait SayHello{
    public function hello(){
        echo 'hello world<br/>';
    }
}

class Helloo extends Base {
    use SayHello;
}

class World extends Base{
    use SayHello;
    function hello()
    {
        echo 'say world<br/>';
    }
}

$a = new Helloo();
$b = new World();

$a->hello();//hello world
$b->hello();//hello


//多个trait
trait t1{
    function test(){
        echo 't1',__FUNCTION__.'<br/>';
    }
    function demo(){
        echo 't1',__FUNCTION__.'<br/>';
    }
}
trait t2{
    function test(){
        echo 't2',__FUNCTION__.'<br/>';
    }
    function demo(){
        echo 't2',__FUNCTION__.'<br/>';
    }
}

//使用多个trait时,trait与trait直接的方法存在冲突,需要明确指出,冲突中的哪一个.
//使用 insteadof  (英语:instead->代替)
class ClassMore{
    //使用多个trait
    //解决冲突:使用t1的test方法和使用t2的demo方法
    use t1,t2{
        t1::test insteadof t2;//使用t1的test
        t2::demo insteadof t1;//使用t2的demo
        //同时给t1的demo起个别名
        //as 操作符不会对方法进行重命名
        t1::demo as tdemo;
    }
}

$a = new ClassMore();
$a->test();//t1
$a->tdemo();//t1
$a->demo();//t2













