<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payout_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the payout model
        $this->load->model('Payout_model');
    }

    public function make_payout() {
        // Replace these with actual data
        $api_token = '';
        $mobile_number = '9675524853';
        $email = 'codewithmunazir@gmail.com';
        $beneficiary_name = 'MUNAZIR KHAN';
        $ifsc_code = 'PUNB0601000';
        $account_number = '6010001500230352';
        $amount = '10';
        $channel_id = '2';
        $client_id = '12';

        // Send payout using the model
        $response = $this->Payout_model->send_payout($api_token, $mobile_number, $email, $beneficiary_name, $ifsc_code, $account_number, $amount, $channel_id, $client_id);

        // Display the response or handle it according to your needs
        echo '<pre>';
        print_r($response);
        echo '</pre>';
    }
}
