<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        //load model admin
	        $this->load->model('m_auth');
	    }

	    public function index()
	    {
	        $this->load->view('auth/login');    
	    }

	    public function check_login(){
	    	 //jika session belum terdaftar

            //set form validation
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            //cek validasi
            if ($this->form_validation->run() == TRUE) {

            //get data dari FORM
            $username = $this->input->post("username", TRUE);
            $password = MD5($this->input->post('password', TRUE));

            //checking data via model
            $checking = $this->m_auth->check_login( array('username' => $username), array('password' => $password));

            //jika ditemukan, maka create session
            if ($checking != FALSE) {
                foreach ($checking as $apps) {

                    $session_data = array(
                        'id'   => $apps->id,
                        'username' => $apps->username,
                        'password' => $apps->password,
                    );
                    //set session userdata
                    $this->session->set_userdata($session_data);

                    redirect('transaksi');

                }
            }else{

                $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                $this->load->view('auth/login', $data);
            }
	    }
	}


    public function register()
    {
        $this->load->view('auth/register');

    }

    public function create_action()
    {
        $data = array(
            'nama' => $this->input->post("nama"),
            'username' => $this->input->post("username"),
            'password' => md5($this->input->post("password"))

        );

        $this->m_auth->register_user($data);
        redirect('auth');
    }

    public function logout()
     {
         $this->session->sess_destroy();
         redirect('auth');
     }
}
