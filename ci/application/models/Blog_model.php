<?php
class Blog_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_blog_user1($username,$password)
    {
        $data = array(
            'username' => $username,
            'password' => $password
        );
        $sql = "SELECT name from blog_user where username=? and password=?";
        $query = $this->db->query($sql,$data);
        return $query->row_array();
    }

    public function get_blog_user()
    {
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $query = $this->db->get_where('blog_user', $data );
        return $query->row_array();
    }

    public function get_blog_user_ps()
    {
        $data_input = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'm_question' => $this->input->post('m_question'),
            'm_email' => $this->input->post('m_email'),
        );
        $query = $this->db->get_where('blog_user',$data_input);
        return $query->num_rows();
    }

    public function get_blog_user_session($username)
    {
        $data = array(
            'username' => $username
        );
        $query = $this->db->get_where('blog_user',$data);
        return $query->row_array();
    }

    public function get_blog_create()
    {
        $data_input = array(
            'titles' => $this->input->post('titles'),
            'topical' => $this->input->post('topical'),
            'username' => $this->session->userdata('username')
        );
        $query = $this->db->get_where('blog_table',$data_input);
        return $query->row_array();
    }

    public function get_blog($num,$o)
    {
        $sql = "select * from blog_table order by id desc limit $o,$num";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function admin_get_blog_table($id = NULL)
    {
        if ($id == NULL)
        {
            $sql = "SELECT * FROM blog_table ORDER BY id DESC limit 3";
            $query = $this->db->query($sql);
            return $query->result_array();
        }else{
            $query = $this->db->get_where('blog_table', array('id' => $id));
            return $query->result_array();
        }
    }

    public function get_blog_table($slug = FALSE)
    {
        if ($slug === FALSE) //默认没有就是为NULL的时候
        {
//            echo $page;
            $sql = "SELECT * FROM blog_table ORDER BY id DESC limit 3";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        $query = $this->db->get_where('blog_table', array('id' => $slug));
        return $query->row_array();
    }

    public function get_blog_topical($slug = FALSE)
    {
        $query = $this->db->get_where('blog_table', array('topical' => $slug));
        return $query->result_array();
    }

    public function get_user_blog($username = FALSE)
    {
        $query = $this->db->get_where('blog_table', array('username' => $username));
        return $query->result_array();
    }
    public function get_usernews($username = FALSE)
    {
        $query = $this->db->get_where('blog_user',array('username' => $username));
        return $query->row_array();
    }

    public function get_picture($a)
    {
        $this->db->select('pic_name');
        $query = $this->db->get_where('picture',array('username' => $a));
        return $query->row_array();
    }

    public function updata_picture($a,$b,$c)
    {
        $data = array(
            'pic_name' => $b,
            'pic_path' => $c
        );
        $this->db->where('username', $a);
        $this->db->update('picture', $data);
        return ;
    }

    public function delete_blog($id)
    {
        $sql = "DELETE FROM blog_table WHERE id = $id";
        $query = $this->db->query($sql);
//        return $query->num_rows();
    }

    public function set_picture($a,$b,$c)
    {
        $data = array(
            'username' => $a,
            'pic_name' => $b,
            'pic_path' => $c
        );
        return $this->db->insert('picture',$data);
    }

    public  function set_blog_table()
    {
        $this->load->helper('date');
        $username = $_SESSION['username'];
        $sql = "SELECT name from blog_user where username = $username";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        $datestring = '%Y-%m-%d %h:%i:%a';
        $time = time();
        $update_time =  mdate($datestring, $time);
        $data = array(
            'titles' => $this->input->post('titles'),
            'name' => $row['name'],
            'content' => $this->input->post('content'),
            'username' => $username,
            'topical' => $this->input->post('topical'),
            'update_time' => $update_time
        );
//        var_dump($data);
        return $this->db->insert('blog_table', $data);
    }

    public function set_blog_user()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'm_question' => $this->input->post('m_question'),
            'm_email' =>$this->input->post('m_email')
        );
        return $this->db->insert('blog_user',$data);
    }


}