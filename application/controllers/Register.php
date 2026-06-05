<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register  extends CI_Controller {
	public function __construct()
	{
	  parent::__construct();
	
		$this->load->library('form_validation');
	 $this->load->model('User_model');
//	  $this->load->helper('commonn_helper');

	  date_default_timezone_set('Asia/Kolkata');
	}
	public function index() {
		if($_POST)
		{
			 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('sponsor_id', 'Sponsor ID', 'required|numeric');
        $this->form_validation->set_rules('position', 'Position', 'required|in_list[left,right]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_form');
        }
        else{
        	   $sponsor_id = $this->input->post('sponsor_id');
            $position = $this->input->post('position');

            // Automatically find the next available parent based on the sponsor and desired position
            $parent_id = $this->User_model->find_next_parent($sponsor_id, $position);
            if (!$parent_id) {
                $this->session->set_flashdata('error', 'No available position for the selected sponsor and position.');
                $this->load->view('register_form');
                return;
            }

            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'sponsor_id' => $sponsor_id,
                'parent_id' => $parent_id,
                'position' => $position,
                'level' => $this->User_model->get_user_level($parent_id)
            ];

            if ($this->User_model->register_user($data)) {
                redirect('register');
            } else {
                $this->session->set_flashdata('error', 'Registration failed.');
                $this->load->view('register');
            }
        }
		}else
		{
			$this->load->view('register_form');
		}
        
    }

}
