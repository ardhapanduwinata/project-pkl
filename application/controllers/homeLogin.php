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
            'password' => md5($password),
            'aktif'    => 'Sudah'
        );
        $cek = $this->models->get_selected('users', $where)->num_rows();
        $user = $this->models->get_selected('users', $where)->result();

        if($cek > 0)
        {
            foreach($user as $a) {
                $data_session = array(
                    'nama' => $a->nama_user,
                    'status' => 'login',
                    'role' => $a->role,
                    'foto' => $a->foto
                );

                $this->session->set_userdata($data_session);
                if($a->role == '0')
                {
                    redirect(base_url('admin/homeAdmin'));
                } elseif ($a->role == '1')
                {
                    redirect(base_url('user/homeUser'));
                }
            }
        } else {
            $data['note'] = "Username atau Password anda salah! Atau Anda belum verifikasi email";
            $this->load->view('v_homeLogin', $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('homeLogin'));
    }
}
