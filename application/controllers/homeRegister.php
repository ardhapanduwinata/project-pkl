<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeRegister extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('models');
    }

	public function index()
	{
		$data['title'] = "Home Register";
		$data['jurusan'] = $this->models->get_data('jurusan')->result();
        $this->load->view('v_homeRegister', $data);

	}

    public function aksi_register()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
        if ($this->form_validation->run()==FALSE){
            $data['jurusan'] = $this->models->get_data('jurusan')->result();
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

            $insert = $this->models->add_data1("users",$data);
            $select = $this->models->get_selected_limit("users",$where,1,'desc','id_user')->result();

            foreach($select as $a)
            {
                $idUser = $a->id_user;
            }

            $data1 = array(
                'nim' => $this->input->post("nim"),
                'nama_mhs' => ucwords($this->input->post("nama")),
                'id_jurusan' => $this->input->post("jurusan"),
                'univ' => ucwords($this->input->post("univ")),
                'alamat' => $this->input->post("alamat"),
                'email' => $this->input->post("email"),
                'id_user' => $idUser
            );

            $this->models->add_data("mhs",$data1);


            //enkripsi id
            $encrypted_id = md5($insert);

            $this->load->library('email');
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
                redirect('homeLogin','refresh');
            }else
            {
                echo "<script>alert('Berhasil melakukan registrasi, namun gagal mengirim verifikasi email');</script>";
                redirect('homeLogin','refresh');
            }
            redirect('homeLogin','refresh');
        }
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
        //$returnData = array();

        // Get skills data
        $conditions['searchTerm'] = $this->input->get('term');
        $univData = $this->models->getRows($conditions);

        // Generate array
        if(!empty($univData)){
            foreach ($univData as $row){
                $returnData = array(
                    'nama' => $row['nama_univ']
                );
            }
        }
        // Return results as json encoded array
        echo json_encode($returnData);
        die;
    }
}

/* End of file homeRegister.php */
/* Location: ./application/controllers/homeRegister.php */