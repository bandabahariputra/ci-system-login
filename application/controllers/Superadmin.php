<?php

class Superadmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		isLoggedIn();
		$this->load->model('M_admin');
		$this->load->model('M_role');
		$this->load->model('M_menu');
	}

	public function admin()
	{
		$data = [
			'title'			=> 'Menejemen Admin',
			'admin'			=> $this->M_admin->getAdmin($this->session->userdata('username')),
			'allAdmin'	=> $this->M_admin->getAllAdmin(),
			'role'			=> $this->M_role->getAllRole()
		];

		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('role_id', 'role_id', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			viewWrapper('superadmin/menejemen_admin', $data);
		} else {
			$data = [
				'nama'					=> $this->input->post('nama'),
				'username'			=> $this->input->post('username'),
				'password'			=> '1234',
				'gambar'				=> 'default.jpg',
				'role_id'				=> $this->input->post('role_id'),
				'date_created'	=> time()
			];

			$this->M_admin->store($data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success">admin ditambahkan!</div>');
			redirect('superadmin/admin');
		}
	}

	public function adminhapus($id)
	{
		$this->M_admin->delete($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success">admin dihapus!</div>');
		redirect('superadmin/admin');
	}

	public function adminresetpassword($id)
	{
		$this->db->set('password', '1234');
		$this->db->where('id', $id);
		$this->db->update('admin');
		$this->session->set_flashdata('msg', '<div class="alert alert-success">password direset!</div>');
		redirect('superadmin/admin');
	}

	public function role()
	{
		$data = [
			'title'	=> 'Menejemen Role',
			'admin'	=> $this->M_admin->getAdmin($this->session->userdata('username')),
			'role'	=> $this->M_role->getAllRole()
		];

		$this->form_validation->set_rules('role', 'role', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			viewWrapper('superadmin/menejemen_role', $data);
		} else {
			$data = [
				'role' => $this->input->post('role')
			];

			$this->M_role->store($data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success">role ditambahkan!</div>');
			redirect('superadmin/role');
		}
	}

	public function rolehapus($id)
	{
		$this->M_role->delete($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success">role dihapus!</div>');
		redirect('superadmin/role');
	}

	public function aksesmenu($id)
	{
		$this->db->where('id !=', 2);
		$allMenu = $this->db->get('admin_menu')->result_array();

		$data = [
			'title'	=> 'Menejemen Role',
			'admin'	=> $this->M_admin->getAdmin($this->session->userdata('username')),
			'role'	=> $this->M_role->getRole($id),
			'menu'	=> $allMenu
		];

		viewWrapper('superadmin/akses_menu', $data);
	}

	public function ubahakses()
	{
		$menuId = $this->input->post('menuId');
		$roleId = $this->input->post('roleId');

		$data = [
			'role_id' => $roleId,
			'menu_id' => $menuId,
		];

		$result = $this->db->get_where('admin_access_menu', $data);

		if ( $result->num_rows() < 1 ) {
			$this->db->insert('admin_access_menu', $data);
		} else {
			$this->db->delete('admin_access_menu', $data);
		}

		$this->session->set_flashdata('msg', '<div class="alert alert-success">akses diubah!</div>');
	}

}