<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/28
 * Time: 10:49
 */

namespace app\index\controller;


use think\Request;

class Error {
    public function index(Request $request){
        return '进入了空的控制器'.$request->controller();
    }
}