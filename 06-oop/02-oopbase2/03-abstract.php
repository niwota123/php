<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 11:04
 */

//抽象类
//1,定义为抽象的类不可以被实例化(抽象类就是个模板)
//2,类中只要包含有一个抽象方法,这个类必须被声明为抽象类
//3,抽象方法,只能可以有声明,不能有具体的实现
//4,继承与抽象类的子类,必须实现抽象类中的抽象方法


abstract class AbstractClass{

    //定义一个抽象的方法 使用abstract关键字
    abstract public function info();

    //抽类中的普通方法
    public function show(){
        echo '普通的方法';
    }
}

//$a = new AbstractClass;//不能实例化抽象类

class SubClass extends AbstractClass {

    //继承抽象类,必须实现抽象方法
    public function info()
    {
        echo __CLASS__;
    }
}

class SmallClass extends AbstractClass{
    public function info()
    {
        echo __CLASS__;
    }
}

$sub = new SubClass();
$small = new SmallClass();

$sub->info();
$small->info();

echo '<hr>';


//继承的方式实现多态
//播放器
//播放视频,音频

//播放介质抽象类
 class PlayItem{
     public function play(){}
}

//视频
class Video extends PlayItem{
    public function play()
    {
        echo '播放视频....';
    }
}
//音频
class Audio extends PlayItem{
    public function play()
    {
        echo '播放音频....';
    }
}

class Flash extends PlayItem{
    public function play()
    {
        echo '播放Flash...';
    }
}


//播放器
class Player{

    //开始播放
    //PlayItem $item :参数的类型限制
    //$item这个参数必须是 PlayItem的实例(对象)
    //item是播放介质
    public function start(PlayItem $item){
        //instanceof 检查对象是否是类的实例
        //if ($item instanceof PlayItem){
            $item->play();
        //}

    }
}

$player = new Player();

//视频
$mv = new Video();
//音频
$mp3 = new Audio();
//flash
$flash = new Flash();

//使用播放器播放,媒体

$player->start($mp3);
$player->start($mv);
$player->start($flash);

//练习: 文本编辑器,可以打开多种类型的文件,使用多态写





























