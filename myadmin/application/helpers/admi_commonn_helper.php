<?php

defined('BASEPATH') or exit('No direct script access allowed');

function getUserDetailsByspon_Id($spo_id){
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('reg_table');     
    $CI->db->where('user_id',$spo_id);      
    $query=$CI->db->get();      
    return  $query->row();    
}
function getglobal_user_fun($user_id)
{
     $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('global_auto');     
    $CI->db->where('registeruser_id',$user_id);      
    $query=$CI->db->get();      
    return  $query->row(); 
}

    function User_entity_countEmail($email)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('count(email) as Email');
        $CI->db->from('reg_table');
        $CI->db->where('email', $email);
        $query=$CI->db->get();      
        return  $query->row(); 

    }
    function get_royalty_perc($id)
    {
     $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('ax_tbl_royalti_percent');        
        $CI->db->where('id',$id);     
        $query=$CI->db->get();      
        return  $query->row();
    }
    function  admin_get_requestsucess_fund()
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(request_amt) AS total_request_amount');  
        $CI->db->from('ax_tbl_fund_request');     
        $CI->db->where('request_status','1');      
        $query=$CI->db->get();      
        //return  
       
        $recive_funds=$query->row()->total_request_amount;
        if(!empty($recive_funds))
        {
         $get_fund_amount= $recive_funds;
        }
        else{
            $get_fund_amount=0;
        }
        
        return $get_fund_amount;

    }
    function totol_ccommit_banlece()
{ 
       $CI =& get_instance();
        // Load the database if it's not already loaded
        $CI->load->database();
        $CI->db->select_sum('request_amount');  // Sum of credit
        $CI->db->from('commitments');
       
        // $CI->db->where('status', 1);    
        $query = $CI->db->get();
        $result = $query->row();
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amount)) ? $result->request_amount : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
}
    function wallete_balancee()
    {
        $CI =& get_instance();  // Get the CodeIgniter instance
    
        
        // Perform the query
        $CI->db->select_sum('credit');  // Sum of credit
        $CI->db->select_sum('debit');   // Sum of debit
        $CI->db->from('ax_tbl_nonworking'); 
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $credit_sum = ($result && isset($result->credit)) ? $result->credit : 0;
        $debit_sum = ($result && isset($result->debit)) ? $result->debit : 0;
        
        // Return the total balance (credit - debit)
        return $credit_sum - $debit_sum;
    }
    function get_requsstt_widh()
    {
        $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
        $CI->db->select_sum('request_amt');  // Sum of credit
        $CI->db->from('ax_tbl_request');
        $CI->db->where('request_status !=', 0);
            
        $query = $CI->db->get();
        $result = $query->row();
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
    }
     function  admin_get_twenty_percent_fund()
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(request_amt) AS total_request_amount');  
        $CI->db->from('ax_tbl_fund_request');     
        $CI->db->where('request_status','1');      
        $query=$CI->db->get();      
        //return  
       
        $recive_funds=$query->row()->total_request_amount;
        if(!empty($recive_funds))
        {
         $get_fund_amount= 10 / 100 * $recive_funds;
        }
        else{
            $get_fund_amount=0;
        }
        
        return $get_fund_amount;

    }
    function admi_get_level_bonus()
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');     
         $CI->db->where('wstatus', 'Daily Level Bonus');       
        $query=$CI->db->get();      
        //return  
        $cred_leve_bonus=$query->row()->total_credit;
        if(empty($creditm))
        {
         $level_bonus=0.00;
        }else
        {
        $level_bonus=$cred_leve_bonus;
        }
        return $level_bonus;
    }
     function admin_get_trade_bonus()
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');     
         $CI->db->where('wstatus', 'Trade Bonus');       
        $query=$CI->db->get();      
        //return  
     
        $creditm=$query->row()->total_credit;
        if(empty($creditm))
        {
         $trade_bonus=0.00;
        }else
        {
$trade_bonus=$creditm;
        }
        return $trade_bonus;
    }
    function admi_get_direct_bonus()
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('direct_wallet');     
        
         $CI->db->where('wstatus', 'Direct Income');       
        $query=$CI->db->get();      
        //return  
     
        $direc_t_income=$query->row()->total_credit;
        if(empty($direc_t_income))
        {
            $direct_inn=0.00;
        }
        else{
             $direct_inn=$direc_t_income;
        }
        return $direct_inn;
    }
    function admin_get_booter_tsk_bonus()
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('direct_wallet');     
       
         $CI->db->where('wstatus', 'Booster Income');       
        $query=$CI->db->get();      
        //return  
     
        $booster_t_income=$query->row()->total_credit;
        if(empty($direc_t_income))
        {
            $boostdirect_inn=0.00;
        }
        else{
             $boostdirect_inn=$booster_t_income;
        }
        return $boostdirect_inn;
    }

    function admin_get_sallary_tsk_bonus()
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('direct_wallet');
         $CI->db->where('wstatus', 'Sallary Income');       
        $query=$CI->db->get();      
        //return  
     
        $direc_t_sallry_income=$query->row()->total_credit;
        if(empty($direc_t_income))
        {
            $salldirect_inn=0.00;
        }
        else{
             $salldirect_inn=$direc_t_sallry_income;
        }
        return $salldirect_inn;
    }
    function services_SRTART_STOP($services)
    {
         $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('status');       
        $CI->db->from('ax_tbl_servicess');        
        $CI->db->where('services_name',$services);     
        $query=$CI->db->get();      
        return  $query->row();
    }
    function User_entityCountMob($mobile)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('count(mobile) as Mob');
        $CI->db->from('reg_table');
        $CI->db->where('mobile', $mobile);
        $query=$CI->db->get();      
        return  $query->row(); 
    }
    function isuserTopup($userId)
    {
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('ax_tbl_topup');        
        $CI->db->where('registeruser_id',$userId);     
        $query=$CI->db->get();      
        return  $query->row();
    }
    function Sum_all_top_user($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(topup_amt) AS total_topup');  
        $CI->db->from('ax_tbl_topup');     
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
        //return  
        $totaltopop=$query->row()->total_topup;
       
        return $totaltopop;

    }
    function getUserDetailsById($getU_id){
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('reg_table');     
        $CI->db->where('id',$getU_id);      
        $query=$CI->db->get();      
        return  $query->row();    
    }
    
    function getDebit($userid){
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select_sum('debit');       
        $CI->db->from('ax_tbl_wallet_fund');        
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
         $getdb=  $query->row()->debit; 
        if($getdb !="")
        {
            return $getdb;
        }   
        else{
            return "0.00";   
        }
    }
    function getCredit($userid){
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select_sum('credit');      
        $CI->db->from('ax_tbl_wallet_fund');        
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();  
            
       // return
         $getcr= $query->row()->credit;  
         if($getcr !="")
         {
            return $getcr; 
         } 
         else{
            return "0.00";
         }
        
    }
    function  getfunds($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(debit) AS total_debit, SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_wallet_fund');        
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
        //return  
        $debitt=$query->row()->total_debit;
        $creditt=$query->row()->total_credit;
        $fund=$creditt-$debitt;
        return $fund;

    }
    function  getmainfund($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(debit) AS total_debit, SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_wallet');     
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
        //return  
        $debitm=$query->row()->total_debit;
        $creditm=$query->row()->total_credit;
        $mainfund=$creditm-$debitm;
        return $mainfund;

    }
    function getpackdetals($packval)
    {
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('ax_tbl_pack');       
        $CI->db->where('packamount1',$packval);     
        $query=$CI->db->get();      
        return  $query->row();   
    }
    function getpercent($price , $percent)
    {
            $getpervalue = $percent / 100 * $price;
            return  $getpervalue;
    }
    function getLastRoiDetails($id) {
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_wallet');
        $CI->db->where('remark', $id);
        $CI->db->order_by('id', 'DESC');
        $CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();  
    }
    function getlastAddsImag()
    {
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_adds_images');
        $CI->db->order_by('id', 'DESC');
        $CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();  
    }
    function countroiget($id)
    {
        $CI =& get_instance(); 
        $CI->load->database();
        $CI->db->where('remark', $id);
        $CI->db->from('ax_tbl_wallet'); 
        $count = $CI->db->count_all_results();
        $reciveRoirow= $count-1;
        return $reciveRoirow;   
    }
    function countlevelrow($top_up_id, $level_id)
    {
        $CI =& get_instance(); 
        $CI->load->database();
        $CI->db->where('top_id', $top_up_id);
        $CI->db->where('level_id', $level_id);
        $CI->db->from('ax_tbl_level_income'); 
        $levercount = $CI->db->count_all_results();
        $leverowcount= $levercount-1;
        return $leverowcount;
    }
    
    function LastleveDetails_get($top_up_id, $level_id) {
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_level_income');
        $CI->db->where('top_id', $top_up_id);
        $CI->db->where('level_id', $level_id);
        $CI->db->order_by('id', 'DESC');
        //$CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();  
       
    }
    function mylevelearning($uid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(level_income) AS Mylevel_earning');    
        $CI->db->from('ax_tbl_level_income');       
        $CI->db->where('user_id',$uid);     
        $query=$CI->db->get();      
        //return  
        $MylevelErning=$query->row()->Mylevel_earning;
        return $MylevelErning;
    }
    //user_id`, `top_id`, `level_id`, `level_nm`, `level_income`, `incomedate`, `direct`, `business
    function myTeamEarning($uid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(level_income) AS Myteamlevel_earning');    
        $CI->db->from('ax_tbl_level_income');       
        $CI->db->where('level_nm',$uid);        
        $query=$CI->db->get();      
        //return  
        $mylevel_Earning=$query->row()->Myteamlevel_earning;
        
        return $mylevel_Earning;
    }
    function is_bankAccount($user_id)
    {
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('ax_tbl_profile');        
        $CI->db->where('registeruser_id',$user_id);     
        $query=$CI->db->get();      
        return  $query->row();
       
    }
    function countrowrgx()
    {
        $CI =& get_instance(); 
        $CI->load->database();
        $CI->db->from('ax_tbl_wallet'); 
        $countrgx = $CI->db->count_all_results();
        return $countrgx; 
    }
    function having_three($sponserd_id)
    {
        $CI =& get_instance(); 
        $CI->load->database();
        $CI->db->where('sponserd_id', $sponserd_id);
        $CI->db->from('reg_table'); 
        $having_three = $CI->db->count_all_results();
        return $having_three; 
    }

