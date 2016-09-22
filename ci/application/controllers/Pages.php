<?php


class Pages extends CI_Controller {

    public function header($data)
    {
        $this->load->view('templates/header', $data);
    }
    public function view($page = 'home')
    {
        $this->load->view('pages/'.$page);
    }
    public function footer()
    {
        $this->load->view('templates/footer');
    }
    public function views($page = 'home')
    {
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->header($data);
        $this->view($page);
        $this->footer();
    }
}
?>