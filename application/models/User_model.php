<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{
    public function __construct()
      {
      
        parent::__construct();
        $this->load->helper('commonn_helper');
        date_default_timezone_set('Asia/Kolkata');
 
      }
    public function updateuser_data($data, $id)
    {
        $this->db->where('id', $id);
        return ($this->db->update('reg_table',$data));
        
    }
public function get_subtree($user_id, $depth = 3) {
        $this->db->select('*');
        $this->db->from('reg_table');
        $this->db->where('parent_idd', $user_id);
        $children = $this->db->get()->result_array();
        
        if ($depth > 1) {
            foreach ($children as &$child) {
                $child['children'] = $this->get_subtree($child['user_id'], $depth - 1);
            }
        }
        
        return $children;
    }
    public function get_direct_node($user_id, $limit, $offset)
    {
        $this->db->select('id, user_id, sponserd_id, position, mobile, fullname,isactive, register_date, teambusiness');
        $this->db->from('reg_table');
        $this->db->where('sponserd_id',$user_id);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $data = [];

        // Loop through the query result and format it
        $count=1;
        foreach ($query->result_array() as $row) {
            $yt=gettopopsum($row['user_id']);
                            if(!empty($yt))
                            {
                                $topamt=$yt;
                            }
                            else{
                                $topamt="0.00";
                            }
                           
                            $myteambus=$row['teambusiness'];
                            $gemybus=gettopopsum($row['user_id']);
                            if(!empty($gemybus))
                            {
                                if (is_int($gemybus)) {
                
                                    $roi_income=$gemybus;
                                  }
                                else
                                {
                                  $roi_income=round($gemybus, 2);
                                }
                                $finalbus=$myteambus+$roi_income;
                            }
                            else{
                                $finalbus=$myteambus;
                            }
            
             $status=$row['isactive'];
             if($status==1)
             {
                $stt="Active";
             }
             else{
                $stt="Inactive";
             }
            $data[] = [
                 $count++,
                //$row['id'],
                $row['user_id'],
                $row['fullname'],
                $row['mobile'],
                $row['sponserd_id'],
                $row['position'],
                $row['register_date'],
                "$".$topamt,
                "$".$finalbus, // Assuming you want to include user_id as part of the data
                 $stt ? 'Active' : 'Inactive' // Example formatting for isactive
            ];
            
        }
        return $data;
        
        //id`, `user_id`, `sponserd_id`, `parent_idd`, `position`, `level_val`, `email`, `mobile`, `fullname`, `topupdate`, `topup_amt`, `password`, `isactive`, `register_date`, `txn_password`, `isvalid`, `topupby`, `pack_id`, `packnm`, `bank_a/c`, `country`, `flag_nm`, `bep_address`, `teambusiness`, `roidays`, `gett_roidays`, `istopup`, `isverify`, `otp`
       
                //return $query->result_array();
    }
     public function get_total_count($user_id) {
        $this->db->where('sponserd_id', $user_id); 
        return $this->db->count_all('reg_table'); // Return total number of users
    }
    public function get_wallet_data($user_id) {
        // SQL query to fetch data from all three tables
        $query = $this->db->query("
            SELECT credit, debit, wdate, wstatus,to_id AS remark  -- Using to_id as remark 
            FROM ax_tbl_wallet_fund 
            WHERE registeruser_id = ?
            UNION ALL
            SELECT credit, debit, wdate, wstatus, remark 
            FROM ax_tbl_nonworking 
            WHERE registeruser_id = ?
            -- UNION ALL
            -- SELECT credit, debit, wdate, wstatus, remark 
            -- FROM direct_wallet 
            -- WHERE registeruser_id = ?
            ORDER BY wdate DESC
        ", array($user_id, $user_id, $user_id));

        // Return the result as an array
        //return $query->result();
         return $query->result_array(); 
    }

    //
    public function get_pack_by_amount($amount)
    {
        // Query the table for the row with the given packamount1
        $this->db->where('packamount1', $amount);
        $query = $this->db->get('ax_tbl_pack'); // Replace 'ax_tbl_pack' with your actual table name

        // If row is found, return it
        if ($query->num_rows() > 0) {
            return $query->row(); // Return the first row of the result
        }

        // If no row is found, return an empty result
        return null; // You can also return an empty array if you prefer
    }
    //
    public function insert_usddt($insert_usddt)
    {
            if($insert_usddt)
         {
          return($this->db->insert('ax_tbl_profile',$insert_usddt));
         }
         else{
             return 0;
         }
    }
    public function check_widdrawl_stop()
    {
        $service_name="Withdraw";
        $this->db->select('status');		
        $this->db->from('ax_tbl_servicess');		
        $this->db->where('services_name',$service_name);		
        $query=$this->db->get();		
        return  $query->row(); 
    }
    public function update_usd_t($update_usddt ,$id)
    {

        $this->db->where('id', $id);
        return ($this->db->update('ax_tbl_profile',$update_usddt));
            
    }
    public function request_inr_funds($request_fnd_inr)
    {
        if($request_fnd_inr)
         {
          return($this->db->insert('ax_tbl_fund_request',$request_fnd_inr));
         }
         else{
             return 0;
         }
    }
    public function compose_email($emailcompose)
    {
        if($emailcompose)
        {
         return($this->db->insert('ax_tbl_email',$emailcompose));
        }
        else{
            return 0;
        }
    }
    public function get_inboxmail($usri_id)
    {
        $query=$this->db->where('mail_to',$usri_id);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_email');
        return $query->result_array(); 
    }
    public function mymail($mycht_id)
    {
      
    $this->db->select('*');		
    $this->db->from('ax_tbl_email');		
    $this->db->where('chat_key',$mycht_id);		
    $query=$this->db->get();		
    return  $query->row(); 
    }
    public function hide_mymail($mycht_id)
    {
        $visul=0;
        $appointment_id = $mycht_id;
        $appointment = array('visiblity' => $visul);    
        $this->db->where('chat_key', $appointment_id);
        $query=$this->db->update('ax_tbl_email', $appointment);
        if($query){
            return 1;
        }
        else{
            return 0;
        }   
    }
    public function get_inboxboxmail($my_userid)
    {
        $visul=1;
        $query=$this->db->where('mail_to',$my_userid);
        $query=$this->db->where('visiblity',$visul);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_email');
        return $query->result_array(); 
    }
    public function get_outboxmail($usri_id)
    {
        $visul=1;
        $query=$this->db->where('registeruser_id',$usri_id);
        $query=$this->db->where('visiblity',$visul);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_email');
        return $query->result_array(); 
    }
    public function getfundrequest_history($userid)
    {
        
        $query=$this->db->where('registeruser_id',$userid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_fund_request');
//       echo $this->db->last_query();
        return $query->result_array();
    }
    public function fund_get_request($userid)
    {
        $query=$this->db->where('get_user_id',$userid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_fund_request');
//       echo $this->db->last_query();
        return $query->result_array();
    }
    public function update_paawaorduser($data, $id)
    { 
        $appointment_id = $id;
        $appointment = array('password' => $data,);    
        $this->db->where('id', $appointment_id);
        $query=$this->db->update('reg_table', $appointment);
        if($query){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function update_txnpaawaorduser($data, $id)
    {
        $appointment_id = $id;
        $appointment = array('txn_password' => $data,);    
        $this->db->where('id', $appointment_id);
        $query=$this->db->update('reg_table', $appointment);
        if($query){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function getdata_level()
    {
        $query= $this->db->select('*');
      $query= $this->db->from('reg_table');
       //$query  = $this->db->where('id',$id);
      $query = $this->db->get();
       return $query->result_array(); 
    }
    public function getreffUser($myreff)
    {
        $query  = $this->db->where('sponserd_id',$myreff);
        
      $query = $this->db->get('reg_table');
       return $query->result_array(); 
    }
    public function getTransferHistory($myuserId)
    {
        $query=$this->db->where('show_for',$myuserId);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_wallet_fund');
//       echo $this->db->last_query();
        return $query->result_array();
     
    }
    
    public function transferfund_activewallf1($tranferactive)
    {
         if($tranferactive)
         {
          return($this->db->insert('ax_tbl_wallet_fund',$tranferactive));
         }
         else{
             return 0;
         }
    }
public function transferfund_non_workinf($tranf_eractive)
{
  if($tranf_eractive)
         {
          return($this->db->insert('ax_tbl_nonworking',$tranf_eractive));
         }
         else{
             return 0;
         }   
}
    public function transferfund_activewallf_s2($recieve_ctive)
    {
             if($recieve_ctive)
             {
             return($this->db->insert('ax_tbl_wallet_fund',$recieve_ctive));
             }
             else{
             return 0;
             }
    }
    public function getpack()
    {        
        $query=$this->db->get('ax_tbl_pack');
         return $query->result_array(); 
    
    } 
    public function topup($topup)
    {   
        $istopup=1;
        $appointment_id =$topup['registeruser_id'];
        $appointment = array('istopup' => $istopup,);    
        $this->db->where('user_id', $appointment_id);
        $query=$this->db->update('reg_table', $appointment);
        if($query){
            if($topup)
            {
             $this->db->insert('ax_tbl_topup',$topup);
             $last_id=$this->db->insert_id();
             return array('last_id'=> $last_id,'msg'=>'1'); 
             }else{
             return array('last_id'=>0,'msg'=>'0');
            }   
        }
        else{
            return 0;
        }      
    } 

    public function get_non_working_income($userr_idd)
    {
      $amyt=0;
      $query=$this->db->where('registeruser_id',$userr_idd);
      $query=$this->db->where('debit',$amyt);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();    
    }
    public function isertdirect($isertdirecct)
    {
        
        if($isertdirecct)
        {
            $this->db->insert('ax_tbl_nonworking',$isertdirecct);
            $last_id=$this->db->insert_id();
            return array('last_id'=> $last_id,'msg'=>'1');
            
        }else{
            return array('last_id'=>0,'msg'=>'0');
        } 
    }
    public function gettophistory($myuserid)
    {
        
        $query=$this->db->where('topup_by',$myuserid);
        $query=$this->db->or_where('registeruser_id',$myuserid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_topup');
        return $query->result_array();
        
    } 
    public function initialroi($initialroi)
    {
        if($initialroi)
         {
          return($this->db->insert('roi_wallet',$initialroi));
         }
         else{
             return 0;
         }
    }
    //

 public function myfund_with_sum($myuserid)
 {
   
        $val_u=1;
        $conddition = array('registeruser_id' => $myuserid, 'request_status' =>$val_u);
        $this->db->select_sum('request_amt');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_request');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->request_amt)) ? $result->request_amt : 0;

        return $amt_sum;  // Output the sum or 0  
 }
 
 public function myfund_ttlincome($myuserid)
 {
    // $conddition = array(, 'wstatus' =>$tradein, 'type'=>$type);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where('registeruser_id',$myuserid);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
 }
 
    //
    public function home_daily_roi_sum($myuserid)
    {
        $tradein="Daily Growth"; 
        $type='Investment';
        $conddition = array('registeruser_id' => $myuserid, 'wstatus' =>$tradein);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
    }
    public function home_directin_sum($myuserid)
    {
        
        $tradein="Direct Income";
        $type='Investment';
        $conddition = array('registeruser_id' => $myuserid, 'wstatus' =>$tradein);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
    }
    public function home_level_sum($myuserid)
    {
        
        $tradein="Level Income"; 
        $type='Investment';
        $conddition = array('registeruser_id' => $myuserid, 'wstatus' =>$tradein);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
    }
    
    public function home_rewardt_sum($myuserid)
    {
       
        $tradein="Reward Income"; 
        $type='Investment';
        $conddition = array('registeruser_id' => $myuserid, 'wstatus' =>$tradein);
        $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
    }
   
    public function home_topsm_sum($myuserid)
    {
       
        $type='Activation';
        $conddition = array('registeruser_id' => $myuserid,'type'=>$type);
        $this->db->select_sum('topup_amt');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_topup');  // Select the sum of 'amt' column
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->topup_amt)) ? $result->topup_amt : 0;

        return $amt_sum;  // Output the sum or 0
        
    }

    public function get_myroi_history($myuserid)
    {   
        $tradein="Daily Growth"; 
        $conddition = array('registeruser_id' => $myuserid, 'wstatus' =>$tradein);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function get_myplus_level_history($myuserid)
    { 
        $bosotsk="Level Income";
        $type='Investment';     
        $conddition = array('registeruser_id' => $myuserid, 'wstatus' =>$bosotsk);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function get_myrdirect_history($myuserid)
    {
        $direct_in="Direct Income";
        $type='Investment';
        $conddition = array('registeruser_id' => $myuserid, 'wstatus' =>$direct_in);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function get_my_reward_income_history($myuserid)
    {
        $salery="Reward Income";
        $type='Investment';
        $conddition = array('registeruser_id' => $myuserid, 'wstatus' =>$salery);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    
    public function debitidiffwalleyte($debitfrommain ,$tablename)
    {
        
        if(!empty($debitfrommain)  && !empty($tablename))
         {
        
         return($this->db->insert($tablename, $debitfrommain));
          //echo $this->db->last_query();
         }
         else{
            return 0;
         }
         
    }
    public function check_amt_my( $myuserid, $tablenam_e)
    {
             $table_name = $tablenam_e;
        // Query to calculate net balance
        $this->db->select('SUM(debit) AS total_debit, SUM(credit) AS total_credit');
        $this->db->from($table_name);
        $this->db->where('registeruser_id', $myuserid);

        $query = $this->db->get();

        // Get the result
        $debitm=$query->row()->total_debit;
        $creditm=$query->row()->total_credit;
        $net_balance=$creditm-$debitm;
        return $net_balance;
    }
    public function creditinactive($creaditinactiv)
    {
        if($creaditinactiv)
         {
          return($this->db->insert('ax_tbl_wallet_fund',$creaditinactiv));
         }
         else{
             return 0;
         }
    }
    public function get_myWallet($myuserid)
    {   
 
        $conddition = array('registeruser_id' => $myuserid,'is_visible' =>True  );
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_wallet');
        return $query->result_array();
    }
    public function get_sponserd_with_depth($category_id) {
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

    public function get_parents_with_depth($category_id) {
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

            $category_id = $category->parent_idd;
            $depth++;
           
        }

        return $parents;
    }

    public function generate_level_income($insertInitialLevel)
    {
        if($insertInitialLevel)
        {
            return($this->db->insert('ax_tbl_level_income',$insertInitialLevel));
           }
           else{
               return 0;
           }
    }
    public function getmy_level_income($uid)
    {
       // $uidd=712378;
        $conddition = array('user_id'=>$uid, 'is_visible' =>True);
        $query=$this->db->where($conddition);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_level_income');
        return $query->result_array(); 
    }
   public function  checkbankaccount($uid)
   {
    $conddition = array('registeruser_id'=>$uid, 'isactive' =>True);    
    $query=$this->db->select('*');      
    $query=$this->db->from('ax_tbl_profile');       
    $query=$this->db->where($conddition);       
    $query=$this->db->get();        
    //return  $query->row(); 
    if($query->num_rows() >= 1){
       // return  $query->row();
       return 1;
    }
    else{
        return 0;
        
     }

        
    }
    public function insert_bank_account($insertbankdata)
    {
        if($insertbankdata)
         {
          return($this->db->insert('ax_tbl_profile',$insertbankdata));
         }
         else{
             return 0;
         }
    }
    public function update_bank_account($bankdata, $id)
    {
        $this->db->where('id', $id);
        return ($this->db->update('ax_tbl_profile',$bankdata));
    }
    public function update_teambusiness($updteambuns, $forusrsid)
    {
        $appointment_id = $forusrsid;
        $appointment = array('teambusiness' => $updteambuns,);    
        $this->db->where('user_id', $appointment_id);
        $query=$this->db->update('reg_table', $appointment);
        if($query){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function request_withdraw($withdra_request)
    {
        if($withdra_request)
         {
             $this->db->insert('ax_tbl_request',$withdra_request);
             $last_id=$this->db->insert_id();
             return array('last_id'=> $last_id,'msg'=>'1');
             
         }else{
             return array('last_id'=>0,'msg'=>'0');
         }  
        
    }
   
    public function deductamountMain($deductMain_wallet_amt)
    {
        if($deductMain_wallet_amt)
         {
          return($this->db->insert('ax_tbl_wallet',$deductMain_wallet_amt));
         }
         else{
             return 0;
         }
    }
    public function getwithdrawal_history($user_id)
    {
        $query=$this->db->where('registeruser_id',$user_id);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_request');
//       echo $this->db->last_query();
        return $query->result_array(); 
    }
    // public function count_team_member_s($parent_id) {
    //     $count = 0;

    //     // Fetch all direct child nodes (team members) of the current parent node
    //     $this->db->where('sponserd_id', $parent_id);
    //     $query = $this->db->get('reg_table');  // Assuming the table is named 'nodes'
    //     $children = $query->result();

    //     // Count the direct children (team members)
    //     $count += $query->num_rows();

    //     // For each child, recursively count their team members
    //     foreach ($children as $child) {
    //         $count += $this->count_team_member_s($child->user_id);  // Recursively count descendants
    //     }

    //     return $count;
    // }
    public function count_team_member_s($parent_id) {
    $count = 0;

    // Fetch all direct child nodes (team members) of the current parent node
    $this->db->where('sponserd_id', $parent_id);
    $query = $this->db->get('reg_table');  // Assuming the table is named 'reg_table'

    // Check if there are any direct children
    if ($query->num_rows() == 0) {
        return $count;  // Early exit if no children are found
    }

    $children = $query->result();

    // Count the direct children (team members)
    $count += $query->num_rows();

    // For each child, recursively count their team members
    foreach ($children as $child) {
        $count += $this->count_team_member_s($child->user_id);  // Recursively count descendants
    }

    return $count;
}



    // public function count_team_members($parent_id, &$active_count = 0, &$inactive_count = 0) {
    //     // Query to get all subordinates (children) of the given parent_id
    //     $this->db->where('sponserd_id', $parent_id);
    //     $query = $this->db->get('reg_table');
    //     $subordinates = $query->result();

    //     // Iterate through subordinates
    //     foreach ($subordinates as $subordinate) {
    //         // Check if the current subordinate is active or inactive
    //         if ($subordinate->istopup ==1) {
    //             $active_count++;
    //         } else {
    //             $inactive_count++;
    //         }

    //         // Recursively count their subordinates (children)
    //         $this->count_team_members($subordinate->user_id, $active_count, $inactive_count);
    //     }
    // }
    //
    public function count_team_members($parent_id, &$active_count = 0, &$inactive_count = 0) {
    // Get all subordinates in a single query, avoiding multiple calls
    $this->db->where('sponserd_id', $parent_id);
    $query = $this->db->get('reg_table');
    $subordinates = $query->result();

    // Keep track of user IDs to avoid redundant queries for already processed users
    $processed_users = [];

    // Loop through all subordinates and recursively count them
    foreach ($subordinates as $subordinate) {
        // Skip the same user again if it has been processed
        if (in_array($subordinate->user_id, $processed_users)) {
            continue;
        }

        // Mark the user as processed
        $processed_users[] = $subordinate->user_id;

        // Check if the current subordinate is active or inactive
        if ($subordinate->istopup == 1) {
            $active_count++;
        } else {
            $inactive_count++;
        }

        // Recursively count their subordinates (children)
        $this->count_team_members($subordinate->user_id, $active_count, $inactive_count);
    }
}
    //

    // Get the root member (the one with the given parent_id)
    public function get_team_member($member_id) {
        $this->db->where('user_id', $member_id);
        $query = $this->db->get('reg_table');
        return $query->row(); // Return the team member
    }
// use for this 
    public function get_pack_details($pack_name)
    {
          //$this->db->select('st');  
        $this->db->where('name', $pack_name);
        $query= $this->db->get('ax_tbl_pack');
        return $query->row();
    }
    public function get_ato_global_team($id)
    {
           $this->db->where('id >', $id);
        $this->db->from('reg_table');
        return $this->db->count_all_results();
        
    }
    public function get_non_working($user_id)
    {

        $query=$this->db->where('registeruser_id',$user_id);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array(); 
    }
    public function get_w_orking_wallete($user_id)
    {
        $query=$this->db->where('registeruser_id',$user_id);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('direct_wallet');
        return $query->result_array();
    }
    public function get_descendants($parentId, $side)
{
    // Specify the position column for left or right
    $position = ($side === 'left') ? 'left_child_id' : 'right_child_id';

    $this->db->select('id, user_id, email, position');
    $this->db->from('reg_table');
    $this->db->where('parent_idd', $parentId);
    $this->db->where('position', $side);
    $query = $this->db->get();

    $descendants = $query->result_array();

    foreach ($descendants as &$descendant) {
        // Recursively find descendants of the current child
        $descendant['children'] = $this->get_descendants($descendant['id'], $side);
    }

    return $descendants;
}
public function get_user_by_id($user_id) {
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('reg_table'); // Assuming 'users' is your table name

    // Return result as an associative array
    return $query->row_array();
}
//-----------------------------------------------------------------------------------------------------------
public function insert_commitess($insert_request)
{
      if($insert_request)
         {
          return($this->db->insert('commitments',$insert_request));
         }
         else{
             return 0;
         }
}
public function insert_dumy_topcommitess($insert_request_topup)
{
      if($insert_request_topup)
         {
          return($this->db->insert('comit_top_details',$insert_request_topup));
         }
         else{
             return 0;
         }
}

public function get_commitments_history($myuserid)
{
   
        $query=$this->db->where('registeruser_id',$myuserid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('commitments');
        return $query->result_array(); 
}
public function get_helps_s_history($myuserid)
{
    $query=$this->db->where('g_registeruser_id',$myuserid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('commitments_tbl_provide_get_help');
        return $query->result_array();  
}
public function get_helps_sprovide_history($myuserid)
{
    $query=$this->db->where('g_registeruser_id',$myuserid);
    $query=$this->db->or_where('p_registeruser_id',$myuserid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('commitments_tbl_provide_get_help');
        return $query->result_array();
}
////////////////////////////////
public function detials_of_widrwal_user_commit_links($myuserid)
{
    $current_date_time = date('Y-m-d H:i:s'); // Current date and time

    $pending = 2;
    $not_expire = 0;

    // Build the query with necessary conditions
    $this->db->where('p_registeruser_id', $myuserid);
    $this->db->where('status', $pending);
    $this->db->where('is_expire', $not_expire);
    $this->db->where('expire_datetiime >', $current_date_time); // Correct column name and condition

    $this->db->order_by('id', 'DESC');

    // Execute the query and return the result as an array
    $query = $this->db->get('commitments_tbl_provide_get_help');
    return $query->result_array();
}
    //   public function detials_of_widrwal_user_commit_links($myuserid)
    //   {
    //      $pending=2;
    //          $query=$this->db->where('p_registeruser_id',$myuserid);
    //         $query=$this->db->where('status',$pending);
    //          $query=$this->db->order_by('id', 'DESC');
    //          $query=$this->db->get('commitments_tbl_provide_get_help');
    //               return $query->result_array();
    //   }
      public function detials_commit_user_coomit_links($myuserid)
      {
         $pending=2;
         $upadte_sli=1;
             $query=$this->db->where('g_registeruser_id',$myuserid);
            $query=$this->db->where('status',$pending);
            $query=$this->db->where('update_slip', $upadte_sli);
             $query=$this->db->order_by('id', 'DESC');
             $query=$this->db->get('commitments_tbl_provide_get_help');
                  return $query->result_array();
      }
      public function update_committable($update_commit_field, $comit_link_id)
      {
         $this->db->where('id', $comit_link_id);
        return ($this->db->update('commitments_tbl_provide_get_help',$update_commit_field));
      }

 public function update_liks_request_row($update_commit_fields, $link_id)
 {
    $this->db->where('id', $link_id);
        return ($this->db->update('commitments_tbl_provide_get_help',$update_commit_fields));
 }
 
 public function update_fundrequest_row($update_fund_request, $user_id, $commit_id, $link_id)
{
    // Ensure that the parameters are not empty
    if (empty($user_id) || empty($commit_id) || empty($link_id) || empty($update_fund_request)) {
        return false;  // Or you can throw an exception if preferred
    }

    // Set the conditions for the update
    $this->db->where('registeruser_id', $user_id);
    $this->db->where('commit_id', $commit_id);
    $this->db->where('link_id', $link_id);


    // Perform the update query
    $this->db->update('ax_tbl_fund_request', $update_fund_request);

    // Check if the update was successful
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;  // No rows were updated
    }
}
public function get_direct_topup_user($usrr_rrid)
{
     // Set the value of $istop
    $istop = 1;
    // Apply the conditions to the query
    $this->db->where('sponserd_id', $usrr_rrid);
    $this->db->where('isactive', $istop);
    $this->db->where('istopup', $istop);
    // Execute the query on 'reg_table'
    $query = $this->db->get('reg_table');
    return $query->num_rows();
}
public function Insert_in_wallet($data_amt)
{

            if($data_amt)
         {
          return($this->db->insert('ax_tbl_wallet_fund',$data_amt));
         }
         else{
             return 0;
         }
}
//
public function get_last_status_commit($user_id)
{
    // Select 'status' from the 'commitments' table for the given user_id
    $this->db->select('status');
    $this->db->from('commitments');
    $this->db->where('registeruser_id', $user_id);  // Filter by user_id

    $query = $this->db->get();

    // If a result is found, return the 'status'
    if ($query->num_rows() > 0) {
        return $query->row()->status;
    } else {
        // If no result is found, return null
        return null;
    }
}

public function get_last_status_commitval($user_id)
{
    // Select from the 'commitments' table for the given user_id
    $this->db->from('commitments');
    $this->db->where('registeruser_id', $user_id);  // Filter by user_id
    $this->db->order_by('id', 'desc');  // Order by 'id' in descending order to get the last row
    $this->db->limit(1);  // Limit to the most recent row

    $query = $this->db->get();

    // If a result is found, return the entire row
    if ($query->num_rows() > 0) {
        return $query->row();  // Return the full row as an object
    } else {
        // If no result is found, return null
        return null;
    }
}

//
// public function get_last_status_commit($myuserid)
// {
//     $this->db->select('status');
//         $this->db->from('commitments');
//         $this->db->where('registeruser_id', $user_id);

//         // Execute the query
//         $query = $this->db->get();

//         // If a result is found, return the status
//         if ($query->num_rows() > 0) {
//             return $query->row()->status;
//         } else {
//             // If no record is found, return null
//             return null;
//         }
    

// }
public function update_commit_id($complete_acoomit, $commit_id)
{

    $this->db->where('commit_id', $commit_id);
        return ($this->db->update('commitments', $complete_acoomit));
 
}
public function update_withrwal_request($update_my_widh, $withdrol_id)
{
  $this->db->where('id', $withdrol_id);
        return ($this->db->update('ax_tbl_request', $update_my_widh));  
}
public function count_topup_my($node_id)
{
            $this->db->where('registeruser_id', $node_id);
            $query = $this->db->get('ax_tbl_topup');
            return $query->num_rows();

}
public function count_direct_teamss($node_id){
    
    // Apply the conditions to the query
    $this->db->where('sponserd_id', $node_id);
    // Execute the query on 'reg_table'
    $query = $this->db->get('reg_table');
    return $query->num_rows();
}
public function calculate_user_business($user_id) {
        // Fetch the business value from the database for this user
     $confmm=1;
        $conddition = array('registeruser_id' => $user_id, 'request_status' =>$confmm);
        $this->db->select_sum('request_amt');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_fund_request');
        $query=$this->db->where($conddition);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->request_amt)) ? $result->request_amt : 0;

        return $amt_sum;  // Output the sum or 0  
}
        

    // Function to sum the business for the user and all their descendants (team)
    public function sum_team_business($user_id) {
        // Start by calculating the business for the current user
        $total_business = $this->calculate_user_business($user_id);

        // Fetch all children (descendants) of the current user based on sponsored_id
        $this->db->where('sponserd_id', $user_id);  // Get users where the current user is their sponsor
        $query = $this->db->get('reg_table');  // Get all children
        $children = $query->result();  // Get all children as an array of objects

        // Recursively sum the business for each child
        foreach ($children as $child) {
            $total_business += $this->sum_team_business($child->user_id);  // Add the business of the child and their descendants
        }

        return $total_business;  // Return the total sum of business for the user and all descendants
    }
    public function get_user_userid($node_id)
{
    // Get the user IDs where sponserd_id matches the given node_id
    $this->db->select('user_id');
    $this->db->from('reg_table');
    $this->db->where('sponserd_id', $node_id);
    //$this->db->where('register_date >', '2025-04-01');
    $this->db->where('istopup', 1);
    
    $query = $this->db->get();
    
    // If no users found, return 0
    if ($query->num_rows() == 0) {
        echo 'No users found.';
        return 0;  // No users found, so return count as 0
    }

    // Collect all user_ids in an array
    $user_ids = array();
    foreach ($query->result() as $row) {
        $user_ids[] = $row->user_id;
    }

    // Count the matching rows in ax_tbl_topup for the collected user_ids
    $this->db->from('ax_tbl_topup');
    $this->db->where_in('registeruser_id', $user_ids);  // Only for the user_ids found in reg_table
    $this->db->where('topup_amt >', 50);  // Top-up amount greater than 100
    $this->db->where('topupdate >', '2025-04-01');  // Top-up update date after '2025-04-01'
    
    $topup_query = $this->db->get();
    
    // Count the number of rows that match the top-up conditions
    $count = $topup_query->num_rows();
    
    return $count;  // Return the total count
}
  public function get_users_by_sponserd_idy($node_id) {
        $this->db->select('user_id');
        $this->db->from('reg_table');
        $this->db->where('sponserd_id', $node_id);
        $this->db->where('istopup', 1);
        $query = $this->db->get();
        
        return $query->result();
    }
public function get_users_by_topupIs($topReg_id)
{
$this->db->where('registeruser_id', $topReg_id);         // Filter by registeruser_id
    $this->db->where('topup_amt >=', 100);                    // Top-up amount greater than or equal to 100
    $this->db->where('topupdate >', '2025-04-01');            // Date after April 1, 2025
    
    // Execute the query and get the result
    $query = $this->db->get('ax_tbl_topup');
    
    // Return the number of rows that match the query
    return $query->num_rows();
    
}
    
}


