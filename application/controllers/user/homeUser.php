<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeUser extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        ob_start();
        $this->load->model('models');

        $role = $this->session->userdata('role');
        $status = $this->session->userdata('status');

        if($status != "login")
        {
            redirect(base_url('homeLogin'));
        } elseif($role == "0" || $role == "2")
        {
            redirect(base_url('admin/homeAdmin'));
        }
    }

    public function index()
    {
        $data['title'] = 'Home User';
        $data['siapa'] = $this->session->userdata('nama');
        $data['email'] = $this->session->userdata('email');
        $where = array('nama_mhs' => $data['siapa']);
        $data['mhs'] = $this->models->get_selected_join('users', 'mhs', $where, 'mhs.id_user = users.id_user')->result();

        $where_intro = array('nama_konten' => 'intro');
        $data['intro'] = $this->models->get_selected('konten', $where_intro)->result();

        $data['kontak'] = $this->models->get_data('kontak')->result();

        $where_konten = array('nama_konten' => null);
        $data['konten'] = $this->models->get_selected('konten', $where_konten)->result();

        $data['id'] = $this->session->userdata('id');

        $where5 = array('penerima' =>  $data['id']);
        $where6 = array('status_notif' => '0');

        $data['notif'] = $this->models->get_selected_join_where('notif','users',$where5,$where6,'notif.penerima = users.id_user')->result();

        $this->load->view('header&footer/user/v_headerUser', $data);
        $this->load->view('user/v_homeUser');
        $this->load->view('header&footer/user/v_footerUser');
        $this->load->view('v_modals');
    }

    public function biodata()
    {
        $nama = $this->session->userdata('nama');
        $where = array('nama_mhs' => $nama);
        $data['title'] = "Manage Biodata";
        $data['siapa'] = $this->session->userdata('nama');
        $data['id']    = $this->session->userdata('id');
        $data['jurusan'] = $this->models->get_data('jurusan')->result();
        $data['mhs'] = $this->models->get_selected_join('users', 'mhs', $where, 'mhs.id_user = users.id_user')->result();

        $table  = 'users';
        $table1 = 'mhs';

        $where = array(
            'users.id_user' => $data['id']
        );

        $on = 'mhs.id_user = users.id_user';
        $data['user'] = $this->models->get_selected_join($table,$table1,$where,$on)->result();

        $data['id'] = $this->session->userdata('id');

        $where5 = array('penerima' =>  $data['id']);
        $where6 = array('status_notif' => '0');

        $data['notif'] = $this->models->get_selected_join_where('notif','users',$where5,$where6,'notif.penerima = users.id_user')->result();

        $this->load->view('header&footer/user/v_headerUser', $data);
        $this->load->view('user/v_biodataUser',$data);
        $this->load->view('header&footer/user/v_footerUser');
        $this->load->view('v_modals');
    }

    public function biodataPass()
    {
        $data['title'] = "Manage Biodata";
        $data['siapa'] = $this->session->userdata('nama');
        $data['id']    = $this->session->userdata('id');

        $table  = 'users';
        $table1 = 'mhs';

        $where = array(
            'users.id_user' => $data['id']
        );

        $on = 'mhs.id_user = users.id_user';
        $data['user'] = $this->models->get_selected_join($table,$table1,$where,$on)->result();
        $data['mhs'] = $this->models->get_selected_join('users', 'mhs', $where, 'mhs.id_user = users.id_user')->result();

        $data['id'] = $this->session->userdata('id');

        $where5 = array('penerima' =>  $data['id']);
        $where6 = array('status_notif' => '0');

        $data['notif'] = $this->models->get_selected_join_where('notif','users',$where5,$where6,'notif.penerima = users.id_user')->result();

        $this->load->view('header&footer/user/v_headerUser', $data);
        $this->load->view('user/v_biodataPassUser',$data);
        $this->load->view('header&footer/user/v_footerUser');
        $this->load->view('v_modals');
    }

    public function updatePhoto()
    {
        $id = $this->session->userdata('id');

        $where = array(
            'id_user' => $id
        );

        $config['upload_path']='./assets/img/foto_users/';
        $config['allowed_types']='jpg|png|jpeg';
        $config['max_size']=1000000000;
        $config['max_width']=10240;
        $config['max_height']=7680;
        $config['overwrite']=true;


        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('pic')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('user/homeUser/biodata','refresh');

        }else{
            $data = array(
                'foto' => $this->upload->data('file_name')
            );

            $this->models->update_data('users',$data,$where);
                echo "<script>alert('Foto user berhasil diubah'); </script>";
                redirect('user/homeUser/biodata','refresh');
        }
    }

    public function updatePass($idUpdate)
    {
        $id    = $this->session->userdata('id');

        $where = array(
            'id_user' => $id
        );

        if ($idUpdate==1){
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
            if ($this->form_validation->run()==FALSE){
                echo '<script>alert("'.str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())).'");</script>';
                redirect('user/homeUser/biodataPass','refresh');
            }else{
            $data = array(
                'username' => $this->input->post("username")
            );

            $this->models->update_data('users', $data, $where);
            echo "<script>alert('Username berhasil diubah'); </script>";
            redirect('user/homeUser/biodataPass', 'refresh');
            }
        }else{
            $old = $this->input->post('old');
            $new = $this->input->post('password');
            $confirm = $this->input->post('confirm');

            $data = array(
                'password' => md5($this->input->post("password"))
            );
            if(md5($old) == $this->session->userdata('pass')){
                if ($new == $confirm) {
                    $this->models->update_data('users', $data, $where);
                    echo "<script>alert('Password berhasil diubah'); </script>";
                    redirect('user/homeUser/biodataPass', 'refresh');
                    $this->session->set_userdata('pass',$new);
                }else{
                    echo "<script>alert('Password tidak sesuai'); </script>";
                    redirect('user/homeUser/biodataPass', 'refresh');
                }
            }else{
                echo "<script>alert('Password lama yang anda masukan salah'); </script>";
                redirect('user/homeUser/biodataPass', 'refresh');
            }

        }
    }

    public function updateBio()
    {
        $id    = $this->session->userdata('id');

        $data = array(
            'nim' => $this->input->post("nim"),
            'nama_mhs' => $this->input->post("nama"),
            'id_jurusan' => $this->input->post("jurusan"),
            'univ' => $this->input->post("univ"),
            'alamat' => $this->input->post("alamat"),
            'email' => $this->input->post("email")
        );

        $data1 = array(
            'nama_user' => $this->input->post("nama")
        );

        $where = array(
            'id_user' => $id
        );

        $this->models->update_data('mhs',$data,$where);
        $this->models->update_data('users',$data1,$where);
        $this->session->set_userdata('nama',$this->input->post("nama"));
        echo "<script>alert('Profil User berhasil diubah'); </script>";
        redirect('user/homeUser/biodata','refresh');
    }
}
