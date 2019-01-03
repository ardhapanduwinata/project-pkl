<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('models');
    }

    public function login()
	{
	    $data['title'] = "Home Login";
		$this->load->view('v_homeLogin', $data);
	}

	public function register()
    {
        $data['title'] = "Home Register";
        $this->load->view('v_homeRegister', $data);
    }

	public function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->models->get_selected('users', $where)->num_rows();

        if($cek > 0)
        {
            $data_session = array(
                'nama' => $username
            );
        }
    }
}
