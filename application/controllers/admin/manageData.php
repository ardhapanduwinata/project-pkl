<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manageData extends CI_Controller {
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
        $data['title'] = "Manage Data";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Dashboard";

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_md_dashboard');
        $this->load->view('header&footer/admin/v_footerManageData');
        $this->load->view('v_modals');
    }

    public function jurusan()
    {
        $data['title'] = "Manage Jurusan";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Jurusan";
        $data['jurusan'] = $this->models->get_data('jurusan')->result();

        $this->load->view('header&footer/admin/v_headerTable_md', $data);
        $this->load->view('admin/v_md_jurusan');
        $this->load->view('header&footer/admin/v_footerTable_md');
        $this->load->view('v_modals');
    }

    public function kamus()
    {
        $data['title'] = "Manage Kamus";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Kampus Divisi";

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_md_kamus');
        $this->load->view('header&footer/admin/v_footerManageData');
        $this->load->view('v_modals');
    }

    public function add_jurusan()
    {
        $jurusan = $this->input->post('jurusan');

        $data = array(
            'jurusan' => $jurusan
        );

        $this->models->add_data('jurusan', $data);
        redirect(base_url('admin/manageData/jurusan'));
    }

    public function edt_jurusan($id)
    {
        $where = array('id_jurusan' => $id);
        $data['title'] = "Edit Jurusan";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Jurusan";
        $data['jurusan'] = $this->models->get_selected('jurusan', $where)->result();

        $this->load->view('header&footer/admin/v_headerTable_md', $data);
        $this->load->view('admin/v_edt_jurusan');
        $this->load->view('header&footer/admin/v_footerTable_md');
        $this->load->view('v_modals');
    }

    public function update_jurusan()
    {
        $id = $this->input->post('id');
        $jurusan = $this->input->post('jurusan');

        $data = array(
            'id_jurusan' => $id,
            'jurusan' => $jurusan
        );

        $where = array('id_jurusan' => $id);

        $this->models->update_data('jurusan', $data, $where);
        redirect(base_url('admin/manageData/jurusan'));
    }

    public function del_jurusan($id)
    {
        $where = array('id_jurusan' => $id);
        $this->models->delete_data($where, 'jurusan');
        redirect(base_url('admin/manageData/jurusan'));
    }

    public function divisi()
    {
        $data['title'] = "Manage Divisi";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Divisi";
        $data['divisi'] = $this->models->get_data('divisi')->result();

        $this->load->view('header&footer/admin/v_headerTable_md', $data);
        $this->load->view('admin/v_md_divisi');
        $this->load->view('header&footer/admin/v_footerTable_md');
        $this->load->view('v_modals');
    }

    public function add_divisi()
    {
        $divisi = $this->input->post('divisi');

        $data = array(
            'divisi' => $divisi
        );

        $this->models->add_data('divisi', $data);
        redirect(base_url('admin/manageData/divisi'));
    }

    public function edt_divisi($id)
    {
        $where = array('id_divisi' => $id);
        $data['title'] = "Edit Divisi";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Divisi";
        $data['divisi'] = $this->models->get_selected('divisi', $where)->result();

        $this->load->view('header&footer/admin/v_headerTable_md', $data);
        $this->load->view('admin/v_edt_divisi');
        $this->load->view('header&footer/admin/v_footerTable_md');
        $this->load->view('v_modals');
    }

    public function update_divisi()
    {
        $id = $this->input->post('id');
        $divisi = $this->input->post('divisi');

        $data = array(
            'id_divisi' => $id,
            'divisi' => $divisi
        );

        $where = array('id_divisi' => $id);

        $this->models->update_data('divisi', $data, $where);
        redirect(base_url('admin/manageData/divisi'));
    }

    public function del_divisi($id)
    {
        $where = array('id_divisi' => $id);
        $this->models->delete_data($where, 'divisi');
        redirect(base_url('admin/manageData/divisi'));
    }
}