function cc_count_diffrent_level()
{
    $CI =& get_instance();      
    $CI->load->database(); 
    $CI->db->distinct();     
    $CI->db->select('sponserd_id');       
    $CI->db->from('reg_table');
    $havingLevel = $CI->db->count_all_results();
    return $havingLevel;    
   // $query=$CI->db->get();      
    //return  $query->row(); 
}
function withdrawal_requestdetails($id)
{
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('ax_tbl_request');        
        $CI->db->where('id',$id);     
        $query=$CI->db->get();      
        return  $query->row();
}
function fund_requestdetails($id)
{
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('ax_tbl_fund_request');        
    $CI->db->where('id',$id);     
    $query=$CI->db->get();      
    return  $query->row();
}

function last_reqest_wallet_entry($req_userid, $req_date)
{

        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('ax_tbl_wallet');        
        $CI->db->where('registeruser_id',$req_userid);
        $CI->db->where('wdate',$req_date);
        $query=$CI->db->get();      
        return  $query->row();   
}
function alluser()
{
        $CI =& get_instance(); 
        $CI->load->database();
        $CI->db->from('reg_table'); 
        $allusr = $CI->db->count_all_results();
        return $allusr;
       
}
function get_admin($adminid)
{
      $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('ax_tbl_admin_log');     
    $CI->db->where('adminid',$adminid);      
    $query=$CI->db->get();      
    return  $query->row(); 
}
function get_admi()
{
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('ax_tbl_admin_log');         
    $query=$CI->db->get();      
    return  $query->row(); 
}

