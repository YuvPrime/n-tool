<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
    	$this->load->model('home_model');
    	$battle_tags = $this->home_model->get_battle_tag();
    	$data['tag_name_one'] = $battle_tags->first_tag;
    	$data['tag_name_two'] = $battle_tags->second_tag;
		$this->load->view('home/index', $data);        
    }

    public function total()
    {
    	$this->load->model('home_model');
    	$battle_tags = $this->home_model->get_battle_tag();
    	$data['tag_name_one'] = $battle_tags->first_tag;
    	$data['tag_name_two'] = $battle_tags->second_tag;
    	if (isset($_GET)) {
    		$data['total'] = $this->home_model->get_total($data['tag_name_one'], $data['tag_name_two']);
    		$data['first'] = $this->home_model->get_first_tag_count($data['tag_name_one']);
    		$data['second'] = $this->home_model->get_second_tag_count($data['tag_name_two']);
    		echo json_encode($data);
    	}
    }

}



