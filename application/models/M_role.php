<?php 

class M_role extends CI_Model {

	public function getAllRole()
	{
		return $this->db->get('admin_role')->result_array();
	}

	public function getRole($id)
	{
		return $this->db->get_where('admin_role', ['id' => $id])->row_array();
	}

	public function store($data)
	{
		$this->db->insert('admin_role', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin_role');
	}

}