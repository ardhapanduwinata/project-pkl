<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manageData extends CI_Controller {
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

    public function kamus()
    {
        $data['title'] = "Manage Kamus";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Kamus Divisi+Jurusan";
        $data['kamus'] = $this->models->get_3join('kamus', 'jurusan', 'divisi', 'kamus.id_jurusan = jurusan.id_jurusan', 'kamus.id_divisi = divisi.id_divisi')->result();

        $this->load->view('header&footer/admin/v_headerTable_md', $data);
        $this->load->view('admin/v_md_kamus');
        $this->load->view('header&footer/admin/v_footerTable_md');
        $this->load->view('v_modals');
    }

    public function add_kamus()
    {
        $jurusan = $this->input->post('jurusan');
        $divisi = $this->input->post('divisi');

        $data = array(
            'id_jurusan' => $jurusan,
            'id_divisi' => $divisi
        );

        $this->models->add_data('kamus', $data);
        redirect(base_url('admin/manageData/kamus'));
    }

    public function edt_kamus($id)
    {
        $where = array('id_kamus' => $id);
        $data['title'] = "Edit Kamus";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Kamus Divisi+Jurusan";
        $data['kamus'] = $this->models->get_3selected_join('kamus', 'jurusan', 'divisi', 'kamus.id_jurusan = jurusan.id_jurusan', 'kamus.id_divisi = divisi.id_divisi', $where)->result();

        $this->load->view('header&footer/admin/v_headerTable_md', $data);
        $this->load->view('admin/v_edt_kamus');
        $this->load->view('header&footer/admin/v_footerTable_md');
        $this->load->view('v_modals');
    }

    public function update_kamus()
    {
        $id = $this->input->post('id');
        $jurusan = $this->input->post('jurusan');
        $divisi = $this->input->post('divisi');

        $data = array(
            'id_kamus' => $id,
            'id_jurusan' => $jurusan,
            'id_divisi' => $divisi
        );

        $where = array('id_kamus' => $id);

        $this->models->update_data('kamus', $data, $where);
        redirect(base_url('admin/manageData/kamus'));
    }

    public function del_kamus($id)
    {
        $where = array('id_kamus' => $id);
        $this->models->delete_data($where, 'kamus');
        redirect(base_url('admin/manageData/kamus'));
    }

    public function permohonan()
    {
        $data['title'] = "Manage Kamus";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Permohonan Magang";
        $data['datamagang'] = $this->models->get_6join('form_magang', 'mhs', 'kamus', 'jurusan', 'divisi', 'surat_konfirm', 'form_magang.id_mhs = mhs.id_mhs', 'mhs.id_jurusan = kamus.id_jurusan', 'kamus.id_jurusan = jurusan.id_jurusan', 'kamus.id_divisi = divisi.id_divisi', 'form_magang.id_form = surat_konfirm.id_form')->result();

        $this->load->view('header&footer/admin/v_headerTable_md', $data);
        $this->load->view('admin/v_md_permohonan');
        $this->load->view('header&footer/admin/v_footerTable_md');
        $this->load->view('v_modals');
    }

    public function download_dtmhs($id)
    {
        $this->load->helper('file');
        //$this->load->library('zip');
        $where = array('id_form' => $id);
        $datamagang = $this->models->get_selected('form_magang', $where)->result();

        foreach ($datamagang as $a) {
            $data = file_get_contents(base_url().'assets/file/permohonanMagang/'.($a->file));
            $resumePath = base_url().'assets/file/permohonanMagang/'.$a->file;
//            //$files = $a->file;
//            //$this->zip->read_file($resumePath . $files);
            $nama_file = $a->file;
            ob_clean();
            force_download($nama_file, $data);
//            //$this->$this->_push_file($resumePath,$files);
//        }
            //$this->load->helper('file');
        }
    }

    public function view_notadinas($id)
    {
        $this->load->helper('file');

        $where = array('id_form' => $id);
        $data['title'] = "Download Nota Dinas";
        $data['datamagang'] = $this->models->get_5join('form_magang fm', 'mhs m', 'kamus k', 'jurusan j', 'divisi d', 'fm.id_mhs = m.id_mhs', 'm.id_jurusan = k.id_jurusan', 'k.id_jurusan = j.id_jurusan', 'k.id_divisi = d.id_divisi', $where)->result_array();

        $data['perihal'] = 'Permohonan Bantuan Memfasilitasi Pelaksanaan Magang/Wawancara/Penelitian Mahasiswa';
        foreach ($data['datamagang'] as $a){
            $data1 = array(
                'no_nota' => null,
                'tgl_keluar' => date('y-m-d'),
                'id_form' => $a['id_form'],
                'perihal' => $data['perihal']
            );
            $idForm =  $a['id_form'];
        }

        $where2 = array('id_form' => $idForm);
        $cek = $this->models->get_selected('nota_dinas',$where2)->num_rows();

        if($cek==0){
            $this->models->add_data('nota_dinas', $data1);
        }
        $this->load->view('admin/v_nota_dinas', $data);
    }

    public function view_uploadnd($id)
    {
        $where = array('id_form' => $id);

        $data['title'] = "Upload Nota Dinas";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Upload Nota Dinas";
        $data['datamagang'] = $this->models->get_5join('form_magang fm', 'mhs m', 'kamus k', 'jurusan j', 'divisi d', 'fm.id_mhs = m.id_mhs', 'm.id_jurusan = k.id_jurusan', 'k.id_jurusan = j.id_jurusan', 'k.id_divisi = d.id_divisi', $where)->result();

        $this->load->view('header&footer/admin/v_headerTable_md', $data);
        $this->load->view('admin/v_upload_notadinas');
        $this->load->view('header&footer/admin/v_footerTable_md');
        $this->load->view('v_modals');
    }

    public function uploadnd()
    {

    }
}