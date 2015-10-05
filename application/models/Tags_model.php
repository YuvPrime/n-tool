<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags_model extends CI_Model {

	public function add($created, $firsttag, $secondtag)
	{
		$data = array('created' => $created , 'first_tag' => $firsttag, 'second_tag' => $secondtag);
		$this->db->insert('tags', $data); 
	}

	public function get()
	{
		return $this->db->get('tags'); 
	}

	public function update($id, $modified, $firsttag, $secondtag)
	{
		$data = array('modified' => $modified , 'first_tag' => $firsttag, 'second_tag' => $secondtag);
		$condition = array('id' => $id);
		$this->db->where($condition)->update('tags', $data); 
	}

}