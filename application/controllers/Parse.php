<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parse extends CI_Controller {

	

}

$parse_object = new Parse();


while (true) {

	$CI = &get_instance();
	$CI->load->model('parse_model');
	$result = $CI->parse_model->get_raw();




	foreach ($result as $each_tweet) {
		
		$cache_id = $each_tweet->id;				
		$raw_tweet = trim($each_tweet->raw);		
		$tweet_object = unserialize(base64_decode($raw_tweet));
		$tweet_id = $tweet_object->id_str;

		$CI->parse_model->delete_raw($cache_id);

		$check_data = $CI->parse_model->check_table($tweet_id);

	    if ($check_data) {continue;}

	    if (isset($tweet_object->retweeted_status)) {
	    	$entities = $tweet_object->retweeted_status->entities;
	    	$is_rt = 1;
	    } else {
	    	$entities = $tweet_object->entities;
	    	$is_rt = 0;
	    }


    	$tweet_text = $tweet_object->text;	
	    $created_at = $tweet_object->created_at;
	    $created_at = date('Y-m-d H:i:s', strtotime($created_at));

	    if (isset($tweet_object->geo)) {
	      $geo_lat = $tweet_object->geo->coordinates[0];
	      $geo_long = $tweet_object->geo->coordinates[1];
	    } else {
	      $geo_lat = $geo_long = 0;
	    } 
	    $user_object = $tweet_object->user;
	    $user_id = $user_object->id_str;
	    $screen_name = $user_object->screen_name;
	    $name = $user_object->name;
	    $profile_image_url = $user_object->profile_image_url;

		  // Add the new tweet

		$data = array('tweet_id' => $tweet_id, 'tweet_text' => $tweet_text, 'created_at' => $created_at,
						'geo_lat' => $geo_lat, 'geo_long' => $geo_long, 'user_id' => $user_id, 
						'screen_name' => $screen_name, 'name' => $name, 'profile_image_url' => $profile_image_url,
						'is_rt' => $is_rt);

		$CI->parse_model->insert_tweets($data);

		foreach ($entities->hashtags as $hashtag) {

			$hashtag_text = $hashtag->text;
			$check_hashtag = $CI->parse_model->check_hashtag($tweet_id, $hashtag_text);	

			if(! $check_hashtag) {

				$data_hashtag = array('tweet_id' => $tweet_id, 'tag' => $hashtag_text);
				$CI->parse_model->insert_hashtag($data_hashtag);
			}
		}

	}

  sleep(1);

}