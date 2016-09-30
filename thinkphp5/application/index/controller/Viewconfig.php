<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/25
 * Time: 18:44
 */
namespace app\index\controller;
use think\View;

class Viewconfig
{

    public function test_fetch(){

        $view = new View(['view_suffix'=>'.htm','view_depr'=>'_']);

        return $view->fetch();
    }

    public function test_assign(){
        $view = new View();

        $view->config(['view_suffix'=>'.htm','view_depr'=>'_']);
        $view->assign('name','Thinkphp');
        $view->assign('email','Test@ee.com');

        return $view->fetch();
    }
}