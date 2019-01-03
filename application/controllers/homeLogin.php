<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('models');
    }

    public function index()
	{
	    $data['title'] = "Home Login";
	    $data['note'] = "";
		$this->load->view('v_homeLogin', $data);
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
        $user = $this->models->get_selected('users', $where)->result();

        if($cek > 0)
        {
            foreach($user as $a)
            {
                $data_session = array(
                    'nama' => $a->nama_user,
                    'status' => 'login',
                    'role' => $a->role
                );
            }
            $this->session->set_userdata($data_session);

            redirect(base_url('homeAdmin'));
        } else {
            $data['note'] = "Username atau Password anda salah!";
            $this->load->view('v_homeLogin', $data);
        }
    }


}
