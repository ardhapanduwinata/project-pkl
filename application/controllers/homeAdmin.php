<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeAdmin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('models');

        $role = $this->session->userdata('role');
        $status = $this->session->userdata('status');

        if($status != "login")
        {
            redirect(base_url('homeLogin'));
        } elseif($role == "1")
        {
            redirect(base_url('homeUser'));
        }
    }

    public function index()
    {
        $data['title'] = "Home Admin";
        $data['siapa'] = $this->session->userdata('nama');

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
