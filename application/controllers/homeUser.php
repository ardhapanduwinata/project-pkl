<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeUser extends CI_Controller {
    public function index()
    {
        $this->load->view('header&footer/v_headerLogin');
        $this->load->view('user/v_homeUser');
        $this->load->view('header&footer/v_footerLogin');
    }
}
