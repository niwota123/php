<?php
//use app\user\model\User;
//
//function shouData(){
//
//    return User::all()->toArray();
//}

use app\user\model\User;

function showData(){
    return User::all()->toArray();
    //return [['name'=>'common的公共方法']];
}