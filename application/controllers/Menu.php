<?php

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		isLoggedIn();
		$this->load->model('M_admin');
		$this->load->model('M_menu');
		$this->load->model('M_submenu');
	}

	public function index()
	{
		$data = [
			'title'	=> 'Menejemen Menu',
			'admin'	=> $this->M_admin->getAdmin($this->session->userdata('username')),
			'menu'	=> $this->M_menu->getAllMenu()
		];

		$this->form_validation->set_rules('menu', 'menu', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			viewWrapper('menu/index', $data);
		} else {
			$data = [
				'menu' => $this->input->post('menu')
			];

			$this->M_menu->store($data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success">menu ditambahkan!</div>');
			redirect('menu');
		}
	}

	public function hapus($id)
	{
		$this->M_menu->delete($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success">menu dihapus!</div>');
		redirect('menu');
	}

	public function submenu()
	{
		$data = [
			'title'		=> 'Menejemen Submenu',
			'admin'		=> $this->M_admin->getAdmin($this->session->userdata('username')),
			'menu'		=> $this->M_menu->getAllMenu(),
			'submenu'	=> $this->M_submenu->getAllSubmenu()
		];

		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('icon', 'icon', 'trim|required');
		$this->form_validation->set_rules('menu_id', 'menu', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			viewWrapper('menu/submenu', $data);
		} else {
			$data = [
				'menu_id'		=> $this->input->post('menu_id'),
				'title'			=> $this->input->post('title'),
				'url'				=> $this->input->post('url'),
				'icon'			=> $this->input->post('icon'),
				'is_active'	=> 1
			];

			$this->M_submenu->store($data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success">submenu ditambahkan!</div>');
			redirect('menu/submenu');
		}
	}

	public function submenuhapus($id)
	{
		$this->M_submenu->delete($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success">submenu dihapus!</div>');
		redirect('menu/submenu');
	}

	public function submenuedit($id)
	{
		$data = [
			'title'		=> 'Menejemen Submenu',
			'admin'		=> $this->M_admin->getAdmin($this->session->userdata('username')),
			'menu'		=> $this->M_menu->getAllMenu(),
			'submenu'	=> $this->M_submenu->getSubmenu($id)
		];

		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('icon', 'icon', 'trim|required');
		$this->form_validation->set_rules('menu_id', 'menu', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			viewWrapper('menu/submenu_edit', $data);
		} else {
			$data = [
				'menu_id'		=> $this->input->post('menu_id'),
				'title'			=> $this->input->post('title'),
				'url'				=> $this->input->post('url'),
				'icon'			=> $this->input->post('icon'),
				'is_active'	=> 1
			];

			$this->M_submenu->update($id, $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success">submenu diedit!</div>');
			redirect('menu/submenu');
		}
	}

}