<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class magangUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('models');

        $role = $this->session->userdata('role');
        $status = $this->session->userdata('status');

        if ($status != "login") {
            redirect(base_url('homeLogin'));
        } elseif ($role == "0") {
            redirect(base_url('admin/homeAdmin'));
        }
    }

    public function index()
    {
        $data['title'] = 'Pengajuan Magang';
        $data['siapa'] = $this->session->userdata('nama');
        $data['id']    = $this->session->userdata('id');
        $where1 = array('nama_mhs' => $data['siapa']);
        $where2 = array('mhs.id_user' => $data['id']);
        $data['jurusan'] = $this->models->get_data('jurusan')->result();
        $data['mhs'] = $this->models->get_selected_join('users', 'mhs', $where1, 'mhs.id_user = users.id_user')->result();

        $data['jumlah_jenis'] = $this->models->get_3selected_join('form_magang','surat_konfirm','mhs','form_magang.id_form = surat_konfirm.id_form','form_magang.id_mhs = mhs.id_mhs',$where2)->num_rows();
        $data['jenis'] = $this->models->get_3selected_join('form_magang','surat_konfirm','mhs','form_magang.id_form = surat_konfirm.id_form','form_magang.id_mhs = mhs.id_mhs',$where2)->result();


        $table  = 'users';
        $table1 = 'mhs';

        $where = array(
            'users.id_user' => $data['id']
        );
        //$where1 = array('nama_mhs' => $data['siapa']);
        $on = 'mhs.id_user = users.id_user';
        $data['user'] = $this->models->get_selected_join($table,$table1,$where,$on)->result();
        $data['mhs'] = $this->models->get_selected_join('users', 'mhs', $where1, 'mhs.id_user = users.id_user')->result();



        $where5 = array('penerima' =>  $data['id']);
        $where6 = array('status_notif' => '0');

        $data['notif'] = $this->models->get_selected_join_where('notif','users',$where5,$where6,'notif.penerima = users.id_user')->result();

        $this->load->view('header&footer/user/v_headerUser', $data);
        $this->load->view('user/v_formMagangUser',$data);
        $this->load->view('header&footer/user/v_footerUser');
        $this->load->view('user/ajax/ajaxFormMagang');
        $this->load->view('v_modals');
    }

    public function konfirmasi()
    {
        $data['title'] = 'Pengajuan Magang';
        $data['siapa'] = $this->session->userdata('nama');
        $data['id']    = $this->session->userdata('id');

        $where = array('nama_mhs' => $data['siapa']);

        $data['mhs'] = $this->models->get_selected_join('users', 'mhs', $where, 'mhs.id_user = users.id_user')->result();

        $where2 = array(
            'users.id_user' => $data['id']
        );
        $data['status'] = $this->models->get_4selected_join('surat_konfirm','form_magang','mhs','users','surat_konfirm.id_form = form_magang.id_form','form_magang.id_mhs = mhs.id_mhs','mhs.id_user = users.id_user',$where2)->result();

        //var_dump($data['status']);

        $where5 = array('penerima' =>  $data['id']);
        $where6 = array('status_notif' => '0');

        $data['notif'] = $this->models->get_selected_join_where('notif','users',$where5,$where6,'notif.penerima = users.id_user')->result();

        $this->load->view('header&footer/user/v_headerUser', $data);
        $this->load->view('user/v_konfirmasiMagangUser', $data);
        $this->load->view('header&footer/user/v_footerUser');
        $this->load->view('v_modals');
    }

    public function uploadPengajuan()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        if ($this->form_validation->run()==FALSE){
            echo '<script>alert("'.str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())).'");</script>';
            redirect('user/magangUser','refresh');
        }else {
            $data['id'] = $this->session->userdata('id');

            $table = 'users';
            $table1 = 'mhs';

            $where = array(
                'users.id_user' => $data['id']
            );

            $on = 'mhs.id_user = users.id_user';

            $user = $this->models->get_selected_join($table, $table1, $where, $on)->result();

            foreach ($user as $a) {
                $idMhs = $a->id_mhs;
            }
            for ($i = 1; $i <= 5; $i++) {
                $nama[$i] = $this->input->post("nama" . $i);
                $nim[$i] = $this->input->post('nim' . $i);
            }
            $config['upload_path'] = './assets/file/permohonanMagang/';
            $config['allowed_types'] = 'zip|rar';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());

                redirect('user/magangUser', 'refresh');

            } else {
                $data = array(
                    'id_mhs' => $idMhs,
                    'nim_mhs2' => $nim[2],
                    'nim_mhs3' => $nim[3],
                    'nim_mhs4' => $nim[4],
                    'nim_mhs5' => $nim[5],
                    'nama_mhs2' => $nama[2],
                    'nama_mhs3' => $nama[3],
                    'nama_mhs4' => $nama[4],
                    'nama_mhs5' => $nama[5],
                    'tgl_mulai' => $this->input->post("tglMulai"),
                    'tgl_selesai' => $this->input->post('tglAkhir'),
                    'no_surat' => $this->input->post("noSurat"),
                    'tgl_mohon_surat' => $this->input->post('tglSurat'),
                    'file' => $this->upload->data('file_name'),
                    'judul' => $this->input->post('judul'),
                    'jenis' => $this->input->post('jenis'),
                    'tgl_pengajuan_form' => date('y-m-d')
                );

                $where1 = array(
                    'id_mhs' => $idMhs
                );

                $insert = $this->models->add_data('form_magang', $data);
                $select = $this->models->get_selected_limit("form_magang", $where1, 1, 'desc', 'id_form')->result();

                foreach ($select as $a) {
                    $idForm = $a->id_form;
                }

                $data1 = array(
                    'id_form' => $idForm,
                    'id_mhs' => $idMhs,
                    'status' => 'Diproses'
                );
                $this->models->add_data('surat_konfirm', $data1);

                $data2 = array(
                    'id_form' => $idForm,
                );
                $this->models->add_data('nota_dinas', $data2);

                $base = "admin/manageData/permohonan/";
                $data['siapa'] = $this->session->userdata('nama');
                $pesan = $data['siapa'].' Mengajukan Form '.$this->input->post('jenis');

                $data3 = array(
                    'url' => $base,
                    'penerima' => 1,
                    'pesan' => $pesan,
                    'status_notif' =>'0'
                );
                $this->models->add_data('notif', $data3);
                echo "<script>alert('Berhasil ditambahkan'); </script>";
                redirect('user/magangUser', 'refresh');
            }
        }
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

    public function download_uploaded_sp()
    {
        $this->load->helper('file');
        $data = file_get_contents(base_url().'assets/file/suratPernyataan/SuratPernyataanPKL-PLN.pdf');
            $nama_file = 'SuratPernyataanPKL-PLN.pdf';
            ob_clean();
            force_download($nama_file, $data);
    }

    public function update_notif($id){
        $data = array('status_notif' => '1');
        $this->db->where('id_notif',$id)->update('notif',$data);
        $where = array('id_notif' => $id);

        $notif = $this->models->get_selected_join('notif','users',$where,'notif.penerima = users.id_user')->result();

        foreach ($notif as $a) {
            redirect(base_url($a->url));
        }
    }
}
