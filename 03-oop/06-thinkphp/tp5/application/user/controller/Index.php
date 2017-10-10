<?php
namespace app\user\controller;

use app\user\model\Article;
use app\user\model\Book;
use app\user\model\City;
use app\user\model\Comment;
use app\user\model\Profile;
use app\user\model\Role;
use app\user\model\User;
use think\Loader;

class Index
{
    public function index()
    {
        return 'index';
    }

    protected function bInsert(){
        echo 'aaa';
    }
    //添加用户
    public function addUser($id='0'){

        //多态 一对多
        //文章-添加评论
//        $article = Article::create(['name'=>'article1']);
//        $article = Article::get('1');
//        $article->comments()->save(['title'=>'title222','content'=>'content222']);
//
//        return dump(collection($article->comments)->toArray());

        //书-添加评论
//        $book = Book::create(['name'=>'诛仙']);
//        $book->comments()->saveAll([['title'=>'欲罢不能','content'=>'张小凡太厉害了'],
//            ['title'=>'楼上说的对','content'=>'碧瑶真好看!!!']]);
//
//        return dump(collection($book->comments)->toArray());


        //$book = Book::getByName('西游记');
        //return dump(collection($book->comments)->toArray());

        //多态-反向
        $comment = Comment::get('8');
        $book = $comment->commentable;
        return dump($book->toArray());

        //????????多对多--单独获取中间的数据????????
        //$user = User::get($id);
        //return dump($user->pivot);



        //多对多---反向关联
        //$role = Role::get('2');
        //return dump(collection($role->users)->toArray());

        //多对多->新增关联数据(新增了角色,并且添加了和用户的关联)
        //$user = User::get($id);
        //$user->roles()->save(['name'=>'vip']);
        //return dump(collection($user->roles)->toArray());

        //多对多,只添加关联关系(只操作中间表)
        //$user = User::get($id);
        //给用户添加角色
//        $user->roles()->save('1');

//        $role = Role::get('2');
//        $user->roles()->save($role);
//        $user->roles()->saveAll(['1','2','3']);

        //更新中间表数据
        //$user->roles()->attach('1');
        //删除中间表数据
        //$user->roles()->detach('1');

        //return dump(collection($user->roles)->toArray());

        //User::event('before_insert','bInsert');
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
//        $user = User::create(['name'=>'static','email'=>'static@sina.com']);

        //初始化方式
//        $user = model('User');
//        $user = Loader::model('User');
//        $user = new  User();
//        $list = [['name'=>'more1','email'=>'more1@sina.com'],
//                ['name'=>'more2','email'=>'more2@sina.com']];
//        $user->saveAll($list);

        //一对一关联插入
//        $user = new User(['name'=>'name1','email'=>'email@qq.com']);
//
//        $profile = new Profile(['no'=>'436286383','type'=>'身份证']);
//
//        $user->profile=$profile;
//
//        $user->together('profile')->save();
//
//        return dump($user);

        //一对多
        $user = User::get('34');

//        $comment = new Comment(['title'=>'title','content'=>'content','status'=>'1']);

        $user->comments()->save(['title'=>'title1','content'=>'content1','status'=>'1']);


        return dump($user);

    }

    public function updataUser($id=1){
        //静态
        // User::update(['id'=>$id,'name'=>'update']);
        //实例
        //$user = User::get($id);
//        $user->name='updata-1';
//        $res = $user->save();

        //实例
        $user = new User();
//        $res = $user->save(['name'=>'updata-2'],['id'=>$id]);

        //实例
        $res = $user->save(['name'=>'updata-3','email'=>'updata-3@qq.com'],function ($query)use($id){
            $query->where('id',$id);
        });

        return dump($res);
    }

    public function deleteUser($id=1){
        //实例
//        $user = User::get($id);
//        $res = $user->delete();
        //静态
        $res = User::destroy(['id'=>$id]);
        //数据库
        //$res = User::where('id',$id)->delete();

        return dump($res);
    }

    public function getUser($id=1){

        $city = City::get(1);
        return dump(collection($city->topics)->toArray());

        //一对多
        //$res = User::get($id);

        //return dump($res->comments->toArray());

        //评论查询添加条件
        //return dump($res->comments()->where('status','1')->select()->toArray());

        //通过关联的条件查询,用户

        //评论大于1的用户
        //return dump(User::has('comments','>','1')->select()->toArray());

        //评论状态正常的用户
        //return dump(User::hasWhere('comments',['status'=>'1'])->select()->toArray());

        //反向 comment找user
        $comment = Comment::get('1');
         return dump($comment->user->toArray());


        //一对一
        $res = User::get($id);
        return dump($res->profile->toArray());
//
        $res = User::onlyTrashed()->select();

        $data = array();
        foreach ($res as $obj){
            //$data[] = $obj->hidden(['create_time','update_time'])->toArray();
            $data[] = $obj->append(['status_text'])->toJson();
        }
//        $res = User::all()->toArray();
        return dump($data);


        //$res = User::all();
//        $res = User::getByName('static');
//        $res = User::where('name','yii')->chunk(1,function ($users){
//            print_r($users);
//        });
//        return dump($res);
    }

}
