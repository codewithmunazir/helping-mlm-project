<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct()
      {
        parent::__construct();
          $this->load->helper('admi_commonn_helper');
           $this->load->helper('file');
            $this->load->library('email');
          $this->load->library('form_validation');
          $this->load->model('Admin_model');
          $this->load->library('session');

          if( ! $this->session->userdata('adminid') )
          {
            return redirect(base_url());
          }
         date_default_timezone_set('Asia/Kolkata');   
      
      }
    

    public function index()
    {
      //0echo "admin home";
      $data=array();
      $data['tittle']="Admin -Dashboard ";
      $data['total_withdrawal']=$this->Admin_model->total_Count_withdrawl();
      $data['ttwitdh_apprved']=$this->Admin_model->tt_approved_widrra();
      $data['total_level_incom']=$this->Admin_model->Tt_level_income();
      $data['total_trade_incom']=$this->Admin_model->Tt_trade_income();
      $data['total_boster_incom']=$this->Admin_model->Tt_booster_income();
      $data['total_direct_incom']=$this->Admin_model->Tt_direct_income();
      $data['total_salary_incom']=$this->Admin_model->Tt_salary_income();
      $data['adds_fund_bonus']=$this->Admin_model->funds_bonus();
      $data['total_total_active']=$this->Admin_model->Tt_active();
      $data['total_inactive']=$this->Admin_model->Tt_inactive();
      $data['total_bussiness']=$this->Admin_model->tt_Bussiness();
      $data['total_request_amt_success']=admin_get_requestsucess_fund();
      //

      $data['total_active_user']=$this->Admin_model->get_valid_user_reg();
      $data['total_fresh_user']=$this->Admin_model->fres_user_f();
      $data['total_bot_actvie_user']=$this->Admin_model->bot_user();
      $data['total_invester_user']=$this->Admin_model->invester_user();
      $data['total_bot_puchage_amt']=$this->Admin_model->get_bot_amt();
      $data['total_investment_amt']=$this->Admin_model->get_investment_amt();
      $data['total_compund_amt']=$this->Admin_model->get_compound_amt();
      $data['total_expire_user']=$this->Admin_model->expire_user();
       $data['bv_matchh']=$this->Admin_model->bvv_matchh();
      $data['royalty_matchhj']=$this->Admin_model->royalty_matchg();
      $data['total_income']=$this->Admin_model->myfund_ttlinc_ome();
      $data['total_income_invest']=$this->Admin_model->myfund_ttli_ncome();
       $data['total_income_bot']=$this->Admin_model->myfund_bot_income();
       $data['user_withdrall_req']=$this->Admin_model->user_wthdral_request_or();

       $data['total_income_daily_invest_roi']=$this->Admin_model->home_daily_roi_sum();
      
      $data['total_income_invest_direct']=$this->Admin_model->home_directin_sum();
      
      $data['total_income_invest_equity']=$this->Admin_model->home_equity_sum();
      

      $data['total_income_invest_level_maintt']=$this->Admin_model->home_level_main_sum();
      
      $data['total_income_Invst_fast']=$this->Admin_model->home_fast_tarck_sum();
      $data['total_income_invest_reward']=$this->Admin_model->home_rewardt_sum();
      $data['total_income_bot_reward']=$this->Admin_model->sum_bv_reward_income();
      $data['total_income_bot_roid']=$this->Admin_model->daily_trade_income();
      $data['total_income_bot_club_in']=$this->Admin_model->bv_royalty_club_income();
      
  

      $this->load->view('Admin/dashboard',$data);
      
    }
    public function know_ip()
    {
      echo 'Server IP Address: ' . $_SERVER['SERVER_ADDR'];
    }

    public function action_Selected()
    {            
       $ids = $this->input->post('ids');
        // Check if any IDs are selected
        if (!empty($ids)) {
         foreach ($ids as $value_id) {
              $id=$value_id;
              $id_req=$value_id;
              $Wital_details_d=withdrawal_requestdetails($value_id);
              $spo_id=$Wital_details_d->registeruser_id;
              $detail_user=getUserDetailsByspon_Id($spo_id); 
              $email_req=$detail_user->email;
              $mobile_req=$detail_user->mobile;
              $bank_detils=is_bankAccount($spo_id);
              $name_req=$bank_detils->acc_holder_name;
              $ifsc_req=$bank_detils->ifsc;
              $account_req=$bank_detils->acc_no;
              $amt_inr=$Wital_details_d->inr_amtt;
              $deduct_inr=$Wital_details_d->inr_deduct_amout;
              $amount_req=($amt_inr-$deduct_inr);
    // Replace with your actual values
              $api_url = 'https://grappay.com/api/payout/v2/transfer-now';
                $data = [
                   // 'api_token' => '',
                    'mobile_number' =>$mobile_req,
                    'email' => $email_req,
                    'beneficiary_name' =>$name_req,
                    'ifsc_code' => $ifsc_req,
                    'account_number' =>$account_req,
                    'amount' => $amount_req,  // Specify the amount
                    'channel_id' => '2',
                    'client_id' => $id_req
                ];

                $ch = curl_init($api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));  // Use http_build_query for form data

                $response = curl_exec($ch);
                
                if (curl_errno($ch)) {
                    echo 'Error: ' . curl_error($ch);
                }
                else {
        $response_data = json_decode($response, true); // Decode the JSON response

        // Check the status
        /*
              if ($response_data['status'] === 'success') {
                  $utr = $response_data['utr'];
                  $payid = $response_data['payid'];

      //

                $id=$response_data['payid'];
                $update_withdra = array(
                'request_status' =>1,
                'action_update'=>date('Y-m-d H:i:s'),
                'comment' =>$utr
                );
                $this->Admin_model->update_withdraw_admi($update_withdra ,$id);
                 $withdrawl_detals=withdrawal_requestdetails($id);
                      $tble_name=$withdrawl_detals->hash_id;
                      $req_userid=$withdrawl_detals->registeruser_id;
                      $req_date=$withdrawl_detals->request_date;
                      $update_wallete= array('wstatus' =>"withdrawal Request success" );
                      $reupdate=$this->Admin_model->update_wallete_add($update_wallete, $req_userid, $req_date, $tble_name);
                  
                //echo "Transaction successful! UTR: $utr, PayID: $payid";
              } else {
                    $msgg=$response_data['message'];
                     $update_withdra = array(
                    'request_status' =>0,
                    'action_update'=>date('Y-m-d H:i:s'),
                    'comment' =>$msgg
                    );
                    $this->Admin_model->update_withdraw_admi($update_withdra ,$id);
                      $withdrawl_detals=withdrawal_requestdetails($id);
                     $tblename=$withdrawl_detals->hash_id;
                          $tedd=$withdrawl_detals->eth_add;
                            $returcredititfrommain = array(
                                                'registeruser_id'=>$withdrawl_detals->registeruser_id, 
                                                'credit'=>$withdrawl_detals->request_amt, 
                                                'wdate'=>date('Y-m-d H:i:s'), 
                                                'wstatus'=>"withdrawal Request Cancel",  
                                                'withdra_method'=>$tedd
                                              );     
                             $this->Admin_model->creditdiffwalleyte($returcredititfrommain ,$tblename);
                         // if($restt)
                         // {
                         //  echo "Transaction failed: " . $response_data['message'];
                         // }
                         // else{
                         //  echo "Transaction failed: note update  " . $response_data['message'];
                         // }
                 //   echo "Transaction failed: " . $response_data['message'];
                  }
                  */
    }

    curl_close($ch);
//last foreach loop 
         }//end forech

redirect('withdrawal-request_admin');
        }else{

    $this->session->set_flashdata('msg_success','<strong>Please select  </strong> any row.');
                     $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
redirect('withdrawal-request_admin');
        }


    }// end function
