<?php
namespace app\user\controller;

use app\user\model\User;
use think\Loader;

class Index
{
    public function index()
    {
        return 'index';
    }

    //添加用户
    public function addUser($id='0'){
        //直接赋值
        //$user = new User(['name'=>'phpcms','email'=>'phpcms@sina.com']);
        //$user->name = 'thinkphp';
        //$user->email = 'thinkphp@163.com';
        //data()
        //$user->data(['name'=>'yii','email'=>'yii@sina.com']);
        //$user->save();

        //过滤
//        $post = ['name'=>'post','email'=>'post@aa.com','age'=>'20'];
//
//        $user = new User($post);
//        $user->allowField(TRUE)->save();

        //指定
//        $post = ['name'=>'post_2','email'=>'post_2@aa.com','age'=>'20'];
//
//        $user = new User($post);
//        $user->allowField(['name'])->save();


        //静态
        $user = User::create(['name'=>'static','email'=>'static@sina.com']);

        //初始化方式
//        $user = model('User');
//        $user = Loader::model('User');
//        $user = new  User();
//        $list = [['name'=>'more1','email'=>'more1@sina.com'],
//                ['name'=>'more2','email'=>'more2@sina.com']];
//        $user->saveAll($list);

        return $user->id;
    }

    public function updataUser($id=1){
        //静态
        // User::update(['id'=>$id,'name'=>'update']);
        //实例
//        $user = User::get($id);
//        $user->name='updata-1';
//        $res = $user->save();

        //实例
        $user = new User();
//        $res = $user->save(['name'=>'updata-2'],['id'=>$id]);

        //实例
        $res = $user->save(['name'=>'updata-3'],function ($query)use($id){
            $query->where('id',$id);
        });

        return dump($res);
    }

    public function deleteUser($id=1){
        //实例
//        $user = User::get($id);
//        $res = $user->delete();
        //静态
        //$res = User::destroy(['name'=>'static']);
        //数据库
        $res = User::where('id',$id)->delete();

        return dump($res);
    }

    public function getUser($id=1){
//        $res = User::get($id);
//        return $res->name;

        $res = User::all()->toArray();
        return dump($res);


        //$res = User::all();
//        $res = User::getByName('static');
//        $res = User::where('name','yii')->chunk(1,function ($users){
//            print_r($users);
//        });
//        return dump($res);
    }

}
