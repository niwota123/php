<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 9:30
 */
//魔术方法
//__construct __destruct
//__get __set __isset __unset  (不可访问属性:private protected 未定义)

//__call __callStatic

class Test{
    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        echo '尝试调用:'.$name.'方法','参数:',implode(',',$arguments);

    }

    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        echo '尝试调用静态:'.$name.'方法','参数:',implode(',',$arguments);

    }
}

$t = new Test();
$t->runTest('a','b','c');
Test::runStaticTest('1','2','3');

echo '<hr/>';

//序列化和反序列化
class Info{
    public $name ;
    public $age;

    function __construct($name,$age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function __sleep()
    {
        //序列化会调用的魔术方法
        //返回要序列化的的属性
        //return NULL;
        return array('name','age');

    }

    function __wakeup()
    {
        //反序列化会调用,可以对反序列化出来的对象进行修改
        //$this->name = 'zhangsan';
    }
}

$infoObj = new Info('小明',30);
//序列化对象:将对象序列化成一串股则字符串
$str = serialize($infoObj);
var_dump($str);
//反序列化:将规则字符串,反序列化成对象
$obj = unserialize($str);
var_dump($obj);

echo '<hr/>';
//__toString
//__invoke

class DemoClass{
    //echo对象时调用
    function __toString()
    {
        return '不能使用echo打印对象';
    }

    //将对象当成函数调用时
    function __invoke()
    {
       echo '不能将对象当成函数调用';
    }
}

$d= new DemoClass();
echo $d;
$d();

//__clone 当对象被clone时调用
echo '<hr/>';
class Computer{
    public $type;
    public $instance = 0;//统计类的对象实例个数
    static public $num = 0;
    function __construct($type)
    {
        $this->type = $type;
        $this->instance = ++self::$num;//new的时候,实例个数加一
    }
    function __clone()
    {
        $this->instance = ++self::$num;//clone的时候,实例个数加一
    }
}

class Student{
    public $name;
    public $age;
    public $computer;
    function __construct($name,$age,$computer)
    {
        $this->name = $name;
        $this->age = $age;
        $this->computer = $computer;
    }

    //对象调用clone会调用
    function __clone()
    {
        //可以修改对象的属性
        //$this->name = 'xiaohong_clone';

        //如果对象属性中包含还包含对象,那么在对象被clone的是否,属性对象也应该被clone
        $this->computer = clone $this->computer;
    }
}

$s1 = new Student('xiaohong',29,new Computer('联想'));

//复制出的新的对象
$s2 = clone $s1;

$s1->computer->type = 'apple';

var_dump($s1);
var_dump($s2);

//深copy:理解为完整copy,对象的普通属性和对象属性全部copy
//浅copy:对对象的普通属性进行copy,对对象类型的属性进行引用





