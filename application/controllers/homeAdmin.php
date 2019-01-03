<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeAdmin extends CI_Controller {
    public function index()
    {
        $data['title']= "Home Admin";

        $this->load->view('header&footer/v_headerAdmin', $data);
        $this->load->view('admin/v_homeAdmin');
        $this->load->view('header&footer/v_footerAdmin');
        $this->load->view('v_modals');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('homeLogin'));
    }
}
