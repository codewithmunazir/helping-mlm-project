<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
       public function insert_qr_inr($dataqr, $adm_id)
       {
             $this->db->where('adminid', $adm_id);
              $query=$this->db->update('ax_tbl_admin_log', $dataqr);
              if($query){
                  return 1;
              }
              else{
                  return 0;
              }
       }
       public function inbox()
       {
        $redd=0;
        $query=$this->db->where('mail_to', 'Admin');
        $query=$this->db->where('is_read',$redd);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_email');
//        echo $this->db->last_query();
        return $query->result_array();
       }
       public function outnbox()
       {
        $query=$this->db->where('registeruser_id', 'Admin');
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_email');
//        echo $this->db->last_query();
        return $query->result_array();
       }
function show_percent_list()
    {
        $query=$this->db->get('ax_tbl_royalti_percent');
                return $query->result_array(); 
    }
    public function insert_datat_widh_drwal($insert_widhdra)
    {
        if($insert_widhdra)
                {
                    $this->db->insert('ax_tbl_request',$insert_widhdra);
                   
                    return true;
                    
                }else{
                    return false;
                } 
    }
    public function get_usdt_add($iduser) {
        // Fetch only the 'usdt_add' column from ax_tbl_profile where registeruser_id matches $iduser
        $this->db->select('usdt_add');
        $this->db->from('ax_tbl_profile');
        $this->db->where('registeruser_id', $iduser);

        // Execute the query
        $query = $this->db->get();

        // Check if a result is found
        if ($query->num_rows() > 0) {
            // Return the 'usdt_add' value (it will be the first column of the first row)
            return $query->row()->usdt_add;
        } else {
            // Return null if no result is found
            return null;
        }
    }
     public function update_roaylt_admi($update_percentroyal, $id)
    {
            
         $appointment_id = $id;
        $this->db->where('id', $appointment_id);
        $query=$this->db->update('ax_tbl_royalti_percent', $update_percentroyal);
        if($query){
           return true;
        }
        else{
          return false;
        }
        
    }
     
      public function Tt_level_income()
      {
        $lev_in="Daily Level Bonus"; 
        $conddition = array('wstatus' =>$lev_in);
         $this->db->select_sum('credit');
         $query=$this->db->where($conddition);
        $query = $this->db->get('ax_tbl_nonworking');
        
        if ($query->num_rows() > 0) {
            return $query->row()->credit;
        } else {
            return 0; // Return 0 if no matching records found
        }
    }
   public function Tt_trade_income() {
        $tradein="Trade Bonus"; 
        $conddition = array('wstatus' =>$tradein);
        
         $this->db->select_sum('credit');
         $query=$this->db->where($conddition);
        $query = $this->db->get('ax_tbl_nonworking');
        
        if ($query->num_rows() > 0) {
            return $query->row()->credit;
        } else {
            return 0; // Return 0 if no matching records found
        }
    }
    //   public function Tt_trade_income()
    //   {

    //     $this->db->select_sum('credit');      
    //     $this->db->from('roi_wallet');        
    //    // $this->db->where('',$userid);      
    //     $query=$this->db->get();  
            
    //    // return
    //      $getcr= $query->row()->credit;  
    //      if($getcr !="")
    //      {
    //         return $getcr; 
    //      } 
    //      else{
    //         return "0.00";
    //      }
    //   }
public function Tt_booster_income(){
    $bosotsk="Booster Bonus";
    $conddition = array('wstatus' =>$bosotsk);
    
     $this->db->select_sum('credit');
     $query=$this->db->where($conddition);
    $query = $this->db->get('direct_wallet');
    
    if ($query->num_rows() > 0) {
        return $query->row()->credit;
    } else {
        return 0; // Return 0 if no matching records found
    }
} 
public function Tt_direct_income()
{
    $direct_in="Direct Bonus";
    $conddition = array('wstatus' =>$direct_in);
    
     $this->db->select_sum('credit');
     $query=$this->db->where($conddition);
    $query = $this->db->get('direct_wallet');
    
    if ($query->num_rows() > 0) {
        return $query->row()->credit;
    } else {
        return 0; // Return 0 if no matching records found
    }
} 
public function Tt_salary_income()
{
    $salery="Sallary Bonus"; 
    $conddition = array('wstatus' =>$salery);
    
     $this->db->select_sum('credit');
     $query=$this->db->where($conddition);
    $query = $this->db->get('direct_wallet');
    
    if ($query->num_rows() > 0) {
        return $query->row()->credit;
    } else {
        return 0; // Return 0 if no matching records found
    }
}
//
// 
public function funds_bonus()
{
    $funds_in="Funds Bonus";
    $conddition = array('wstatus' =>$funds_in);
    
     $this->db->select_sum('credit');
     $query=$this->db->where($conddition);
    $query = $this->db->get('direct_wallet');
    
    if ($query->num_rows() > 0) {
        return $query->row()->credit;
    } else {
        return 0; // Return 0 if no matching records found
    }
}

