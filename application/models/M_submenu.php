<?php 

class M_submenu extends CI_Model {

	public function getAllSubmenu()
	{
		$this->db->select('admin_sub_menu.id as id_submenu, menu_id, title, url, icon, is_active, admin_menu.menu as menu');
		$this->db->from('admin_sub_menu');
		$this->db->join('admin_menu', 'admin_menu.id = admin_sub_menu.menu_id');
		return $this->db->get()->result_array();
	}

	public function getSubmenu($id)
	{
		$this->db->select('admin_sub_menu.id as id_submenu, menu_id, title, url, icon, is_active, admin_menu.menu as menu');
		$this->db->from('admin_sub_menu');
		$this->db->join('admin_menu', 'admin_menu.id = admin_sub_menu.menu_id');
		$this->db->where('admin_sub_menu.id', $id);
		return $this->db->get()->row_array();
	}

	public function store($data)
	{
		$this->db->insert('admin_sub_menu', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('admin_sub_menu', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin_sub_menu');
	}

}