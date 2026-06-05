<?php
defined('BASEPATH') OR exit('No direct script access allowed');
       

class Robot_con extends CI_Controller {
    public function __construct()
      {
      
        parent::__construct();
        $this->load->helper('commonn_helper');
        $this->load->library('form_validation');
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
         public function index()
        {
          
                  $getUser_id=$this->session->userdata('id');
                  $getuserdetail=getUserDetailsById($getUser_id);
                  $user_id=$getuserdetail->user_id;
                  $isactive=$getuserdetail->isactive;
                  $bot_id=$getuserdetail->bot_id;
                  if(!empty($bot_id))
                  {
                    echo $bot_id."<br>";
                    echo "not empty";
                  }else
                  {
                    echo $bot_id."<br>";
                    echo "empty";
                  }
        }
public function get_pop_robot()
{
  $top_upId=1;
   $data['top_up_id']=$top_upId;
  $this->load->view('users/popup_bot', $data);
}
        public function buy_bv()
        {
           $data=array();
        $data['title']="buy bv";
        $data['tag']="Buy BV";
         $data['getpack_robot']=$this->Robot_model->getpack_robot();
        // print_r($data);
         if($_POST)
         {
          //

          date_default_timezone_set('Asia/Kolkata');
          $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
         // $this->form_validation->set_rules('sponsed_id', 'UserId', 'trim|required|callback_check_is_top_upthisId');
          $this->form_validation->set_rules('roipackselect', 'Select', 'trim|required|callback_check_amount_robot');
          $this->form_validation->set_rules('tnxpass', 'Transaction', 'trim|required|callback_check_txnpassword');
          if($this->form_validation->run())
          {
                  $getUser_id=$this->session->userdata('id');
                  $getuserdetail=getUserDetailsById($getUser_id);
                  $user_id=$getuserdetail->user_id;
                  $isactive=$getuserdetail->isactive;
                   $bottt_id=$getuserdetail->bot_id;
                   
                  if($isactive==1)
                      {
                        $pac_kval=$this->input->post('roipackselect');
                        $getlast_botval=Last_buy_bot_get($user_id);
                          if(empty($getlast_botval))
                          {
                             $last_bot_valuee=0;
                          }
                          else{
                             $last_bot_valuee=$getlast_botval->amt;
                          }
                            if($pac_kval > $last_bot_valuee)
                            {
                              $mynunmberrow=$this->Robot_model->my_bot_exist($user_id);
                              if($mynunmberrow>0)
                              {
                                  $bot_id=$bottt_id;
                              }else{
                                $bot_id="BOT".mt_rand(100000,999999);
                              }
                                  //  $bot_id="BOT".mt_rand(100000,999999);
                                $packd_etals=getpackdetals_robot($pac_kval);
                                  $month=$packd_etals->valid_month;
                                  $price=$packd_etals->amt;
                                  $bv=$packd_etals->bv;
                                  $current_date = new DateTime();               
                                  $current_date->modify('+' . $month . ' months');
                                  $current_date->format('Y-m-d H:i:s');
                                  $expire_date = $current_date->format('Y-m-d H:i:s');
                                  $purchage_robot= array(
                                            'registeruser_id' =>$user_id,
                                            'bot_user_id' =>$bot_id,
                                            'amt' =>$pac_kval,
                                            'bv' =>$bv,
                                            'valid_month' =>$month,
                                            'purchage_date' =>date('Y-m-d H:i:s'),
                                            'expire_date' =>$expire_date,
                                            'create_at' =>date('Y-m-d H:i:s'),
                                            );
                                  //print_r($purchage_robot); 
                                  $result=$this->Robot_model->bot_up($purchage_robot);
                                   //$top_upId=1;
                                   $top_upId=$result['last_id'];
                                   if($top_upId)
                                   {
                                    $tranferactive=  array(
                                    'registeruser_id'=>$user_id,
                                    'debit'=>$pac_kval, 
                                    'to_Id'=>$user_id,
                                    'wdate'=>date('Y-m-d H:i:s '),
                                    'wstatus'=>"Bot",
                                    'show_for'=>$user_id
                                  );
                                //print_r($tranferactive);
                                      $resulty= $this->User_model->transferfund_activewallf1($tranferactive);    
                                        if($resulty)
                                        {
                                          //
                                          $category_id=$user_id;  
                                          $parents_fetch = $this->Robot_model->get_parents_with_depth($category_id);
                                        if (!empty($parents_fetch)) {
                                             $count=1;
                                             foreach ($parents_fetch as $parent) {
                                              $depthh=$parent['depth'];
                                                if($count<=$depthh)
                                                {
                                                    echo $count++;
                                                    // team bussiness
                                                    $get_teambus=getUserDetailsByspon_Id($parent['user_id']);
                                                    $team=$get_teambus->teambv;
                                                    $updteambvs=$bv+$team;
                                                    $forusrsid=$parent['user_id'];
                                                    $this->Robot_model->update_teambusiness($updteambvs, $forusrsid);  
                                                    //level income create
                                                    
                                                   
                                                }
                                             }
                              // $this->session->set_flashdata('msg_success','Bot Confirm !  ');
                              // $this->session->set_flashdata('msg_class','alert-success');
                              //       redirect('buy-bv');
                               $data['top_up_id']=$top_upId;
  $this->load->view('users/popup_bot', $data);
                                          }
                                          
                                        
                                        } 
                                        else{
                                         $this->session->set_flashdata('msg_invalid','Bot puchage done but transfer not update activation account! ');
                                    $this->session->set_flashdata('msg_class','alert-danger');
                                    redirect('buy-bv');
                                        } 
                                   }else{
                                    $this->session->set_flashdata('msg_invalid','Sorry ! Bot not confirm  ');
                              $this->session->set_flashdata('msg_class','alert-danger');
                                    redirect('buy-bv');
                                   }            
                            }
                            else{
                               $this->session->set_flashdata('msg_invalid','Amount should be  greater than privous package');
              $this->session->set_flashdata('msg_class','alert-danger');
              redirect('buy-bv');
                            }
                      }else{
                            $this->session->set_flashdata('msg_invalid','Your account allready is blocked contact your Admin');
              $this->session->set_flashdata('msg_class','alert-danger');
                        
                redirect('buy-bv');
                      }
          }else{
            // validation
            $this->load->view('users/robot_page', $data); 
          }

          //

         }else{
           $this->load->view('users/robot_page', $data); 
         }
        }
//
        public function bot_history()
      {
      $data=array();
        $data['title']="Bot-history";
        $data['tag']="Bot - History";
      $getU_id=$this->session->userdata('id');
      $myuserid=getUserDetailsById($getU_id)->user_id;
      $data['bot_history']= $this->Robot_model->get_bot_history($myuserid);
      $this->load->view('users/bot_history', $data);
  }
   public function bv_matching_history()
      {
      $data=array();
        $data['title']="BV Matching History";
        $data['tag']="BV Matching History";
      $getU_id=$this->session->userdata('id');
      $myuserid=getUserDetailsById($getU_id)->user_id;
      $data['bv_match_history']= $this->Robot_model->bv_matching_history($myuserid);
      $this->load->view('users/bv_matching_history_page', $data);
  } public function bv_trade_history()
      {
      $data=array();
        $data['title']="BV Matching Trade Income";
        $data['tag']="BV Matching Trade Income";
      $getU_id=$this->session->userdata('id');
      $myuserid=getUserDetailsById($getU_id)->user_id;
      $data['bv_trade_history']= $this->Robot_model->bv_trade_history($myuserid);
      $this->load->view('users/bv_trade_history_page', $data);
  } public function bv_reward__history()
      {
      $data=array();
        $data['title']="bv reward history";
        $data['tag']="BV Matching Reward Income";
      $getU_id=$this->session->userdata('id');
      $myuserid=getUserDetailsById($getU_id)->user_id;
      $data['bv_rewat_history']= $this->Robot_model->bv_reward__history($myuserid);
      $this->load->view('users/bv_reward__history_page', $data);
  }

public function bv_trade_income__history()
{
  $data=array();
        $data['title']="bv trade income history";
        $data['tag']="BV Daily Trade Income";
      $getU_id=$this->session->userdata('id');
      $myuserid=getUserDetailsById($getU_id)->user_id;
      $data['bv_daily_trade_history']= $this->Robot_model->bv_daily_trade_incomeee_history($myuserid);
      $this->load->view('users/bv_daily_trade_income_history_page', $data);
}
public function bv_royal_matching_incom_history()
{
  $data=array();
        $data['title']="royalty club income history";
        $data['tag']="Royalty Club Income";
      $getU_id=$this->session->userdata('id');
      $myuserid=getUserDetailsById($getU_id)->user_id;
      $data['bv_royalty_income_history']= $this->Robot_model->bv_royalty_incomeee_history($myuserid);
      $this->load->view('users/bv_royalty_income_history_page', $data);
}

public function idd()
{
  
  $this->Robot_model->get_ty();
}




      //
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
  public function check_amount_robot($number) {

    $is_not_yes_roboty_packk=getpackdetals_robot($number);
  
          $getuser=getUserDetailsById($this->session->userdata('id'));
          $userr_idd=$getuser->user_id;
          $mainactive_amount=getfunds($getuser->user_id);
          // $getlast_topval=Last_top_Date_get($userr_idd);


          if ( $number <= $mainactive_amount && ctype_digit($number) && (int)$number > 0  && !empty($is_not_yes_roboty_packk) ) {
            return TRUE;
            } else {
                $this->form_validation->set_message('check_amount_robot', 'your balance is insufficient or invalid .');
                return FALSE;  
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
  public function get_turnn()
  {
  // Example usage
$user_id='user1';
$expire_date =$this->Robot_model->last_date_get_mybot($user_id);
//$expire_date =$this->Robot_model->calculate_expiry_date($lastdate, $month);
echo "Expiry date: " . $expire_date;

    }
}