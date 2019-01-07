<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manageData extends CI_Controller {
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
            redirect(base_url('user/homeUser'));
        }
    }

    public function index()
    {
        $data['title'] = "Manage Data";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Dashboard";

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_md_dashboard');
        $this->load->view('header&footer/admin/v_footerManageData');
        $this->load->view('v_modals');
    }

    public function jurusan()
    {
        $data['title'] = "Manage Jurusan";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Jurusan";

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_md_jurusan');
        $this->load->view('header&footer/admin/v_footerManageData');
        $this->load->view('v_modals');
    }
}