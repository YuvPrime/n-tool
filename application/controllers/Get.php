<?php
defined('BASEPATH') OR exit('No direct script access allowed');



require_once(APPPATH.'third_party/Phirehose.php');
require_once(APPPATH.'third_party/OauthPhirehose.php');


class Get extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('tags_model');
		$this->load->model('tweets_model');
		$this->load->library('session');
	}

	public function getall()
	{

		$tags = $this->tags_model->get();
		$result = $tags->row();
		$first = $result->first_tag;
		$second = $result->second_tag;
		return array($first, $second);
	}

	
}



class Consume extends OauthPhirehose {


	public function enqueueStatus($status) {
		$tweet_object = @json_decode($status);

		if (!(isset($tweet_object->id_str))) { return;}
		
		$tweet_id = $tweet_object->id_str;
		$raw_tweet = base64_encode(serialize($tweet_object));
		echo $tweet_object->text . "\r\n";
		$CI = &get_instance();
		$res = $CI->load->model('tweets_model');
		$CI->tweets_model->save_raw($raw_tweet, $tweet_id);

	}
}


$get_track = new Get();
$list = $get_track->getall();

$CI = &get_instance();
$CI->load->model('keys_model');
$result = $CI->keys_model->get();

define('TWITTER_CONSUMER_KEY',$result->TWITTER_CONSUMER_KEY);
define('TWITTER_CONSUMER_SECRET',$result->TWITTER_CONSUMER_SECRET);
define('OAUTH_TOKEN',$result->OAUTH_TOKEN);
define('OAUTH_SECRET', $result->OAUTH_SECRET);



if (empty($list)) {
	echo "Wrong setting";
}else
{
	$stream = new Consume(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
	$stream->setTrack($list);
	$stream->consume();
}
