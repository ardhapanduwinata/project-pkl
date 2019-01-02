<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeAdmin extends CI_Controller {
    public function index()
    {
        $this->load->view('header&footer/v_headerLogin');
        $this->load->view('admin/v_homeAdmin');
        $this->load->view('header&footer/v_footerLogin');
    }
}
