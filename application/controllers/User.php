<?php
defined('BASEPATH') OR exit('No direct script access allowed');
       

class User extends CI_Controller {
    public function __construct()
      {
      
        parent::__construct();
        $this->load->helper('commonn_helper');
          $this->load->library('form_validation');
           $this->load->library('email');
        $this->load->model('Home_model');
        $this->load->model('User_model');
        $this->load->model('Robot_model');
        $this->load->database();
        $this->load->library('session');
        date_default_timezone_set('Asia/Kolkata');
  $this->load->library('pagination');
  if( ! $this->session->userdata('id') )
        return redirect('signin');
      
      
      }
      public function getuserme()
      {
        $this->load->view('users/myteamsk');
        
      }
      public function get_descendants()
{
    $parentId = $this->input->post('parent_id');
    $side = $this->input->post('side'); // 'left' or 'right'

    $this->load->model('User_model');
    $descendants = $this->User_model->get_descendants($parentId, $side);

    echo json_encode(['status' => 'success', 'data' => $descendants]);
}

      public function index()
      {
//         $data=array();
//         $data['title']="Dashbord";
//         $data['tag']="Dashboard";
//         $getU_id=$this->session->userdata('id');
//              $getuserdetail=getUserDetailsById($getU_id);
//              $node_id=$getuserdetail->user_id;
//              $active_count = 0;
//      $inactive_count = 0;
//      $getU_id=$this->session->userdata('id');
//      $getuserdetail=getUserDetailsById($getU_id);
//      $parent_id=$getuserdetail->user_id;
//      $node_id=$getuserdetail->user_id;
//       $active_count = 0;
//       $inactive_count = 0;

//       // Get the root team member (the parent or starting member)
//       $team_member = $this->User_model->get_team_member($parent_id);

//       if ($team_member) {
//           // Skip the root member and only count subordinates
//           $this->User_model->count_team_members($parent_id, $active_count, $inactive_count);

//           // Output the counts (can also be passed to a view)
//           $active=$active_count;
//           $inactive=$inactive_count;
//       } 
// //


//       $data['userId']=$getuserdetail->user_id;
//       $data['team_member']=$this->User_model->count_team_member_s($node_id);
//       $data['active_no']=$active;
//       $data['inactive_no']=$inactive;
//       $data['direct_team']=$this->User_model->count_direct_teamss($node_id);
//       $data['mybusiness']=$getuserdetail->teambusiness;
//       $data['daily_sum']=$this->User_model->home_daily_roi_sum($node_id);
//       $data['direct_sum']=$this->User_model->home_directin_sum($node_id);
//       $data['level_sum']=$this->User_model->home_level_sum($node_id);
//       $data['reward_sum']=$this->User_model->home_rewardt_sum($node_id);

//       $data['for_provide']=$this->User_model->detials_of_widrwal_user_commit_links($node_id);
//       $data['for_get_user']=$this->User_model->detials_commit_user_coomit_links($node_id);
  $data=array();
        $data['title']="Dashbord";
        $data['tag']="Dashboard";
        $getU_id=$this->session->userdata('id');
             $getuserdetail=getUserDetailsById($getU_id);
              $data['userId']=$getuserdetail->user_id;
      $data['team_member']=0;
      $data['active_no']=0;
      $data['inactive_no']=0;
      $data['direct_team']=0;
      $data['mybusiness']=0;
      $data['daily_sum']=0;
      $data['direct_sum']=0;
      $data['level_sum']=0;
      $data['reward_sum']=0;

      $data['for_provide']=array();
      $data['for_get_user']=array();
            

//



        $this->load->view('users/index', $data);
      }
      public function get_teambusness()
      {
           $node_id = $this->input->post('id'); 
          $team_business=$this->User_model->sum_team_business($node_id);
          echo $team_business;
      }
      public function get_all_income()
{
    // Get the 'id' parameter from the POST request
    $node_id = $this->input->post('id'); 
    
    // Fetch the income sums from the model
    $daily_sum = $this->User_model->home_daily_roi_sum($node_id);
    $direct_sum = $this->User_model->home_directin_sum($node_id);
    $level_sum = $this->User_model->home_level_sum($node_id);
    $reward_sum = $this->User_model->home_rewardt_sum($node_id);

    // Prepare the response data as an array
    $response = array(
        'daily_sum' => $daily_sum,
        'direct_sum' => $direct_sum,
        'level_sum' => $level_sum,
        'reward_sum' => $reward_sum
    );

    // Set the Content-Type header to application/json
    header('Content-Type: application/json');
    
    // Output the response as JSON
    echo json_encode($response);
}

      public function teammember()
{
    // Get the 'id' parameter from the POST request
    $parent_id = $this->input->post('id'); 
    
    // Get team member counts from the model
    $teammem = $this->User_model->count_team_member_s($parent_id);
    $dirct_team = $this->User_model->count_direct_teamss($parent_id);
    
    // Prepare the response data as an array
    $response = array(
        'teammem' => $teammem,
        'dirct_team' => $dirct_team
    );

    // Set the Content-Type header to application/json
    header('Content-Type: application/json');
    
    // Output the response as JSON
    echo json_encode($response);
}

