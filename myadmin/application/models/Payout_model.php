<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payout_model extends CI_Model {

    public function send_payout($api_token, $mobile_number, $email, $beneficiary_name, $ifsc_code, $account_number, $amount, $channel_id, $client_id) {
        // Initialize cURL
        $curl = curl_init();

        // Set the cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://grappay.com/api/payout/v2/transfer-now',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => array(
                'api_token' => $api_token,
                'mobile_number' => $mobile_number,
                'email' => $email,
                'beneficiary_name' => $beneficiary_name,
                'ifsc_code' => $ifsc_code,
                'account_number' => $account_number,
                'amount' => $amount,
                'channel_id' => $channel_id,
                'client_id' => $client_id
            ),
        ));

        // Execute cURL and get the response
        $response = curl_exec($curl);
        $err = curl_error($curl);

        // Close cURL
        curl_close($curl);

        // Check for errors
        if ($err) {
            // Handle error
            return "cURL Error: " . $err;
        } else {
            // Return the response from the API
            return json_decode($response, true);
        }
    }
}
