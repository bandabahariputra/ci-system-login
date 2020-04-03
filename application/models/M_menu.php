<?php 

class M_menu extends CI_Model {

	public function getAllMenu()
	{
		return $this->db->get('admin_menu')->result_array();
	}

	public function store($data)
	{
		$this->db->insert('admin_menu', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin_menu');
	}

}