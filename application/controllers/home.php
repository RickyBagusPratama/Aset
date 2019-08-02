<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}
	
    public function index() {
        $type = $this->session->userdata('type');
        $login = $this->session->userdata('login');
        if ($login != "") {
            if ($type == 1) {
                redirect('kepalauptb');
            } else if ($type == 4) {
                redirect('petugasaset');
            } else if ($type == 5) {
                redirect('admin');
            } 
        }
        else {
                echo"<script> alert('gagal login'); </script>";
                echo"<meta http-equiv='refresh' content='0; url=http://localhost:8080/yakin/index.php/home/log_out/'>";
            }
       // $this->load->view('home/home');
    }

    function home(){
        $this->load->view('home');
    }
   
	function log_in()
    {   
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // Cek uname sama password
        $this->m_user->check_login($username, $password);
        redirect('home');

    }

    function log_out()
    {
        $data_ambil['login'] = '';
        $data_ambil['username'] ='';
        $data_ambil['type'] ='';
        $this->session->unset_userdata($data_ambil);
        redirect(base_url());
    }
        
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */