<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	
	public function check($name, $password)
	{
		$condition = array('name' => $name, 'password' => $password);
		$result = $this->db->where($condition)->get('users'); 
		if ($result->num_rows() == 1) {
			$this->session->set_userdata('name', $result->row()->name);
			return TRUE;
		} else {
			return FALSE;
		}
	}



}