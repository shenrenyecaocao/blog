<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->library('session');
        $this->load->helper(array('url','form'));
    }

    public function login($err = NULL)
    {
        $this->load->helper(array('url','form'));
        $data['title'] = "管理员登录";
        if ($err == NULL)
        {
            $err['error'] = NULL;
        }
        $this->load->view('templates/admin_top_no',$data);
        $this->load->view('blog/adm_log',$err);
        $this->load->view('templates/bottom');
    }

    public function log_in()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('password','Password','required',
            array('required' => 'You must provide a %s.')
        );
        if ($this->form_validation->run() == FALSE)
        {
            return $this->login();
        }
        $news = $this->blog_model->get_blog_user();
        if ($news == NULL || $news['admin'] =='0')
        {
            $err['error'] = "没有权限";
            return $this->login($err);
        }
        if ($news['admin'] == '1')//登录成功
        {
            $newdata = array(          //创建登录标记 session
                'username'  => $this->input->post('username'),
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            return $this->index();
        }

    }

    public function sign_out()
    {
        unset($_SESSION['username']);
        $this->index();
    }

    public function topical($topical = NULL)
    {
        if (!isset($_SESSION['username']))
        {
            return $this->login();
        }

        $data['blog_table'] = $this->blog_model->get_blog_topical($topical);
        $data['title'] = '机智的小伙伴';
        $name = $this->blog_model->get_usernews($_SESSION['username']);
        $data['name'] = $name['name'];
        if (!empty($data['blog_table'])) {

            $this->load->view('templates/admin_top', $data);
            $this->load->view('blog/all_blog', $data);
            $this->load->view('templates/bottom');
        }else {
            $this->load->view('templates/admin_top', $data);
            $this->load->view('blog/no_topical');
            $this->load->view('templates/bottom');
        }
    }

    public function index($id = NULL)
    {
        if (!isset($_SESSION['username']))
        {
            return $this->login();
        }
        $data['blog_table'] = $this->blog_model->admin_get_blog_table($id);//获取blog
        $data['title'] = "机智的小伙伴！";
        $name = $this->blog_model->get_usernews($_SESSION['username']);
        $data['name'] = $name['name'];
        $this->load->view('templates/admin_top',$data);
        $this->load->view('blog/all_blog',$data);
        $this->load->view('templates/bottom');
    }

    public function admin_page($page = NULL)
    {
        $num_result = $this->db->count_all_results('blog_table'); //blog的数目
        $num = '4';  //每页显示的数目
        if (isset($_SESSION['pages']))
        {
            $o = $this->session->userdata('pages');
        }else
        {
            $o = '0';
            $this->session->set_userdata('pages', $o);
        }

        switch ($page)
        {
            case "home_page":
                $o = '0';
                break;
            case "prev":
                if ($o >= $num) {
                    $o = $o - $num;
                }else {
                    $o = '0';
                }
                break;
            case "next":
                if ($o < ($num_result - $num)) {
                    $o = $o + $num;
                }else {
                    $o = $num_result - ($num_result % $num);
                }
                break;
            default:
                $o = $num_result - ($num_result % $num);
        }
        $this->session->set_userdata('pages', $o);
        $data['title'] = "机智的小伙伴！";
        $name = $this->blog_model->get_usernews($_SESSION['username']);
        $data['name'] = $name['name'];
        $data['blog_table'] = $this->blog_model->get_blog($num,$o);

        $this->load->view('templates/admin_top',$data);
        $this->load->view('blog/all_blog',$data);
        $this->load->view('templates/bottom');
    }

    public function delete($id)
    {
        $this->blog_model->delete_blog($id);
        return $this->index();
    }

}