      public function get_valll()
    {
    // Get the 'id' parameter from the POST request
    $parent_id = $this->input->post('id'); 
    $active_count = 0;
    $inactive_count = 0;

    // Get the root team member (the parent or starting member)
    $team_member = $this->User_model->get_team_member($parent_id);

    if ($team_member) {
        // Skip the root member and only count subordinates
        $this->User_model->count_team_members($parent_id, $active_count, $inactive_count);

        // Output the counts (can also be passed to a view)
        $active = $active_count;
        $inactive = $inactive_count;

        // Create an array of data to send in JSON format
        $response = array(
            'active' => $active,
            'inactive' => $inactive
        );
    } else {
        // If no team member is found, send an error response
        $response = array(
            'error' => 'Team member not found'
        );
    }

    // Send the response as JSON
    echo json_encode($response);
}

public function show_mobile_numbers()
    {
        // Query to fetch all mobile numbers from reg_table
        $this->db->select('mobile');  // Select the mobile column
        $this->db->from('reg_table'); // From reg_table
        $query = $this->db->get();    // Execute the query
        
        // Pass the mobile numbers to the view
        $data['mobiles'] = $query->result_array(); // Result as an associative array
        
        // Load the view and pass the data
        $this->load->view('mobile_numbers_view', $data);
    }
      public function all_statement()
      {
               $data=array();
       $data['tag']="All Transaction";
       $data['title']="statament";
      
         $id=$this->session->userdata('id');
          $my_userid=getUserDetailsById($id);
          $node_id=$my_userid->user_id;
          $data['sstatement']=$this->User_model->get_wallet_data($node_id);
          $this->load->view('users/all_statement',$data);
      }
      public function profile()
      {
       $data=array();
       $data['tag']="My Profile";
       $data['title']="profile";
       $this->load->view('users/profile',$data);

      }
      public function change_pwd()
      {
        $data = array();
        $data['title']="Change Password";
        $data['tag']="Change Password";
        if($_POST)
        {
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
          $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_password');
          $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]|max_length[15]|regex_match[/^[a-zA-Z0-9@!#$%&]+$/]');
          $this->form_validation->set_rules('repeat_npassword', 'Repeat Password', 'trim|required|matches[new_password]');          
          if($this->form_validation->run())
          {
            $id=$this->session->userdata('id');
            $updatePass=$this->input->post('new_password');
            $result=$this->User_model->update_paawaorduser($updatePass, $id);
           if($result)
           {
            $this->session->set_flashdata('msg_success','<strong>Profile  </strong>Password Updated Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>');
            $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
            redirect('change-password'); 
           }else{
            $this->session->set_flashdata('msg_invalid','<strong>Profile  </strong>Try Again <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button> ');
            $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
            redirect('change-password'); 
           }
  
          }
          else
          {
            
            $this->load->view('users/change_password',$data);
          }
        }
        else{
          $this->load->view('users/change_password',$data);
        }
        
      }
      
      public function change_Txnpwd()
      {
        $data = array();
        $data['title']="Change Transaction Password";
        $data['tag']="Transaction Password";
        if($_POST)
        {
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
          $this->form_validation->set_rules('tnxpassword', 'Password', 'trim|required|callback_check_txnpassword');
          $this->form_validation->set_rules('tnxnew_password', 'New Password', 'trim|required');
          $this->form_validation->set_rules('repeat_tnxpassword', 'Repeat Password', 'trim|required|matches[tnxnew_password]');          
          if($this->form_validation->run())
          {
            
            $id=$this->session->userdata('id');
            $updatetnxpass=$this->input->post('tnxnew_password');
            $result=$this->User_model->update_txnpaawaorduser($updatetnxpass, $id);
           if($result)
           {
            $this->session->set_flashdata('msg_success','<strong>Profile  </strong>Transaction Password Updated Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>');
            $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
            redirect('change-txn-password'); 
           }else{
            $this->session->set_flashdata('msg_invalid','<strong>Profile  </strong>Try Again <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button> ');
            $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
            redirect('change-txn-password'); 
           }
          }
          else{
            // validation error
            $this->load->view('users/change_Txnpassword',$data);
          }
          //Array ( [tnxpassword] => [tnxnew_password] => [repeat_tnxpassword] => )
        }else{
        $this->load->view('users/change_Txnpassword',$data);
        }
      }
    
      public function supportInbox()
      { 
        $data=array();
        $data['tag']="Inbox";
        $data['title']="Inbox";
        $my_userid=getUserDetailsById($this->session->userdata('id'))->user_id;
        $data['inbox_box']=$this->User_model->get_inboxboxmail($my_userid);
        $this->load->view('users/inbox', $data);
      }
    
      public function supportOutbox()
      {
        $data=array();
        $data['tag']="Outbox";
        $data['title']="Outbox";
        $my_userid=getUserDetailsById($this->session->userdata('id'))->user_id;
        $data['outbox']=$this->User_model->get_outboxmail($my_userid);
        $this->load->view('users/outbox', $data);
      }
      public function mail_page($row)
      {
        $mycht_id=$row;
        $datar=array();
        $datar['tag']="Mail";
        $datar['title']="mail show"; 
        $datar['mymail']=$this->User_model->mymail($mycht_id);
        $this->load->view('users/mail_show', $datar);
      }
      public function hide_mail($row)
      {
        $mycht_id=$row;
        $update=$this->User_model->hide_mymail($mycht_id);
        if($update)
        {
          redirect('support-outbox');
        }else {
          redirect('support-outbox');
        }
      }
      public function supportEmail()
      {
        $data=array();
        $data['tag']="Compose";
        $data['title']="Compose mail";
        if($_POST)
        {
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
          $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
          $this->form_validation->set_rules('message', 'Message', 'trim|required');
          if($this->form_validation->run()){
            $getU_id=$this->session->userdata('id');
     $getuserdetail=getUserDetailsById($getU_id);
     $nodet_id=$getuserdetail->user_id;
            $cht_key=bin2hex((random_bytes(5)));
     $nodet_id=$getuserdetail->user_id;
            $emailcompose=array( 'registeruser_id'=>$nodet_id,'subject'=>$this->input->post('subject'), 'description'=>$this->input->post('message'), 'mail_to'=>$this->input->post('emailto'),'create_date'=>date('Y-m-d H:i:s'), 'chat_key'=>$cht_key);
           $result=$this->User_model->compose_email($emailcompose);
           if($result){
            $this->session->set_flashdata('msg_successemail','<strong>Request done !</strong> Successfully');
            $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');  
          redirect('support-email');
           }
           else{
            $this->session->set_flashdata('msg_invalidemail','<strong>sorry !</strong> requets arise but wallet balance no deduct.');
            $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');  
            redirect('support-email');
           }   
          }
        else{
          //validatio
          $this->load->view('users/write_email', $data);  
        }
         
        }else{
          $this->load->view('users/write_email', $data);  
        }
        
      }
      public function get_wallet_statement_data_ajax()
      {
         $page = $this->input->get('page');
    $limit = 10; // Number of records per page
    $offset = ($page - 1) * $limit;
        $getU_id=$this->session->userdata('id');
     $getuserdetail=getUserDetailsById($getU_id);
     $node_id=$getuserdetail->user_id;
     $data = $this->User_model->get_wallet_data($node_id);
      echo json_encode($data);
      }
      public function fpage()
      {
         $this->load->view('users/form_page');
      }
      public function tpage()
      {
         $this->load->view('users/table_page');
      }
      public function commitments()
      {
        $data=array();
        $data['title']="Commitment";
        $data['tag']="Commitment";
        $data['getpack']=0;
         if($_POST)
         {
          date_default_timezone_set('Asia/Kolkata');
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
          $this->form_validation->set_rules('amt', 'Amount', 'trim|required|callback_check_amt_for_coommitment');
          $this->form_validation->set_rules('tnxpass', 'Transaction', 'trim|required|callback_check_txnpassword');
          if($this->form_validation->run())
          {
            $getU_id=$this->session->userdata('id');
            $getuserdetail=getUserDetailsById($getU_id);
            $myuserid=$getuserdetail->user_id;
            $get_last_commit = $this->User_model->get_last_status_commitval($myuserid);

              // Check if a status is returned from the model
              if (!empty($get_last_commit)) {
                  // If status is found, assign it to $status_s
                  $status_s = $get_last_commit->status;
              } else {
                  // If no status found (result is null), set $status_s to 1
                  $status_s = 1;
              }
            
            
            //if($status_s==1)
            if($status_s>=0)
            {
              
              $amt=$this->input->post('amt');
              $get_last_commitva = $this->User_model->get_last_status_commitval($myuserid);
              if(!empty($get_last_commitva))
              {
                  $amt_last_commit=$get_last_commitva->request_amount;
              }else{
                  $amt_last_commit=0;
              }
          
                  if($amt>=$amt_last_commit)
                  {
                      
                  
              
            //Array ( [amt] => 50 [tnxpass] => 123456 )
            $result = $this->User_model->get_pack_by_amount($amt);
            //stdClass Object ( [id] => 1 [] => 50 [typeget] => [num_days_of_type] => 1 [packroi] => 6.00 [] => 33 [packnm] => Pack 1 [isactive] => 1 )
            $pack_id=$result->id;
            $pack_amt=$result->packamount1;
            $pack_roi_percen=$result->packroi;
            $pack_roi_amt=$result->packamount1;
            $pack_days=$result->packroidays;
            $pack_name=$result->packnm;
            $getpercentt_amt= getpercent($pack_amt , $pack_roi_percen);
                  $getroiperday=$getpercentt_amt;
                  if (is_int($getroiperday)) {
                    $roi_income=$getroiperday;
                  }
                  else
                  {
                  $roi_income=round($getroiperday, 2);
                  }
            $request_idd="Request_".mt_rand(100000000,999999999);
             $insert_request=array(
              'registeruser_id'=>$myuserid,
              'commit_id'=>$request_idd, 
              'request_amount'=>$pack_amt,
              'wdate'=>date('Y-m-d H:i:s'), 
              'wstatus'=>'Commitment', 
              'remark'=>'Request'
            );
            // print_r($insert_request);
             //$result_commitem_ent=1;
             $result_commitem_ent=$this->User_model->insert_commitess($insert_request);
             
            // echo "good your validate";
              $this->session->set_flashdata('msg_successr','Congratulation! Payment link  recieve soon ');
                                    $this->session->set_flashdata('msg_class','alert-success');
                                    redirect('commitments');

            
                  }else{
                     $this->session->set_flashdata('msg_invalid','Please  Pack amount should be equal to or greater than the previous commitment');
                                  $this->session->set_flashdata('msg_class','alert-danger');
                                  redirect('commitments');
                  }
                  echo "<br>";
              print_r($get_last_commitva);
              exit();
                  }else{
               $this->session->set_flashdata('msg_invalid','Allready commitment done!');
                                    $this->session->set_flashdata('msg_class','alert-danger');
                                    redirect('commitments');
            }
            
          }else{
              $this->session->set_flashdata('msg_invalid','Please enter valid  transaction password!');
                                    $this->session->set_flashdata('msg_class','alert-danger');
                                    redirect('commitments');
            // validation 
          }
         }else{
          $this->load->view('users/commitments', $data);
         }
      }

      public function commitments_history()
      {
        $getU_id=$this->session->userdata('id');
            $getuserdetail=getUserDetailsById($getU_id);
            $myuserid=$getuserdetail->user_id;
       $data=array();
        $data['tag']="Commitments-History";
        $data['title']="commitments -History";
        $data['Commitment_historyy']=$this->User_model->get_commitments_history($myuserid);
        $this->load->view('users/commitments_history', $data);

      }
      public function get_help()
      {
        $getU_id=$this->session->userdata('id');
        $getuserdetail=getUserDetailsById($getU_id);
        $myuserid=$getuserdetail->user_id;
          $data=array();
        $data['tag']="Get Helps Details";
        $data['title']="Get-commitments-History";
        $data['get_help_nt_historyy']=$this->User_model->get_helps_s_history($myuserid);
        $this->load->view('users/get_help_commit_val', $data);
      }
      public function provide_help()
      {
        $getU_id=$this->session->userdata('id');
        $getuserdetail=getUserDetailsById($getU_id);
        $myuserid=$getuserdetail->user_id;
          $data=array();
        $data['tag']="Provide and Get History";
        $data['title']="Get-and-Provide-commitments-History";
        $data['get_help_nt_provide_historyy']=$this->User_model->get_helps_sprovide_history($myuserid);
        $this->load->view('users/get_help_provide_commit_val', $data);
      }

      
  public function get_direct_top_up_sum($user_id)
  {
    $get_user=$this->Home_model->get_all_Direct_user($user_id);
    if(!empty($get_user))
    {
        $totalTbusiness = 0; // Initialize variable to hold the sum

      foreach ($get_user as $dir_uvalue) {
        $usr_id = $dir_uvalue['user_id'];
        // Get the total topup for the user
        $Tbusiness = get_total_topup($usr_id);
          // Add the result to the total sum
          $totalTbusiness += $Tbusiness;
      }

// Display the sum of all total topups
    return $totalTbusiness; 
    }
    else{
      $rttt=0;
      return $rttt;
    }
    
  }
       public function transfer_receive_fund()
    {
      $data=array();
      $data['title']="Active wallet history";
      $data['tag']="Activation Wallet History";
      $getU_id=$this->session->userdata('id');
      $getuserdetail=getUserDetailsById($getU_id);
      $myuserId=$getuserdetail->user_id;
      $data['fundTran_recieve']=$this->User_model->getTransferHistory($myuserId);
      
      $this->load->view('users/fund_trans_recive_details', $data);
    }
      public function mytop_history()
      {
      $data=array();
        $data['title']="Activation-history";
        $data['tag']="Activation - History";
      $getU_id=$this->session->userdata('id');
      $myuserid=getUserDetailsById($getU_id)->user_id;
      $data['topup_history']= $this->User_model->gettophistory($myuserid);
      $this->load->view('users/top_up_history', $data);
  }
  public function fundsTransfer_usrs()
   {
    $data=array();
    $data['title']="Fund Transfer User";
    $data['tag']="Fund transfer";
    if($_POST)
    {
      
      //Array ( [userid] => 124578 [amount] => 100 [tnxpass] => 124545 
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('sponsed_id', 'UserId', 'trim|required|callback_check_user_valid');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|callback_check_amount');
        $this->form_validation->set_rules('tnxpass', 'Transaction', 'trim|required|callback_check_txnpassword');
        if($this->form_validation->run())
          {
            $getU_id=$this->session->userdata('id');
            $getuserdetail=getUserDetailsById($getU_id);
            $geturid=$getuserdetail->user_id;
            
              $usrId=$this->input->post('sponsed_id');
              date_default_timezone_set('Asia/Kolkata');
              $cuurntdate=date('Y-m-d h:i:s');
              $tranferactive=array(
                'registeruser_id'=>$geturid,
                'debit'=>$this->input->post('amount'),
                'to_Id'=>$usrId, 
                'wdate'=>$cuurntdate, 
                'wstatus'=>"Tranfer to ".$usrId,
                'show_for'=>$geturid
              );
                        $getfirst=$this->User_model->transferfund_activewallf1($tranferactive);
                          if($getfirst)
                          {
                            $recieve_ctive=array(
                              'registeruser_id'=>$usrId,
                              'credit'=>$this->input->post('amount'),
                              'to_Id'=>$geturid,
                              'wdate'=>$cuurntdate, 
                              'wstatus'=>"Recieve From ".$geturid,
                              'show_for'=>$usrId
                            );
                            $getfirst=$this->User_model->transferfund_activewallf_s2($recieve_ctive);
                            if($getfirst)
                            {
                              //return redirect('fund_transfer_active');
                              $this->session->set_flashdata('msg_success','funds transfer successfully');
                         $this->session->set_flashdata('msg_class','alert-success');  
                         redirect('fund_transfer_active');
                            }
                          }
           
            
          }
          else{
              // valdation required field
            $this->load->view('users/active_fund_transfer', $data);
          }

    }
    else{
      $this->load->view('users/active_fund_transfer', $data);

    }
   }
   public function getuuu($id)
   {
    $data=array();
    $data['title']="Fund Transfer User";
    $data['tag']="Fund transfer";
    $data['top_up_id']=$id;
 
                              $this->load->view('users/popup_top', $data);
   }
   public function toactive_wllaete()
   {     
    $data=array();
    $data['title']="Fund Transfer User";
    $data['tag']="Fund transfer";
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
      $this->form_validation->set_rules('type_of_fund', 'Select', 'required');
      $this->form_validation->set_rules('my_level_nm', 'Select', 'trim|required|callback_level_range');
     
      $this->form_validation->set_rules('wamount', 'Amount', 'required|callback_check_amount_valid');
      $this->form_validation->set_rules('mtnxpass', 'Transaction', 'trim|required|callback_check_txnpassword');

      if($this->form_validation->run())
      {
         $data=$this->input->post();
         print_r($data);
        
      }
      else{
        //echo  "valdation false";
        $this->load->view('users/active_fund_transfer', $data);
      }
   }
   public function do_active_user()
   {
    $user_id=$this->input->post('id');
    $g_id=$this->input->post('g_id');
    $amt_t=$this->input->post('amt_t');
    $commit_id=$this->input->post('link_commit_id');
    $link_id=$this->input->post('link_id');
    $withdrol_id=$this->input->post('withdrol_id');
           $update_fund_request = array(
              
                'request_status'=>1,
                'action_update'=>date('Y-m-d H:i:s'),
                'remark'=>'success'
               
              );
          $resut_funds=$this->User_model->update_fundrequest_row($update_fund_request,$user_id, $commit_id, $link_id);
           if($resut_funds)
           {
               $update_commit_fields=array(
                    'request_status'=>1, 
                    'action_update'=>date('Y-m-d H:i:s'), 
                    'comment'=>'Get amount successfully',
                    'status'=>1,
                    'status_amt_send'=>1
                  );
              $resut=$this->User_model->update_liks_request_row($update_commit_fields, $link_id);
              if($resut)
              {
                $credit_amt_fund=array(
               // ax_tbl_wallet_fund`(`withdrawal_method`, `id`, 
                  'registeruser_id'=>$user_id, 
                  'credit'=>$amt_t, 
                  'to_Id'=>$g_id, 
                  'wdate'=>date('Y-m-d H:i:s'), 
                  'wstatus'=>'Recieve Amount '.$commit_id, 
                  'show_for'=>$user_id  );
                $this->User_model->Insert_in_wallet($credit_amt_fund);
                $mywidth_amt=get_my_withdwal_amt($withdrol_id);
                $myrecivi_amt=get_my_fund_recive_amt($withdrol_id);
              if ($mywidth_amt == $myrecivi_amt && $mywidth_amt > 0 && $myrecivi_amt > 0) {
                        // Your code here
                    $update_my_widh=array(
                      'request_status'=>1,  
                      'action_update'=>date('Y-m-d H:i:s')
                    );
                    $this->User_model->update_withrwal_request($update_my_widh, $withdrol_id);
                  }

                $check_request_commitements=get_request_commit_amt($commit_id);

                foreach ($check_request_commitements as $commitment) {
                      $ID=$commitment->id;
                      $Register_User_ID=$commitment->registeruser_id;
                      $Commit_ID=$commitment->commit_id;
                      $Request_Amount=$commitment->request_amount;
                      $Status=$commitment->status;
                
                  }
                  $get_total_amt_commit_success_commit=get_total_sum_coomit_linkthis_commit($commit_id);
                  $get_total_amt_commit_success_fund=get_total_sum_coomit_fund_this_commit($commit_id);
                  if($get_total_amt_commit_success_commit == $get_total_amt_commit_success_fund && $get_total_amt_commit_success_fund == $Request_Amount && $Status == 0)
                  {
                    $complete_acoomit=array(
                      'approved_date'=>date('Y-m-d H:i:s'),
                      'status'=>1, 
                      'show_admin'=>0,
                      'growth_roi'=>1
                    );
                    $this->User_model->update_commit_id($complete_acoomit, $commit_id);
                      //
                    $myuserid=$Register_User_ID;
                        $result_pack= $this->User_model->get_pack_by_amount($Request_Amount);
                        $pack_id=$result_pack->id;
                        $packval=$result_pack->packamount1;
                        $pack_roi_percen=$result_pack->packroi;
                        $pack_amt=$result_pack->packamount1;
                        $pack_days=$result_pack->packroidays;
                        $pack_name=$result_pack->packnm;
                        $getpercentt_amt= getpercent($pack_amt , $pack_roi_percen);
                              $getroiperday=$getpercentt_amt;
                              if (is_int($getroiperday)) {
                                $roi_income=$getroiperday;
                              }
                              else
                              {
                              $roi_income=round($getroiperday, 2);
                              }
                              $topup= array(
                              'registeruser_id'=>$myuserid, 
                              'topup_amt'=> $packval, 
                              'topupdate'=>date('Y-m-d H:i:s'), 
                              'pack_type'=>$pack_name,
                              'roi_income'=>$roi_income, 
                              'pack_id'=>$pack_id, 
                              'type'=>'Activation', 
                             // 'days_'=>$packdetals->packroidays,
                                //'total_days'=>"", 
                              'topup_by'=>$myuserid
                             );
                            $result=$this->User_model->topup($topup);
                            $top_upId=$result['last_id'];
                            $resultmsg=$result['msg'];
                                        if($resultmsg)
                                          {
                                            $tranferactive=  array(
                                              'registeruser_id'=>$myuserid,
                                              'debit'=>$packval, 
                                              'to_Id'=>$myuserid,
                                              'wdate'=>date('Y-m-d H:i:s '),
                                              'wstatus'=>"Top-Up ", 
                                              'show_for'=>$myuserid
                                              );
                                             // print_r($tranferactive);
                                               $resulty= $this->User_model->transferfund_activewallf1($tranferactive);
                                               if($resulty)
                                                {           
                                                    $initialroi=array(
                                                    'registeruser_id'=>$myuserid,
                                                     'debit'=>$roi_income,
                                                    'wdate'=>date('Y-m-d H:i:s '), 
                                                    'wstatus'=>$myuserid, 
                                                    'top_id'=>$top_upId,
                                                    'comiit_id'=>$commit_id, 
                                                    'pack_amt'=>$packval, 
                                                    'roi_percent'=>$pack_roi_percen
                                                    );
                                                                                         
                                                    $insertRio=$this->User_model->initialroi($initialroi);
                                                    $count_top_my=$this->User_model->count_topup_my($myuserid);
                                                // if($initialroi && $count_top_my<=1)
                                                  if($initialroi)
                                                 {

                                                            $usrid=Last_top_Details_get($top_upId);
                                                            $dirctid=getsposerdid($usrid);
                                                            if(!empty($dirctid))
                                                            {
                                                              $sum_topupp=get_total_topup($dirctid);
                                                              $usridr=is_topupUser($dirctid);
                                                              $isactive=is_user_active($dirctid);
                                                              $isnot_topup_expirerr=$this->check_topup_expiry($dirctid);
                                                              if($usridr>=1 && $isactive==1 && $sum_topupp>0 && $isnot_topup_expirerr==1)
                                                              { 
                                                                 
                                                                $packyu=$packval;
                                                                $percenyt=7;
                                                                $bdirsterper = $percenyt / 100 * $packyu;
                                                                $isertdirecct=array(
                                                                  'registeruser_id' =>$dirctid, 
                                                                  'credit' =>$bdirsterper, 
                                                                  'wdate' =>date('Y-m-d H:i:s'), 
                                                                  'wstatus' =>"Direct Income",
                                                                  'remark'=>$myuserid
                                                                );
                                                                $this->User_model->isertdirect($isertdirecct);
                                                              }
                                                            }
                                                      $category_id=$myuserid;  
                                                      $parents_fetch = $this->User_model->get_sponserd_with_depth($category_id);
                                                      if (!empty($parents_fetch)) {
                                                               $level_per = array(0, 7, 5, 3, 2, 1);
                                                                $direct_user = array(0, 0, 4, 7, 9, 10);
                                                                 $count = 2;
                                                                foreach ($parents_fetch as $parent) {
                                                                    $depthh=$parent['depth'];
                                                                    if($count<=$depthh && $count <= 5 )
                                                                    {
                                                                      $usrr_rrid=$parent['user_id'];
                                                                      echo $count++;
                                                                      // team bussiness
                                                                      $get_teambus=getUserDetailsByspon_Id($usrr_rrid);
                                                                      $team=$get_teambus->teambusiness;
                                                                      $updteambuns=$packval+$team;
                                                                      $this->User_model->update_teambusiness($updteambuns, $usrr_rrid);  
                                                                      // $mydirect_top=get_total_topup($usrr_rrid);
                                                                      //
                                                                      $requi_mydir_user=$direct_user[$depthh];
                                                                      $get_my_direct_toupuser=$this->User_model->get_direct_topup_user($usrr_rrid);
                                                                      $Is_active_myact=getUserDetailsByspon_Id($usrr_rrid);
                                                                      $is_top_activeUser=$Is_active_myact->istopup;
                                                                      $is_leve_rct_activeUser=$Is_active_myact->isactive;
                                                                      $level_percet=$level_per[$depthh];
                                                                       $isnot_topup_expire=$this->check_topup_expiry($parent['user_id']);
                                                                      if($get_my_direct_toupuser>=$requi_mydir_user && $is_leve_rct_activeUser==1 && $is_top_activeUser==1 && $isnot_topup_expire==1)
                                                                        {
                                                                            $dum_income = $level_percet / 100 * $packval;
                                                                            $insertInitialLevel=array(
                                                                                              'user_id'=>$parent['user_id'],
                                                                                              'top_id'=>$top_upId,
                                                                                              'level_id'=>$parent['depth'],
                                                                                              'level_nm'=>$category_id,
                                                                                              'incomedate'=>date('Y-m-d H:i:s '),
                                                                                              'dumy_income'=>$dum_income,
                                                                                              'business'=>$packval                                                        
                                                                                            );         
                                                                              $this->User_model->generate_level_income($insertInitialLevel);
                                                                              $level_income_insert=array(
                                                                                                'registeruser_id'=>$parent['user_id'], 
                                                                                                'credit'=>$dum_income,
                                                                                                'wdate'=>date('Y-m-d H:i:s'),
                                                                                                 'wstatus'=>'Level Income',
                                                                                                 'remark'=>$category_id.' / Level - '.$parent['depth'],
                                                                                                 'type_income'=>$packval,
                                                                                                  't_id'=>$top_upId
                                                                                                  
                                                                                                );
                                                                                              $this->User_model->transferfund_non_workinf($level_income_insert);
                                                                        }else{
                                                                         continue;
                                                                        }                                                    
                                                                    }else{
                                                                      continue;
                                                                    }
                                                                }
                                                        }
                                                        redirect('dashboard');
                                                      //    $data['top_up_id']=$top_upId;
                                                        //  $this->load->view('users/popup_top', $data);
                                                  }else{
                                                    echo "issue roi ";
                                                  }
                                                }else{
                                                  echo 'issue fund transfer';
                                                }
                                              }else{
                                                echo "topup not go on";
                                              }

                      //  
                  }else{
                    redirect('dashboard');
                  }
              }
              else{
                redirect('dashboard');
              }
          }
          else{
            redirect('dashboard'); 
          }
        
    }
    
    
    public function reject_link()
    {
     $user_id=$this->input->post('nn');
    $commit_id=$this->input->post('link_commit_id');
    $link_id=$this->input->post('link_id');

      $rejectupdate_fund_request = array(
                'request_status'=>0,
                'action_update'=>date('Y-m-d H:i:s'),
                'remark'=>'rejects '
              );
            $rejecyresut_funds=$this->User_model->update_fundrequest_row($rejectupdate_fund_request,$user_id, $commit_id, $link_id); 
            if($rejecyresut_funds)
            {
              $update_commit_field_reject=array(
                    'request_status'=>0, 
                    'action_update'=>date('Y-m-d H:i:s'), 
                    'comment'=>'I don`t get Amount',
                    'status'=>0,
                    'status_amt_send'=>0
              );
              $resut_rects=$this->User_model->update_liks_request_row($update_commit_field_reject, $link_id);
              if($resut_rects)
              {
                redirect('dashboard');
              }
            }else{
              redirect('dashboard');
            }
          
      //Array ( [link_id] => 1 [link_commit_id] => Request_4147 [pwd] => 12345 [nn] => EQT786248 )
    }
   public function my_fund_request()
   {
    if($_POST)
        {

          date_default_timezone_set('Asia/Kolkata');
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
         // $this->form_validation->set_rules('diposiramt', 'Diposite', 'trim|required|');
          $this->form_validation->set_rules('hash_id', 'Hash Id', 'trim|required|is_unique[ax_tbl_fund_request.hash_id]');
          $this->form_validation->set_rules('file', 'File', 'callback_file_check');
          $this->form_validation->set_rules('diposiramt', 'Amount', 'required|numeric|greater_than[0]',
            array(
                'required' => 'The %s field is required.',
                'numeric' => 'The %s field must be a valid number.',
                'greater_than' => 'The %s field must be greater than 0.'
            )
        );
       
          //$this->form_validation->set_rules('usdt_add', 'UsDT', 'trim|required');
          if($this->form_validation->run()){
            $comit_link_id=$this->input->post('commitrowdd');
            $comiit_id=$this->input->post('comiit_id');
            $get_user_commit_id=$this->input->post('comittgetuserid');
            $wid_id=$this->input->post('wid_id');
            $get_user_id=$this->session->userdata('id');
            $getuserdetail=getUserDetailsById($get_user_id);
            $myruser_id=$getuserdetail->user_id;
            $config['upload_path']="./uploads_users/";
            $config['allowed_types']='gif|jpg|png|jpeg|pdf';
            $this->load->library('upload',$config);
            $this->load->library('upload',$config);
            if($this->upload->do_upload("file")){
            $filenamee = $this->upload->data();
              $request_fnd = array(
                
                'registeruser_id'=>$myruser_id, 
                'request_amt'=> $this->input->post('diposiramt'),
                'hash_id'=> $this->input->post('hash_id'),      
                'request_date'=>date('Y-m-d H:i:s'),
                'request_status'=>2,
                'fund_type'=>"USDT",
                'reciept'=> $filenamee['file_name'],
                'get_user_id'=>$get_user_commit_id,
                'commit_id'=>$comiit_id,
                'link_id'=>$comit_link_id,
                'withdrol_id'=>$wid_id
                
              );
              //print_r($request_fnd);
              //$getfirst=1;
        $getfirst=$this->User_model->request_inr_funds($request_fnd);
        if($getfirst)
        {
          $update_commit_field=array(
        'hash_id'=>$this->input->post('hash_id'), 
        ' update_slip'=>1,
        'slip_uplode'=>$filenamee['file_name'], 
        'uplade_date_time'=>date('Y-m-d H:i:s')
      );
          
         $this->User_model->update_committable($update_commit_field, $comit_link_id);
         // $this->session->set_flashdata('msg_success','<strong>Fund Request Submitted </strong>&nbsp; Successfully');
         // $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
          redirect('dashboard');
          //$this->load->view('users/fund_request_inr',$data);
        }
        else{
          $this->session->set_flashdata('msg_invalid','<strong>Request is not complete</strong>Try Again ');
          $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
         // $this->load->view('users/fund_request_inr',$data);
         //redirect('funds-request');

        }
       
      }else{
        $reerror= $this->upload->display_errors();
        $this->session->set_flashdata('msg_invalid','<strong>'.$reerror.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button> ');
        $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
       // $this->load->view('users/fund_request_inr',$data);
       //redirect('funds-request');
        print_r($reerror);
      }
            //if end
          }
          else{
            redirect('dashboard');
            //echo 'unvalid';
            //validation
            //$this->load->view('users/usdt_request', $data);
          }
        }
    
   }
   

   public function fundrequest_history()
      {
        $data=array();
        $data['title']="Fund - Provide - History";
        $data['tag']="Provide fund- History";
        $getU_id=$this->session->userdata('id');
        $getuserdetail=getUserDetailsById($getU_id);
        $userid=$getuserdetail->user_id;
        $data['fundrequest_his']=$this->User_model->getfundrequest_history($userid);
        $this->load->view('users/fund_request_history', $data);
      
      }
      public function get_fund_history()
      {
        $data=array();
        $data['title']="Fund - Provide - History";
        $data['tag']="Get fund - History";
        $getU_id=$this->session->userdata('id');
        $getuserdetail=getUserDetailsById($getU_id);
        $userid=$getuserdetail->user_id;
        $data['fund_get_his']=$this->User_model->fund_get_request($userid);
        $this->load->view('users/fund_get_my_history', $data); 
      }
   public function non_workin_wallete()
   {
        $data=array();
    $data['title']="Fund Wallete history ";
    $data['tag']="Non working Wallete";
    $idd=$this->session->userdata('id');
       $getuser=getUserDetailsById($idd);
          $userr_idd=$getuser->user_id;
    $data['non_work']=$this->User_model->get_non_working($userr_idd);
    $this->load->view('users/non_working',$data);
   }
   public function workin_wallete()
   {
        $data=array();
    $data['title']="working Wallete history ";
    $data['tag']="working Wallete";
    $idd=$this->session->userdata('id');
       $getuser=getUserDetailsById($idd);
          $userr_idd=$getuser->user_id;
    $data['workin_g_wallete']=$this->User_model->get_w_orking_wallete($userr_idd);
    $this->load->view('users/working_w',$data);
   }


    public function getdirect()
    {
      $data=array();
      $data['title']="Direct Team";
      $data['tag']="Direct Team";
      $getU_id=$this->session->userdata('id');
      $getuserdetail=getUserDetailsById($getU_id);
      $myreff=$getuserdetail->user_id;

     $data['myreffuser']=$this->User_model->getreffUser($myreff);
      
      $this->load->view('users/myreferral_list',$data);
    } 
    public function get_mydirect_node()
    {
       $getU_id=$this->session->userdata('id');
      $getuserdetail=getUserDetailsById($getU_id);
      $myreff=$getuserdetail->user_id;
         $page = $this->input->get('page') ?: 1; // Default to page 1
        $limit = $this->input->get('limit') ?: 10; // Default to 10 records per page
        $offset = ($page - 1) * $limit;
           $direct_users=$this->User_model->get_direct_node($myreff, $limit, $offset);
        // Fetch the user data
       // $data = $this->User_model->get_users($limit, $offset);

        // Optionally, get the total count for pagination
        $total_count = $this->User_model->get_total_count($myreff);

        // Prepare the response
        $response = [
            'data' => $direct_users,
            'total' => $total_count,
            'page' => $page,
            'limit' => $limit
        ];

        // Return the JSON response
        echo json_encode($response);

      // $direct_users=$this->User_model->get_direct_node($myreff, $limit, $offset);
    //echo json_encode(['data' => $direct_users]); 
    }

     public function subtree($user_id) {
    $subtree = $this->User_model->get_subtree($user_id, 2);
    echo json_encode($subtree);
}
public function get_user_data($user_id) {
  $arr1 = $this->User_model->get_user_by_id($user_id);

  $leftusr_id=get_my_left_node_user_id($user_id);
  if($leftusr_id)
  {
    $left_id=$leftusr_id->user_id;
    $leftteambusines=$leftusr_id->teambusiness;
    $left_own= gettopopsum($left_id);
    $finalLeft_business=$left_own+$leftteambusines;
    $arr_left=$this->User_model->count_team_member_s($left_id);
    $left_team=$arr_left+1;
  }
  else{
    $left_team=0;
    $finalLeft_business=0;
  }
  $rightusr_id=get_my_right_node_user_id($user_id);
  if(!empty($rightusr_id))
  {
    $right_id=$rightusr_id->user_id;
    $rightteambusines=$rightusr_id->teambusiness;
    $right_own= gettopopsum($right_id);
    $finalRight_business=$right_own+$rightteambusines;
    $arr_right=$this->User_model->count_team_member_s($right_id);
    $right_team=$arr_right+1;
  }
  else{
    $right_team=0;
    $finalRight_business=0;
  }
  
 $arr2=array("left_team" =>$left_team,"right_team" => $right_team,"left_team_business"=>$finalLeft_business,"right_team_business"=>$finalRight_business); 

 
  $userData = array_merge($arr1, $arr2);

  if ($userData) {
      echo json_encode($userData);
  } else {
      echo json_encode(['error' => 'User not found']);
  }
}

  
    public function getlevel()
    {
      $getU_id=$this->session->userdata('id');
      $getuserdetail=getUserDetailsById($getU_id);
      $utdat=$getuserdetail->user_id;
      $alldata=array();    
      $alldata['title']="leve Team";
      $alldata['tag']="Level Team";  
      $alldata['userId']=$utdat;
      $alldata['data']=$this->User_model->getdata_level();
      $this->load->view('users/level_team',$alldata);

    }
    public function roi_history()
    {
     $data=array();
     $data['title']="Daily Growth";
     $data['tag']="Daily Growth ";
     $getU_id=$this->session->userdata('id');
     $myuserid=getUserDetailsById($getU_id)->user_id;
     $data['roi_history']= $this->User_model->get_myroi_history($myuserid);
     $this->load->view('users/roi_trade_income',$data);
    }
   
   public function direct_income_history()
   {
    $data=array();
    $data['title']="Direct Bonus";
    $data['tag']="Direct  Income";
    $getU_id=$this->session->userdata('id');
    $myuserid=getUserDetailsById($getU_id)->user_id;
    $data['direct_history']= $this->User_model->get_myrdirect_history($myuserid);
    $this->load->view('users/direct_income',$data);
   }
    public function level_income_history()
   {
    $data=array();
    $data['title']="Level Income";
    $data['tag']="Level Income";
    $getU_id=$this->session->userdata('id');
    $myuserid=getUserDetailsById($getU_id)->user_id;
    $data['plus_level_inc_history']= $this->User_model->get_myplus_level_history($myuserid);
    $this->load->view('users/equity_plus_level_income',$data);
   }
   public function reward_income_history()
   {
    $data=array();
    $data['title']="Reward Income";
    $data['tag']="Reward Income";
    $getU_id=$this->session->userdata('id');
    $myuserid=getUserDetailsById($getU_id)->user_id;
    $data['get_reward_income']=$this->User_model->get_my_reward_income_history($myuserid);
    $this->load->view('users/invest_reward_income',$data);
   }
   
   
    public function myincome()
   {
        $data=array();
    $data['title']="My Income";
    $data['tag']="My Income";
    $idd=$this->session->userdata('id');
       $getuser=getUserDetailsById($idd);
          $userr_idd=$getuser->user_id;
    $data['non_work_income']=$this->User_model->get_non_working_income($userr_idd);
    $this->load->view('users/myincome',$data);
   }
      public function update_gpay()
{
  $data = array();
  $data['title']="Update bank details ";
  $data['tag']="Bank";
  $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  // $this->form_validation->set_rules('diposiramt', 'Diposite', 'trim|required|');
  // $this->form_validation->set_rules('gpay', 'Gpay', 'trim|required|is_unique[ax_tbl_profile.gpay]');
  $this->form_validation->set_rules('gpay', 'Gpay', 'trim|required');
  if($this->form_validation->run()){

                            $id=$this->session->userdata('id');
                       $user_id=getUserDetailsById($id)->user_id;
                            $is_Bank_account=is_bankAccount($user_id);
                         if (empty($is_Bank_account)){
                          
                            $insert_usddt= array(
                            'registeruser_id'=>$user_id,
                            'p_date'=>date('Y-m-d H:i:s'),
                            'gpay'=>$this->input->post('gpay')
                          );
                            $resultinsert=$upd_insert_usdt=$this->User_model->insert_usddt($insert_usddt);
                            if($resultinsert)
                            {
                              $this->session->set_flashdata('msg_success_usdt', '<strong>Gpay Details</strong> inserted successfully');
                              $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');
                              redirect('update-usdt');
                            }
                         }
                         else 
                         {
                          $gpay=$is_Bank_account->gpay;
                          $id=$is_Bank_account->id;
                          if(empty($gpay))
                          {
                            $update_usddt= array('gpay' => $this->input->post('gpay') );
                            $update_us=$this->User_model->update_usd_t($update_usddt ,$id);
                            if($update_us)
                            {
                              $this->session->set_flashdata('msg_success_usdt', '<strong>Gpay Details</strong> updated  Successfully');
                              $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');
                               redirect('update-usdt');
                            }
                          }
                          else{
                            $this->session->set_flashdata('msg_invalid_usdt','<strong>You are not </strong>Update your Gpay  details  again ! please Contact Admin  ');
                            $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
                           redirect('update-usdt');
                          }
                         } 

  }else{
    $this->load->view('users/usdt_profile',$data);
  }
}
public function update_phonepay()
{
  $data = array();
  $data['title']="Update bank details ";
  $data['tag']="Bank";
  $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  // $this->form_validation->set_rules('diposiramt', 'Diposite', 'trim|required|');
  // $this->form_validation->set_rules('phone_pay', 'Phonepay', 'trim|required|is_unique[ax_tbl_profile.phone_pay]');
  $this->form_validation->set_rules('phone_pay', 'Phonepay', 'trim|required');
  if($this->form_validation->run()){

                            $id=$this->session->userdata('id');
                            $user_id=getUserDetailsById($id)->user_id;
                            $is_Bank_account=is_bankAccount($user_id);
                         if (empty($is_Bank_account)){
                          
                            $insert_usddt= array(
                            'registeruser_id'=>$user_id,
                            'p_date'=>date('Y-m-d H:i:s'),
                            'phone_pay'=>$this->input->post('phone_pay')
                          );
                            $resultinsert=$upd_insert_usdt=$this->User_model->insert_usddt($insert_usddt);
                            if($resultinsert)
                            {
                              $this->session->set_flashdata('msg_success_usdt', '<strong>PhonePay Details</strong> inserted successfully');
                              $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');
                              redirect('update-usdt');
                            }
                         }
                         else 
                         { 
                          $phone_pay=$is_Bank_account->phone_pay;
                          $id=$is_Bank_account->id;
                          if(empty($phone_pay))
                          {
                            $update_usddt= array('phone_pay' => $this->input->post('phone_pay') );
                            $update_us=$this->User_model->update_usd_t($update_usddt ,$id);
                            if($update_us)
                            {
                              $this->session->set_flashdata('msg_success_usdt', '<strong>phonePay Details</strong> updated  Successfully');
                              $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');
                               redirect('update-usdt');
                            }
                          }
                          else{
                            $this->session->set_flashdata('msg_invalid_usdt','<strong>You are not </strong>Update your Gpay  details  again ! please Contact Admin  ');
                            $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
                           redirect('update-usdt');
                          }
                         } 

  }else{
    $this->load->view('users/usdt_profile',$data);
  }
}
public function update_paytm()
{
  $data = array();
  $data['title']="Update bank details ";
  $data['tag']="Bank";
  $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  // $this->form_validation->set_rules('diposiramt', 'Diposite', 'trim|required|');
  //$this->form_validation->set_rules('paytm', 'paytm', 'trim|required|is_unique[ax_tbl_profile.paytm]');
  $this->form_validation->set_rules('paytm', 'paytm', 'trim|required');
  if($this->form_validation->run()){

                            $id=$this->session->userdata('id');
                            $user_id=getUserDetailsById($id)->user_id;
                            $is_Bank_account=is_bankAccount($user_id);
                         if (empty($is_Bank_account)){
                          
                            $insert_usddt= array(
                            'registeruser_id'=>$user_id,
                            'p_date'=>date('Y-m-d H:i:s'),
                            'paytm'=>$this->input->post('paytm')
                          );
                            $resultinsert=$upd_insert_usdt=$this->User_model->insert_usddt($insert_usddt);
                            if($resultinsert)
                            {
                              $this->session->set_flashdata('msg_success_usdt', '<strong>paytm Details</strong> inserted successfully');
                              $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');
                              redirect('update-usdt');
                            }
                         }
                         else 
                         { 
                          $paytm=$is_Bank_account->paytm;
                          $id=$is_Bank_account->id;
                          if(empty($paytm))
                          {
                            $update_usddt= array('paytm' => $this->input->post('paytm') );
                            $update_us=$this->User_model->update_usd_t($update_usddt ,$id);
                            if($update_us)
                            {
                              $this->session->set_flashdata('msg_success_usdt', '<strong>paytm Details</strong> updated  Successfully');
                              $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');
                               redirect('update-usdt');
                            }
                          }
                          else{
                            $this->session->set_flashdata('msg_invalid_usdt','<strong>You are not </strong>update your paytm  details  again ! please Contact Admin  ');
                            $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
                           redirect('update-usdt');
                          }
                         } 

  }else{
    $this->load->view('users/usdt_profile',$data);
  }
}
public function update_upi()
{
  $data = array();
  $data['title']="Update bank details ";
  $data['tag']="Bank";
  $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  // $this->form_validation->set_rules('diposiramt', 'Diposite', 'trim|required|');

  // $this->form_validation->set_rules('upi', 'UPI', 'trim|required|is_unique[ax_tbl_profile.upi]');
  $this->form_validation->set_rules('upi', 'UPI', 'trim|required');
  if($this->form_validation->run()){

                            $id=$this->session->userdata('id');
                            $user_id=getUserDetailsById($id)->user_id;
                            $is_Bank_account=is_bankAccount($user_id);
                         if (empty($is_Bank_account)){
                          
                            $insert_usddt= array(
                            'registeruser_id'=>$user_id,
                            'p_date'=>date('Y-m-d H:i:s'),
                            'upi'=>$this->input->post('upi')
                          );
                            $resultinsert=$upd_insert_usdt=$this->User_model->insert_usddt($insert_usddt);
                            if($resultinsert)
                            {
                              $this->session->set_flashdata('msg_success_usdt', '<strong>upi Details</strong> inserted successfully');
                              $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');
                              redirect('update-usdt');
                            }
                         }
                         else 
                         {
                          $upi=$is_Bank_account->upi;
                          $id=$is_Bank_account->id;
                          if(empty($upi))
                          {
                            $update_usddt= array('upi' => $this->input->post('upi') );
                            $update_us=$this->User_model->update_usd_t($update_usddt ,$id);
                            if($update_us)
                            {
                              $this->session->set_flashdata('msg_success_usdt', '<strong>upi Details</strong> updated  Successfully');
                              $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');
                               redirect('update-usdt');
                            }
                          }
                          else{
                            $this->session->set_flashdata('msg_invalid_usdt','<strong>You are not </strong>Update your upi  details  again ! please Contact Admin  ');
                            $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
                           redirect('update-usdt');
                          }
                         } 

  }else{
    $this->load->view('users/usdt_profile',$data);
  }
}
    public function update_usdt()
      {
        $data=array();
        $data['title']="USDT";
        $data['tag']="Update USDT Details";
        if($_POST)
        {
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
         // $this->form_validation->set_rules('diposiramt', 'Diposite', 'trim|required|');
          $this->form_validation->set_rules('usdt_add','USDT BEP20','trim|required|alpha_numeric|min_length[20]');
          if($this->form_validation->run()){
                    //
                              $id=$this->session->userdata('id');
                            $user_id=getUserDetailsById($id)->user_id;
                            $is_Bank_account=is_bankAccount($user_id);
                         if (empty($is_Bank_account)){
                          
                            $insert_usddt= array(
                            'registeruser_id'=>$user_id,
                            'p_date'=>date('Y-m-d H:i:s'),
                            'usdt_add'=>$this->input->post('usdt_add')
                          );
                            $resultinsert=$upd_insert_usdt=$this->User_model->insert_usddt($insert_usddt);
                            if($resultinsert)
                            {
                              $this->session->set_flashdata('msg_success_usdt','<strong>USDT Details </strong>inserted  Successfully');
                              $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
                             redirect('update-usdt');
                            }
                         }
                         else 
                         {
                          $usdt_is=$is_Bank_account->usdt_add;
                          $id=$is_Bank_account->id;
                          if(empty($usdt_is))
                          {
                            $update_usddt= array('usdt_add' => $this->input->post('usdt_add') );
                            $update_us=$this->User_model->update_usd_t($update_usddt ,$id);
                            if($update_us)
                            {
                                $this->session->set_flashdata('msg_success_usdt','<strong>Bank Details </strong>updated  Successfully');
                              $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
                            redirect('update-usdt');
                            }
                          }
                          else{
                            $this->session->set_flashdata('msg_invalid_usdt','<strong>You are not </strong>Update your USDT details  again ! plsaese Contact Admin  ');
                            $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
                           redirect('update-usdt');
                          }
                         } 
                    //
          }else{
            // validation
            $this->load->view('users/usdt_profile',$data);
          }
     
         }else{
          $this->load->view('users/usdt_profile',$data);
        }
      

      }
 public function update_bankDetails()
       {
        $data = array();
        $data['title']="Update bank details ";
        $data['tag']="Bank";
        if($_POST)
        {          
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
          $this->form_validation->set_rules('bank_name', 'Bank-Name', 'trim|required');
          $this->form_validation->set_rules('acc_holder_name', 'Account-Holder', 'trim|required');
          $this->form_validation->set_rules('acc_no', 'Account-No', 'trim|required');
          $this->form_validation->set_rules('confirm_acc_no', 'Confirm-Account', 'trim|required|matches[acc_no]');
          $this->form_validation->set_rules('ifsc', 'IFSC', 'trim|required');
          //$this->form_validation->set_rules('usdt_add', 'UsDT', 'trim|required');
          if($this->form_validation->run()){
            $id=$this->session->userdata('id');
            $user_id=getUserDetailsById($id)->user_id;
            $is_Bank_account=is_bankAccount($user_id);
     if (empty($is_Bank_account)){
        $insertbankdata= array(
        'registeruser_id'=>$user_id,
        'p_date'=>date('Y-m-d H:i:s'),
        // 'usdt_add'=>$this->input->post('usdt_add'),
        'bank_name'=>$this->input->post('bank_name'),
        'acc_holder_name'=>$this->input->post('acc_holder_name'), 
        'acc_no'=>$this->input->post('acc_no'), 
        'ifsc'=>$this->input->post('ifsc'),
        
      );
      $insertResult=$this->User_model->insert_bank_account($insertbankdata);
      if($insertResult)
        {
          $this->session->set_flashdata('msg_success','<strong>Bank Details </strong>updated  Successfully');
          $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
           redirect('update-bank');
      }
      else{
        $this->session->set_flashdata('msg_invalid','<strong>Bank Details</strong> Not add -Try Again  ');
        $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
        redirect('update-bank');
      }
    }
    else{
      $bank_is=$is_Bank_account->bank_name;
      $id=$is_Bank_account->id;
      if(empty($bank_is))
      {
        $bankdata= array(
        'registeruser_id'=>$user_id,
        'p_date'=>date('Y-m-d H:i:s'),
        'bank_name'=>$this->input->post('bank_name'),
        'acc_holder_name'=>$this->input->post('acc_holder_name'), 
        'acc_no'=>$this->input->post('acc_no'), 
        'ifsc'=>$this->input->post('ifsc')
      );
      $updateresult=$this->User_model->update_bank_account($bankdata, $id);
      if($updateresult)
        {
          $this->session->set_flashdata('msg_success','<strong>Profile </strong>Bank Details Updated Successfully ');
          $this->session->set_flashdata('msg_class','alert alert-success alert-dismissible fade show');
         
          redirect('update-bank');
      }

      }else{

          $this->session->set_flashdata('msg_invalid','<strong></strong> You are not  update your bank details Again! please Contact Admin  ');
        $this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show');
         redirect('update-bank');
        
      }
    }

      }
          else{
            $this->load->view('users/bank_profile',$data);
          }
         
          
        }
        else{
          $this->load->view('users/bank_profile',$data);
        }
      
       }  
public function withdrawal()
{

  $data=array();
  $data['title']="Withdrawal";
  $data['tag']="Withdrawal Request ";
        $id=$this->session->userdata('id');
        $user_id=getUserDetailsById($id)->user_id;
        $is_Bank_account=is_bankAccount($user_id);
        $data['bank_details']=$is_Bank_account;

        if (!empty($is_Bank_account)){
        
          $result=$this->User_model->checkbankaccount($user_id);
          if($result)
          {           
            $this->load->view('users/widthdrawl_request',$data);
          }
          else{
            $data['msg']="Your Bank Account is not activate plaese contact your Admin";
            $this->load->view('User/freeze-bank_account_status',$data); 
          }

        }
        else{
          // update bank account 
         // $this->load->view('users/bank_profile');
        //update-usdt redirect('update-bank');
          redirect('update-usdt');
        }
  
  }
  public function my_withdrawl_history()
{

  
  $data= array();
  $data['title']="My Withdrawal History";
    $data['tag']="Withdrawal History ";
  $getuser=getUserDetailsById($this->session->userdata('id'));
  $user_id=$getuser->user_id;
  $data['withdrawal_history']=$this->User_model->getwithdrawal_history($user_id);

  $this->load->view('users/mywithdrawl_history',$data);
 
}
public function withdrawal_request() {  
    $data = array();
    $data['title'] = "Withdrawal";
    $data['tag'] = "Withdrawal Request ";
    $id = $this->session->userdata('id');
    $user_id = getUserDetailsById($id)->user_id;
    $is_Bank_account = is_bankAccount($user_id);
    $data['bank_details'] = $is_Bank_account;

    if ($_POST) {
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('mywidrowamt', 'Amount', 'required|callback_check_widtamt');
        $this->form_validation->set_rules('mtnxpass', 'Transaction', 'trim|required|callback_check_txnpassword');

        if ($this->form_validation->run()) {
            $getU_id = $this->session->userdata('id');
            $getuser = getUserDetailsById($getU_id);
            $User_rr_id = $getuser->user_id;
            $iam_active = $getuser->isactive;

            if ($iam_active == 1) {
                $request_amt = $this->input->post('mywidrowamt');
                $main_amount = sum_total_my_income($User_rr_id); // Ensure this function is returning correct value.

                if ($main_amount > 0 && $main_amount >= $request_amt) {
                    $res_is_stop = $this->User_model->check_widdrawl_stop();
                    if ($res_is_stop->status == 1) {
                    $currentHour = date('H');
                            $startHour = 8;
                            $endHour = 23;
                     if ($currentHour >= $startHour && $currentHour < $endHour) {

                        $detils_my_lastwithd = get_my_last_widthrawl_d($User_rr_id);
                        
                        if (!empty($detils_my_lastwithd)) {
                            $stuss = $detils_my_lastwithd->request_status;
                            $req_datae = $detils_my_lastwithd->request_date;
                            $lastdate = date('d', strtotime($req_datae));
                            $livedate = date('d', strtotime(date('Y-m-d H:i:s')));
                            $gapday = ($stuss == 0) ? 5 : abs($lastdate - $livedate);
                        } else {
                            $stuss = 3;
                            $gapday = 5;   
                        }

                        if ($gapday > 0 && $stuss != 2) {
                            $wamount_t = $this->input->post('mywidrowamt');  
                            $cureenc = 'USDT';  // This is hardcoded. Should be dynamic?
                            $walletamount_t = $main_amount;

                            $withdra_request = array(
                                'registeruser_id' => $User_rr_id,
                                'request_amt' => $request_amt,
                                'hash_id' => 'ax_tbl_nonworking',
                                'request_date' => date('Y-m-d H:i:s'),
                                'isactive' => TRUE,
                                'request_status' => 2,
                                'eth_add' => $cureenc,
                                'wallet_namew' => "Non-Working"
                            );

                            $result = $this->User_model->request_withdraw($withdra_request);
                            $request_Id = $result['last_id'];
                            $request_msg = $result['msg'];

                            if ($request_msg) {
                                $debitfrommain = array(
                                    'registeruser_id' => $User_rr_id, 
                                    'debit' => $request_amt, 
                                    'wdate' => date('Y-m-d H:i:s'), 
                                    'wstatus' => "withdrawal Request",  
                                    'withdra_method' => "USDT"
                                );
                                $restt = $this->User_model->debitidiffwalleyte($debitfrommain, 'ax_tbl_nonworking');

                                if ($restt) {
                                    $this->session->set_flashdata('msg_successr', '<strong>Request done !</strong> Successfully');
                                    $this->session->set_flashdata('msg_class', 'alert alert-success alert-dismissible fade show');  
                                    redirect('withdrawal');
                                } else {
                                    $this->session->set_flashdata('msg_invalidw', '<strong>Sorry !</strong> Request arose but wallet balance not deducted.');
                                    $this->session->set_flashdata('msg_class', 'alert alert-danger alert-dismissible fade show');  
                                    redirect('withdrawal');
                                }
                            } else {
                                $this->session->set_flashdata('msg_invalidw', '<strong>Sorry !</strong> Request not performed.');
                                $this->session->set_flashdata('msg_class', 'alert alert-danger alert-dismissible fade show');  
                                redirect('withdrawal');
                            }
                        } else {
                            $this->session->set_flashdata('msg_invalidw', '<strong>You have already  your 1 withdrawal pending . Please try again tomorrow.</strong>');
                            $this->session->set_flashdata('msg_class', 'alert alert-danger alert-dismissible fade show');  
                            redirect('withdrawal');
                        }
                     }else{
                        $this->session->set_flashdata('msg_invalidw', '<strong>Withdrawal Time </strong>. (08:00 AM to 08:00 PM)');
                                $this->session->set_flashdata('msg_class', 'alert alert-danger alert-dismissible fade show');
                                redirect('withdrawal');
                      }
                    } else {
                        $this->session->set_flashdata('msg_invalidw', '<strong>Services temporarily under process. Please try again later.</strong>');
                        $this->session->set_flashdata('msg_class', 'alert alert-danger alert-dismissible fade show');  
                        redirect('withdrawal');
                    }
                } else {
                    $this->session->set_flashdata('msg_invalidw', '<strong>Your account balance is insufficient.</strong>');
                    $this->session->set_flashdata('msg_class', 'alert alert-danger alert-dismissible fade show');  
                    redirect('withdrawal');
                }
            } else {
                $this->session->set_flashdata('msg_invalidw', '<strong>Your account is blocked.</strong>');
                $this->session->set_flashdata('msg_class', 'alert alert-danger alert-dismissible fade show');  
                redirect('withdrawal');
            }
        } else {
            $this->load->view('users/widthdrawl_request', $data);
        }
    } else {
        $this->load->view('users/widthdrawl_request', $data);
    }
}

  public function check_all_wallete_val($val)
  {
    

 $array = explode(' ', $val);

$total_count = count($array);
 if($total_count===5)
{
   $table=$array[1];
  if($table==="ax_tbl_nonworking" || $table==="direct_wallet")
  {
  return TRUE;
  }
  else{
    $this->form_validation->set_message('check_all_wallete_val', 'Please select valid value');
                return FALSE; 
  }
}
else{
  $this->form_validation->set_message('check_all_wallete_val', 'Invalid select');
                return FALSE; 
}
// Output the array for debugging
//print_r($array);
      
  }
  
public function get_test_value($node)
{
    // $user_idss=$this->User_model->get_user_userid($node);
   $user_idss=$this->get_test_valueYU($node);
    echo $user_idss;
}
public function get_test_valueYU($node)
{
    $Count = 0;  // Initialize count

    // Get user IDs by sponserd_id
    $user_idss = $this->User_model->get_users_by_sponserd_idy($node);

    // Check if the result is not empty
    if (!empty($user_idss)) {
        // Loop through the user IDs
        foreach ($user_idss as $User_top) {
            $topReg_id = $User_top->user_id;  // Get the user ID (no need for <br>)
            
            // Check if the user has top-up data
            $is_exist_top = $this->User_model->get_users_by_topupIs($topReg_id);
            
            // If top-up records exist for this user
            if ($is_exist_top >= 1) {
                $Count++;  // Increment count if condition is met
            }
        }
    } else {
       $Count=0;   // Exit the function early
    }

    // Output the final count value
    return $Count;  
}

public function check_widtamt($amtt)
{
    $uid = $this->session->userdata('id');
    $getuser = getUserDetailsById($uid);
    $userr_idd = $getuser->user_id;
    $mybalance = sum_total_my_balacece($userr_idd);

    // Check if amount is a valid multiple of 49 and greater than or equal to 49
    if ((int)$amtt >= 49 && (int)$amtt % 49 == 0) {
        if ($mybalance >= $amtt) {
            // Define the direct_user array
            $direct_user = array(0, 0, 3, 12, 30, 60);
            
            // Calculate how many direct users are required
            $get_out = $amtt / 49;
            $get_out = floor($get_out);  // Ensure it's an integer index

            if ($get_out <= 5) {
                $requir_direct = $direct_user[$get_out];
            } else {
                $requir_direct = 105;
            }

            // Check if the user has enough direct top-up users
            $get_users = $this->User_model->get_direct_topup_user($userr_idd);
            if ($get_users >= $requir_direct) {
                // Proceed with the withdrawal
                return TRUE; // This indicates the validation is successful
            } else {
                // Not enough direct users
                $this->form_validation->set_message('check_widtamt', "You need $requir_direct direct users to proceed for this amount( $ $amtt ) withdrawal");
                return FALSE;
            }
        } else {
            // Insufficient balance
            $this->form_validation->set_message('check_widtamt', 'Insufficient funds. You don’t have enough balance to proceed with the withdrawal');
            return FALSE;
        }
    } else {
        // Invalid amount
        $this->form_validation->set_message('check_widtamt', 'Please enter a valid amount of at least $49 and its multiple.');
        return FALSE;
    }
}   
   
       public function check_is_top_upthisId($usId_d)
  {
      $userdetails=getUserDetailsByspon_Id($usId_d);
      if(!empty($userdetails))
      {
          $is_activeUser=$userdetails->isactive;
          if($is_activeUser==1)
          {
            return TRUE;
          } 
      else{
               $this->form_validation->set_message('check_is_top_upthisId', 'You Allready Account Blocked your admin');
                return FALSE;
          } 
      }
      else{
        $this->form_validation->set_message('check_is_top_upthisId', 'User Id is Wrong');
        
            return FALSE;

      }
      
  }
   public function check_user_valid($usId_d)
  {
      $userdetails=getUserDetailsByspon_Id($usId_d);
      if(!empty($userdetails))
      {
         
            return TRUE;
          
      }
      else{
        $this->form_validation->set_message('check_user_valid', 'User Id is Wrong');
        
            return FALSE;

      }
      
  }
  
  public function check_amount_valid($numre)
  {
    if (ctype_digit($numre) && (int)$numre > 0  ) {
            return TRUE;
            } else {
                $this->form_validation->set_message('check_amount_valid', 'Valid Amount Please.');
                return FALSE;  
          }
  }
  public function level_range($level_number) {

        if (ctype_digit($level_number) && $level_number >= 1 && $level_number <= 5) {
            return true;
        } else {
            $this->form_validation->set_message('level_range', 'Try Again !.');
            return false;
        }
    }
  public function check_amount($number) {
  
          $getuser=getUserDetailsById($this->session->userdata('id'));
          $userr_idd=$getuser->user_id;
          $mainactive_amount=getfunds($getuser->user_id);
          // $getlast_topval=Last_top_Date_get($userr_idd);

          if ( $number <= $mainactive_amount && ctype_digit($number) && (int)$number > 0  ) {
            return TRUE;
            } else {
                $this->form_validation->set_message('check_amount', 'your balance is insufficient .');
                return FALSE;  
          }
  }
  public function check_amount_investpack($amtt)
  {
$amt=$amtt;
    $pack_id=$this->cvcheck_pack($amt);
     
          if ($pack_id >=1 && $pack_id <= 4) {
         return TRUE; // Return true if pack_id is in the range 1-4
      } else {
          
           $this->form_validation->set_message('check_amount_investpack', 'Please Enter Valid Amount .');
                      return FALSE;  
      }

  }
  
  public function check_amt_for_coommitment($amt)
  {
      $result = $this->User_model->get_pack_by_amount($amt);

        // Check if a row was returned
        if ($result) {
              return TRUE; 
        } else {
            // If no row is found, return an empty response or message
           $this->form_validation->set_message('check_amt_for_coommitment', 'Please enter don`t try un valid activity');
                      return FALSE;  
        }
  }
  public function check_amt_for_compound($amtt)
  {
     $uid=$this->session->userdata('id');
     $getuser=getUserDetailsById($uid);
      $userr_idd=$getuser->user_id;
      $mybalance=sum_total_my_income($userr_idd);
      $amt=$amtt;
      $pack_id=$this->cvcheck_pack($amt);
          if ($pack_id >=1 && $pack_id <= 4) {
               if($amt <= $mybalance)
               {
                return TRUE; // Return true if pack_id is in the range 1-4
               }else{
                 $this->form_validation->set_message('check_amt_for_compound', 'Please Enter sufficient  Amount .');
                            return FALSE;
               }
            } else {
           $this->form_validation->set_message('check_amt_for_compound', 'Please enter a valid amount ');
                      return FALSE;  
          } 
  }
  
    

  public function check_amount_top_u($number) {

    $is_not_yes_packk=getpackdetals($number);
  
          $getuser=getUserDetailsById($this->session->userdata('id'));
          $userr_idd=$getuser->user_id;
          $mainactive_amount=getfunds($getuser->user_id);
          // $getlast_topval=Last_top_Date_get($userr_idd);


          if ( $number <= $mainactive_amount && ctype_digit($number) && (int)$number > 0  && !empty($is_not_yes_packk) ) {
            return TRUE;
            } else {
                $this->form_validation->set_message('check_amount_top_u', 'your balance is insufficient .');
                return FALSE;  
          }
  }
  public function check_amt_api($amt_api)
  {
    if((int)$amt_api > 0 )
    {
      return TRUE;
    }else{
      $this->form_validation->set_message('check_amt_api', 'Amount is invalid.');
    }
  }
  public function check_currency_type($targetValue)
  {
        $response=get_currency();
        $value=json_decode($response,true);
   //     $targetValue = 'USDT-TRC20';
        $currencyArray = [];
        // Loop through each item and store the currency values in $currencyArray
        foreach ($value['data'] as $values) {
            $currencyArray[] = $values['currency'];
        }
        if (in_array($targetValue, $currencyArray)) { 
          return TRUE;
        }else{
          $this->form_validation->set_message('check_currency_type', 'Invalide select value ');
        }
  }
  public function check_txnpassword($txnp)
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
    public function check_password($pass)
    {
      $getU_id=$this->session->userdata('id');
      $getuser=getUserDetailsById($getU_id);
      $mypass=$getuser->password;
      if($mypass === $pass)
      {
        return TRUE;
      }
      else{
        $this->form_validation->set_message('check_password','The Current Password Not Valid');
        return FALSE;
      }
    }
    
     public function check_topup_expiry($user_id)
{
   $mytopupdeatils=Last_top_Date_get($user_id);
   if(!empty($mytopupdeatils))
   {
    $last_topup=$mytopupdeatils->topupdate;
    $currentdate = date('Y-m-d H:i:s');
    
    // Convert last topup date to a timestamp for comparison
    $last_topup_date = strtotime($last_topup);  // Convert to timestamp
    $current_date = strtotime($currentdate);    // Convert to timestamp
    // Check if the difference between the current date and last topup is more than 33 days
    $expiry_period = 33 * 24 * 60 * 60;  // 33 days in seconds

    if (($current_date - $last_topup_date) > $expiry_period) {
        return 0;  // Return 'Expired' if more than 33 days have passed
    } else {
        return 1;  // Return 'Not Expired' if within 33 days
    }
   }else{
    return 1;
   }
    // Get current date and time
}
   
 

}
