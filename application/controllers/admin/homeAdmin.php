<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeAdmin extends CI_Controller {
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
        $data['title'] = "Home Admin";
        $data['siapa'] = $this->session->userdata('nama');

        $where_intro = array('nama_konten' => 'intro');
        $data['intro'] = $this->models->get_selected('home_page', $where_intro)->result();
//        $data['intro'] = $this->models->get_data('home_page')->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_homeAdmin');
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function add_intro()
    {
        $nama_konten = $this->input->post('konten');
        $config['upload_path'] = './assets/img/home_content/intro/';
        $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());
            //echo $error;
            foreach ($error as $row){
                echo $row;
            }

           redirect('admin/homeAdmin', 'refresh');

        } else {
            $data = array(
                'nama_konten' => $nama_konten,
                'image' => $this->upload->data('file_name')
            );

            $this->models->add_data('home_page', $data);
        }
        echo "<script>alert('Berhasil ditambahkan'); </script>";
        redirect(base_url('admin/homeAdmin'));
    }

    public function edit_intro()
    {
        $data['title'] = "Edit Intro";
        $data['siapa'] = $this->session->userdata('nama');
        $data['judul'] = "Gambar yang terupload";
        $data['param'] = "intro";

        $where = array('nama_konten' => "intro");
        $data['intro'] = $this->models->get_selected('home_page', $where)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_edit_intro', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_intro($id)
    {
        $where = array('id_home' => $id);

        $this->models->delete_data($where, 'home_page');
        redirect(base_url('admin/homeAdmin/edit_intro'));
    }
}
