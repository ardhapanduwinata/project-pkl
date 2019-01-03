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

//        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('v_homeRegister');
        }else{
            $data = array(
                'nim' => $this->input->post("nim"),
                'nama_mhs' => $this->input->post("nama"),
                'id_jurusan' => $this->input->post("jurusan"),
                'univ' => $this->input->post("univ"),
                'alamat' => $this->input->post("alamat"),
                'email' => $this->input->post("email"),
            );

            $data1 = array(
                'role' => 1,
                'nama_user' => $this->input->post("nama"),
                'username' => $this->input->post("username"),
                'password' => MD5($this->input->post("password")),
                'foto' => 'default.png'
            );

            $this->models->add_data("mhs",$data);
            $this->models->add_data("users",$data1);

            echo "<script>alert('Successfully Created'); </script>";
            redirect('homeLogin','refresh');
        }
    }

}

/* End of file homeRegister.php */
/* Location: ./application/controllers/homeRegister.php */