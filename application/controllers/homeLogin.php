<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        ob_start();
        $this->load->model('models');
    }

    public function index()
    {
        $this->session->sess_destroy();

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

        if ($cek > 0) {
            foreach ($user as $a) {
                if($a->aktif == 'Sudah') {
                    $data_session = array(
                        'id' => $a->id_user,
                        'nama' => $a->nama_user,
                        'status' => 'login',
                        'pass' => $a->password,
                        'role' => $a->role,
                    );

                    $this->session->set_userdata($data_session);
                    if ($a->role == '0') {
                        redirect(base_url('admin/homeAdmin'));
                    } elseif ($a->role == '1') {
                        redirect(base_url('user/homeUser'));
                    } elseif ($a->role == '2'){
                        redirect(base_url('admin/homeAdmin'));
                    }
                }else{
                    $data['note'] = "Anda belum melakukan verifikasi email";
                    $this->load->view('v_homeLogin', $data);
                }
            }
        } else {
            $data['title'] = "Home Login";
            $data['note'] = "Username atau Password anda salah!";
            $this->load->view('v_homeLogin', $data);
        }
    }

    public function logout()
    {
        session_destroy();
        $this->session->sess_destroy();
        redirect(base_url('homeLogin'));
    }
}
