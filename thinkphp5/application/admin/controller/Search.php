<?php
namespace app\admin\controller;

use think\Controller;
class Search extends controller 
{
    public function index()
    {
        // $view = new \think\View();
        return $this->fetch('search');
    }
}