//     $route['commit_all_link']="Admin/";
// $route['all_commitments_history']="Admin/";
// $route['all_get_help_history']="Admin/";
    public function commitnment_provide_get_links()
    {
         $data=array();
      $data['tittle']="Provide Help link  & Get help link History";
      $this->load->view('Admin/get_all_link_history',$data);
    }
    public function fetch_data_coomit_all_get_provide()
{
    $provider_id = $this->input->post('provider_id');
    $receiver_id = $this->input->post('receiver_id');
    $limit = 20; // Records per page
    $page = $this->input->post('page') ? $this->input->post('page') : 1;
    $offset = ($page - 1) * $limit;

    if (!empty($provider_id)) {
        $this->db->like('p_registeruser_id', $provider_id); // Partial match on provider ID
    }

    if (!empty($receiver_id)) {
        $this->db->like('g_registeruser_id', $receiver_id); // Partial match on receiver ID
    }

    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $offset);

    // Query to fetch the data
    $query = $this->db->get('commitments_tbl_provide_get_help');
    $data['records'] = $query->result_array();

    // Iterate through the fetched records and add full names
    foreach ($data['records'] as &$record) {
        $pregister_id = $record['p_registeruser_id'];
        $gregister_id = $record['g_registeruser_id'];
       
        // Get the full name using the get_username function
        $record['pfullname'] = get_username($pregister_id);
        $record['gfullname'] = get_username($gregister_id);  // Assuming this function exists
    }

    // Get the total number of records for pagination
    $this->db->from('commitments_tbl_provide_get_help');
    if (!empty($provider_id)) {
        $this->db->like('p_registeruser_id', $provider_id); // Partial match on provider ID
    }
    if (!empty($receiver_id)) {
        $this->db->like('g_registeruser_id', $receiver_id); // Partial match on receiver ID
    }
    $data['total_records'] = $this->db->count_all_results();

    // Send the response as JSON
    echo json_encode($data);
}

    public function commitnment_history()
    {
     $data=array();
      $data['tittle']="All Commitement History";
      $this->load->view('Admin/get_all_commitments_history',$data);
    }
    public function fetch_data_coomitement_histry()
{
    $user_id = $this->input->post('user_id');
    $limit = 20; // Records per page
    $page = $this->input->post('page') ? $this->input->post('page') : 1;
    $offset = ($page - 1) * $limit;

    if (!empty($user_id)) {
        $this->db->like('registeruser_id', $user_id); // Use like for partial matching
    }
    
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $offset);

    // Query to fetch the data 
    $query = $this->db->get('commitments');
    $data['records'] = $query->result_array();

    // Iterate through the fetched records and add fullname and get_amout
    foreach ($data['records'] as &$record) {
        $register_id = $record['registeruser_id'];
        $commit_id=$record['commit_id'];
        // Get the fullname using the get_username function
        $record['fullname'] = get_username($register_id);  // Assuming this function exists
        $record['val_growth']=get_growth($register_id);
        // Get the get_amout using the get_take_amout function
        $record['get_amout'] = get_take_amout_comiit($commit_id);  // Assuming this function exists
    }

    // Get the total number of records for pagination
    $this->db->from('commitments');
    if (!empty($user_id)) {
        $this->db->like('registeruser_id', $user_id);
    }
    $data['total_records'] = $this->db->count_all_results();

    // Send the response as JSON
    echo json_encode($data);
}
    
    public function commitnment_widthdral_histty()
    {
     $data=array();
      $data['tittle']="All Get Helps";
      $this->load->view('Admin/get_all_helps_history',$data);
     
    }
    
    public function fetch_data_coomit_widthdral()
{
    $user_id = $this->input->post('user_id');
    $limit = 20; // Records per page
    $page = $this->input->post('page') ? $this->input->post('page') : 1;
    $offset = ($page - 1) * $limit;

    if (!empty($user_id)) {
        $this->db->like('registeruser_id', $user_id); // Use like for partial matching
    }
    
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $offset);

    // Query to fetch the data
    $query = $this->db->get('ax_tbl_request');
    $data['records'] = $query->result_array();

    // Iterate through the fetched records and add fullname and get_amout
    foreach ($data['records'] as &$record) {
        $register_id = $record['registeruser_id'];
         $register_ididid = $record['id'];
        // Get the fullname using the get_username function
        $record['fullname'] = get_username($register_id);  // Assuming this function exists
        
        // Get the get_amout using the get_take_amout function
        $record['get_amout'] = get_take_amoutt($register_ididid);  // Assuming this function exists
    }

    // Get the total number of records for pagination
    $this->db->from('ax_tbl_request');
    if (!empty($user_id)) {
        $this->db->like('registeruser_id', $user_id);
    }
    $data['total_records'] = $this->db->count_all_results();

    // Send the response as JSON
    echo json_encode($data);
}
public function update_comiite_groth()
{
    $data=$this->input->post('id');
   // echo $data;
//echo 'good ->'.$data;
}
public function update_fund_request()
{
     $data=array();
      $data['tittle']="Admin -Fund widhdrawl";
      If($_POST)
        {
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            $this->form_validation->set_rules('username','UserId','trim|required');
            $this->form_validation->set_rules('userid', 'UserId', 'trim|required');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|callback_check_amount');
            if($this->form_validation->run())
              {
                //print_r($this->input->post());
               // Array ( [username] => ssd [userid] => DPD770656 [amount] => 4569 )
                $userid=$this->input->post('userid');
                
                $check_usdt_is=$this->Admin_model->get_usdt_add($userid);
                if ($check_usdt_is != null) {
                        // // Do something if usdt_add exists
                        // echo 'USDT Address: ' . $check_usdt_is;
                    $insert_widhdra=array(
                            'registeruser_id'=>$userid,
                            'request_amt'=>$this->input->post('amount'),
                            'request_date'=>date('Y-m-d H:i:s'), 
                            'isactive'=>1,
                            'request_status'=>2
                        );
                        $inserty=$this->Admin_model->insert_datat_widh_drwal($insert_widhdra);
                         if($inserty)
                             {
                                $this->session->set_flashdata('msg_success','funds transfer successfully');
                                  $this->session->set_flashdata('msg_class','alert-success'); 
                                  redirect('withdrwal-fund-transfer'); 
                             }
                             else{
                               $this->session->set_flashdata('msg_invalid','Sorry funds is not  transfer successfully');
                                  $this->session->set_flashdata('msg_class','alert-danger'); 
                                  redirect('withdrwal-fund-transfer'); 
                              
                            }
                    } else {
                        // Do something if usdt_add is null
                        //echo 'No USDT address found for the given user ID.';
                        // $update_pp = 'update_user_profile/' . $userid; 
                        // redirect($update_pp);
                        $this->session->set_flashdata('msg_invalid','Sorry funds is not transfer successfully !Please Update Bank Details.');
                                  $this->session->set_flashdata('msg_class','alert-danger'); 
                                  redirect('withdrwal-fund-transfer'); 

                    }

              }else{
                // validation
                 $this->load->view('Admin/fundTransfer_widhrwal',$data);
              }
        }else{
        $this->load->view('Admin/fundTransfer_widhrwal',$data);
      }
}
    public function commitnment_fund_request()
    {
        $data=array();
    $data['tittle']="Links P2P";
    $data['fund_provide_all']=$this->Admin_model->getfund_commitments(); 
     $data['fund_help_all']=$this->Admin_model->get_help_width_request(); 
    
       if($_POST)
       {

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
       $this->form_validation->set_rules('link_amt', 'Amount', 'trim|required|integer|greater_than[0]');
        $this->form_validation->set_rules('id_provide[]', 'Selected IDs', 'required', [
        'required' => 'Please select at least one Provided Help id.'   ]);
      $this->form_validation->set_rules('ids[]', 'Selected IDs', 'required', [
        'required' => 'Please select at least one Get Help id.']);
      if($this->form_validation->run())
          {
            $amt=$this->input->post('link_amt');
            $provi=$this->input->post('id_provide');
            $ids = $this->input->post('ids');
            foreach ($provi as $provi_id) {
              $prid=$provi_id;
              $Pro_data = provided_registeruser_id($prid);
              $pro_my_user_id=$Pro_data['registeruser_id'];
              $pro_mycommit=$Pro_data['commit_id'];
              $pro_requ_ammt=$Pro_data['request_amount'];
              $pro_balance=get_provided_balance($pro_my_user_id, $pro_mycommit);
              $reami_probalance=$pro_requ_ammt-$pro_balance; 
                  if($reami_probalance>=$amt)
                  {
                       foreach ($ids as $value_id) {
                        $get_id=$value_id;
                         $get_data = get_registeruser_id($get_id);
                          $get_register_id=$get_data['registeruser_id'];
                          $get_reruest_amt=$get_data['request_amt'];
                          $get_balance=get_get_help_balance($get_register_id, $get_id);
                           $reami_getbalance=$get_reruest_amt-$get_balance;
                           if($reami_getbalance>=$amt)
                           {
                                $current_date = new DateTime();
                            $current_date->modify('+6 hours'); // Adding 6 hours
                            $expire_date = $current_date->format('Y-m-d H:i:s');
                           $insert_link_val=array(
                            'p_registeruser_id'=>$pro_my_user_id,
                             'g_registeruser_id'=>$get_register_id, 
                             'request_amt'=>$amt, 
                             'request_date'=>date('Y-m-d H:i:s'),
                             'request_status'=>2,
                              'status'=>2, 
                              'commitemnt_id'=>$pro_mycommit, 
                              'withdrol_id'=>$get_id,
                              'expire_datetiime'=>$expire_date
                           );
                          
                           $id=$this->Admin_model->link_comitt_value($insert_link_val);
                           $this->send_provider_email($id);
                           $this->get_email_details($id);
                           
                      
                           }else{
                            continue;
                           }
                      }
                  }else{
                    continue;
                  }           
            }  
            $this->session->set_flashdata('msg_success',' Link send  successfully');
                         $this->session->set_flashdata('msg_class','alert-success'); 
            redirect('commitments-send');                     
             //$this->load->view('Admin/commite_fund_requestt',$data);
          }else{
            // unvaldation
            $this->load->view('Admin/commite_fund_requestt',$data); 
          }
        
        
        // Check if any IDs are selected
       // if (!empty($ids))
        //Array ( [link_amt] => 8000 [Mytable_length] => 10 [id_provide] => 1 [Mytable_ty_length] => 10 [ids] => Array ( [0] => 2 [1] => 1 ) )
        
    } else{ 
        $this->load->view('Admin/commite_fund_requestt',$data);
      }
    
    }
    public function fundf_request()
    {
      
    // $data=array();
    // $data['tittle']="Fund Request";
    // $data['fund_request_all']=$this->Admin_model->getfund_req();
      
    //   if($_POST)
    //   {
    //       $request_status=$this->input->post('action');
    //       $remark=$this->input->post('refrence');
    //       $action_update=date('Y-m-d H:i:s');
    //       $id=$this->input->post('id');
    //       $update_fundrequest = array(
    //       'request_status' =>$this->input->post('action'),
    //       'action_update'=>date('Y-m-d H:i:s'),
    //       'remark' =>$this->input->post('refrence')
    //       );
    //       $ressult=$this->Admin_model->update_fundreqst_admi($update_fundrequest ,$id);
    //         $getaction=$ressult['last_action'];
    //         $funddetails_detals=fund_requestdetails($id);
    //           if($getaction==0)
    //           {
                  
    //                 $this->session->set_flashdata('msg_success','<strong> Fund Reject Request </strong> .
    //           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //           </button>');
    //               $this->session->set_flashdata('msg_class','alert alert-warning alert-dismissible fade show');
    //             redirect('fund-request_admin');
    //           }
    //           elseif ($getaction==1) {
    //             date_default_timezone_set('Asia/Kolkata');
    //             $req_userid=$funddetails_detals->registeruser_id;
    //             $req_date=$funddetails_detals->request_date;
    //             $request_amt=$funddetails_detals->request_amt;
    //             if($request_amt>=100)
    //             {
    //               $get_am_ount= 10 / 100 * $request_amt;
    //               $insert_funds_extra = array(
    //                 'registeruser_id' =>$req_userid, 
    //                               'credit' =>$get_am_ount, 
    //                               'wdate' =>date('Y-m-d H:i:s'), 
    //                               'wstatus' =>"Funds Bonus",
    //                               'remark'=>"Admin"
    //                                );
    //                                $this->Admin_model->funt_extra_funds_credit($insert_funds_extra);    
    //             }
    //               //$get_am_ount= 10 / 100 * $request_amt;
    //              // $getamount=$request_amt+$get_am_ount;
                
    //         $cuurntdate=date('Y-m-d H:i:s');
    //         $spo_id=$this->input->post('userid');
    //         $AdminDebit=array(
    //           'registeruser_id'=>$this->session->userdata('adminid'),
    //           'debit'=>$request_amt,
    //           'wdate'=>$cuurntdate, 
    //           'wstatus'=>$req_userid,
    //           'show_for'=>$this->session->userdata('adminid')
    //         );
    //           $debitfund=$this->Admin_model->funtTransDebit($AdminDebit);    
    //             if($debitfund==TRUE)
    //             {
                  
    //               $UserCredit=array(
    //                 'registeruser_id'=>$req_userid,
    //                 'credit'=>$request_amt,
    //                 'wdate'=>$cuurntdate, 
    //                 'wstatus'=>$this->session->userdata('adminid'),
    //                 'show_for'=>$req_userid
                    
    //               );
    //               $creditfund=$this->Admin_model->funtTransCredit($UserCredit);
    //                 if($creditfund)
    //                     {
    //                       $this->session->set_flashdata('msg_success','<strong>Accept Request </strong>Amount debit in your bank shortly.
    //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                   <span aria-hidden="true">&times;</span>
    //                 </button>');
    //                   $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
    //                     }
                  
    //           }
    //          redirect('fund-request_admin');
          
    //   }
    // }
      
    }
    //
    public function transfer_now() {
      /*
           $api_token = 'Q8X1q75Pmk3DpLW45dXa174LGHb0mmQ2eSWwPUwrwovdyyYKt0zV8VKOEKD0';
        $mobile_number = '9675524853';
        $email = 'codewithmunazir@gmail.com';
        $beneficiary_name = 'MUNAZIR KHAN';
        $ifsc_code = 'PUNB0601000';
        $account_number = '6010001500230352';
        $amount = '10';
        $channel_id = '2';
        $client_id = '12';
      */
      $api_url = 'https://grappay.com/api/payout/v2/transfer-now';
      
      // Replace with your actual values
      $data = [
      //    'api_token' => '',
          'mobile_number' => '9675524853',
          'email' => 'codewithmunazir@gmail.com ',
          'beneficiary_name' => 'MUNAZIR KHAN',
          'ifsc_code' => 'PUNB0601000',
          'account_number' => '6010001500230352',
          'amount' => '100',  // Specify the amount
          'channel_id' => '2',
          'client_id' => '111'
      ];
  
      $ch = curl_init($api_url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));  // Use http_build_query for form data
  
      $response = curl_exec($ch);
      if (curl_errno($ch)) {
          echo 'Error: ' . curl_error($ch);
      } else {
          $response_data = json_decode($response, true); // Decode the JSON response
  
          // Check the status
          if ($response_data['status'] === 'success') {
              $utr = $response_data['utr'];
              $payid = $response_data['payid'];
              echo "Transaction successful! UTR: $utr, PayID: $payid";
          } else {
              echo "Transaction failed: " . $response_data['message'];
          }
      }
  
      curl_close($ch);
  }
    public function our_userst()
    {
      $data=array();
      $data['tittle']="Our All Users";
      $data['allUsers']=$this->Admin_model->get_all_Users();
      $this->load->view('Admin/our_all_users',$data);
    }
    public function our_users()
  {
      $data=array();
      $data['tittle']="Our All Users";
      //$data['allUsers']=$this->Admin_model->get_all_Users();
      $this->load->view('Admin/our_all_userss',$data);
  }
