<?php
namespace app\admin\controller;

use think\Controller;
class Index extends controller
{
    public function index()
    {
        // $view = new \think\View();
        // return $view->fetch();
        return $this->fetch();
    }
    public function login()
    {
        $view = new \think\View();

        // $view->assign('name',"王琪");

        return $view->fetch();
    }
    public function test()
    {
        $this->assign('name',"sdf");
        if(request()->isPost()){
            $data=[
                'username'=>input('id'),
                'password'=>input('psd')
            ];
            $item=\think\Db::table('blog_user')->field('id,name')->select();
            if ($item) {
                // var_dump($item);
                $this->assign('item',$item);
                return $this->fetch();
            }else{
                return $this->error('失败！');
            }
            return;
        }
        return $this->fetch();
    }
}
