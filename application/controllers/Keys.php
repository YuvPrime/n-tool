<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keys extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('date');
        $this->load->model('keys_model');
    }


public function action()
    {
    	if (!empty($_POST) && isset($_POST['action'])) {

    		if ($this->input->post('action') == "ADD") {
    			$id = $this->input->post('id');
    			$consumerkey = $this->input->post('consumer_key');
	    		$consumersecret = $this->input->post('consumer_secret');
	    		$oauthkey = $this->input->post('oauth_token');
	    		$oauthsecret = $this->input->post('oauth_secret');

			 	$created = $this->date->get_current_time_and_date();
			 	$this->keys_model->add($created, $consumerkey, $consumersecret, $oauthkey, $oauthsecret);
			 	$this->session->set_flashdata('Success', 'Keys have been added!');
    		}
    		else if ($this->input->post('action') == "UPDATE") {
    			$id = $this->input->post('id');
    			$consumerkey = $this->input->post('consumer_key');
	    		$consumersecret = $this->input->post('consumer_secret');
	    		$oauthkey = $this->input->post('oauth_token');
	    		$oauthsecret = $this->input->post('oauth_secret');

			 	$modified = $this->date->get_current_time_and_date();
			 	$this->keys_model->update($id, $modified, $consumerkey, $consumersecret, $oauthkey, $oauthsecret);
			 	$this->session->set_flashdata('Success', 'Tags have been updated!');

    		}

    		redirect('admin/keys');
    	}
    	else
    	{
    		$this->session->set_flashdata('error', 'Oops..Try again!');
            redirect('admin/tags');

    	}    
    }
}