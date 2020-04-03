<?php 

class M_admin extends CI_Model {

	public function getAllAdmin()
	{
		$this->db->select('admin.id as id_admin, nama, username, password, gambar, role_id, admin_role.role as role');
		$this->db->from('admin');
		$this->db->join('admin_role', 'admin_role.id = admin.role_id');
		$this->db->where('admin.role_id !=', 1);
		return $this->db->get()->result_array();
	}

	public function getAdmin($username)
	{
		return $this->db->get_where('admin', ['username' => $username])->row_array();
	}

	public function store($data)
	{
		$this->db->insert('admin', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin');
	}

}