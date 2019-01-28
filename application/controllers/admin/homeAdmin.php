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
        $data['intro'] = $this->models->get_selected('konten', $where_intro)->result();

        $data['kontak'] = $this->models->get_data('kontak')->result();

        $where_konten = array('nama_konten' => null);
        $data['konten'] = $this->models->get_selected('konten', $where_konten)->result();

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
            $data1 = array(
                'nama_konten' => $nama_konten,
                'gambar_konten' => $this->upload->data('file_name')
            );

            $this->models->add_data('konten', $data1);
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

        $where_intro = array('nama_konten' => 'intro');
        $data['intro'] = $this->models->get_selected('konten', $where_intro)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_edit_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_intro($id)
    {
        $where = array('id_konten' => $id);

        $this->models->delete_data($where, 'konten');
        redirect(base_url('admin/homeAdmin/edit_intro'));
    }

    public function add_konten()
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
                'judul_konten' => $judul,
                'isi_konten' => $isi,
                'gambar_konten' => $this->upload->data('file_name')
            );

            $this->models->add_data('konten', $data);
        }
        echo "<script>alert('Berhasil ditambahkan'); </script>";
        redirect(base_url('admin/homeAdmin'));
    }

    public function edit_konten()
    {
        $data['title'] = "Edit Konten";
        $data['siapa'] = $this->session->userdata('nama');
        $data['judul'] = "Konten yang Terupload";
        $data['param'] = "part2";

        $where_konten = array('nama_konten' => null);
        $data['konten'] = $this->models->get_selected('konten', $where_konten)->result();

        $this->load->view('header&footer/admin/v_headerHome', $data);
        $this->load->view('admin/home/v_edit_homeAdmin', $data);
        $this->load->view('header&footer/admin/v_footerHome');
        $this->load->view('v_modals');
    }

    public function del_konten($id)
    {
        $where = array('id_konten' => $id);

        $this->models->delete_data($where, 'konten');
        redirect(base_url('admin/homeAdmin/edit_konten'));
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

    public function edit_header()
    {
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'header' => $judul,
            'deskripsi' => $deskripsi
        );
        $where = array(
            'id_header' => "2"
        );

        $this->models->update_data('header_home', $data, $where);
        redirect(base_url('admin/homeAdmin/edit_konten'));
    }

    public function edit_kontak()
    {
        $alamat = $this->input->post('alamat');
        $notelp = $this->input->post('notelp');
        $email = $this->input->post('email');

        $data = array(
            'alamat' => $alamat,
            'notelp' => $notelp,
            'email' => $email
        );
        $where = array(
            'id_kontak' => "1"
        );

        $this->models->update_data('kontak', $data, $where);
        redirect(base_url('admin/homeAdmin'));
    }

    public function view_email()
    {
        $where = array('id_mhs' => '1');
        $data['datauser'] = $this->models->get_selected_join('mhs', 'jurusan' ,$where, 'mhs.id_jurusan = jurusan.id_jurusan')->result();
        $data['laman_login'] = "www.facebook.com";
        $this->load->view('v_email_verifikasi', $data);
    }
}