<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeAdmin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('models');
        $this->load->helper(array('url','download'));

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

        $where_uguide = array('nama_konten' => 'uguide');
        $data['uguide'] = $this->models->get_selected('home_page', $where_uguide)->result();

        $where_contact = array('nama_konten' => 'contact');
        $data['contact'] = $this->models->get_selected('home_page', $where_contact)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function add_intro()
    {
        $nama_konten = $this->input->post('konten');
        $config['upload_path'] = './assets/img/home_content/intro/';
        $config['allowed_types'] = 'jpg|png|jpeg';
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
        $this->load->view('admin/home/v_edit_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_intro($id)
    {
        $where = array('id_home' => $id);

        $this->models->delete_data($where, 'home_page');
        redirect(base_url('admin/homeAdmin/edit_intro'));
    }

    public function add_service()
    {
        $judul = $this->input->post('judul_konten');
        $isi = $this->input->post('isi_konten');
        $config['upload_path'] = './assets/img/home_content/userguide/';
        $config['allowed_types'] = 'jpg|png|jpeg';
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
                'nama_konten' => 'uguide',
                'judul_konten' => $judul,
                'isi_konten' => $isi,
                'image' => $this->upload->data('file_name')
            );

            $this->models->add_data('home_page', $data);
        }
        echo "<script>alert('Berhasil ditambahkan'); </script>";
        redirect(base_url('admin/homeAdmin'));
    }

    public function edit_service()
    {
        $data['title'] = "Edit Intro";
        $data['siapa'] = $this->session->userdata('nama');
        $data['judul'] = "Konten pada bagian Service";
        $data['param'] = "part2";

        $where_uguide = array('nama_konten' => 'uguide');
        $data['uguide'] = $this->models->get_selected('home_page', $where_uguide)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_edit_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_service($id)
    {
        $where = array('id_home' => $id);

        $this->models->delete_data($where, 'home_page');
        redirect(base_url('admin/homeAdmin/edit_service'));
    }

    public function add_porto()
    {
        $nama_konten = $this->input->post('konten');
        $config['upload_path'] = './assets/img/home_content/intro/';
        $config['allowed_types'] = 'jpg|png|jpeg';
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

    public function edit_porto()
    {
        $data['title'] = "Edit Intro";
        $data['siapa'] = $this->session->userdata('nama');
        $data['judul'] = "Gambar yang terupload";
        $data['param'] = "intro";

        $where = array('nama_konten' => "intro");
        $data['intro'] = $this->models->get_selected('home_page', $where)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_edit_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_porto($id)
    {
        $where = array('id_home' => $id);

        $this->models->delete_data($where, 'home_page');
        redirect(base_url('admin/homeAdmin/edit_intro'));
    }

    public function add_testi()
    {
        $nama_konten = $this->input->post('konten');
        $config['upload_path'] = './assets/img/home_content/intro/';
        $config['allowed_types'] = 'jpg|png|jpeg';
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

    public function edit_testi()
    {
        $data['title'] = "Edit Intro";
        $data['siapa'] = $this->session->userdata('nama');
        $data['judul'] = "Gambar yang terupload";
        $data['param'] = "intro";

        $where = array('nama_konten' => "intro");
        $data['intro'] = $this->models->get_selected('home_page', $where)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_edit_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_testi($id)
    {
        $where = array('id_home' => $id);

        $this->models->delete_data($where, 'home_page');
        redirect(base_url('admin/homeAdmin/edit_intro'));
    }

    public function edit_action()
    {
        $data['title'] = "Edit Intro";
        $data['siapa'] = $this->session->userdata('nama');
        $data['judul'] = "Gambar yang terupload";
        $data['param'] = "intro";

        $where = array('nama_konten' => "intro");
        $data['intro'] = $this->models->get_selected('home_page', $where)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_edit_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_action($id)
    {
        $where = array('id_home' => $id);

        $this->models->delete_data($where, 'home_page');
        redirect(base_url('admin/homeAdmin/edit_intro'));
    }

    public function edit_contact()
    {
        $data['title'] = "Edit Intro";
        $data['siapa'] = $this->session->userdata('nama');
        $data['judul'] = "Gambar yang terupload";
        $data['param'] = "intro";

        $where = array('nama_konten' => "intro");
        $data['intro'] = $this->models->get_selected('home_page', $where)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_edit_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_contact($id)
    {
        $where = array('id_home' => $id);

        $this->models->delete_data($where, 'home_page');
        redirect(base_url('admin/homeAdmin/edit_intro'));
    }

    public function view_email()
    {
        $where = array('id_mhs' => '1');
        $data['datauser'] = $this->models->get_selected_join('mhs', 'jurusan' ,$where, 'mhs.id_jurusan = jurusan.id_jurusan')->result();
        $data['laman_login'] = "www.facebook.com";
        $this->load->view('v_email_verifikasi', $data);
    }
}