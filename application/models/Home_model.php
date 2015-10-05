<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	
	public function get_battle_tag()
	{
		$query = $this->db->get("tags");
		return $query->row();
	}

	public function get_total($tag_name_one, $tag_name_two)
	{
		
		$total_query = $this->db->query("SELECT COUNT(*) as total_tweets FROM `tweet_tags` a JOIN tweets b 
			ON a.tweet_id = b.tweet_id WHERE a.`tag` = N'$tag_name_one' OR a.`tag` = N'$tag_name_two'");
		return $total_query->row();

	}

	public function get_first_tag_count($tag_name_one)
	{
		$query = $this->db->query("SELECT COUNT(a.tweet_id) as first FROM `tweet_tags` a JOIN tweets b 
		ON a.tweet_id = b.tweet_id WHERE  a.`tag` = N'$tag_name_one'");
		return $query->row();
	}

	public function get_second_tag_count($tag_name_two)
	{
		$query = $this->db->query("SELECT COUNT(a.tweet_id) as second FROM `tweet_tags` a JOIN tweets b ON
		a.tweet_id = b.tweet_id WHERE  a.`tag` = N'$tag_name_two'");
		return $query->row();
	}

}