<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeRegister extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('models');
        $this->load->library('email');
    }

	public function index()
	{
        $status = $this->session->userdata('status');

        if ($status != "login") {
            base_url('homeLogin');
        }
        $this->session->sess_destroy();

		$data['title'] = "Home Register";
		//$data['jurusan'] = $this->models->get_data('jurusan')->result();
        $this->load->view('v_homeRegister', $data);

	}

    public function aksi_register()
    {

        $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'is_unique[mhs.email]');
        $this->form_validation->set_message('is_unique', '%s sudah digunakan');
        if ($this->form_validation->run()==FALSE){
            //$data['jurusan'] = $this->models->get_data('jurusan')->result();
            $data['title'] = "Home Register";
            $this->load->view('v_homeRegister',$data);

        }else{

            $data = array(
                'role' => 1,
                'nama_user' => ucwords($this->input->post("nama")),
                'username' => $this->input->post("username"),
                'password' => MD5($this->input->post("password")),
                'foto' => 'default.png'
            );

            $where = array(
                'nama_user' =>$this->input->post("nama")
            );

            $where1 = array(
                'jurusan' =>$this->input->post("jurusan")
            );

            $where2 = array(
                'nama_univ' =>$this->input->post("univ")
            );

            $insert = $this->models->add_data1("users",$data);
            $select = $this->models->get_selected_limit("users",$where,1,'desc','id_user')->result();
            $select1 = $this->models->get_selected("jurusan",$where1)->result();
            $select2 = $this->models->get_selected("univ",$where2)->result();

            if(count($select1)>0){
                foreach($select1 as $a)
                {
                    $id_jurusan = $a->id_jurusan;
                }
            }else{
                $data_jur = array(
                    'jurusan' => ucwords($this->input->post('jurusan'))
                );
                $id_jurusan = $this->models->add_data1("jurusan",$data_jur);
            }

            if(count($select2)==0){
                $data_univ = array(
                    'nama_univ' => ucwords($this->input->post('univ'))
                );
                 $this->models->add_data1("univ",$data_univ);
            }

            foreach($select as $a)
            {
                $idUser = $a->id_user;
            }


            $pecah = explode(',',ucwords($this->input->post("univ")));

            $data1 = array(
                'nim' => $this->input->post("nim"),
                'nama_mhs' => ucwords($this->input->post("nama")),
                'id_jurusan' => $id_jurusan,
                'univ' => $pecah[0],
                'alamat' => $this->input->post("alamat"),
                'email' => $this->input->post("email"),
                'id_user' => $idUser
            );

            $this->models->add_data("mhs",$data1);

            //enkripsi id
            $encrypted_id = md5($insert);

            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "cobaTugas123@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "Coba12345"; // isi dengan password kamu
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($this->input->post("email"));
            $this->email->subject("Verifikasi Akun");
            $this->email->message(
                "terimakasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
                site_url("homeRegister/verification/$encrypted_id")
            );

            if($this->email->send())
            {
                echo "<script>alert('Berhasil melakukan registrasi, silahkan cek email kamu');</script>";

                redirect('homeRegister/success/'.$insert,'refresh');
            }else
            {
                echo "<script>alert('Berhasil melakukan registrasi, namun gagal mengirim verifikasi email');</script>";
                redirect('homeRegister/success/'.$insert,'refresh');
            }
            redirect('homeLogin','refresh');
        }
    }


    public function verification_again($id){
        $data['title'] = "Verifikasi";
        //$data['div'] = 'myTabContent';
        $where = array(
            'users.id_user' => $id,
        );
        //$cek = $this->models->get_selected('mhs', $where)->num_rows();
        $mhs = $this->models->get_selected_join('mhs','users',$where,'mhs.id_user = users.id_user')->result();

        if (count($mhs) == 1) {
            foreach ($mhs as $a) {
                $email = $a->email;
            }

            $encrypted_id = md5($id);

            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "cobaTugas123@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "Coba12345"; // isi dengan password kamu
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("");
            $this->email->subject("Verifikasi Akun");
            $this->email->message(
                "terimakasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
                site_url("homeRegister/verification/$encrypted_id")
            );

            if($this->email->send())
            {
                echo "<script>alert('Berhasil mengirimkan verifikasi,silahkan cek email kamu');</script>";

                redirect('homeRegister/success/'.$id,'refresh');
            }else
            {
                echo "<script>alert('gagal mengirim verifikasi email');</script>";
                redirect('homeRegister/success/'.$id,'refresh');
            }
            redirect('homeLogin','refresh');
        }
    }

    public function success($id){
        $data['title'] = "Verifikasi";
        $data['id'] = $id;
        //$data['div'] = 'myTabContent';
        $this->load->view('v_verifikasi', $data);
    }



    public function verification($key)
    {
        $data = array(
            'aktif' => 'Sudah'
        );

        $where = array(
            'md5(id_user)' => $key
        );

        $this->models->update_data('users',$data, $where);

        $data_user = $this->models->get_selected('users', $where)->result();
        //var_dump($data_user);

        foreach($data_user as $a)
        {
            if($a->aktif == "Sudah"){
                echo "<script>alert('Berhasil melakukan verifikasi email, Anda sudah bisa melakukan login');</script>";
                redirect('homeLogin','refresh');
            } else {
                echo "<script>alert('Gagal melakukan verifikasi email');</script>";
                redirect('homeLogin','refresh');
            }
        }

    }

    public function autocomplete_univ()
    {
        $returnData = array();

        // Get skills data
        $conditions['searchTerm'] = $this->input->get('term');
        $univData = $this->models->getRows($conditions,'univ','nama_univ','id');

        // Generate array
        if(!empty($univData)){
            foreach ($univData as $row){
                $data['id'] = $row['id'];
                $data['value'] = $row['nama_univ'];
                array_push($returnData, $data);
            }
        }
        // Return results as json encoded array
        //var_dump($returnData);
        echo json_encode($returnData);
        die;
    }

    public function autocomplete_jurusan()
    {
        $returnData = array();

        // Get skills data
        $conditions['searchTerm'] = $this->input->get('term');
        $jurData = $this->models->getRows($conditions,'jurusan','jurusan','id_jurusan');

        // Generate array
        if(!empty($jurData)){
            foreach ($jurData as $row){
                $data['id'] = $row['id_jurusan'];
                $data['value'] = $row['jurusan'];
                array_push($returnData, $data);
            }
        }
        // Return results as json encoded array
        //var_dump($returnData);
        echo json_encode($returnData);
        die;
    }

    public function reset(){
        $data['title'] = "Reset Password";
        $data['div'] = 'myTabContent';
        $this->load->view('v_send_reset', $data);
    }

    public function reset_pass(){
        $email = $this->input->post('email');
        $data['div'] = 'myTabContent2';
        $data['title'] = "Reset Password";
        $where = array(
            'email' => $email,
        );
        //$cek = $this->models->get_selected('mhs', $where)->num_rows();
        $mhs = $this->models->get_selected_join('mhs','users',$where,'mhs.id_user = users.id_user')->result();

        if (count($mhs) == 1) {
            foreach ($mhs as $a) {
                $id = $a->id_user;
            }

            $encrypted_id = md5($id);

            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "cobaTugas123@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "Coba12345"; // isi dengan password kamu
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($this->input->post("email"));
            $this->email->subject("Silahkan Reset Password Anda");
            $this->email->message(
                "Kami mendengar bahwa Anda kehilangan kata sandi Anda. Maaf soal itu! Tapi jangan khawatir! Anda dapat menggunakan tautan berikut untuk mengatur ulang kata sandi Anda:<br><br>".
                site_url("homeRegister/reset_pass_user/$encrypted_id")
            );

            if($this->email->send())
            {
                echo "<script>alert('Berhasil mengirim reset password, silahkan cek email kamu');</script>";
                $this->load->view('v_send_reset', $data);
            }else
            {
                echo "<script>alert('Gagal mengirim verifikasi email');</script>";
                $this->load->view('v_send_reset', $data);
            }
            //redirect('homeLogin','refresh');

        } else {
            $data['note'] = "Email Yang anda masukkan belum terdaftar";
            $this->load->view('v_send_reset', $data);
        }
    }

    public function reset_pass_user($key){
        $data['title'] = "Reset Password";
        $data['id'] = $key;

        $where = array(
            'md5(id_user)' => $key
        );

        $data['user'] = $this->models->get_selected('users', $where)->result();
        //var_dump( $data['user']);

        $this->load->view('v_reset_pass', $data);
    }

    public function update_reset_pass($key){
        if($this->input->post('password')==$this->input->post('confirm')){
            $data = array(
                'password' => md5($this->input->post('password'))
            );

            $where = array(
                'md5(id_user)' => $key
            );

            $this->models->update_data('users',$data, $where);

            echo "<script>alert('Berhasil Merubah Password');</script>";

            redirect('homeLogin');
        }else{
            $data['note'] = "Konfirmasi Password dan Password tidak sesuai";
            redirect('homeRegister/reset_pass_user/'.$key);
        }
    }
}

/* End of file homeRegister.php */
/* Location: ./application/controllers/homeRegister.php */