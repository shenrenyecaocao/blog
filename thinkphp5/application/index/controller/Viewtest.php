<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/25
 * Time: 17:19
 */
namespace app\index\controller;
use think\View;

class Viewtest
{
    public function test_fetch(){
        $view = new View();
//        return '1234';
        return $view->fetch();
    }

    public function test_assign(){
        $view = new View();
        $view->assign('name','Thinkphp');
        $view->assign('email','Test@ee.com');
        return $view->fetch();
    }
}