public function tt_Bussiness()
{
    $this->db->select_sum('topup_amt');      
    $this->db->from('ax_tbl_topup');        
   // $this->db->where('',$userid);      
    $query=$this->db->get();  
        
   // return
     $getcr= $query->row()->topup_amt;
     if($getcr !="")
     {
        return $getcr; 
     } 
     else{
        return "0.00";
     }
}
public function funt_extra_funds_credit($insert_funds_extra)
{
    if($insert_funds_extra)
    {
        $this->db->insert('direct_wallet',$insert_funds_extra);
        $last_id=$this->db->insert_id();
        return array('last_id'=> $last_id,'msg'=>'1');
        
    }else{
        return array('last_id'=>0,'msg'=>'0');
    } 
}
public function tt_approved_widrra()
{
    $val_u=1;
//     $this->db->select_sum('request_amt');      
//     $this->db->from('ax_tbl_request');        
//     $this->db->where('request_status',$val_u);      
//     $query=$this->db->get();  
        
//    // return
//      $getcr= $query->row()->request_amt;
//      if($getcr !="")
//      {
//         return $getcr; 
//      } 
//      else{
//         return "0.00";
//      }
     $this->db->select('SUM(request_amt) AS Myappearoved');    
     $this->db->from('ax_tbl_request');       
     $this->db->where('request_status', $val_u);     
        $query=$this->db->get();      
        //return  
        $MylevelErning=$query->row()->Myappearoved;
        return $MylevelErning;
    
}
public function link_comitt_value($insert_link_val)
{
    
            $this->db->insert('commitments_tbl_provide_get_help',$insert_link_val);
              $last_id=$this->db->insert_id();
        return $last_id;
         // return true;
}
public function Tt_active()
{
    
    $val_u=1;
    $this->db->where('istopup', $val_u);
    $this->db->from('reg_table'); 
    $count_tt_active = $this->db->count_all_results();

    return $count_tt_active;
}
public function Tt_inactive()
{
    $val_u=0;
    $this->db->where('istopup', $val_u);
    $this->db->from('reg_table'); 
    $count_tt_inactive = $this->db->count_all_results();
    return $count_tt_inactive;
}

      //
      
      
       public function insert_news($insert_news)
       {
            if($insert_news)
            {
             return($this->db->insert('latset_news',$insert_news));
            }
            else{
                return 0;
            }
       }
       public function funtTransDebit($AdminDebit)
       {
            if($AdminDebit)
            {
             return($this->db->insert('ax_tbl_wallet_fund',$AdminDebit));
            }
            else{
                return 0;
            }
       }
       public function insert_ads_data($datadds)
       {
        if($datadds)
        {
         return($this->db->insert('ax_tbl_adds_images',$datadds));
        }
        else{
            return 0;
        }
       }
       public function get_messg($chat_id)
       {
        $this->db->select('*');		
        $this->db->from('ax_tbl_email');		
        $this->db->where('chat_key',$chat_id);		
        $query=$this->db->get();		
        return  $query->row();
       }
       public function reply_email_masg($reply_data)
       {
        if($reply_data)
        {
        return($this->db->insert('ax_tbl_email',$reply_data));
        }
        else{
        return 0;
        }
       }
       public function Compose_email_fre($compose_ema)
       {
        if($compose_ema)
        {
        return($this->db->insert('ax_tbl_email',$compose_ema));
        }
        else{
        return 0;
        }
       }
       public function Isread_email($udate_dat, $msg_id)
       {
        $update_action=$udate_dat['is_read'];
        $appointment_id = $msg_id;
       $this->db->where('id', $appointment_id);
       $query=$this->db->update('ax_tbl_email', $udate_dat);
       if($query){
          return array('last_action'=> $update_action,'msg'=>'1');
       }
       else{
         return array('last_action'=> $update_action,'msg'=>'0');
       }
       }
       public function iamge_visblitychng($img_visi, $img_id)
       {
        $update_action=$img_visi['visiblity'];
        $appointment_id = $img_id;
       $this->db->where('id', $appointment_id);
       $query=$this->db->update('ax_tbl_adds_images', $img_visi);
       if($query){
          return array('last_action'=> $update_action,'msg'=>'1');
       }
       else{
         return array('last_action'=> $update_action,'msg'=>'0');
       }
       }
       public function funtTransCredit($UserCredit)
       {
                if($UserCredit)
                {
                return($this->db->insert('ax_tbl_wallet_fund',$UserCredit));
                }
                else{
                return 0;
                }
       }
       public function fundTransferHistory()
       {
                $query=$this->db->where('show_for', 'A12B13');
                $query = $this->db->get('ax_tbl_wallet_fund');
        //        echo $this->db->last_query();
                return $query->result_array();
            
       }
       public function get_all_Users()
       {
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('reg_table');
        return $query->result_array();
       }
       function top_up($topup_admin)
       {
        if($topup_admin)
         {
             $this->db->insert('ax_tbl_topup',$topup_admin);
             $last_id=$this->db->insert_id();
             return array('last_id'=> $last_id,'msg'=>'1');
             
         }else{
             return array('last_id'=>0,'msg'=>'0');
         }
       }
       function get_parents_with_depth($category_id) {
        $parents = [];
        $depth = 0;

        while ($category_id) {
            $query = $this->db->select('*')
                              ->where('user_id', $category_id)
                              ->get('reg_table');

            if ($query->num_rows() == 0) {
                break; // Break if category not found
            }

            $category = $query->row();
            $parents[] = [
                'id' => $category->id,
                'user_id'=>$category->user_id,
                'name' => $category->fullname,
                'depth' => $depth,
            ];

            $category_id = $category->sponserd_id;
            $depth++;
           
        }

        return $parents;
    }
    function insert_income_wallet($level_income_insert_mwallete)
        {
            if($level_income_insert_mwallete)
            {
                $this->db->insert('ax_tbl_wallet',$level_income_insert_mwallete);

                $last_id=$this->db->insert_id();
    
                return array('last_id'=> $last_id,'msgg'=>'1');
            }
            else{
                return array('last_id'=>0,'msgg'=>'0');

            }
        }
       function generate_level_income($insertInitialLevel)
        {
            if($insertInitialLevel)
            {
                return($this->db->insert('ax_tbl_level_income',$insertInitialLevel));
               }
               else{
                   return 0;
               }
        }
        function gettopup()
        {
           $query=$this->db->order_by('id', 'DESC');
          $query=$this->db->get('ax_tbl_topup');
                return $query->result_array(); 
        }
        function getlevelincome()
        {
           $query=$this->db->order_by('id', 'DESC');
          $query=$this->db->get('ax_tbl_level_income');
                return $query->result_array(); 
        }
        function getfund_req()
        {
            $pending=2;
            $query=$this->db->where('request_status',$pending);
             $query=$this->db->order_by('id', 'DESC');
             $query=$this->db->get('ax_tbl_fund_request');
                  return $query->result_array(); 
        }
        function getfund_commitments()
        {
            $pending=1;
            $query=$this->db->where('show_admin',$pending);
             $query=$this->db->order_by('id', 'DESC');
             $query=$this->db->get('commitments');
                  return $query->result_array(); 
        }
        function get_help_width_request()
        {
        
           $pending=2;
          $query=$this->db->where('request_status',$pending);
           $query=$this->db->order_by('id', 'DESC');
           $query=$this->db->get('ax_tbl_request');
                return $query->result_array(); 
        }
        // function getwithdrawl_req()
        // {  
        //    $pending=2;
        // //   $query=$this->db->where('request_status',$pending);
        // //    $query=$this->db->order_by('id', 'DESC');
        // //    $query=$this->db->get('ax_tbl_request');
        // //         return $query->result_array(); 
        // $this->db->select('ax_tbl_request.*, ax_tbl_profile.p_date, ax_tbl_profile.p_status, ax_tbl_profile.usdt_add, ax_tbl_profile.trx_add, ax_tbl_profile.bank_name, ax_tbl_profile.acc_holder_name, ax_tbl_profile.acc_no, ax_tbl_profile.ifsc, ax_tbl_profile.isactive');
        // $this->db->from('ax_tbl_request');
        // $this->db->join('ax_tbl_profile', 'ax_tbl_profile.registeruser_id = ax_tbl_request.registeruser_id');
        // $this->db->where('ax_tbl_request.request_status', $pending);  // Fetch only orders where status = 1
        // $this->db->order_by('ax_tbl_request.id', 'DESC'); 
        // $query = $this->db->get();
        // return $query->result_array();
        // }
        function getwithdrawl_req()
        {
            $pending = 2;
            $this->db->select('
                ax_tbl_request.*, 
                ax_tbl_profile.p_date, 
                ax_tbl_profile.p_status, 
                ax_tbl_profile.usdt_add, 
                ax_tbl_profile.trx_add, 
                ax_tbl_profile.bank_name, 
                ax_tbl_profile.acc_holder_name, 
                ax_tbl_profile.acc_no, 
                ax_tbl_profile.ifsc, 
                ax_tbl_profile.isactive,
                reg_table.fullname,
                reg_table.email,
                reg_table.mobile
            ');
            $this->db->from('ax_tbl_request');
            $this->db->join('ax_tbl_profile', 'ax_tbl_profile.registeruser_id = ax_tbl_request.registeruser_id');
            $this->db->join('reg_table', 'reg_table.user_id = ax_tbl_request.registeruser_id');  // Join reg_table with the condition
            $this->db->where('ax_tbl_request.request_status', $pending);  // Fetch only requests with status = 2
            $this->db->order_by('ax_tbl_request.id', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
        function getfunds_requestafter()
        {
            $success=1;
           $reject=0;
           $query=$this->db->where('request_status',$success);
           $query=$this->db->or_where('request_status',$reject);
           $query=$this->db->order_by('id', 'DESC');
           $query=$this->db->get('ax_tbl_fund_request');
                return $query->result_array();    
        }
        public function creditdiffwalleyte($returcredititfrommain ,$tblename)
    {
        

    
        if(!empty($returcredititfrommain)  && !empty($tblename))
         {
        
         return($this->db->insert($tblename, $returcredititfrommain));
          //echo $this->db->last_query();
         }
         else{
            return 0;
         }
         
    }
        function getwithdrawal_afteraction()
        {
           $success=1;
           $reject=0;
           $query=$this->db->where('request_status',$success);
           $query=$this->db->or_where('request_status',$reject);
           $query=$this->db->order_by('id', 'DESC');
           $query=$this->db->get('ax_tbl_request');
                return $query->result_array(); 
        }
        function update_fundreqst_admi($update_fundrequest ,$id)
        {
            $update_action=$update_fundrequest['request_status'];
         $appointment_id = $id;
        $this->db->where('id', $appointment_id);
        $query=$this->db->update('ax_tbl_fund_request', $update_fundrequest);
        if($query){
           return array('last_action'=> $update_action,'msg'=>'1');
        }
        else{
          return array('last_action'=> $update_action,'msg'=>'0');
        }
        
        }
        function update_withdraw_admi($update_withdra ,$id)
        {
          $update_action=$update_withdra['request_status'];
         $appointment_id = $id;
        $this->db->where('id', $appointment_id);
        $query=$this->db->update('ax_tbl_request', $update_withdra);
        if($query){
           return array('last_action'=> $update_action,'msg'=>'1');
        }
        else{
          return array('last_action'=> $update_action,'msg'=>'0');
        }
       

        }
        function refund_return($retunamount)
        {
          if($retunamount)
                {
                return($this->db->insert('ax_tbl_wallet',$retunamount));
                }
                else{
                return 0;
                }
        }
        function update_wallete_add($update_wallete, $req_userid, $req_date, $tble_name)
        {
 
            $condditionj = array('registeruser_id' => $req_userid, 'wdate' =>$req_date);
            $this->db->where($condditionj);
            $query=$this->db->update($tble_name, $update_wallete);
            if($query)
            {
              return 1;
            }
            else
            {
              return 0;
            }
            
        }
        
        function total_Count_withdrawl()
        {
        $success=2;
        $this->db->select_sum('request_amt');
        $this->db->from('ax_tbl_request');
        $this->db->where('request_status',$success);
        $query=$this->db->get();      
        return  $query->row()->request_amt; 

        }
        function total_Count_level_income()
        {
          
           $this->db->select_sum('level_income');
        $this->db->from('ax_tbl_level_income');
        $query=$this->db->get();      
        return  $query->row()->level_income; 
  
        }
        function change_isactive($usr_id, $nowupdate)
        {
              $user_id=$usr_id;
              $update_date=$nowupdate;
              $updateisactive = array('isactive' => $update_date);    
              $this->db->where('user_id', $user_id);
              $query=$this->db->update('reg_table', $updateisactive);
              if($query){
                  return 1;
              }
              else{
                  return 0;
              }  
        }
        function change_services($servic_name, $update_stt)
        {
            $services=$servic_name;
               $update_status=$update_stt;    
            
                            
               $this->db->where('services_name', $services);
               $query=$this->db->update('ax_tbl_servicess', $update_status);
              if($query){
                  return 1;
              }
              else{
                  return 0;
              } 
        }
        function update_profile_user($user_id, $updat_proofile)
        {
              $user_id=$user_id;
              $update_n_date=$updat_proofile;    
              $this->db->where('user_id', $user_id);
              $query=$this->db->update('reg_table', $update_n_date);
              if($query){
                  return 1;
              }
              else{
                  return 0;
              }  
        }
        function update_admn_passwrd($update_passwordd, $id)
        {

              $this->db->where('id', $id);
              $query=$this->db->update('ax_tbl_admin_log', $update_passwordd);
              if($query){
                  return 1;
              }
              else{
                  return 0;
              }  

        }
        function add_bank_profi($banck_data_insrt)
        {
          if($banck_data_insrt)
                {
                return($this->db->insert('ax_tbl_profile',$banck_data_insrt));
                }
                else{
                return 0;
                }
                
        }
        function update_bank_profi($user_id, $banck_data_update)
        {


           $this->db->where('registeruser_id', $user_id);
              $query=$this->db->update('ax_tbl_profile', $banck_data_update);
              if($query){
                  return TRUE;
              }
              else{
                  return 0;
              } 
              
        }
        public function count_team_members($parent_id) {
        $count = 0;

        // Fetch all direct child nodes (team members) of the current parent node
        $this->db->where('sponserd_id', $parent_id);
        $query = $this->db->get('reg_table');  // Assuming the table is named 'nodes'
        $children = $query->result();

        // Count the direct children (team members)
        $count += $query->num_rows();

        // For each child, recursively count their team members
        foreach ($children as $child) {
            $count += $this->count_team_members($child->user_id);  // Recursively count descendants
        }

        return $count;
    }
     public function find_nodes_at_level($node_id, $target_level, $current_level = 0) {
        $nodes_at_level = [];

        // If we are at the target level, add this node to the result array
        if ($current_level == $target_level) {
            $this->db->where('user_id', $node_id);
            $query = $this->db->get('reg_table');
            $node = $query->row();

            if ($node) {
                $nodes_at_level[] = $node;  // Add the node to the result array
            }

            return $nodes_at_level;  // Return the nodes if we reached the target level
        }

        // Fetch all child nodes of the current node
        $this->db->where('sponserd_id', $node_id);
        $query = $this->db->get('reg_table');
        $children = $query->result();

        // Recursively find nodes at the target level for each child
        foreach ($children as $child) {
            $nodes_at_level = array_merge(
                $nodes_at_level, 
                $this->find_nodes_at_level($child->user_id, $target_level, $current_level + 1)
            );
        }

        return $nodes_at_level;
    }
    //
    //BOt history 
    //
    public function Bot_get_bot_reward_history()
    {
        
        $type='BOT';
        $stkty='Royalty Club Income';
        $query=$this->db->where('wstatus',$stkty);
        $query=$this->db->where('type',$type);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function Bot_get_bot_reward_list()
    {
         $stty='Bot Reward Income';
        $type='BOT';
       
        $query=$this->db->where('wstatus',$stty);
        $query=$this->db->where('type',$type);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function botget_trade_daily_history()
    {

        $stkty='Daily Bot Trade Income';
        $type='BOT';
        $query=$this->db->where('wstatus',$stkty);
        $query=$this->db->where('type',$type);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function botget_myTrade_acc_history()
    {

        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('trade_income');
        return $query->result_array();
    }
    function get_roi_history()
    {
        // $tradein="Trade Bonus";
        // $conddition = array('wstatus' =>$tradein);
        // $query=$this->db->where($conddition);
        // $query=$this->db->order_by('id', 'DESC');
        // $query = $this->db->get('ax_tbl_nonworking');
        // return $query->result_array();
         $tradein="Daily Growth"; 
        $type='Investment';
        $conddition = array('wstatus' =>$tradein);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
        
    }
    public function get_my_equity_history()
    {
        // $bosotsk="Booster Bonus";
        // $conddition = array('wstatus' =>$bosotsk);
        // $query=$this->db->where($conddition);
        // $query=$this->db->order_by('id', 'DESC');
        // $query = $this->db->get('direct_wallet');
        // return $query->result_array();
        $bosotsk="Level Income";
        $type='Investment';     
        $conddition = array('wstatus' =>$bosotsk);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function get_myrdirect_history()
    {   
        // $direct_in="Direct Bonus";
        // $conddition = array('wstatus' =>$direct_in);
        // $query=$this->db->where($conddition);
        // $query=$this->db->order_by('id', 'DESC');
        // $query = $this->db->get('direct_wallet');
        // return $query->result_array();
         $direct_in="Direct Income";
        $type='Investment';
        $conddition = array('wstatus' =>$direct_in);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    // public function get_maintain_level_history()
    // {
    //     // $lev_in="Daily Level Bonus";
    //     // $conddition = array('wstatus' =>$lev_in);
    //     // $query=$this->db->where($conddition);
    //     // $query=$this->db->order_by('id', 'DESC');
    //     // $query = $this->db->get('ax_tbl_nonworking');
    //     // return $query->result_array();
    //      $lev_in="Level Maintain Income";  
    //      $type='Investment'; 
    //     $conddition = array('wstatus' =>$lev_in, 'type'=>$type);
    //     $query=$this->db->where($conddition);
    //     $query=$this->db->order_by('id', 'DESC');
    //     $query = $this->db->get('ax_tbl_nonworking');
    //     return $query->result_array();
    // }
    // public function get_my_fasttrack_history()
    // {
    //     // $funds_in="Funds Bonus";
    //     // $conddition = array('wstatus' =>$funds_in);
    //     // $query=$this->db->where($conddition);
    //     // $query=$this->db->order_by('id', 'DESC');
    //     // $query = $this->db->get('direct_wallet');
    //     // return $query->result_array();
    //      $funds_in="Fast Track Income"; 
    //      $type='Investment'; 
    //     $conddition = array('wstatus' =>$funds_in, 'type'=>$type);
    //     $query=$this->db->where($conddition);
    //     $query=$this->db->order_by('id', 'DESC');
    //     $query = $this->db->get('ax_tbl_nonworking');
    //     return $query->result_array();
    // }
    public function get_my_activation_allary_history()
    {
        // $salery="Sallary Bonus";
        // $conddition = array('wstatus' =>$salery);
        // $query=$this->db->where($conddition);
        // $query=$this->db->order_by('id', 'DESC');
        // $query = $this->db->get('direct_wallet');
        // return $query->result_array();
        $salery="Reward Income";
        $type='Investment';
        $conddition = array('wstatus' =>$salery);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function update_global_d($update_user, $user_id)
    {
      $this->db->where('registeruser_id', $user_id);
              $query=$this->db->update('global_auto', $update_user);
    }
    public function insert_global_d($insert_global)
    {
      if($insert_global)
            {
             return($this->db->insert('global_auto',$insert_global));
            }
            else{
                return 0;
            }
    }
     public function royadetaisils_send_history()
    {
        // $tradein="Trade Bonus";
        // $conddition = array('wstatus' =>$tradein);
        //$query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('royalty_income_done_details');
        return $query->result_array();
        
    }
     public function get_highest_rank_rows() {
        // First, get the highest rank_id for each user
        $this->db->select('registeruser_id, MAX(rank_id) as highest_rank');
        $this->db->from('royal_club_match_user');
        $this->db->group_by('registeruser_id');
        $subquery = $this->db->get_compiled_select();  // Get the compiled select query for the highest rank_id per user

        // Now, use the subquery to fetch rows with the highest rank_id for each user
        $this->db->select('royal_club_match_user.*');
        $this->db->from('royal_club_match_user');
        $this->db->join("($subquery) as highest_ranks", 'royal_club_match_user.registeruser_id = highest_ranks.registeruser_id', 'inner');
        $this->db->where('royal_club_match_user.rank_id = highest_ranks.highest_rank');
        $query = $this->db->get();
return $query->result_array();
      //  return $query->result();  // Return result as an array of objects
    }
    //
     public function get_valid_user_reg()
 {
    
    $Rank_name=1;
   
    //$this->db->where('isactive', $Rank_name);
    $this->db->where('istopup', $Rank_name); 
        $query = $this->db->get('reg_table');
        return $query->num_rows();
 }
 public function fres_user_f()
 {
    $istop=0;
    $this->db->where('istopup', $istop); 
   
        $query = $this->db->get('reg_table');
        return $query->num_rows();


 }
 public function user_wthdral_request_or()
 {
    
        
        $pending=2;
        $this->db->select_sum('request_amt');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_request');
         $this->db->where('request_status',$pending);
          $this->db->where('eth_add', 'USDT'); 
           $this->db->where('wallet_namew', 'Non-Working'); 
          
      //  $this->db->where('wstatus',$stty);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->request_amt)) ? $result->request_amt : 0;

        return $amt_sum;  
        
 }
 public function expire_user()
 {
    $data='0000-00-00 00:00:00';
    $dateee=date('Y-m-d H:i:s');
    $Rank_name=1;
    $this->db->where('isbot', $Rank_name);
    $this->db->where('isactive', $Rank_name);
    $this->db->where('istopup', $Rank_name); 
    $this->db->where('bot_expire_date <', $dateee);
    $this->db->where('bot_expire_date !=', $data);
        $query = $this->db->get('reg_table');
        return $query->num_rows();
 }
 public function bot_user()
 {
    $Rank_name=1;
    $this->db->where('isbot', $Rank_name);
    $this->db->where('isactive', $Rank_name);
        $query = $this->db->get('reg_table');
        return $query->num_rows();
 }
 public function invester_user()
 {
  
    // $Rank_name=1;

    // $this->db->where('isactive', $Rank_name);
    // $this->db->where('istopup', $Rank_name);
        $query = $this->db->get('ax_tbl_topup');
        return $query->num_rows();
 }
 
      public function get_bot_amt()
      {
        $this->db->select_sum('amt');  // Select the sum of 'amt' column
        $this->db->from('bot_user_tbl');
      //  $this->db->where('wstatus',$stty);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->amt)) ? $result->amt : 0;

        return $amt_sum; 
      }
      public function get_investment_amt()
      {
        
        $this->db->select_sum('topup_amt');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_topup');  // Select the sum of 'amt' column
        //$query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->topup_amt)) ? $result->topup_amt : 0;

        return $amt_sum;  // Output the sum or 0 
      }
       public function get_compound_amt()
       {
         $type='Compounding System';
        $conddition = array('type'=>$type);
        $this->db->select_sum('topup_amt');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_topup');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->topup_amt)) ? $result->topup_amt : 0;

        return $amt_sum;  // Output the sum or 0 
       }
       //
       public function myfund_ttlinc_ome()
 {
    // $conddition = array(, 'wstatus' =>$tradein, 'type'=>$type);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $this->db->where('wstatus !=', 'withdrawal Request Cancel');
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
 }
 public function myfund_ttli_ncome()
 {
    // $conddition = array(, 'wstatus' =>$tradein, 'type'=>$type);
     $type='Investment';
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
       
        $query=$this->db->where('type',$type);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
 }
       public function myfund_bot_income()
 {
    // $conddition = array(, 'wstatus' =>$tradein, 'type'=>$type);
     $type='BOT';
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
      
        $query=$this->db->where('type',$type);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
 }
 
    //
    public function home_daily_roi_sum()
    {
        $tradein="Daily Growth"; 
        $type='Investment';
        $conddition = array('wstatus' =>$tradein);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
    }
    public function home_directin_sum()
    {
        
        $tradein="Direct Income";
        $type='Investment';
        $conddition = array('wstatus' =>$tradein);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
    }
    public function home_equity_sum()
    {
        
        $tradein="Level Income"; 
        $type='Investment';
        $conddition = array('wstatus' =>$tradein);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
    }
    public function home_level_main_sum()
    {
        
        $tradein="Level Maintain Income"; 
         $type='Investment';
        $conddition = array('wstatus' =>$tradein, 'type'=>$type);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
    }
    public function home_fast_tarck_sum()
    {
        
        $tradein="Fast Track Income"; 
        $type='Investment';
        $conddition = array('wstatus' =>$tradein, 'type'=>$type);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
    }
    public function home_rewardt_sum()
    {
       
        $tradein="Reward Income"; 
        $type='Investment';
        $conddition = array('wstatus' =>$tradein);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
    }
       //
       public function bvv_matchh()
       {

        $query = $this->db->get('bv_matching');
        return $query->num_rows();
       }
       public function royalty_matchg()
       {
        $query = $this->db->get('royal_club_match_user');
        return $query->num_rows();
        
       }
//
       public function sum_bv_reward_income()
      {
         $stty='Bot Reward Income';
         $type='BOT';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        
        $this->db->where('wstatus', $stty);
        $this->db->where('type', $type);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
      }
     
      public function daily_trade_income(){
          $stty='Daily Bot Trade Income';
          $type='BOT';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        
        $this->db->where('wstatus',$stty);
        $this->db->where('type',$type);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
        
      }
      public function bv_royalty_club_income(){
          $stty='Royalty Club Income';
          $type='BOT';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
       
        $this->db->where('wstatus',$stty);
        $this->db->where('type',$type);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
        
      }
      public function reg_recordss()
      {
         $this->db->select('fullname, mobile, email');
$this->db->from('reg_table');

// Execute the query
$query = $this->db->get();

// Return the result as an array of objects
return $query->result();
      }
      public function get_myrejectlist()
      {
          $this->db->select('registeruser_id, credit');
    $this->db->from('ax_tbl_nonworking');
    $this->db->where('wstatus', 'withdrawal Request Cancel');
    $this->db->where('wdate >', '2025-03-24');
    $this->db->group_by('registeruser_id, credit');
    $this->db->having('COUNT(*) >', 1);

    // Get the result of the subquery (duplicates of registeruser_id and credit)
    $duplicate_combinations = $this->db->get_compiled_select(); // This will get the subquery

    // Now use the result of the subquery in the main query using JOIN
    $this->db->select('*');
    $this->db->from('ax_tbl_nonworking as a');
    $this->db->join("($duplicate_combinations) as b", 'a.registeruser_id = b.registeruser_id AND a.credit = b.credit', 'inner');
    $this->db->where('a.wstatus', 'withdrawal Request Cancel');
    $this->db->where('a.wdate >', '2025-03-24');
    
    // Order by id in ascending order
    $this->db->order_by('a.id', 'ASC');

    // Execute the query and return the results
    $query = $this->db->get();
    return $query->result(); // Returns the results as an array of objects
      }
      public function delete_duplicate($id)
      {
       $this->db->where('id', $id);
        $this->db->where('wstatus', 'withdrawal Request Cancel');
        
        // Perform the delete operation
        return $this->db->delete('ax_tbl_nonworking');
      }
      public function get_users()
    {
        $this->db->select('id, mobile, email');
        $this->db->from('reg_table');
        $this->db->order_by('id', 'ASC');
        

        $query = $this->db->get();

        return $query->result(); // Return as array of objects
    }
      
}