function provided_registeruser_id($id) {
    // Get CI instance to use the database class
    $CI =& get_instance();
    
    // Load the database if not loaded
    $CI->load->database();
    
    // Query to fetch registeruser_id and commit_id for the given id
    $CI->db->select('registeruser_id, commit_id, request_amount');
    $CI->db->from('commitments');
    $CI->db->where('id', $id);
    
    $query = $CI->db->get();
    
    // Check if the query returns a row
    if ($query->num_rows() > 0) {
        // Return both registeruser_id and commit_id as an associative array
        return $query->row_array();  // This returns both registeruser_id and commit_id
    } else {
        // If no result is found, return null
        return null;
    }
}
function get_registeruser_id($id) {
    // Get CI instance to use the database class
    //$statsu=2;
    $CI =& get_instance();
    
    // Load the database if not loaded
    $CI->load->database();
    
    // Query to fetch registeruser_id for the given id
    $CI->db->select('registeruser_id, request_amt');
    $CI->db->from('ax_tbl_request');
    $CI->db->where('id', $id);
   // $CI->db->where('request_status', $statsu);
    
    $query = $CI->db->get();
    
    // Check if the query returns a row
    if ($query->num_rows() > 0) {
         return $query->row_array();
    } else {
        // If no result is found, return null
        return null;
    }
}

