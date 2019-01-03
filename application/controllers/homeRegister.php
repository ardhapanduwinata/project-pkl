<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeRegister extends CI_Controller {

	public function index()
	{
		$data['title'] = "Home Register";
		$this->load->view('v_homeRegister', $data);
	}

}

/* End of file homeRegister.php */
/* Location: ./application/controllers/homeRegister.php */