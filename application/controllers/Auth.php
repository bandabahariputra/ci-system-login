<?php

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
	}

  public function index()
  {
  	$data = [
  		'title' => 'Login'
  	];

  	$this->form_validation->set_rules('username', 'username', 'trim|required');
  	$this->form_validation->set_rules('password', 'password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
    	$this->load->view('auth/login', $data);
    } else {
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    	$this->_login($username, $password);
    }
  }

  private function _login($username, $password)
  {
  	$admin = $this->M_admin->getAdmin($username);

  	if ( $admin ) {
  		if ( $admin['password'] == $password ) {
        $data = [
          'username'  => $username,
          'role_id'   => $admin['role_id']
        ];
  			$this->session->set_userdata($data);
  			redirect('admin/dashboard');
  		} else {
  			$this->session->set_flashdata('msg', '<div class="alert alert-danger">password salah!</div>');
	  		redirect('/');
  		}
  	} else {
  		$this->session->set_flashdata('msg', '<div class="alert alert-danger">username tidak ditemukan!</div>');
  		redirect('/');
  	}
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
  	$this->session->unset_userdata('role_id');
  	$this->session->set_flashdata('msg', '<div class="alert alert-success">logout berhasil!</div>');
		redirect('/');
  }

}