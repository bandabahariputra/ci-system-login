<?php

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		isLoggedIn();
		$this->load->model('M_admin');
	}

	public function index()
	{
		$data = [
			'title'	=> 'Dashboard',
			'admin'	=> $this->M_admin->getAdmin($this->session->userdata('username'))
		];

		viewWrapper('admin/dashboard/index', $data);
	}

}