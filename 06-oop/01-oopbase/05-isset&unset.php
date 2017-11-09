<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 15:52
 */
//isset()检测变量是否设置
//unset()主动销毁变量

class Test{
    private $name = '123';

    //魔术方法 __isset __unset 当使用isset(empty)/unset访问不可访问的属性时调用
    function __isset($name)
    {
        return isset($this->$name);
    }

    function __unset($name)
    {
        unset($this->$name);
    }
}

$t = new Test();

var_dump(isset($t->name)) ;//会调用 __isset
empty($t->name);//会调用 __isset
unset($t->name);//会调用 __unset

var_dump(isset($t->name)) ;//会调用 __isset

//属性的重载测试
class PropertyTest{
    //重载数据保持的地方
    private $data = array();

    //赋值
    function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    //取值
    function __get($name)
    {
        //值是否存在
        if (array_key_exists($name,$this->data)){
            return $this->data[$name];
        }else{
            return null;
        }
    }
    //查看是否设置
    function __isset($name)
    {
        return isset($this->data[$name]);
    }
    //释放
    function __unset($name)
    {
        unset($this->data[$name]);
    }
}


$pt = new PropertyTest();
$pt->name = 'xiao ming';
$pt->age = '18';
$pt->sex = '男';

echo $pt->name,$pt->age,$pt->sex;





















