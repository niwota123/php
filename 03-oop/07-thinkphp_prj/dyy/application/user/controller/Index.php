<?php
namespace app\user\controller;

use app\user\model\User;
use think\Controller;
use think\Session;
use app\user\controller\UserBase;

class Index extends UserBase
{

    //显示首页
    public function index()
    {
        return $this->fetch();
    }
}
