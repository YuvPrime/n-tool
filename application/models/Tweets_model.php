<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tweets_model extends CI_Model {

	
	public function save_raw($raw_tweet, $tweet_id)
	{
		$data = array("tweet_id" => $tweet_id, "raw" => $raw_tweet);
		$this->db->insert('raw_tweets', $data);
	}



}