public function fetch_data_register_data()
{
    $user_id = $this->input->post('user_id');
    $limit = 20; // Records per page
    $page = $this->input->post('page') ? $this->input->post('page') : 1;
    $offset = ($page - 1) * $limit;

    // Apply search filter if the user_id filter is set
    if (!empty($user_id)) {
        $this->db->group_start(); // Start a group of conditions
        $this->db->like('user_id', $user_id);
        $this->db->or_like('sponserd_id', $user_id);
        $this->db->or_like('fullname', $user_id);
        $this->db->or_like('mobile', $user_id);
        $this->db->or_like('email', $user_id);
        $this->db->or_like('password', $user_id);
        $this->db->or_like('txn_password', $user_id);
        $this->db->group_end(); // End the group of conditions
    }

    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $offset);

    $query = $this->db->get('reg_table');
    $data['records'] = $query->result_array();

    // Fetch custom fields using helper functions
    foreach ($data['records'] as &$record) {
        //$user_id = $record['user_id'];
        $record['send_provider_amount'] = send_provideer_amout($record['user_id']);
        $record['my_commit_requestt'] = my_commite_request($record['user_id']);
        $record['take_amount_committty'] = get_take_amout_comiit($record['user_id']);
        $record['all_getrequest_withdraw'] = all_get_requsstt_widh($record['user_id']);
    }

    // Get the total number of records for pagination
    $this->db->from('reg_table');
    if (!empty($user_id)) {
        $this->db->group_start(); // Start a group of conditions for total count
        $this->db->like('user_id', $user_id);
        $this->db->or_like('sponserd_id', $user_id);
        $this->db->or_like('fullname', $user_id);
        $this->db->or_like('mobile', $user_id);
        $this->db->or_like('email', $user_id);
        $this->db->or_like('password', $user_id);
        $this->db->or_like('txn_password', $user_id);
        $this->db->group_end(); // End the group of conditions
    }
    $data['total_records'] = $this->db->count_all_results();

    echo json_encode($data);
}
    public function get_all_funds_wllete_statment()
    {
      $data=array();
      $data['tittle']="Investment Statement";
      $this->load->view('Admin/all_funds_history',$data);
     
    }
    public function get_all_non_working_wllete_statment()
    {
      $data=array();
      $data['tittle']="All Statement";
      $this->load->view('Admin/all_non_working_funds_history',$data);
    }
    public function get_all_working_wllete_statment()
    {
      $data=array();
      $data['tittle']="All Statement";
      $this->load->view('Admin/all_working_funds_history',$data);
    }
    public function get_all_bv_match_list()
    {
      $data=array();
      $data['tittle']="BV Match User";
      $this->load->view('Admin/all_bv_match_history',$data);
    }
    public function fetch_data_bvv()
    {
       $bv_rank = $this->input->post('bv_rank');
       $limit = 20; // Records per page
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;
         if (!empty($user_id)) {
            $this->db->like('bv_rank', $bv_rank); // Use like for partial matching
        }
         $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get('bv_matching');
        $data['records'] = $query->result_array();
        // Get the total number of records for pagination
        $this->db->from('bv_matching');
        if (!empty($user_id)) {
            $this->db->like('bv_rank', $bv_rank);
        }
        $data['total_records'] = $this->db->count_all_results();

        echo json_encode($data);
    }

    public function fetch_data_working()
    {
      //
       $user_id = $this->input->post('user_id');
        $limit = 20; // Records per page
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;

        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id); // Use like for partial matching
        }
        //$query=$this->db->where('registeruser_id!=','A12B13');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get('direct_wallet');
        $data['records'] = $query->result_array();

        // Get the total number of records for pagination
        $this->db->from('direct_wallet');
        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id);
        }
        $data['total_records'] = $this->db->count_all_results();

        echo json_encode($data);
      //
      
    }
    public function fetch_data_non_working()
    {
      //
       $user_id = $this->input->post('user_id');
        $limit = 20; // Records per page
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;

        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id); // Use like for partial matching
        }
        //$query=$this->db->where('wstatus','withdrawal Request Cancel');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get('ax_tbl_nonworking');
        $data['records'] = $query->result_array();

        // Get the total number of records for pagination
        $this->db->from('ax_tbl_nonworking');
        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id);
        }
        $data['total_records'] = $this->db->count_all_results();

        echo json_encode($data);
      //
      
    }
    public function fetch_data()
    {
      //
       $user_id = $this->input->post('user_id');
        $limit = 20; // Records per page
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;

        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id); // Use like for partial matching
        }
        $query=$this->db->where('registeruser_id!=','A12B13');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get('ax_tbl_wallet_fund');
        $data['records'] = $query->result_array();

        // Get the total number of records for pagination
        $this->db->from('ax_tbl_wallet_fund');
        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id);
        }
        $data['total_records'] = $this->db->count_all_results();

        echo json_encode($data);
      //
      
    }
    public function update_profile($row)
    {
      $data=array();
      $data['tittle']="update User Details";
      $data['for_this_user_id']=$row;
      //if($_POST) {    }
      $this->load->view('Admin/update_profile', $data);
    }
    public function update_inr_qr()
    {
      $data=array();
      $data['tittle']="update User Details";
   
        $this->load->view('Admin/inr_account',$data);

    }
    public function inrQr()
    {
      $config['upload_path']="./upload/";
        $config['allowed_types']='gif|jpg|png|jpeg|pdf';
        $this->load->library('upload',$config);
		    $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
        		$filenamee = $this->upload->data();
       			 $dataqr = array(
                    'InrQR' => $filenamee['file_name'],
                    'Upi_id'=> $this->input->post('Upi_id')
        			); 
              $adm_id= $this->session->userdata('adminid');
		          $rdata=$this->Admin_model->insert_qr_inr($dataqr, $adm_id);

              if($rdata)
              {
                //$res=$rdata;			
                $res = array(
                    'success' => 'true',
                    'success_fully'=>'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Password Change  successfully</strong> !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>',
                      );
              }
			}
			else{
				$res = array(
					'imag_error'=>'true',
					'imgg_error' => $this->upload->display_errors(),
				);
			//$fileerr=$this->upload->display_errors();
		}
    echo json_encode($res);
	}
  
  public function update_usdt_qr()
  {
    $data=array();
    $data['tittle']="Qr Update USDT";
 
      $this->load->view('Admin/usdt_account',$data); 
  }
  public function usdt_Qr()
  {
    
    $config['upload_path']="./upload/";
    $config['allowed_types']='gif|jpg|png|jpeg|pdf';
    $this->load->library('upload',$config);
    $this->load->library('upload',$config);
    if($this->upload->do_upload("file")){
        $filenamee = $this->upload->data();
          $dataqr = array(
                'Usdt_Qr' => $filenamee['file_name'],
                'Usdt_Address'=> $this->input->post('Usdt_Address')
          ); 
          $adm_id= $this->session->userdata('adminid');
          $rdata=$this->Admin_model->insert_qr_inr($dataqr, $adm_id);

          if($rdata)
          {
            //$res=$rdata;			
            $res = array(
                'success' => 'true',
                'success_fully'=>'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Password Change  successfully</strong> !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>',
                  );
          }
  }
  else{
    $res = array(
      'imag_error'=>'true',
      'img_error' => $this->upload->display_errors(),
    );
  //$fileerr=$this->upload->display_errors();
}
echo json_encode($res);

  }//
    function update_profi_bank()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('usdt', 'USDT  BEP 20', 'trim|required');
        // $this->form_validation->set_rules('acc_holder_name', 'Account Holder', 'trim|required');
        // $this->form_validation->set_rules('acc_no', 'Account No', 'trim|required');
        // $this->form_validation->set_rules('confirm_acc_no', 'Confirm Account', 'trim|required|matches[acc_no]');
        // $this->form_validation->set_rules('ifsc', 'IFSC', 'trim|required');
         if($this->form_validation->run())
          {
            $user_id=$this->input->post('user_id');
            $isbankAcc=is_bankAccount($user_id);
            if(!empty($isbankAcc))
            {
               $banck_data_update= array(
                'usdt_add'=>$this->input->post('usdt')
               
               );
             $result=$this->Admin_model->update_bank_profi($user_id, $banck_data_update);
              $re = "Updated";
            }
            else{

             $banck_data_insrt = array(
                 'registeruser_id' =>$user_id, 
                 'p_date' =>date('Y-m-d H:i:s'),  
                 'usdt_add' =>$this->input->post('usdt')
                 
                 );
             $result=$this->Admin_model->add_bank_profi($banck_data_insrt);
            $re = "Inserted";
             
            }

                if($result)
                {
                  $resu = array(
                    'success' => 'true',
                    'success_fully'=>'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong> USDT BEP20 '.$re.' </strong>successfully !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>',
                    
                  );
                }
            
               

          }
          else{
             //  $res="error in validation";
         
            $resu = array(
              'error'   => 'true',
              
              'bank_name_error' => form_error('bank_name'),
              'acc_holder_name_error' => form_error('acc_holder_name'),
              'acc_no_error' => form_error('acc_no'),
              'confirm_acc_no_error' => form_error('confirm_acc_no'),
              'ifsc_error' => form_error('ifsc'),
              'msg_error'=>'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>validation Wrong try again! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>',
            );   

          }

      //$datai=$this->input->post();
      echo json_encode($resu);
  //    ":"State Bank Of India","acc_holder_name":"Testing user","":"123456987987","confirm_acc_no":"","ifsc":"741852"}

}
  //
