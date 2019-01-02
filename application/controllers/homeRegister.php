<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeRegister extends CI_Controller {
	public function index()
	{
		$this->load->view('v_homeRegister');
	}
}
