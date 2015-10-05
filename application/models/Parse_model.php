<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parse_model extends CI_Model {

	public function get_raw()
	{
		$query = $this->db->get("raw_tweets");
     	return $query->result();
	}

	public function check_table($tweet_id)
	{
	
		$query = $this->db->where("tweet_id", $tweet_id)
						->get('tweets'); 
		return $query->num_rows() > 0;
	}

	public function insert_tweets($data)
	{
		 $this->db->insert('tweets', $data); 
	}

	public function check_hashtag($tweet_id, $hashtag)
	{
		$query = $this->db->where("tweet_id", $tweet_id)
						->where("tag", $hashtag)
						->get('tweet_tags'); 
		return $query->num_rows() > 0;	
	}

	public function insert_hashtag($data)
	{
		$this->db->insert('tweet_tags', $data); 
	}

	public function delete_raw($id)
	{
		$this->db->where("id", $id)->delete("raw_tweets");
	}

}