<?php
/**
 * Created by PhpStorm.
 * User: griggi
 * Date: 5/3/2018
 * Time: 10:39 PM
 */

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function view()
    {
        if (!file_exists(APPPATH . 'views/pages/machine.php')) {
            show_404();
        }
        $data['page_title'] = 'Contact Us';
        $data['active'] = '';

        $this->load->view('templates/header.php', $data);
        $this->load->view('pages/contact.php', $data);
        $this->load->view('templates/footer.php', $data);
    }
}