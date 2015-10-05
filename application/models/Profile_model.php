<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function get()
	{
		return $this->db->where("type", "2")
						->get('users'); 
	}

	public function update($id, $modified, $name, $password)
	{
		$data = array('modified' => $modified , 'name' => $name, 'password' => $password);
		$condition = array('id' => $id);
		$this->db->where($condition)->update('users', $data); 
	}



}