//     function update_profi_bank()
//     {
//         $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
//         $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
//         $this->form_validation->set_rules('acc_holder_name', 'Account Holder', 'trim|required');
//         $this->form_validation->set_rules('acc_no', 'Account No', 'trim|required');
//         $this->form_validation->set_rules('confirm_acc_no', 'Confirm Account', 'trim|required|matches[acc_no]');
//         $this->form_validation->set_rules('ifsc', 'IFSC', 'trim|required');
//          if($this->form_validation->run())
//           {
//             $user_id=$this->input->post('user_id');
//             $isbankAcc=is_bankAccount($user_id);
//             if(!empty($isbankAcc))
//             {
//               $banck_data_update= array(
//                 'usdt_add'=>$this->input->post('usdt'),
//                  'bank_name' =>$this->input->post('bank_name'), 
//                  'acc_holder_name' =>$this->input->post('acc_holder_name'),
//                  'acc_no' =>$this->input->post('acc_no'),
//                  'ifsc' =>$this->input->post('ifsc')
//               );
//              $result=$this->Admin_model->update_bank_profi($user_id, $banck_data_update);
//               $re = "Updated";
//             }
//             else{

//              $banck_data_insrt = array(
//                  'registeruser_id' =>$user_id, 
//                  'p_date' =>date('Y-m-d H:i:s'),  
//                  'bank_name' =>$this->input->post('bank_name'), 
//                  'acc_holder_name' =>$this->input->post('acc_holder_name'),
//                  'acc_no' =>$this->input->post('acc_no'),
//                  'ifsc' =>$this->input->post('ifsc')
//                  );
//              $result=$this->Admin_model->add_bank_profi($banck_data_insrt);
//             $re = "Inserted";
             
//             }

//                 if($result)
//                 {
//                   $resu = array(
//                     'success' => 'true',
//                     'success_fully'=>'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong> Bank Account '.$re.' </strong>successfully !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>',
                    
//                   );
//                 }
            
               

//           }
//           else{
//              //  $res="error in validation";
         
//             $resu = array(
//               'error'   => 'true',
              
//               'bank_name_error' => form_error('bank_name'),
//               'acc_holder_name_error' => form_error('acc_holder_name'),
//               'acc_no_error' => form_error('acc_no'),
//               'confirm_acc_no_error' => form_error('confirm_acc_no'),
//               'ifsc_error' => form_error('ifsc'),
//               'msg_error'=>'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>validation Wrong try again! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>',
//             );   

//           }

//       //$datai=$this->input->post();
//       echo json_encode($resu);
//   //    ":"State Bank Of India","acc_holder_name":"Testing user","":"123456987987","confirm_acc_no":"","ifsc":"741852"}

//     }
    public function royalty_percent_list()
    {
      $data=array();
      $data['tittle']="Royalty Percent list";
       $data['royal_percent_all']=$this->Admin_model->show_percent_list();
         if ($_POST) {
          $id=$this->input->post('id');
      $percent_d=$this->input->post('perce_nt');

      $update_percentroyal = array(
          'perce_nt' =>$percent_d
          );
          $resslt=$this->Admin_model->update_roaylt_admi($update_percentroyal, $id);
          if($resslt)
          {
            $this->session->set_flashdata('msg_success',' Updated successfully');
                         $this->session->set_flashdata('msg_class','alert-success'); 
             redirect('royalty-list'); 
          }

         }else{
          $this->load->view('Admin/all_percent_list',$data);
         }
      
    }
     public function get_royalti_details()
    {
      $resultt_royalt=get_royalty_perc($this->input->post('id'));
      echo json_encode($resultt_royalt);
    }
    function update_profilrform()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run())
          {
            $user_id=$this->input->post('user_id');
            $updat_proofile = array(
            'email'=>$this->input->post('email'),
            'fullname'=>$this->input->post('fullname'),
            'mobile'=>$this->input->post('mobile'),
            'password'=>$this->input->post('password')
            );
          $resultt=$this->Admin_model->update_profile_user($user_id, $updat_proofile);
              if($resultt==1)
              {
              //  $res="successfully Updated";     
                $res = array(
                    'success' => 'true',
                    'success_fully'=>'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Profile Change  successfully</strong> !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>',
                  );
              }
          }
          else{
            //  $res="error in validation";
         
            $res = array(
              'error'   => 'true',
              
              'email_error' => form_error('email'),
              'fullname_error' => form_error('fullname'),
              'mobile_error' => form_error('mobile'),
              'password_error' => form_error('password'),
              'msg_error'=>'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>please Try again ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>',
            );   

          }
      
      
      
      //print_r($datai);
      echo json_encode($res);
    }
    public function change_passwords()
    {
      $data=array();
      $data['tittle']="change-password";
      if ($_POST) {
        
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('old_password', 'Old  Password', 'trim|required|callback_check_password');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('repassword', 'Re-New password', 'trim|required|matches[password]');
  
        if($this->form_validation->run())
          {
             $sget_admin=get_admin($this->session->userdata('adminid'));
             $id=$sget_admin->id;
              $update_passwordd = array('password' =>$this->input->post('password')); 
              $result=$this->Admin_model->update_admn_passwrd($update_passwordd, $id);
              if ($result==TRUE) {
                 $this->session->set_flashdata('msg_success','Password Updated successfully');
                         $this->session->set_flashdata('msg_class','alert-success'); 
                         redirect('change_password'); 
              }
              else
              {
                $this->session->set_flashdata('msg_invalid','Sorry Password Does not Updated successfully successfully');
                         $this->session->set_flashdata('msg_class','alert-danger'); 
                         redirect('change_password'); 
              }
  
          }
          else
          {
            $this->load->view('Admin/change_password', $data);
          }

      }
      else{
          $this->load->view('Admin/change_password', $data);
      }
    

    }
