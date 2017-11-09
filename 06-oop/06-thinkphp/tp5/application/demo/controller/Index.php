<?php
namespace app\demo\controller;

class Index
{
    public function index()
    {
        return dump(config());;
    }
    public function hello($name = 'php'){
        return "hello {$name}";
    }
}
