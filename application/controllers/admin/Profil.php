<?php

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		isLoggedIn();
		$this->load->model('M_admin');
	}

	public function index()
	{
		$data = [
			'title'	=> 'Profil',
			'admin'	=> $this->M_admin->getAdmin($this->session->userdata('username'))
		];

		viewWrapper('admin/profil/index', $data);
	}

	public function edit()
	{
		$data = [
			'title'	=> 'Edit Profil',
			'admin'	=> $this->M_admin->getAdmin($this->session->userdata('username'))
		];

		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			viewWrapper('admin/profil/edit', $data);
		} else {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');

			// cek jika ada gambar yang akan diupload
			$uploadImage = $_FILES['gambar']['name'];
			
			if ( $uploadImage ) {
				$config['upload_path']          = './assets/img/profil/';
	      $config['allowed_types']        = 'jpg|png';
	      $config['max_size']             = 2048;

	      $this->load->library('upload', $config);

	      if ( $this->upload->do_upload('gambar') ) {
	      	$gambarLama = $data['admin']['gambar'];
	      	if ( $gambarLama != 'default.jpg' ) {
	      		unlink(FCPATH . 'assets/img/profil/' . $gambarLama);
	      	}

	      	$gambarBaru = $this->upload->data('file_name');
	      	$this->db->set('gambar', $gambarBaru);
	      } else {
	      	echo $this->upload->display_errors();
	      }
			}
			

			$this->db->set('nama', $nama);
			$this->db->set('username', $username);
			$this->db->where('id', $data['admin']['id']);
			$this->db->update('admin');
			$this->session->set_flashdata('msg', '<div class="alert alert-success">profil diubah!</div>');
			redirect('admin/profil');
		}
	}

	public function ubahpassword()
	{
		$data = [
			'title'	=> 'Ubah Password',
			'admin'	=> $this->M_admin->getAdmin($this->session->userdata('username'))
		];

		$this->form_validation->set_rules('password_lama', 'password_lama', 'trim|required');
		$this->form_validation->set_rules('password_baru', 'password_baru', 'trim|required');
		$this->form_validation->set_rules('ulangi_password', 'ulangi_password', 'trim|required|matches[password_baru]');

		if ($this->form_validation->run() == FALSE) {
			viewWrapper('admin/profil/ubah_password', $data);
		} else {
			$passwordLama = $this->input->post('password_lama');
			$passwordBaru = $this->input->post('password_baru');

			if ( $passwordLama != $data['admin']['password'] ) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">password lama salah!</div>');
				redirect('admin/profil/ubahpassword');
			} else {
				$this->db->set('password', $passwordBaru);
				$this->db->where('id', $data['admin']['id']);
				$this->db->update('admin');
				
				$this->session->unset_userdata('username');
		  	$this->session->unset_userdata('role_id');
				$this->session->set_flashdata('msg', '<div class="alert alert-success">password diubah. Silahkan login kembali!</div>');
				redirect('/');
			}
		}
	}

}