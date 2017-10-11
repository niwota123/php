<?php
namespace app\blog\controller;

use app\blog\model\Blog;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {


        //获得数据
        //$blogData = Db::name('blog')->select();
        $blogData = Blog::all();
        //$blogData = Blog::get(1)->toArray();
        $blogData = collection($blogData)->toArray();
        //展示
        $this->assign('data',$blogData);

        //显示列表
        return $this->fetch();//view/index/index.html
    }

    public function demoData(){
        //测试数据
        $data = array();
        for ($i=0;$i<10;$i++){
            $data[]=['title'=>"title_{$i}",'content'=>"content:{$i}"];
        }
        $blog = new Blog();
        $blog->saveAll($data);
        //$blogData = Db::name('blog')->insertAll($data);
    }

    //显示内容
    public function show($id){
        //根据id显示内容
        //根据id查内容
        $data = Db::name('blog')->where('id',$id)->value('content');
        $this->assign('data',$data);

        //显示模板
        return $this->fetch();//view/index/show.html

    }
    public function del($id){
        //根据id删
        $res = Db::name('blog')->where('id',$id)->delete();
        if (1==$res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
        //返回
        //return 'show-content:'.$id;
    }

}
