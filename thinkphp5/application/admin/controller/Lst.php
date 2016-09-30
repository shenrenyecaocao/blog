<?php
namespace app\admin\controller;

use think\Controller;
class Lst extends controller
{
    public function index()
    {
        // $view = new \think\View();
        return $this->fetch('lst');
    }
}