function get_provided_balance($p_regiter_id, $commitemnt_id)
{
    $CI =& get_instance();
    
    // Load the database if it's not already loaded
    $CI->load->database();
    
    // Fixed status value
    $status = 2;

    // Query to calculate the sum of request_amt
    $CI->db->select_sum('request_amt');
    $CI->db->from('commitments_tbl_provide_get_help');
    $CI->db->where('p_registeruser_id', $p_regiter_id);
    $CI->db->where('commitemnt_id', $commitemnt_id);
    
   $CI->db->where('request_status !=', 0);

    // Execute the query
    $query = $CI->db->get();
    
    // Get the sum result
    $sum_request_amt = $query->row()->request_amt;
    
    // Return the sum or 0 if no result
    return $sum_request_amt ? $sum_request_amt : 0;
}
function get_get_help_balance($g_regiter_id, $widht_id)
{
            $CI =& get_instance();
    
    // Load the database if it's not already loaded
    $CI->load->database();
    
    // Fixed status value
    $status = 2;

    // Query to calculate the sum of request_amt
    $CI->db->select_sum('request_amt');
    $CI->db->from('commitments_tbl_provide_get_help');
    $CI->db->where('g_registeruser_id', $g_regiter_id);
    $CI->db->where('withdrol_id', $widht_id);
    $CI->db->where('request_status !=', 0);

    // Execute the query
    $query = $CI->db->get();
    
    // Get the sum result
    $sum_request_amt = $query->row()->request_amt;
    
    // Return the sum or 0 if no result
    return $sum_request_amt ? $sum_request_amt : 0;
}

