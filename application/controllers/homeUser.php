<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeUser extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('models');

        $role = $this->session->userdata('role');
        $status = $this->session->userdata('status');

        if($status != "login")
        {
            redirect(base_url('homeLogin'));
        } elseif($role == "0")
        {
            redirect(base_url('homeAdmin'));
        }
    }

    public function index()
    {
        $data['title'] = 'Home User';
        $data['siapa'] = $this->session->userdata('nama');

        $this->load->view('header&footer/user/v_headerHome', $data);
        $this->load->view('user/v_homeUser');
        $this->load->view('header&footer/user/v_footerHome');
        $this->load->view('v_modals');
    }
}
