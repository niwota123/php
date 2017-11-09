<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/29
 * Time: 9:48
 */

namespace app\index\controller;


use think\Db;
use think\db\Query;

class Dbdemo {

    public function index(){
        //$res = Db::table('think_data')->where('id',1)->find();
        //$res = Db::name('data')->where('id',1)->find();
        //$res = Db::name('data')->select();
        //$res = db('data',[],FALSE)->where('id',1)->find();
        //$res = db('data',[],FALSE)->select();

        $res = Db::find(function ($query){
            $query->name('data')->where('id',3);
        });

        $query = new Query();
        $query->name('data');
        $res = Db::select($query);

        $res = Db::name('data')->where('id',1)->value('data');
        $res = Db::name('data')->column('data');

        Db::name('data')->chunk(2,function ($data){
          dump($data);
        });

        dump($res);
    }
}