function pro_balace($p_regiter_id, $commitemnt_id)
{
    $CI =& get_instance();
    
    // Load the database if it's not already loaded
    $CI->load->database();
    
    // Fixed status value
   // $status = 2;

    // Query to calculate the sum of request_amt
    $CI->db->select_sum('request_amt');
    $CI->db->from('commitments_tbl_provide_get_help');
    $CI->db->where('p_registeruser_id', $p_regiter_id);
    $CI->db->where('commitemnt_id', $commitemnt_id);
    $CI->db->where('request_status !=', 0);
    // Execute the query
    $query = $CI->db->get();
    
    // Get the sum result
    $sum_request_amt = $query->row()->request_amt;
    
    // Return the sum or 0 if no result
    return $sum_request_amt ? $sum_request_amt : 0;
}
function get_balance_pending($g_regiter_id, $widht_id)
{
            $CI =& get_instance();
    
    // Load the database if it's not already loaded
    $CI->load->database();
    
    // Fixed status value
    $status = 2;

    // Query to calculate the sum of request_amt
    $CI->db->select_sum('request_amt');
    $CI->db->from('commitments_tbl_provide_get_help');
    $CI->db->where('g_registeruser_id', $g_regiter_id);
    $CI->db->where('withdrol_id', $commitemnt_id);
    $CI->db->where('request_status !=', 0);

    // Execute the query
    $query = $CI->db->get();
    
    // Get the sum result
    $sum_request_amt = $query->row()->request_amt;
    
    // Return the sum or 0 if no result
    return $sum_request_amt ? $sum_request_amt : 0;
}
function get_username($register_id)
{
    // Get CI instance
    $CI = &get_instance();

    // Load the database if not already loaded
    $CI->load->database();

    // Query to fetch the full name from the reg_table based on user_id
    $CI->db->select('fullname');  // assuming full_name is the column for the user's name
    $CI->db->from('reg_table');    // assuming reg_table is the table where user data is stored
    $CI->db->where('user_id', $register_id);  // the condition to match the user_id

    // Execute the query
    $query = $CI->db->get();

    // Check if a result is returned
    if ($query->num_rows() > 0) {
        // Return the full name
        return $query->row()->fullname;
    } else {
        // If no result is found, return an empty string or you could return a default value
        return '';
    }
}  // Assuming this function exists
        
                // Get the get_amout using the get_take_amout function
function send_provideer_amout($register_id) 
{
    $confmm=1;
          $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('ax_tbl_fund_request');
        $CI->db->where('registeruser_id', $register_id);

        $CI->db->where('request_status', $confmm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
       
    //request_amt`, `request_status`,``,
}
function get_take_amoutt($wid_id) 
{
    $confmm=1;
          $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('ax_tbl_fund_request');
        $CI->db->where('withdrol_id', $wid_id);

        $CI->db->where('request_status', $confmm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
       
    //request_amt`, `request_status`,``,
}
function get_take_amout($register_id) 
{
    $confmm=1;
          $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('ax_tbl_fund_request');
        $CI->db->where('get_user_id', $register_id);

        $CI->db->where('request_status', $confmm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
       
    //request_amt`, `request_status`,``,
}
function get_success_take_amout($wi_d) 
{
    $confmm=1;
          $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('ax_tbl_fund_request');
        $CI->db->where('withdrol_id', $wi_d);

        $CI->db->where('request_status', $confmm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
       
    //request_amt`, `request_status`,``,
}
    
function get_take_amout_comiit($register_id)
{
    $confmm=1;
          $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('ax_tbl_fund_request');
        $CI->db->where('commit_id', $register_id);

        $CI->db->where('request_status', $confmm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
}
function get_growth($register_id)
{
     $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('credit');  // Sum of credit
       
        $CI->db->from('ax_tbl_nonworking');
        $CI->db->where('registeruser_id', $register_id);
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->credit)) ? $result->credit : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
    
}
function count_tableuser_rows()
    {
        $CI =& get_instance();  // Get the CodeIgniter instance
        $CI->load->database();  // Load the database

        // Query to count rows
        $CI->db->from('reg_table');
        return $CI->db->count_all_results();
    }
    function get_link_details_Id($id){
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('commitments_tbl_provide_get_help');     
    $CI->db->where('id',$id);      
    $query=$CI->db->get();      
    return  $query->row();    
}
function my_commite_request($user_id)
{
      $CI =& get_instance();
        // Load the database if it's not already loaded
        $CI->load->database();
        $CI->db->select_sum('request_amount');  // Sum of credit
        $CI->db->from('commitments');
       
        $CI->db->where('registeruser_id', $user_id);    
        $query = $CI->db->get();
        $result = $query->row();
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amount)) ? $result->request_amount : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
}
 
 function all_get_requsstt_widh($user_id)
    {
        $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
        $CI->db->select_sum('request_amt');  // Sum of credit
        $CI->db->from('ax_tbl_request');
        $CI->db->where('registeruser_id', $user_id);
        $CI->db->where('request_status !=', 0);
            
        $query = $CI->db->get();
        $result = $query->row();
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
    }
  
   