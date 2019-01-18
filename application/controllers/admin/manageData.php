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

        $where1 = array('status' => 'Diproses');
        $where2 = array('status' => 'Diterima');
        $where3 = array('status' => 'Ditolak');
        $data['form_masuk'] = $this->models->get_data('form_magang')->result();
        $data['diproses'] = $this->models->get_selected('surat_konfirm', $where1)->result();
        $data['diterima'] = $this->models->get_selected('surat_konfirm', $where2)->result();
        $data['ditolak'] = $this->models->get_selected('surat_konfirm', $where3)->result();

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

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_md_jurusan');
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

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_edt_jurusan');
        $this->load->view('header&footer/admin/v_footerManageData');
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

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_md_divisi');
        $this->load->view('header&footer/admin/v_footerManageData');
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

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_edt_divisi');
        $this->load->view('header&footer/admin/v_footerManageData');
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

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_md_kamus');
        $this->load->view('header&footer/admin/v_footerManageData');
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

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_edt_kamus');
        $this->load->view('header&footer/admin/v_footerManageData');
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
        $data['title'] = "Permohonan Magang";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Permohonan Magang";
        $data['datamagang'] = $this->models->get_5selected_join('form_magang fm', 'mhs m', 'jurusan j', 'nota_dinas nd','surat_konfirm sk', 'fm.id_mhs = m.id_mhs','m.id_jurusan = j.id_jurusan', 'fm.id_form = nd.id_form', 'fm.id_form = sk.id_form')->result();

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_md_permohonan');
        $this->load->view('v_modals');
        $this->load->view('header&footer/admin/v_footerManageData');
        $this->load->view('admin/ajax/ajaxModalDownloadPermohonan');
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
                'tgl_keluar' => date('y-m-d'),
                'perihal' => $data['perihal'],
                'download_nd' => '1'
            );
            $idForm =  $a['id_form'];
            $this->models->update_data('nota_dinas', $data1, $where);
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
        $where = array('fm.id_form' => $id);

        $data['title'] = "Upload Nota Dinas";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Upload Nota Dinas";
        $data['datamagang'] = $this->models->get_6selected_join('form_magang fm', 'mhs m', 'kamus k', 'jurusan j', 'divisi d', 'nota_dinas nd', 'fm.id_mhs = m.id_mhs', 'm.id_jurusan = k.id_jurusan', 'k.id_jurusan = j.id_jurusan', 'k.id_divisi = d.id_divisi', 'fm.id_form = nd.id_form', $where)->result();

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_upload_notadinas');
        $this->load->view('header&footer/admin/v_footerManageData');
        $this->load->view('v_modals');
    }

    public function uploadnd()
    {
        $id = $this->input->post('id');
        $nond = $this->input->post('nond');

        $config['upload_path'] = './assets/file/notaDinas/';
        $config['allowed_types'] = 'pdf|doc|docx|DOC|DOCX';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_nond')) {
            $error = array('error' => $this->upload->display_errors());

            redirect('admin/manageData/view_uploadnd/'.$id, 'refresh');

        } else {
            $data = array(
                'no_nota' => $nond,
                'file_nd' => $this->upload->data('file_name')
            );
            $where = array('id_form' => $id);

            $this->models->update_data('nota_dinas', $data, $where);
        }
        redirect(base_url('admin/manageData/permohonan'));
    }

    public function download_uploaded_nd($id)
    {
        $this->load->helper('file');
        $where = array('id_nota' => $id);
        $datand = $this->models->get_selected('nota_dinas', $where)->result();

        foreach ($datand as $a) {
            $data = file_get_contents(base_url().'assets/file/notaDinas/'.($a->file_nd));
            $nama_file = $a->file_nd;
            ob_clean();
            force_download($nama_file, $data);
        }
    }

    public function change_view_sk()
    {
        $id = $this->input->post('id');
        $value = $this->input->post('btn');

        if($value == 'Diterima'){
            redirect(base_url()."admin/manageData/view_sk_terima/".$id);
        }else if($value == 'Ditolak'){
            redirect(base_url()."admin/manageData/view_sk_tolak/".$id);
        }
    }

    public function view_sk_terima($id)
    {
        $this->load->helper('file');

        $where = array('fm.id_form' => $id);
        $where1 = array('id_form' => $id);
        $data['title'] = "Download Surat Konfirmasi";
        $data['datamagang'] = $this->models->get_6selected_join('form_magang fm', 'mhs m', 'kamus k', 'jurusan j', 'divisi d', 'surat_konfirm sk', 'fm.id_mhs = m.id_mhs', 'm.id_jurusan = k.id_jurusan', 'k.id_jurusan = j.id_jurusan', 'k.id_divisi = d.id_divisi', 'fm.id_form = sk.id_form', $where)->result_array();

        $data['perihal'] = 'Konfirmasi Permohonan Pelaksanaan Magang/Wawancara/Penelitian Mahasiswa';

        $data1 = array(
            'perihal_sk' => $data['perihal'],
            'download_sk' => '1',
            'status' => 'Diterima'
        );
        $this->models->update_data('surat_konfirm', $data1, $where1);

        $this->load->view('admin/v_sk_terima', $data);
    }

    public function view_sk_tolak($id)
    {
        $this->load->helper('file');

        $where = array('fm.id_form' => $id);
        $where1 = array('id_form' => $id);
        $data['title'] = "Download Surat Konfirmasi";
        $data['datamagang'] = $this->models->get_6selected_join('form_magang fm', 'mhs m', 'kamus k', 'jurusan j', 'divisi d', 'surat_konfirm sk', 'fm.id_mhs = m.id_mhs', 'm.id_jurusan = k.id_jurusan', 'k.id_jurusan = j.id_jurusan', 'k.id_divisi = d.id_divisi', 'fm.id_form = sk.id_form', $where)->result_array();

        $data['perihal'] = 'Konfirmasi Permohonan Pelaksanaan Magang/Wawancara/Penelitian Mahasiswa';

        $data1 = array(
            'perihal_sk' => $data['perihal'],
            'download_sk' => '1',
            'status' => 'Ditolak'
        );
        $this->models->update_data('surat_konfirm', $data1, $where1);

        $this->load->view('admin/v_sk_tolak', $data);
    }

    public function view_uploadsk($id)
    {
        $where = array('fm.id_form' => $id);

        $data['title'] = "Upload Surat Konfirm";
        $data['siapa'] = $this->session->userdata('nama');
        $data['page_header'] = "Upload Nota Dinas";
        $data['datamagang'] = $this->models->get_6selected_join('form_magang fm', 'mhs m', 'kamus k', 'jurusan j', 'divisi d', 'surat_konfirm sk', 'fm.id_mhs = m.id_mhs', 'm.id_jurusan = k.id_jurusan', 'k.id_jurusan = j.id_jurusan', 'k.id_divisi = d.id_divisi', 'fm.id_form = sk.id_form', $where)->result();

        $this->load->view('header&footer/admin/v_headerManageData', $data);
        $this->load->view('admin/v_upload_sk');
        $this->load->view('header&footer/admin/v_footerManageData');
        $this->load->view('v_modals');
    }

    public function uploadsk()
    {
        $id = $this->input->post('id');
        $nosk = $this->input->post('nosk');
        $tksk = $this->input->post('tksk');

        $config['upload_path'] = './assets/file/suratKonfirm/';
        $config['allowed_types'] = 'pdf|doc|docx|DOC|DOCX';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_sk')) {
            $error = array('error' => $this->upload->display_errors());
            foreach ($error as $row) {
                echo $row;
            }

            redirect('admin/manageData/view_uploadnd', 'refresh');
        } else {
            $data = array(
                'no_konfirm' => $nosk,
                'tgl_keluar_sk' => $tksk,
                'file_sk' => $this->upload->data('file_name')
            );
            $where = array('id_form' => $id);

            $this->models->update_data('surat_konfirm', $data, $where);
        }
        redirect(base_url('admin/manageData/permohonan'));
    }

    public function download_uploaded_sk($id)
    {
        $this->load->helper('file');
        $where = array('id_srtkonfirm' => $id);
        $datand = $this->models->get_selected('surat_konfirm', $where)->result();

        foreach ($datand as $a) {
            $data = file_get_contents(base_url().'assets/file/suratKonfirm/'.($a->file_sk));
            $nama_file = $a->file_sk;
            ob_clean();
            force_download($nama_file, $data);
        }
    }

    public function chart(){
        $data['chart'] = $this->models->chart();
        var_dump($data['chart']);
    }

    public function updateDivisi($id){
        $data = array(
            'id_kamus' => $this->input->post('divisi')
        );

        $where = array('id_form' => $id);

        $update = $this->models->update_data('form_magang', $data, $where);
            redirect(base_url('admin/manageData/permohonan'));

    }
}