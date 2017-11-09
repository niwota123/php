<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/28
 * Time: 16:05
 */

namespace app\index\controller;


use think\Controller;
use think\Request;

class Rdemo extends Controller{

    protected function _initialize()
    {
        Request::hook('user','getUserInfo');
    }

    public function index(Request $request){

        $request->aasdf = 'xiaoming';

        return $request->user();

        //echo Request::instance()->userId;
        //echo Request::instance()->user('10');
        //$request = request();
        //return input('get.name');

        //return 'aa';
    }



}