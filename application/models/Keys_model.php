<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keys_model extends CI_Model {

	
	public function get()
	{
		$query = $this->db->get("keys");
     	return $query->row();
	}

	public function add($created, $consumerkey, $consumersecret, $oauthkey, $oauthsecret)
	{
		$data = array('created' => $created , 'TWITTER_CONSUMER_KEY' => $consumerkey, 'TWITTER_CONSUMER_SECRET' => $consumersecret,
			'OAUTH_TOKEN' => $oauthkey, 'OAUTH_SECRET' => $oauthsecret);
		$this->db->insert('keys', $data); 
	}

	public function update($id, $modified, $consumerkey, $consumersecret, $oauthkey, $oauthsecret)
	{

	$data = array('modified' => $modified , 'TWITTER_CONSUMER_KEY' => $consumerkey, 'TWITTER_CONSUMER_SECRET' => $consumersecret,
			'OAUTH_TOKEN' => $oauthkey, 'OAUTH_SECRET' => $oauthsecret);
		$condition = array('id' => $id);
		$this->db->where($condition)->update('keys', $data); 
	}


}