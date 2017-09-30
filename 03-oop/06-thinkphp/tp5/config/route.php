<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];

//Route类
//\think\Route::rule('demo/[:name]','index/index/demo');

//配置文件
//'pattern/[:id]/[:name]'=>['index/index/pattern',['method'=>'get'],['id'=>'\d+']]
/*'pattern-<name?>-<id?>'=>'index/index/pattern',
 * */

//快速路由
//\think\Route::controller('user','index/user');

//别名
//\think\Route::alias('u','index/user');

//\think\Route::get('php',function (){
//    return '我是php';
//});

//\think\Route::bind('index/blog/hello');

\think\Route::bind('blog/index');

//\think\Route::resource('blog','index/blog');

return [
    'show/:id'=>'blog/index/show',
    'del/:id'=>'blog/index/del'
//    '__pattern__'=>['name'=>'[a-zA-Z]+'],
//
//    'demo/[:name]$'=>'index/index/demo?pwd=666666',
//    'pattern/[:id]/[:name]'=>['index/index/pattern',['method'=>'get','ext'=>'html|htm'],['id'=>'\d+']],
//    'baidu'=>'http://www.baidu.com',
//
//    '[user]'=>[
//     '[:id]'=> ['index/user/show',['method'=>'get']],                    '[:name]'=>['index/user/show',['method'=>'post']]
//    ],
//    'blog/[:id]'=>'index/blog/show',
//    'hello'=>'index/before/hello',
//    'data'=>'index/before/data'

];