//    $route['my-mail/(:any)']="Admin/show_page/$1";
    
    public function inbox()
    {
      $data=array();
      $data['tittle']="inbox";
      date_default_timezone_set('Asia/Kolkata');
     $data['inbox_request_all']=$this->Admin_model->inbox(); 
     $this->load->view('Admin/inbox', $data);
    
    }
    public function show_page($row)
    {
      $chat_id=$row;
      $data=array();
      $data['tittle']="reply email";
      $data['get_user_masg']=$this->Admin_model->get_messg($chat_id); 
      $this->load->view('Admin/email_singl_page',$data);
    }
    public function get_singlmsg()
    {
      date_default_timezone_set('Asia/Kolkata');
      $cht_key=bin2hex((random_bytes(5)));
      $reply_data=array(
        'registeruser_id'=>"Admin", 
        'subject'=>$this->input->post('subject'), 
        'description'=>$this->input->post('msg'), 
        'mail_to'=>$this->input->post('msg_id'),  
        'create_date'=>date('Y-m-d H:i:s'), 
        'chat_key'=>$cht_key, 
        'reply_des'=>$this->input->post('message'), 
        'reply_id'=>$this->input->post('user_id')
      );
     $datarely=$this->Admin_model->reply_email_masg($reply_data);
    if($datarely)
     {
      $msg_id=$this->input->post('user_id');
     $udate_dat=array(
      'is_read'=>1
     );
     $hideemail=$this->Admin_model->Isread_email($udate_dat, $msg_id);
     $resultmsg=$hideemail['msg'];
     if($resultmsg)
     {
       redirect('outbox');
     }
     else{
      echo "not hide";
     }
     }
     else{
      echo "worng entry";
     }
     

    }
   public function outbox()
   {
    $data=array();
      $data['tittle']="inbox";
      date_default_timezone_set('Asia/Kolkata');
     $data['out_request_all']=$this->Admin_model->outnbox(); 
     $this->load->view('Admin/outbox', $data);
   }

    public function compose_email()
    {
      $data=array();
      $data['tittle']="compose email";
      date_default_timezone_set('Asia/Kolkata');
      $chtt_key=bin2hex((random_bytes(5)));
      if($_POST)
      {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('username','UserId','trim|required');
        $this->form_validation->set_rules('userid', 'UserId', 'trim|required');
        $this->form_validation->set_rules('subject', 'Message', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if($this->form_validation->run())
          {
            $compose_ema=array(
          'registeruser_id'=>"Admin",
          'subject'=>$this->input->post('subject'),
           'description'=>$this->input->post('message'), 
           'mail_to'=>$this->input->post('userid'),
            'create_date'=>date('Y-m-d H:i:s'),
             'chat_key'=>$chtt_key
            );
          $result=$this->Admin_model->Compose_email_fre($compose_ema);
          if($result)
          {
          $this->session->set_flashdata('msg_success','Mail Sent successfully ');
          $this->session->set_flashdata('msg_class','alert-success  text-white');
           redirect('compose');                                
          }
          else{
          // not top up 
          $this->session->set_flashdata('msg_invalid','Sorry Mail Not sent  ');
          $this->session->set_flashdata('msg_class','alert-danger');
          redirect('compose');   
          }
      }
      else{
        // validation
        $this->load->view('Admin/compose', $data);
      }
      }
      else{
        $this->load->view('Admin/compose', $data);
      }

    }
    public function updteadds_img()
    {
    //  $rtyr=$this->input->post();
      /////////////////////////////////////////////$updatee
     $img_id=$this->input->post('id');
     $visiblity=$this->input->post('visiblity');
     $img_visi=array( 'visiblity'=>$visiblity );
     $result=$this->Admin_model->iamge_visblitychng($img_visi, $img_id);
    redirect('update_adds');
    // echo json_encode($result);
    }
    public function update_adds_f()
    {      
      $data=array();
      $data['tittle']="Update Latest Adds page";
      date_default_timezone_set('Asia/Kolkata');    
        $this->load->view('Admin/update_addimage', $data);
    }
    public function uplode_adds_file()
    {

      $config['upload_path'] = './upload_image/'; // Directory to store uploaded images
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = 2048; // Max size in KB
      
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('userfile')) {
          $upload_data = $this->upload->data();
         // $image_path = $upload_data['file_name'];
          $datadds = array(
            'my_adds_images' => $upload_data['file_name'],
            'create_at'=>date('Y-m-d H:i:s')
      );        
      $rdata=$this->Admin_model->insert_ads_data($datadds);
          if($rdata){
          $this->session->set_flashdata('msg_success','Password Updated successfully');
          $this->session->set_flashdata('msg_class','alert-success'); 
          redirect('update_adds'); 
            }
            else
            {
            $this->session->set_flashdata('msg_invalid','Sorry Password Does not Updated successfully successfully');
                      $this->session->set_flashdata('msg_class','alert-danger'); 
                      redirect('update_adds'); 
            }

      } else {
        $data=array();
        $data['tittle']="Update Latest Adds page";
          $data['error'] = $this->upload->display_errors();
          $this->load->view('Admin/update_addimage', $data);
      }
    }
    public function create_news()
    {
      $data=array();
      $data['tittle']="Create Latest News page";
      date_default_timezone_set('Asia/Kolkata');
      If($_POST)
      {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('news_crete', 'Message', 'trim|required');
        if($this->form_validation->run())
          {
        $insert_news=array(
          'news_crete'=>$this->input->post('news_crete'),
          'create_at'=>date('Y-m-d H:i:s')
        );
        $cretn=$this->Admin_model->insert_news($insert_news);
        if($cretn)
        {
           $this->session->set_flashdata('msg_success','Insert Latest news successfully');
             $this->session->set_flashdata('msg_class','alert-success'); 
             redirect('create_news'); 
        }
        else{
          $this->session->set_flashdata('msg_invalid','Sorry Latest news does Not inserted');
             $this->session->set_flashdata('msg_class','alert-danger'); 
             redirect('create_news'); 
          
        }
      }
      else{
        // validation
        $this->load->view('Admin/create_news', $data);
      }
      }
      else{
        $this->load->view('Admin/create_news', $data);
      }
    }
    public function fundTransfer()
    {
      $data=array();
      $data['tittle']="Admin -Fund Transfer";
      If($_POST)
      {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('username','UserId','trim|required');
        $this->form_validation->set_rules('userid', 'UserId', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|callback_check_amount');
        if($this->form_validation->run())
          {
            
            date_default_timezone_set('Asia/Kolkata');
            $cuurntdate=date('Y-m-d H:i:s');
            $spo_id=$this->input->post('userid');
            $AdminDebit=array(
              'registeruser_id'=>$this->session->userdata('adminid'),
              'debit'=>$this->input->post('amount'),
              'wdate'=>$cuurntdate, 
              'wstatus'=>$spo_id,
              'show_for'=>$this->session->userdata('adminid')
            );
              $debitfund=$this->Admin_model->funtTransDebit($AdminDebit);    
                if($debitfund==TRUE)
                {
                  
                  $UserCredit=array(
                    'registeruser_id'=>$spo_id,
                    'credit'=>$this->input->post('amount'),
                    'wdate'=>$cuurntdate, 
                    'wstatus'=>$this->session->userdata('adminid'),
                    'show_for'=>$spo_id
                    
                  );
                  $creditfund=$this->Admin_model->funtTransCredit($UserCredit);
                    if($creditfund)
                    {
                       $this->session->set_flashdata('msg_success','funds transfer successfully');
                         $this->session->set_flashdata('msg_class','alert-success'); 
                         redirect('fund-transfer'); 
                    }
                    else{
                      $this->session->set_flashdata('msg_invalid','Sorry funds is not transfer transfer successfully');
                         $this->session->set_flashdata('msg_class','alert-danger'); 
                         redirect('fund-transfer'); 
                      
                    }
                      
                      //redirect('Admin');
                }
                else{
                 echo "sorry cant firstly  debit operation error and after that credit reamin";
                }
          
          }
          else{
               $this->load->view('Admin/fundTransfer',$data);
          } 
      }
      else{
        $this->load->view('Admin/fundTransfer',$data);
      }
    }

   public function logout()
   {
    $this->session->unset_userdata('adminid',$Adminlogin_id);
    
    redirect('admin-login');
   }
    public function getspornserd()
    {
        $spo_id=$this->input->post('id');
        $userdata=getUserDetailsByspon_Id($spo_id);
        if($userdata){
          $data=$userdata->fullname;
          echo $data;
        }
        else{
          echo 0;
        }
       
    }
    public function Services_block_unblock()
     {

        $staus_s=$this->input->post('status');
         $servic_name=$this->input->post('service_name');
         if($staus_s==1)
         {
          $now_update=0;
        }
        elseif ($staus_s==0) {
          $now_update=1;
        }
        $update_stt=array('status'=>$now_update);
         $result=$this->Admin_model->change_services($servic_name, $update_stt);
       if($result)
       {
        redirect('Admin');
       }
         
    }
    public function block_unblock()
    {
        $usr_id=$this->input->post('id');
        $userdata=getUserDetailsByspon_Id($this->input->post('id'));
        //$val_is_active=$userdata->isactive;
     // echo $val_is_active;
        //echo $userdata;
        if($userdata->isactive==1)
        {
          $nowupdate=0;
        }
        elseif ($userdata->isactive==0) {
          $nowupdate=1;
        }
         
         $result=$this->Admin_model->change_isactive($usr_id, $nowupdate);
         echo $result;
         exit();
    }
    public function fund_request()
    {
      
    $data=array();
    $data['tittle']="Fund Request";
    $data['fund_request_all']=$this->Admin_model->getfund_req();
      
      if($_POST)
      {
          $request_status=$this->input->post('action');
          $remark=$this->input->post('refrence');
          $action_update=date('Y-m-d H:i:s');
          $id=$this->input->post('id');
          $update_fundrequest = array(
          'request_status' =>$this->input->post('action'),
          'action_update'=>date('Y-m-d H:i:s'),
          'remark' =>$this->input->post('refrence')
          );
          $ressult=$this->Admin_model->update_fundreqst_admi($update_fundrequest ,$id);
            $getaction=$ressult['last_action'];
            $funddetails_detals=fund_requestdetails($id);
              if($getaction==0)
              {
                  
                    $this->session->set_flashdata('msg_success','<strong> Fund Reject Request </strong> .
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>');
                  $this->session->set_flashdata('msg_class','alert alert-warning alert-dismissible fade show');
                redirect('fund-request_admin');
              }
              elseif ($getaction==1) {
                date_default_timezone_set('Asia/Kolkata');
                $req_userid=$funddetails_detals->registeruser_id;
                $req_date=$funddetails_detals->request_date;
                $request_amt=$funddetails_detals->request_amt;
                if($request_amt>=100)
                {
                  $get_am_ount= 10 / 100 * $request_amt;
                  $insert_funds_extra = array(
                    'registeruser_id' =>$req_userid, 
                                  'credit' =>$get_am_ount, 
                                  'wdate' =>date('Y-m-d H:i:s'), 
                                  'wstatus' =>"Funds Bonus",
                                  'remark'=>"Admin"
                                   );
                                   $this->Admin_model->funt_extra_funds_credit($insert_funds_extra);    
                }
                  //$get_am_ount= 10 / 100 * $request_amt;
                 // $getamount=$request_amt+$get_am_ount;
                
            $cuurntdate=date('Y-m-d H:i:s');
            $spo_id=$this->input->post('userid');
            $AdminDebit=array(
              'registeruser_id'=>$this->session->userdata('adminid'),
              'debit'=>$request_amt,
              'wdate'=>$cuurntdate, 
              'wstatus'=>$req_userid,
              'show_for'=>$this->session->userdata('adminid')
            );
              $debitfund=$this->Admin_model->funtTransDebit($AdminDebit);    
                if($debitfund==TRUE)
                {
                  
                  $UserCredit=array(
                    'registeruser_id'=>$req_userid,
                    'credit'=>$request_amt,
                    'wdate'=>$cuurntdate, 
                    'wstatus'=>$this->session->userdata('adminid'),
                    'show_for'=>$req_userid
                    
                  );
                  $creditfund=$this->Admin_model->funtTransCredit($UserCredit);
                    if($creditfund)
                        {
                          $this->session->set_flashdata('msg_success','<strong>Accept Request </strong>Amount debit in your bank shortly.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>');
                      $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
                        }
                  
              }
             redirect('fund-request_admin');
          
      }
    }
      else{ 
        $this->load->view('Admin/fund_request_ad',$data);
      }
    }
    public function fund_request_history()
    {
      $data=array();
    $data['tittle']="Fund Request History";
 
 $data['getfund_request_exicute']=$this->Admin_model->getfunds_requestafter();
      $this->load->view('Admin/fund_request_history_ad',$data); 
    }
    public function fundstransHistory()
    {

     $data=array();
     $data['tittle']="Admin -History-Fund-Transfer";
     $data['fundHistory']= $this->Admin_model->fundTransferHistory();               
     $this->load->view('Admin/funds_tranfer_history',$data);
      //echo "show hare admin transaction history";
    }
    public function topup_admin()
    {
      $data=array();
      $data['tittle']="Admin -Top-Up";
      if($_POST)
      {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('username','UserId','trim|required');
        $this->form_validation->set_rules('userid', 'UserId', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|callback_check_amount');
        if($this->form_validation->run())
        {
               $price=$this->input->post('amount');
               $userId=$this->input->post('userid');
               $topup_admin= array(
                          'registeruser_id'=>$userId, 
                          'topup_amt'=> $price, 
                          'topupdate'=>date('Y-m-d H:i:s'), 
                          'topup_by'=>"admin"
                          );
                        $result=$this->Admin_model->top_up($topup_admin);
                         $top_upId=$result['last_id'];
                          $resultmsg=$result['msg'];
                      //$resultmsg='1';
                          //array('last_id'=> $last_id,'msg'=>'1');
                            if($resultmsg)
                            {                               
                                        $category_id=$this->input->post('userid');
                                        $parents_fetch = $this->Admin_model->get_parents_with_depth($category_id);  
                                          if (!empty($parents_fetch)){
                                               $level_per=array(30,20,20,20,20,20,20,20,20); 
                                               $level_node=array(1,3,9,27,81,343,729,2187,6561);
                                               $count=0;
                                              foreach ($parents_fetch as $parent) 
                                              {
                                                $depthh=$parent['depth'];
                                                //print_r($parent);
                                                $node_id=$parent['user_id'];   
                                                 $target_level=$parent['depth'];
                                                  $nodes = $this->Admin_model->find_nodes_at_level($node_id, $target_level);

                                                    if (!empty($nodes)) {
                                                      $counter=0;
                                                       foreach ($nodes as $nodety) {
                                                        $counter++;
                                                      //print_r($nodety);       
                                                            //echo "Node ID: {$node->id}, Name: {$node->name}<br>";
                                                       }
                                                       $team_member=$counter;
                                                   } 
                                               // $team_member=$this->Admin_model->count_team_members($node_id); 
                                                if($level_node[$depthh]<=$team_member)
                                                {
                                                  $perc=$level_per[$depthh];
                                                  $getamt= getpercent($price , $perc);                                                    
                                                     $level_income_insert_mwallete=array(
                                                                            'registeruser_id'=>$parent['user_id'], 
                                                                            'credit'=>$getamt,  
                                                                            'wdate'=>date('Y-m-d H:i:s'),
                                                                            'wstatus'=>"Level-> ".$depthh." Top-Up -> ".$price, 
                                                                            'user_topup_forleve'=>"admin"
                                                                            );

                                                                            $this->Admin_model->insert_income_wallet($level_income_insert_mwallete);
                                                                            $insertInitialLevel=array(
                                                                                      'user_id'=>$parent['user_id'],
                                                                                      'top_id'=>$top_upId,
                                                                                      'level_id'=>$parent['depth'],
                                                                                      'level_nm'=>$category_id,
                                                                                      'level_income'=>$getamt,
                                                                                      'incomedate'=>date('Y-m-d H:i:s '),
                                                                                      'business'=>$price
                                                                                     
                                                                                    ); 
                                                                           
                                                                $this->Admin_model->generate_level_income($insertInitialLevel); 
                                                                                    
                                                  }
                                                  else{
                                                         break;
                                                      }                                                                                              
                                              }
                                             $this->session->set_flashdata('msg_success','Insert Level Income successfully ');
                                             $this->session->set_flashdata('msg_class','alert-success  text-white');
                                              redirect('top-up-byadmin');                                
                                           }
                                                                       
                          }
                  else{
                    // not top up 
                    $this->session->set_flashdata('msg_invalid','Sorry ! not top up  ');
                    $this->session->set_flashdata('msg_class','alert-danger');
                    $this->load->view('User/top_up',$data);
                  }                
          
        } 
        else{
          //valdation+
          $this->load->view('Admin/top_up',$data);
        }
          
    }
      else
      {
        $this->load->view('Admin/top_up', $data);
      }
    }
    public function topup_history_admin()
    {
      $data=array();
      $data['tittle']="Top-Up History";
      $data['gettopup']=$this->Admin_model->gettopup();
      $this->load->view('Admin/topuphistory',$data);
    }
    public function level_income_alluser()
    {
      $data=array();
      $data['tittle']="Level - Income ";
      $data['levelincome']=$this->Admin_model->getlevelincome();
      $this->load->view('Admin/level_income',$data);
    }
// start
// public function trade_income_fund_request_history()
// {
//   $data=array();
//   $data['tittle']="DAILY GROWTH";
//   $data['roi_history']=$this->Admin_model->get_roi_history();
//   $this->load->view('Admin/trade_income',$data);
// }
    public function trade_income_fund_request_history()
{
  $data=array();
  $data['tittle']="DAILY GROWTH";
  //$data['roi_history']=$this->Admin_model->get_roi_history(); ('wstatus', 'Daily Growth');
  $this->load->view('Admin/trade_income',$data);
}
//
    public function fetch_data_dailygrowth()
    {
      //
       $user_id = $this->input->post('user_id');
        $limit = 20; // Records per page
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;

        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id); // Use like for partial matching
        }
        $query=$this->db->where('wstatus','Daily Growth');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get('ax_tbl_nonworking');
        $data['records'] = $query->result_array();

        // Get the total number of records for pagination
        $this->db->from('ax_tbl_nonworking');
        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id);
        }
        $data['total_records'] = $this->db->count_all_results();

        echo json_encode($data);
      //
      
    }
