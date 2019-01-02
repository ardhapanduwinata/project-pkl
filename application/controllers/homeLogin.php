<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeLogin extends CI_Controller {
	public function index()
	{
		$this->load->view('v_homeLogin');
		$this->load->view('v_modals');
	}
}
