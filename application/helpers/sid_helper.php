<?php 

function viewWrapper($view_file, $data) {
	$CI =& get_instance();
	$CI->load->view('_layouts/header', $data);
	$CI->load->view('_layouts/sidebar', $data);
	$CI->load->view('_layouts/topbar', $data);
	$CI->load->view($view_file, $data);
	$CI->load->view('_layouts/footer');
}

function isLoggedIn()
{
	$CI =& get_instance();
	if ( ! $CI->session->userdata('username') ) {
		redirect('/');
	} else {
		$roleId = $CI->session->userdata('role_id');
		$menu = $CI->uri->segment(1);

		$queryMenu = $CI->db->get_where('admin_menu', ['menu' => $menu])->row_array();
		$menuId = $queryMenu['id'];

		$adminAccess = $CI->db->get_where('admin_access_menu', [
			'role_id' => $roleId,
			'menu_id' => $menuId
		]);

		if ( $adminAccess->num_rows() < 1 ) {
			redirect('errors');
		}
	}
}

function checkAccess($role_id, $menu_id)
{
	$CI =& get_instance();
	$CI->db->where('role_id', $role_id);
	$CI->db->where('menu_id', $menu_id);
	$result = $CI->db->get('admin_access_menu');

	if ( $result->num_rows() > 0 ) {
		return "checked";
	}
}