public function get_send_royalty_done_list() 
{
  
    $data=array();
   $data['tittle']="Details Royalty -Send";
   $data['royalthistory']=$this->Admin_model->royadetaisils_send_history();
   $this->load->view('Admin/admin_royalty_send_history', $data);
}
public function get_bv_royalty_list()
{
     $data=array();
     $data['tittle']="Royalty Club Member";
     $data['royalty_club_member']=$this->Admin_model->get_highest_rank_rows();
     $this->load->view('Admin/get_royltyclub_member_history', $data);
}

public function get_bv_trade_account_list()
{
  $data=array();
  $data['tittle']="trade bot  - Income ";
  $data['boy_trade_acc_history']=$this->Admin_model->botget_myTrade_acc_history();
  $this->load->view('Admin/bot_trade_income_acc',$data);
}
public function get_bv_daily_trade_list()
{
  $data=array();
  $data['tittle']="bot trade daily - Income ";
  $data['boy_dailytrade_acc_history']=$this->Admin_model->botget_trade_daily_history();
  $this->load->view('Admin/bot_daily_trade_income',$data);
}
public function get_bot_reward_list()
{
  $data=array();
  $data['tittle']="bot reward daily - Income ";
  $data['bot_reward_income_history']=$this->Admin_model->Bot_get_bot_reward_list();
  $this->load->view('Admin/bot_d_reward_income',$data);
}
public function get_bv_clublelevl_list()
{
  $data=array();
  $data['tittle']="bot trade daily - Income ";
  $data['bot_club_income_history']=$this->Admin_model->Bot_get_bot_reward_history();
  $this->load->view('Admin/bot_club_income_history',$data);
}
//
//  public function equity_plus_income_fund_request_history()
// {
//   $data=array();
//   $data['tittle']="Level - Income ";
//   $data['booster_history']=$this->Admin_model->get_my_equity_history();
//   $this->load->view('Admin/booster_income',$data);
// }
 public function equity_plus_income_fund_request_history()
{
  $data=array();
  $data['tittle']="Level - Income ";
//  $data['booster_history']=$this->Admin_model->get_my_equity_history();
  $this->load->view('Admin/booster_income',$data);
}
 public function fetch_data_level_incme()
    {
      //
       $user_id = $this->input->post('user_id');
        $limit = 20; // Records per page
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;

        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id); // Use like for partial matching
        }
        $query=$this->db->where('wstatus','Level Income');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get('ax_tbl_nonworking');
        $data['records'] = $query->result_array();

        // Get the total number of records for pagination
        $this->db->from('ax_tbl_nonworking');
        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id);
        }
        $data['total_records'] = $this->db->count_all_results();

        echo json_encode($data);
      //
      
    }
