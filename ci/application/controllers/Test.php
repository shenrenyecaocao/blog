<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/6
 * Time: 15:40
 */
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function hello()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/about');
        $this->load->view('templates/footer');
    }
}