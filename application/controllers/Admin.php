<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('date');
        $this->load->model('profile_model');
        $this->load->model('login_model');
    }

    public function index()
    {
        if ($this->session->name!="") {
            redirect('admin/dashboard');
        } else {
            $data['title'] = "Welcome - LOGIN";
            $this->load->view('admin/common/header', $data);
            $this->load->view('admin/login');           
        }
    }

    public function authenticate()
    {
        if (!empty($_POST)) {
                $name = $this->input->post('name');
                $password = $this->input->post('password');
                $result = $this->login_model->check($name, $password);
                if ($result === TRUE) {
                    $this->session->set_flashdata('welcome', 'Welcome again ' . $this->session->userdata('name') . ':)');
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Incorrect name or password');
                    redirect('admin');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Oops..Try again!');
                redirect('admin/login');
            }
    }

    public function dashboard()
    {
        $data['title'] = "Welcome - ADMIN DASHBOARD";
        $this->load->view('admin/common/header', $data);
        $this->load->view('admin/common/sidebar');
        $this->load->view('admin/content');
        $this->load->view('admin/common/footer');    
    }

    public function tags()
    {
		$title = "Tags";
		$this->load->model('tags_model');
		$tags = $this->tags_model->get();
		$data = array('title' => $title, 'tags' => $tags->row());
		$this->load->view('admin/common/header', $data);
        $this->load->view('admin/common/sidebar');
        $this->load->view('admin/set-tags');
        $this->load->view('admin/common/footer');		    	
    }

    public function profile()
    {
        $title = "ADMIN - Profile";
        $profile = $this->profile_model->get();
        $data = array('title' => $title, 'profile' => $profile->row());
        $this->load->view('admin/common/header', $data);
        $this->load->view('admin/common/sidebar');
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/common/footer');           
    }

    public function profile_update()
    {
            if (!empty($_POST)) {
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $password = $this->input->post('password');
                $modified = $this->date->get_current_time_and_date();
                $this->profile_model->update($id, $modified, $name, $password);
                $this->session->set_flashdata('Success', 'Profile has been updated successfully!');
                redirect('admin/profile');
            }
            else
            {
                $this->session->set_flashdata('error', 'Oops..Try again!');
                redirect('admin/profile');
            }
    }

    public function keys()
    {

        $title = "ADMIN - Config Keys";
        $this->load->model('keys_model');
        $keys = $this->keys_model->get();
        $data = array('title' => $title, 'keys' => $keys);

        $this->load->view('admin/common/header', $data);
        $this->load->view('admin/common/sidebar');
        $this->load->view('admin/assign-keys', $data);
        $this->load->view('admin/common/footer');  
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }

}