public function  direct_income_fund_request_history()
{
  $data=array();
  $data['tittle']="Direct - Income ";
  //$data['direct_history']=$this->Admin_model->get_myrdirect_history();
  $this->load->view('Admin/direct_income',$data);
}
public function fetch_data_direct_incme()
    {
      //
       $user_id = $this->input->post('user_id');
        $limit = 20; // Records per page
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;

        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id); // Use like for partial matching
        }
        $query=$this->db->where('wstatus','Direct Income');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get('ax_tbl_nonworking');
        $data['records'] = $query->result_array();

        // Get the total number of records for pagination
        $this->db->from('ax_tbl_nonworking');
        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id);
        }
        $data['total_records'] = $this->db->count_all_results();

        echo json_encode($data);
      //
      
    }
public function  level_maintain_income_fund_request_history()
{
  $data=array();
  $data['tittle']="Level Maintain - Income ";
  $data['level_history']=$this->Admin_model->get_maintain_level_history();
  $this->load->view('Admin/level_income_w',$data);
}
// public function activation_reward_income_fund_request_history()
// {
//   $data=array();
//   $data['tittle']=" Reward - Income ";
//   $data['salaryincome']=$this->Admin_model->get_my_activation_allary_history();
//   $this->load->view('Admin/reward_active_income',$data);
// }
 public function activation_reward_income_fund_request_history()
{
  $data=array();
  $data['tittle']=" Reward - Income ";
 // $data['salaryincome']=$this->Admin_model->get_my_activation_allary_history();//Reward Income
  $this->load->view('Admin/reward_active_income',$data);
}
public function fetch_data_reward_incme()
    {
      //
       $user_id = $this->input->post('user_id');
        $limit = 20; // Records per page
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $offset = ($page - 1) * $limit;

        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id); // Use like for partial matching
        }
        $query=$this->db->where('wstatus','Reward Income');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get('ax_tbl_nonworking');
        $data['records'] = $query->result_array();

        // Get the total number of records for pagination
        $this->db->from('ax_tbl_nonworking');
        if (!empty($user_id)) {
            $this->db->like('registeruser_id', $user_id);
        }
        $data['total_records'] = $this->db->count_all_results();

        echo json_encode($data);
      //
      
    }
