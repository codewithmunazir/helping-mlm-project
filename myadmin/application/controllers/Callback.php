<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
        $this->load->helper('admi_commonn_helper');
        $this->load->library('form_validation');
        $this->load->model('Admin_model');    
       date_default_timezone_set('Asia/Kolkata');   
    
    }

    public function index() {
        // Get URL parameters
        $payid = $this->input->get('payid');
        $client_id = $this->input->get('client_id');
        $status = $this->input->get('status');

        // Log the data for debugging
        // log_message('info', 'Callback received: PayID=' . $payid . ', ClientID=' . $client_id . ', Status=' . $status);

        // // Process the callback based on status
        // if ($status == 'success') {
        //     echo "Payout successful for PayID: $payid";
        //     // Update your database or take further action for success
        // } elseif ($status == 'failure') {
        //     echo "Payout failed for PayID: $payid";
        //     // Handle the failure case
        // } else {
        //     echo "Unknown status for PayID: $payid";
        // }
    }
}
