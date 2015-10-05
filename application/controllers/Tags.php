<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('date');
        $this->load->model('tags_model');
    }

    public function action()
    {
    	if (!empty($_POST) && isset($_POST['action'])) {

    		if ($this->input->post('action') == "ADD") {
    			$id = $this->input->post('id');
    			$firsttag = $this->input->post('firsttag');
	    		$secondtag = $this->input->post('secondtag');
			 	$created = $this->date->get_current_time_and_date();
			 	$this->tags_model->add($created, $firsttag, $secondtag);
			 	$this->session->set_flashdata('Success', 'Tags have been added!');
    		}
    		else if ($this->input->post('action') == "UPDATE") {
    			$id = $this->input->post('id');
    			$firsttag = $this->input->post('firsttag');
	    		$secondtag = $this->input->post('secondtag');
			 	$modified = $this->date->get_current_time_and_date();
			 	$this->tags_model->update($id, $modified, $firsttag, $secondtag);
			 	$this->session->set_flashdata('Success', 'Tags have been updated!');

    		}

    		redirect('admin/tags');
    	}
    	else
    	{
    		$this->session->set_flashdata('error', 'Oops..Try again!');
            redirect('admin/tags');

    	}    
    }

    public function test()
    {
    }

    

}