public function fast_track_income_fund_request_history()
{
  $data=array();
  $data['tittle']="Fast Track - Incomes ";
  $data['fast_track_bonus']=$this->Admin_model->get_my_fasttrack_history();
  $this->load->view('Admin/fast_active_track_income',$data);
}
//stop
    public function withdrawal_history()
    {
      $data=array();
      $data['tittle']="Withdrawal Request History";
      $data['withdrawal_exicute']=$this->Admin_model->getwithdrawal_afteraction();
      $this->load->view('Admin/withdrawal_action_list',$data);
    }
    public function getwidthrequet_detilsd()
    {
      $result_request=withdrawal_requestdetails($this->input->post('id'));
      echo json_encode($result_request);
    }
    public function getbank_details_requesrt_user()
    {
      
      $result_request=withdrawal_requestdetails($this->input->post('id'));
      $isbankAcc=is_bankAccount($result_request->registeruser_id);
       
            echo json_encode($isbankAcc);
    }
    public function increase_user()
    {
      $data=array();
      $data['tittle']="Auto Global Team - Request List";
      if($_POST)
      {
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('username','UserId','trim|required');
        $this->form_validation->set_rules('userid', 'UserId', 'trim|required');
        $this->form_validation->set_rules('user_increase', 'Amount', 'trim|required|callback_check_amount');
        if($this->form_validation->run())
          {
            $user_id=$this->input->post('userid');
            $get_data_global=getglobal_user_fun($user_id);
            if(!empty($get_data_global))
            {
              $update_user = array(
                'no_of_user' =>$this->input->post('user_increase') 
               );
              $this->Admin_model->update_global_d($update_user, $user_id);
              

            }
            else{
              $insert_global=array(
                'registeruser_id'=>$user_id,
                'no_of_user'=>$this->input->post('user_increase')
              );
              $this->Admin_model->insert_global_d($insert_global);
              
            }
             $this->session->set_flashdata('msg_success','Change successfully');
                         $this->session->set_flashdata('msg_class','alert-success'); 
                         redirect('fund-transfer'); 
            
          }
          else{
            $this->load->view('Admin/auto_global_team',$data); 
          }
       
      }
      else{
        $this->load->view('Admin/auto_global_team',$data);
      }
    }
    public function withdrawal_request()
    {
      $data=array();
      $data['tittle']="Withdrawal - Request List";
     // $data['withdrawal_all']=$this->Admin_model->getwithdrawl_req();
      if($_POST)
      {
          $request_status=$this->input->post('action');
          $eth_add=$this->input->post('refrence');
          $action_update=date('Y-m-d H:i:s');
          $id=$this->input->post('id');
          $update_withdra = array(
          'request_status' =>$this->input->post('action'),
          'action_update'=>date('Y-m-d H:i:s'),
          'comment' =>$this->input->post('refrence')
          );
          $ressult=$this->Admin_model->update_withdraw_admi($update_withdra ,$id);
          $getaction=$ressult['last_action'];
           $withdrawl_detals=withdrawal_requestdetails($id);
              if($getaction==0)
              {
                  
                $tblename=$withdrawl_detals->hash_id;
                $tedd=$withdrawl_detals->eth_add;
                  $returcredititfrommain = array(
                                      'registeruser_id'=>$withdrawl_detals->registeruser_id, 
                                      'credit'=>$withdrawl_detals->request_amt, 
                                      'wdate'=>date('Y-m-d H:i:s'), 
                                      'wstatus'=>"withdrawal Request Cancel",  
                                      'withdra_method'=>$tedd
                                    );     
                   $restt=$this->Admin_model->creditdiffwalleyte($returcredititfrommain ,$tblename);
                  if($retu_rn)
                  {
                  $this->session->set_flashdata('msg_success','<strong>Reject Request </strong>Amont  retun successfully in Wallete.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>');
                $this->session->set_flashdata('msg_class','alert alert-warning alert-dismissible fade show');  
                  }
              }
              elseif ($getaction==1) {
                $tble_name=$withdrawl_detals->hash_id;
                $req_userid=$withdrawl_detals->registeruser_id;
                  $req_date=$withdrawl_detals->request_date;
                 $update_wallete= array('wstatus' =>"withdrawal Request success" );
                 $reupdate=$this->Admin_model->update_wallete_add($update_wallete, $req_userid, $req_date, $tble_name);
                if($reupdate)
                   {
                     $this->session->set_flashdata('msg_success','<strong>Accept Request </strong>Amount debit in your bank shortly.');
                     $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
                   }
                  
              }
             redirect('withdrawal-request_admin');
           
      }
      else{ 
        $this->load->view('Admin/withdrwal_req', $data);  
      }
      
    }
    public function fetch_data_withdrwaldata()
{
    // Input
    $user_id = $this->input->post('user_id');
    $limit = 100; // Records per page (changed from 20 to 100)
    $page = $this->input->post('page') ? $this->input->post('page') : 1; // Page number
    $offset = ($page - 1) * $limit; // Offset calculation

    // Start building the query
    $this->db->select('
        ax_tbl_request.*, 
        ax_tbl_profile.usdt_add, 
        reg_table.email, 
        reg_table.mobile, 
        reg_table.fullname
    ');
    $this->db->from('ax_tbl_request');
    $this->db->join('ax_tbl_profile', 'ax_tbl_profile.registeruser_id = ax_tbl_request.registeruser_id');
    $this->db->join('reg_table', 'reg_table.user_id = ax_tbl_request.registeruser_id'); // Join reg_table using user_id

    // Apply filter if user_id is provided
    if (!empty($user_id)) {
        $this->db->where('ax_tbl_request.registeruser_id', $user_id);  // changed to exact match
    }

    // Apply request status filter (assuming 2 is the status you want)
    $this->db->where('ax_tbl_request.request_status', 2); // Add the request status filter

    // Apply ordering and limit for pagination
    $this->db->order_by('ax_tbl_request.id', 'DESC');
    $this->db->limit($limit, $offset);

    // Execute data query
    $query = $this->db->get();
    $data['results'] = $query->result_array(); // Store the results

    // Fetch custom fields using helper functions
    foreach ($data['results'] as &$recorddd) {
        // Fetch success take amount
        $recorddd['take_success_amt'] = get_success_take_amout($recorddd['id']);  // Store the result in the correct record
    }

    // Get total records (this is a separate query to calculate the count)
    $this->db->select('COUNT(*) as total');
    $this->db->from('ax_tbl_request');
    $this->db->join('ax_tbl_profile', 'ax_tbl_profile.registeruser_id = ax_tbl_request.registeruser_id');
    $this->db->join('reg_table', 'reg_table.user_id = ax_tbl_request.registeruser_id');

    // Apply the same filters as above
    if (!empty($user_id)) {
        $this->db->where('ax_tbl_request.registeruser_id', $user_id);  // Ensure exact match on user_id
    }
    $this->db->where('ax_tbl_request.request_status', 2); // Ensure this filter is in both queries

    // Get the total count of records
    $total_query = $this->db->get();
    $total_result = $total_query->row_array();
    $data['total_records'] = $total_result['total']; // Total records count

    // Calculate total pages
    $data['total_pages'] = ceil($data['total_records'] / $limit);
    $data['current_page'] = $page;

    // Return the data as a JSON response
    echo json_encode($data);
}


    public function get_withdrwalllolo()
    {
        $data=array();
         $data['tittle']="Fast Track - Incomes ";
        $this->load->view('Admin/withdrwal_req', $data);  
    }

    public function request_wi()
    {
        $data=array();
  $data['tittle']="Direct - Income ";
  //$data['direct_history']=$this->Admin_model->get_myrdirect_history();
  $this->load->view('Admin/withdrwal_req',$data);
    }
    public function getspecial_t()
      {
           $node_id="LWI124578";
           $target_level=0;
            $nodes = $this->Admin_model->find_nodes_at_level($node_id, $target_level);

              if (!empty($nodes)) {
                $counter=0;
                 foreach ($nodes as $nodety) {
                  $counter++;
                    
                      //echo "Node ID: {$node->id}, Name: {$node->name}<br>";
                 }
                 echo $counter;
             } 
      }
     //
     public function get_email_details($id) {
            $provide_form = get_link_details_Id($id);
    if(!empty($provide_form))
    {
        $prov_user_id = $provide_form->p_registeruser_id;
       $provideUserDetails = getUserDetailsByspon_Id($prov_user_id);
    $email_p =$provideUserDetails->email; 
    $User = $provideUserDetails->fullname;
    $mobile_p=$provideUserDetails->mobile;
    $commmite_id = $provide_form->commitemnt_id;
    $get_user_id = $provide_form->g_registeruser_id;
    
    $amt_pending = $provide_form->request_amt;
    $requestdate = $provide_form->request_date;
    $expire_time = $provide_form->expire_datetiime;
    $user_deetails = getUserDetailsByspon_Id($get_user_id);
    $username = $user_deetails->fullname;
    $mobile_g = $user_deetails->mobile;
     //$p_email = 'munazirkhan4012@gmail.com';  // Hardcoded email (update if needed)
    $p_email = $user_deetails->email;// User's email address for the "To" field
    $get_user_profile = is_bankAccount($get_user_id);
    $usdt_add = $get_user_profile->usdt_add;

    // Load email configuration
    $this->load->config('email');

    // Set email details
    $to_email = $p_email;  // Send the email to the user's email address
    $subject = 'Link for payment';

    // Compose the email body
    $message = "
    <html> 
        <body>
            <p>Dear <b>$username</b>,</p>
            <p>We are pleased to inform you that your link request has been successfully created. Below are the details of your request:</p>
            <h1>Payment Amount: $ {$amt_pending}</h1>
            <h3>Payment Link Request Details</h3>
            <p><strong>Provider User ID:</strong> {$prov_user_id}</p>
            <p><strong>User Name:</strong> {$User}</p>
            <p><strong>Mobile Number:</strong> {$mobile_p}</p>
            <p><strong>Email:</strong> {$email_p}</p>
            <p><strong>Request Date:</strong> {$requestdate}</p>
            <p><strong>Expiry Date:</strong> {$expire_time}</p>

            <h4>Payment Details</h4>
            <h5><strong>Amount Requested:</strong> $ {$amt_pending}</h5>
            
            <br>
            
        
            <p>Please review the above details carefully. If you require any assistance or have questions, feel free to contact our support team.</p>
        
            <p>Thank you for choosing <b>doublepower33days.com</b>!</p>
        
            <p>Best regards,</p>
            <p><b>doublepower33days.com Team</b></p>
            <p>Email: <a href='mailto:support@doublepower33days.com'>support@doublepower33days.com</a></p>
        </body>
    </html>";

    // Set the email parameters
    $this->email->from('support@doublepower33days.com', 'DOUBLE POWER');  // Sender's email address
    $this->email->to($to_email);  // Recipient's email (now dynamically set to user's email)
    $this->email->subject($subject);  // Email subject
    $this->email->message($message);  // Email message body

    // Send the email
    if ($this->email->send()) {
       return true;
    } else {
        return true;
    }   
    }else{
        return true;
    }    
        //
     }
     public function send_provider_email($id)
    {
    // Fetch link and user details
    $provide_form = get_link_details_Id($id);
    if(!empty($provide_form))
    {
    $prov_user_id = $provide_form->p_registeruser_id;
    $provideUserDetails = getUserDetailsByspon_Id($prov_user_id);
    //$p_email = 'codewithmunazir@gmail.com';  // Hardcoded email (update if needed)
    $p_email =$provideUserDetails->email; 
    $User = $provideUserDetails->fullname;
    $commmite_id = $provide_form->commitemnt_id;
    $get_user_id = $provide_form->g_registeruser_id;
    
    $amt_pending = $provide_form->request_amt;
    $requestdate = $provide_form->request_date;
    $expire_time = $provide_form->expire_datetiime;
    
    $user_deetails = getUserDetailsByspon_Id($get_user_id);
    $username = $user_deetails->fullname;
    $mobile_g = $user_deetails->mobile;
    $email_g = $user_deetails->email;  // User's email address for the "To" field
    $get_user_profile = is_bankAccount($get_user_id);
    $usdt_add = $get_user_profile->usdt_add;

    // Load email configuration
    $this->load->config('email');
    // Set email details
    $to_email = $p_email;  // Send the email to the user's email address
    $subject = 'Link for payment';
    // Compose the email body
    $message = "
    <html> 
        <body>
            <p>Dear <b>$User</b>,</p>
            <p>We are pleased to inform you that your link request has been successfully created. Below are the details of your request:</p>
            <h1>Payment Amount: $ {$amt_pending}</h1>
            <h3>Payment Link Request Details</h3>
            <p><strong>Get User ID:</strong> {$get_user_id}</p>
            <p><strong>User Name:</strong> {$username}</p>
            <p><strong>Mobile Number:</strong> {$mobile_g}</p>
            <p><strong>Email:</strong> {$email_g}</p>
            <p><strong>Request Date:</strong> {$requestdate}</p>
            <p><strong>Expiry Date:</strong> {$expire_time}</p>

            <h4>Payment Details</h4>
            <h5><strong>Amount Requested:</strong> $ {$amt_pending}</h5>
            <p><strong>USDT Address:</strong> {$usdt_add}</p>
            <br>
            <p><strong>Your Commitment ID:</strong> {$commmite_id}</p>
        
            <p>Please review the above details carefully. If you require any assistance or have questions, feel free to contact our support team.</p>
        
            <p>Thank you for choosing <b>doublepower33days.com</b>!</p>
        
            <p>Best regards,</p>
            <p><b>doublepower33days.com Team</b></p>
            <p>Email: <a href='mailto:support@doublepower33days.com'>support@doublepower33days.com</a></p>
        </body>
    </html>";

    // Set the email parameters
    $this->email->from('support@doublepower33days.com', 'DOUBLE POWER');  // Sender's email address
    $this->email->to($to_email);  // Recipient's email (now dynamically set to user's email)
    $this->email->subject($subject);  // Email subject
    $this->email->message($message);  // Email message body

    // Send the email
    if ($this->email->send()) {
       return true;
    } else {
        return true;
    }   
    }else{
        return true;
    }
    
}

public function myget_user_record()
{
     $data['duplicates'] =  $this->Admin_model->get_myrejectlist();
        
        // Load the view and pass the data to it
        $this->load->view('Admin/reg_view', $data);
}


     //
      public function export_wthdra()
{
  $ttlistInfo = $this->Admin_model->getwithdrawl_req();  
  $fileName = 'withdrawal-' . date("Y-m-d-H-i-s") . '.xlsx';  

  // Load PHPExcel library
  $this->load->library('excel');
  $objPHPExcel = new PHPExcel();
  $objPHPExcel->setActiveSheetIndex(0);

  // Set header row
  $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'SI.No');
  $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'User Id');
  $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Name');
  $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Mobile');
  $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Email');
  $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Withdrawal Amt');
  $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Request By');
  // $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Net');
  $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Wallet');
  $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Request Date');
  $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Status');
  $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'USDT Address');

 

  // Set data rows
  $rowCount = 2;
  foreach ($ttlistInfo as $data) {
      // Fetch user details
      $detail_user = getUserDetailsByspon_Id($data['registeruser_id']); 
      $fullname = $detail_user->fullname;
      $email=$detail_user->email;
      $mobile=$detail_user->mobile;

      // Ensure the amounts are numeric
      $rqamt = is_numeric($data['request_amt']) ? $data['request_amt'] : 0;
      $dduc = is_numeric($data['decuct_amt']) ? $data['decuct_amt'] : 0;
      $netamt = $rqamt - $dduc;    
        if (empty($data['eth_add']))
         {
            $tyyutt='admin';
        } else {
            $tyyutt=' ';
        }
      // Set the status
      $stt = "Pending";  // Consider dynamic assignment here based on status

      // Populate Excel sheet with data
      $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, (string)$data['id']);
      $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, (string)$data['registeruser_id']);
      $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, (string)$fullname);
      $objPHPExcel->getActiveSheet()->setCellValueExplicit('D' . $rowCount, (string)$mobile, PHPExcel_Cell_DataType::TYPE_STRING);
    //  $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, (string)$mobile);
      $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, (string)$email);
      $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, (string)$rqamt);
      $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, (string)$tyyutt);
      // $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, (string)$netamt);
      $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, (string)$data['wallet_namew']);
      $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, (string)$data['request_date']);
      $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, (string)$stt);
      //$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, (string)$data['bank_name']);
     

      // To prevent scientific notation, force account number to be treated as text
      $objPHPExcel->getActiveSheet()->setCellValueExplicit('K' . $rowCount, (string)$data['usdt_add'], PHPExcel_Cell_DataType::TYPE_STRING);
     
      
    
     
    //  $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, (string)$data['upi']);

      $rowCount++;
  }

  // Set headers for Excel file download
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="' . $fileName . '"');
  header('Cache-Control: max-age=0'); 

  // Write to Excel file (XLSX)
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
  $objWriter->save('php://output');
}
      //
   // check amount is greter than 0 
    public function check_amount($number) {
  
    if ($number > 0) {
        return TRUE;
    } else {
        $this->form_validation->set_message('check_amount', 'The Amount Should be amount greater than 0.');
        return FALSE;
    }

  }public function check_admin($pass)
{
  $getU_id=$this->session->userdata('id');
  $getuser=getUserDetailsById($getU_id);
  $mytxn=$getuser->txn_password;
  if($txnp === $mytxn)
  {
    return TRUE;
  }
  else{
    $this->form_validation->set_message('check_txnpassword','The Transaction Password Not Match');
    return FALSE;
  }
}
  public function check_password($txpnp)
{

  $sget_admin=get_admin($this->session->userdata('adminid'));
  $mpass=$sget_admin->password;
  $txnp=$txpnp;
  if($txnp === $mpass)
  {
    return TRUE;
  }
  else{
    $this->form_validation->set_message('check_password','The Wrong  Old Password ');
    return FALSE;
  }
}
public function file_check($str){
  $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
  $mime = get_mime_by_extension($_FILES['file']['name']);
  if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
      if(in_array($mime, $allowed_mime_type_arr)){
          return true;
      }else{
          $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
          return false;
      }
  }else{
      $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
      return false;
  }
}


}