<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
      {
        parent::__construct();
        $this->load->helper('admi_commonn_helper.php');
          $this->load->library('form_validation');
        $this->load->model('Main_model');
        date_default_timezone_set('Asia/Kolkata');
      }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	/*
	public function index()
	{
		$this->load->view('index');
	}
		*/
	public function get_diplicate_idss()
  {
     $this->load->model('Admin_model');
     $data['duplicates'] =  $this->Admin_model->get_myrejectlist();
     if($_POST)
     {
      $id=$this->input->post('id');
      $re=$this->Admin_model->delete_duplicate($id);
      if($re)
      {
         $this->session->set_flashdata('msg_success','<strong>Delete </strong>Row successfully.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>');
                $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');  

      }
      else{
         $this->session->set_flashdata('msg_success','<strong>Sorry </strong>Row successfully.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>');
                $this->session->set_flashdata('msg_class','alert alert-warning alert-dismissible fade show');  
      }
       redirect('home/get_diplicate_idss');

     }
      else {
      $this->load->view('Admin/reg_view', $data);    // code...
        }  
        // Load the view and pass the data to it
        
  }
  public function myusermunazirkhan_list()
  {
      $this->load->model('Admin_model');
       $data['users'] = $this->Admin_model->get_users();
        
        // Load the view with user data
        $this->load->view('user_view', $data);
  }
	public function admin_login()
    { 
        if($this->session->userdata('adminid'))
        {
          return redirect('admin');
        }
    $this->load->view('Admin/admin_login');
    }
    public function login_admin()
    {
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('adminid', 'AdminId', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run())
         {

          $adm_Id=$this->input->post('adminid');
          $pass=$this->input->post("password");
          $Adminlogin_id=$this->Main_model->isAdminLogin($adm_Id,$pass);
         // print_r($Adminlogin_id);
              if($Adminlogin_id) 
         {
             
             $this->session->set_userdata('adminid',$Adminlogin_id);
             return redirect('Admin');
 
             //$this->load->view('dashboard');
          }
          else{
             $this->session->set_flashdata('msg_invalid','SORRY ! Invalid Username / Password ');
             $this->session->set_flashdata('msg_class','alert-danger');  
             return redirect('admin-login');
              }
      }
      else{
      

      		$this->load->view('Admin/admin_login');

      }
    }
	
	public function getspornserd()
  {
      $spo_id=$this->input->post('id');
      $userDetails=getUserDetailsByspon_Id($spo_id);
      if(!empty($userDetails))
      {
        $sponserdname=$userDetails->fullname;
        echo $sponserdname;
      }
      else{
        
        echo 0;
      }
  }
 
  

	
}
