<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->model('blog_model');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
    }

    public function topical_succ($slug)
    {
        $data['blog_topical'] = $this->blog_model->get_blog_topical($slug);
        $data['username'] = $this->session->userdata('username');
        $data['user_news'] = $this->blog_model->get_usernews($data['username']);
        $item = $this->blog_model->get_picture($data['username']);
        $data['pic_name'] = $item['pic_name'];
        $data['list'] = $this->blog_model->get_user_blog($data['username']);
        $data['name'] = $data['user_news']['name'];//用户的名字

        if (!empty($data['blog_topical'])) {
            $data['blog_table'] = $data['blog_topical'];
            $data['title'] = '机智的小伙伴';

            $this->load->view('templates/top', $data);
            $this->load->view('blog/main', $data);
            $this->load->view('blog/user_news',$data);
            $this->load->view('blog/user_blog_list',$data);
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }else {
            $data['title'] = '机智的小伙伴';
            $this->load->view('templates/top', $data);
            $this->load->view('blog/no_topical');
            $this->load->view('blog/user_news',$data);
            $this->load->view('blog/user_blog_list',$data);
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }
    }

    public function topical($slug)//显示某个主题
    {
        $this->load->helper('url');
        if (isset($_SESSION['username'])){
//            echo $slug;
            return $this->topical_succ($slug);
        }
        $data['blog_topical'] = $this->blog_model->get_blog_topical($slug);
        if (!empty($data['blog_topical'])) {
            $data['blog_table'] = $data['blog_topical'];
            $data['title'] = '机智的小伙伴';

            $this->load->view('templates/top', $data);
            $this->load->view('blog/main', $data);
            $this->load->view('blog/log_reg');
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }else {
            $data['title'] = '机智的小伙伴';
            $this->load->view('templates/top', $data);
            $this->load->view('blog/no_topical');
            $this->load->view('blog/log_reg');
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }
    }

    public function page($page)
    {
        $this->load->helper('url');
        if (isset($_SESSION['username'])){
            return $this->log_succ($page);
        }
        return $this->index($page);
    }

    public function index($page = NULL) // 主页
    {
        $this->load->helper('url');
        if (isset($_SESSION['username'])){
            return $this->log_succ();
        }
        $num_result = $this->db->count_all_results('blog_table'); //blog的数目
        $num = '3';  //每页显示的数目
        if (isset($_SESSION['pages']))
        {
            $o = $this->session->userdata('pages');
        }else{
            $o = '0';
            $this->session->set_userdata('pages', $o);
        }
        if (($page == NULL) || ($page == 'home_page')){
            $o = '0';
        }
        if ($page == 'prev'){
            if ($o >= $num){
                $o = $o - $num;
            }else{
                $o = '0';
            }
        }
        if ($page == 'next'){
            if ($o < ($num_result - $num)){
                $o = $o + $num;
            }else{
                $o = $num_result - ($num_result % $num);
            }
        }
        if ($page == 'last_page'){
            $o = $num_result - ($num_result % $num);
        }
        $this->session->set_userdata('pages', $o);
        $data['blog_table'] = $this->blog_model->get_blog($num,$o);
        $data['title'] = '机智的小伙伴';
        $this->load->view('templates/top', $data);
        $this->load->view('blog/main', $data);
        $this->load->view('blog/log_reg');
        $this->load->view('blog/introduction');
        $this->load->view('templates/bottom');
    }

    public function edit($id)
    {
        if($id == NULL)
        {
            return show_404();
        }
        $data['title'] = "编辑博客";
        if (!isset($_SESSION['username']))
        {
            return $this->index();
        }
        $blog_id = $this->blog_model->get_blog_table($id);
        $data['titles'] = $blog_id['titles'];
        $data['content'] = $blog_id['content'];
        $dat = array(
            'shenghuo' => NULL,
            'keji' => NULL,
            'gongzuo' => NULL,
            'junshi' => NULL,
            'lunli' => NULL,
            'tiyu' => NULL,
            'shishang' => NULL,
            'jiaoyu' => NULL,
            'zhengzhi' => NULL,
        );
        switch ($blog_id['topical'])
        {
            case "keji":
                $dat['keji'] = 'selected = "selected"';
                break;
            case "gongzuo":
                $dat['gongzuo'] = 'selected = "selected"';
                break;
            case "junshi":
                $dat['junshi'] = 'selected = "selected"';
                break;
            case "lunli":
                $dat['lunli'] = 'selected = "selected"';
                break;
            case "tiyu":
                $dat['tiyu'] = 'selected = "selected"';
                break;
            case "shishang":
                $dat['shishang'] = 'selected = "selected"';
                break;
            case "jiaoyu":
                $dat['jiaoyu'] = 'selected = "selected"';
                break;
            case "zhengzhi":
                $dat['zhengzhi'] = 'selected = "selected"';
                break;
            default:
                $dat['shenghuo'] = 'selected = "selected"';
        }
        $data['user_item'] = $this->blog_model->get_usernews($_SESSION['username']);
        $pic_item = $this->blog_model->get_picture($_SESSION['username']);//图片的名字
        $data['name'] = $data['user_item']['name'];//用户的名字
        $data['pic_name'] = $pic_item['pic_name'];
        //用户blog列表
        $data['list'] = $this->blog_model->get_user_blog($_SESSION['username']);
        $data['id'] = $id;

        $this->load->view('templates/top', $data);
        $this->load->view('blog/edit',$dat);
        $this->load->view('blog/user_news');
        $this->load->view('blog/user_blog_list');
        $this->load->view('blog/introduction');
        $this->load->view('templates/bottom');
    }

    public function picture($error = NULL)
    {
        $data['title'] = "上传头像";
        if ($error == NULL)
        {
            $error = array('error' => '');
        }
        $this->load->view('templates/top', $data);
        $this->load->view('blog/picture',$error);
        $this->load->view('blog/introduction');
        $this->load->view('templates/bottom');
    }

    public function pic_succ()
    {
        $config['upload_path'] = 'E:/www/web/ci/picture/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->picture($error);
        } else
        {
            $new = array('upload_data' => $this->upload->data());
            $username = $_SESSION['username'];
            $pic_name = $this->upload->data('file_name');//文件名
            $pic_path = $this->upload->data('file_path');//文件路径
            if ($this->blog_model->get_picture($username) != NULL)
            {
                $this->blog_model->updata_picture($username,$pic_name,$pic_path);
            }else
            {
                $this->blog_model->set_picture($username,$pic_name,$pic_path);
            }
            $data['title'] = "上传成功";

            $this->load->view('templates/top', $data);
            $this->load->view('blog/pic_succ',$new);
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }

    }

    public function login1()
    {
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $json = file_get_contents("php://input");
        $obj = json_decode($json);
        $username = $obj->username; // var_dump($a);
        $password = $obj->password; // var_dump($b);
        $newdata = array(           //没有 session
            'username'  => $username,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($newdata);
        $row = $this->blog_model->get_blog_user1($username,$password);
        echo json_encode($row);
    }

    public function login() // 登录
    {
        $this->load->helper(array('form','url'));  //加载了两个辅助函数form和url以数组的形式加载
        $this->load->library('form_validation');   //加载表单验证类库

        $this->form_validation->set_rules('username','Username','required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('password','Password','required',
            array('required' => 'You must provide a %s.')
        );

        $data['blog_table'] = $this->blog_model->get_blog_table();

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = '用户登录';
            $data['error'] = '';
            $this->load->view('templates/top', $data);
            $this->load->view('blog/main');
            $this->load->view('blog/login');
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }
        else
        {
            //从数据库（blog_user）取对应的用户名密码
            $data['user_item'] = $this->blog_model->get_blog_user();
            if ($this->blog_model->get_blog_user() == NULL)
            {
                $data['title'] = '用户登录';
                $data['error'] = '用户名或密码错误';

                $this->load->view('templates/top', $data);
                $this->load->view('blog/main');
                $this->load->view('blog/login');
                $this->load->view('blog/introduction');
                $this->load->view('templates/bottom');
            }
            else
            {
                $this->log_succ();
            }
        }
    }

    public function log_succ($page = NULL)
    {
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $username = $_SESSION['username'];
        $data['user_item']= $this->blog_model->get_blog_user_session($username);
        $num_result = $this->db->count_all_results('blog_table'); //blog的数目
        $num = '3';  //每页显示的数目
        if (isset($_SESSION['pages']))
        {
            $o = $this->session->userdata('pages');
        }else{
            $o = '0';
            $this->session->set_userdata('pages', $o);
        }
        if (($page == NULL) || ($page == 'home_page')){
            $o = '0';
        }
        if ($page == 'prev'){
            if ($o >= $num){
                $o = $o - $num;
            }else{
                $o = '0';
            }
        }
        if ($page == 'next'){
            if ($o < ($num_result - $num)){
                $o = $o + $num;
            }else{
                $o = $num_result - ($num_result % $num);
            }
        }
        if ($page == 'last_page'){
            $o = $num_result - ($num_result % $num);
        }
        $this->session->set_userdata('pages', $o);
        $data['blog_table'] = $this->blog_model->get_blog($num,$o);
        $data['name'] = $data['user_item']['name'];//用户的名字
        $data['title'] = '亲爱的'.$data['name'].'你好！';
        $aaa = $this->blog_model->get_picture($_SESSION['username']);//图片的名字
        $data['pic_name'] = $aaa['pic_name'];
        //用户blog列表
        $data['list'] = $this->blog_model->get_user_blog($data['user_item']['username']);

        $this->load->view('templates/top', $data);
        $this->load->view('blog/main',$data);
        $this->load->view('blog/user_news',$data);
        $this->load->view('blog/user_blog_list',$data);
        $this->load->view('blog/introduction');
        $this->load->view('templates/bottom');
    }

    public function sign_out()
    {
        unset($_SESSION['username']);
        $this->index();
    }

    public function forget($item = NULL)
    {
        $this->load->helper(array('form','url'));
        $data['title'] = "忘记密码！";
        if($item == NULL){
            $item['news'] = NULL;
        }
        $this->load->view('templates/top', $data);
        $this->load->view('blog/forget',$item);
        $this->load->view('blog/introduction');
        $this->load->view('templates/bottom');
    }

    public function find_ps()
    {
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'm_question',
                'label' => 'M_question',
                'rules' => 'required'
            ),
            array(
                'field' => 'm_email',
                'label' => 'Email Address',
                'rules' => 'required|valid_email'
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE)
        {
            return $this->forget();
        }
        $num_rows = $this->blog_model->get_blog_user_ps();
        if ($num_rows > 0 )
        {
//            $this->email();

            $data['title'] = "密码成功找回！";
            $this->load->view('templates/top', $data);
            $this->load->view('blog/find_succ');
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }else{
            $datas['news'] = "输入信息错误!";
            $this->forget($datas); 
        }
    }

    public function email()
    {
        $this->load->library('email');

        $this->email->from('1804703632@qq.com','blog');
        $this->email->to('541885781@qq.com');
        $this->email->subject('用户密码');
        $this->email->message('Testing the email class.');
        $this->email->send();
    }

    public function register() // 注册
    {
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.'
                )
            ),
            array(
                'field' => 'confirm',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => 'You must provide a %s.'
                )
            ),
            array(
                'field' => 'm_question',
                'label' => 'M_question',
                'rules' => 'required'
            ),
            array(
                'field' => 'm_email',
                'label' => 'Email Address',
                'rules' => 'required|valid_email'
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = '用户注册';
//            echo '1';
            $this->load->view('templates/top', $data);
            $this->load->view('blog/register');
            $this->load->view('blog/log_reg');
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }
        else
        {
            //从数据库（blog_user）取对应的用户名密码
            $data['user_item'] = $this->blog_model->get_blog_user();
            if (empty($data['user_item']))
            {
                $data['title'] = '注册成功！';
                $this->blog_model->set_blog_user();
//                echo '2';
                $this->load->view('templates/top', $data);
                $this->load->view('blog/reg_succ', $data);
                $this->load->view('blog/log_reg');
                $this->load->view('blog/introduction');
                $this->load->view('templates/bottom');
            }
            else
            {
                $data['title'] = '用户注册';
//                echo '3';
                $this->load->view('templates/top', $data);
                $this->load->view('blog/register');
                $this->load->view('blog/log_reg');
                $this->load->view('blog/introduction');
                $this->load->view('templates/bottom');
            }
        }
    }

    public function view($id = NULL) // 单个博客显示
    {
        $this->load->helper('url');
        $data['blog_item'] = $this->blog_model->get_blog_table($id);
        if (empty($data['blog_item']))
        {
            return show_404();
        }
        if (isset($_SESSION['username']))
        {
            $pic_item = $this->blog_model->get_picture($_SESSION['username']);//图片的名字
            $user_itme = $this->blog_model->get_usernews($_SESSION['username']);
            $data['list'] = $this->blog_model->get_user_blog($_SESSION['username']);
            $data['pic_name'] = $pic_item['pic_name'];
            $data['name'] = $user_itme['name'];
            $data['title'] = $data['blog_item']['titles'];

            $this->load->view('templates/top', $data);
            $this->load->view('blog/article', $data);
            $this->load->view('blog/user_news',$data);
            $this->load->view('blog/user_blog_list',$data);
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }else
        {
            $this->load->view('templates/top', $data);
            $this->load->view('blog/article', $data);
            $this->load->view('blog/log_reg');
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');
        }
    }

    public function update($id)
    {
        $this->load->library('form_validation');
        $data['title'] = '编辑博客';

        $this->form_validation->set_rules('titles', 'Titles', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('topical', 'Topical', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            return edit($id);
        }else
        {
            $this->blog_model->update_blog_table($id);
            return $this->index();
        }

    }

    public function create() // 新建博客
    {
        $this->load->library('form_validation');

        $data['title'] = '创建新的博客';

        $this->form_validation->set_rules('titles', 'Titles', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('topical', 'Topical', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/top', $data);
            $this->load->view('blog/create');
            $this->load->view('blog/introduction');
            $this->load->view('templates/bottom');

        }
        else
        {
            $data['blog_item'] = $this->blog_model->get_blog_create();
            if ($data['blog_item'] == NULL)
            {
                $this->blog_model->set_blog_table();
                return $this->index();
            }
            else
            {
                $this->load->view('templates/top', $data);
                $this->load->view('blog/create');
                $this->load->view('blog/introduction');
                $this->load->view('templates/bottom');
            }
        }
    }

}