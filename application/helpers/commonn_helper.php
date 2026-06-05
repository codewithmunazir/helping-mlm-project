<?php

defined('BASEPATH') or exit('No direct script access allowed');

// function get_currency()
// {
//     $apikey='SCP0xCDD1CA7e20CbC3ecFB6fDe52CA84dFAbb5fAA0D2';
// $apikey1='o3cnnw9m';
// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://api.smartcloudpay.com/api/v1/Getmerchnatcurrency',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => array(
//     'apikey:'.$apikey,
//     'content-type: application/json',
// 	'merchantid:'.$apikey1
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// return $response;
// }
function get_left_getUserDetails($user_id)
{
$CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('reg_table');     
    $CI->db->where('parent_idd', $user_id);
    $CI->db->where('position', 'left');      
    $query=$CI->db->get();      
    return  $query->row();
}
function get_right_getUserDetails($user_id)
{
$CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('reg_table');     
    $CI->db->where('parent_idd', $user_id);
    $CI->db->where('position', 'right');     
    $query=$CI->db->get();      
    return  $query->row();
}
function getUserDetailsByspon_Id($spo_id){
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('reg_table');     
    $CI->db->where('user_id',$spo_id);      
    $query=$CI->db->get();      
    return  $query->row();    
}
function is_user_active($user_id) {
    // Get the instance of the CI object
    $CI =& get_instance();

    // Load the database library if not loaded yet
    $CI->load->database();

    // Query the reg_table to check if the user is active
    $CI->db->select('isactive');
    $CI->db->from('reg_table');
    $CI->db->where('user_id', $user_id);
    $query = $CI->db->get();

    // Check if a result was found
    if ($query->num_rows() > 0) {
        $result = $query->row();
        // Return true if the user is active (isactive = 1), else return false
        return $result->isactive == 1;
    }

    // If no user found, consider inactive
    return false;
}
function getsposerd($spoid)
{
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('reg_table');     
    $CI->db->where('user_id',$spoid);      
    $query=$CI->db->get();      
    return  $query->row();  
}

 function get_my_left_node_user_id($user_id)
{
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('reg_table');     
    $CI->db->where('parent_idd', $user_id);    
    $CI->db->where('position', 'left');  
    $query=$CI->db->get();      
    return  $query->row();
}
 function get_my_right_node_user_id($user_id)
{
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('reg_table');     
    $CI->db->where('parent_idd',$user_id);  
    $CI->db->where('position','right');
    $query=$CI->db->get();      
    return  $query->row(); 
}
function count_left_direct_node($user_id)
{
    $CI =& get_instance(); 
    $CI->load->database();
    $CI->db->where('sponserd_id', $user_id);
    $CI->db->where('position', 'left');
    $CI->db->from('reg_table'); 
    $haveing_left_node = $CI->db->count_all_results();
    return $haveing_left_node;     
}
function count_right_direct_node($user_id)
{   
    $CI =& get_instance(); 
    $CI->load->database();
    $CI->db->where('sponserd_id', $user_id);
    $CI->db->where('position', 'right');
    $CI->db->from('reg_table'); 
    $haveing_right_node = $CI->db->count_all_results();
    return $haveing_right_node;  
}
function getsposerdid($usrid)
{
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('reg_table');     
    $CI->db->where('user_id',$usrid);      
    $query=$CI->db->get();      
    return  $query->row()->sponserd_id;  
}
function Is_havee_task($user_id)
    {
         $CI =& get_instance(); 
        $CI->load->database();
        $CI->db->from('ax_tbl_topup'); 
        $CI->db->where('registeruser_id',$user_id); 
        $countrgx = $CI->db->count_all_results();
        return $countrgx; 
    }
function getlastAddsdataImag()
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
    function get_my_last_widthrawl_d($user_id)
    {
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_request');
        $CI->db->where('registeruser_id', $user_id);
        $CI->db->order_by('id', 'DESC');
        $CI->db->limit(1);    
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
    function getUserDetailsById_isvalid($getU_id){
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('reg_table');     
        $CI->db->where('user_id',$getU_id);
        $CI->db->where('isvalid',1);      
        $query=$CI->db->get();      
        return  $query->row();    
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
    function  getfunds_non_working($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(debit) AS total_debit, SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');        
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
        //return  
        $debit_nwk=$query->row()->total_debit;
        $credi_nwk=$query->row()->total_credit;
        $non_wfund=$credi_nwk-$debit_nwk;
        return $non_wfund;

    }
    function  getfunds_debit_non_working($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(debit) AS total_debit');  
        $CI->db->from('ax_tbl_nonworking');        
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
        //return  
        $debit_nwk=$query->row()->total_debit;
        if($debit_nwk !="")
        {
            return $debit_nwk;
        }   
        else{
            return "0.00";   
        }

    }
    function  getfunds_credit_non_working($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');        
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();   
        $credi_nwk=$query->row()->total_credit;

          if($credi_nwk !="")
        {
            return $credi_nwk;
        }   
        else{
            return "0.00";   
        }

    }
     
    
    function get_amount_wid($table, $Userr_id)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(debit) AS total_debit, SUM(credit) AS total_credit');  
        $CI->db->from($table);        
        $CI->db->where('registeruser_id',$Userr_id);      
        $query=$CI->db->get();      
        //return  
        $debit_wk=$query->row()->total_debit;
        $credit_wk=$query->row()->total_credit;
        $wr_fund=$credit_wk-$debit_wk;
        return $wr_fund;
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

    function  get_my_binary_sum($userid)
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(isactive) AS total_binaryamt');  
        $CI->db->from('ax_tbl_nonworking');     
        $CI->db->where('registeruser_id',$userid);
         $CI->db->where('wstatus', 'Binary Bonus');       
        $query=$CI->db->get();      
        //return  
        if ($query->num_rows() > 0) {
            $binary_bonus=$query->row()->total_binaryamt;
        } else {
            $binary_bonus=0.00;// Return 0 if no matching records found
        }       
        return $binary_bonus;
    }
    function  binary_bonus_sum($userid)
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');     
        $CI->db->where('registeruser_id',$userid);
        $CI->db->where('wstatus', 'Binary Bonus');       
        $query=$CI->db->get();      
        //return  
        if ($query->num_rows() > 0) {
            $mybinary_bonus=$query->row()->total_credit;
        } else {
            $mybinary_bonus=0.00;// Return 0 if no matching records found
        }       
        return $mybinary_bonus;
    }
    function  gettopopsum($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(topup_amt) AS total_topup');  
        $CI->db->from('ax_tbl_topup');     
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
        //return  
        $total_total_topop=$query->row()->total_topup;
        if(!empty($total_total_topop))
        {
            $ttl_topup=$total_total_topop;
        }else
        {
             $ttl_topup=0.00;
        }
       
        return $ttl_topup;

    }
    function get_total_topup($node_id) {
    // Get the CI instance
    $CI =& get_instance();
    
    // Load the database library if not loaded already
    $CI->load->database();
    
    // Perform the query to get the sum of topup_amt
    $CI->db->select_sum('topup_amt');
    $CI->db->from('ax_tbl_topup');
    $CI->db->where('registeruser_id', $node_id);
    $query = $CI->db->get();

    // Fetch the result as a single row
    $result = $query->row();

    // Return the total top-up amount or 0 if no results found
    return ($result && isset($result->topup_amt)) ? $result->topup_amt : 0;
}
    function Last_topup_me_or_byme($user_id)
    { 
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_topup');
        $CI->db->where('topup_by', $user_id);
        $CI->db->or_where('registeruser_id', $user_id);
        $CI->db->order_by('id', 'DESC');
        $CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();
    }
    function Last_top_Date_get($user_id)
    { 
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_topup');
        $CI->db->where('registeruser_id', $user_id);
        $CI->db->order_by('id', 'DESC');
        $CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();
    }
    function start_top_Date_get($user_id)
    { 
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_topup');
        $CI->db->where('registeruser_id', $user_id);
        $CI->db->order_by('id', 'ASC');
        $CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();
    }
    function Lastest_nesw()
    { 
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('latset_news');
        $CI->db->order_by('id', 'DESC');
        $CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();
    }
    function get_trade_bonus($userid)
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');     
        $CI->db->where('registeruser_id',$userid);
         $CI->db->where('wstatus', 'Trade Bonus');       
        $query=$CI->db->get();      
        //return  
        if ($query->num_rows() > 0) {
            $trade_bonus=$query->row()->total_credit;
        } else {
            $trade_bonus=0.00;// Return 0 if no matching records found
        }       
        return $trade_bonus;

    }
    function get_level_bonus($userid)
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');     
        $CI->db->where('registeruser_id',$userid);
         $CI->db->where('wstatus', 'Daily Level Bonus');       
        $query=$CI->db->get();      
        //return  
        if ($query->num_rows() > 0) {
            $level_bonus=$query->row()->total_credit;
        } else {
            $level_bonus=0.00;// Return 0 if no matching records found
        }
        
       
        return $level_bonus;
    }
     function get_direct_bonus($userid)
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');     
        $CI->db->where('registeruser_id',$userid);
         $CI->db->where('wstatus', 'Direct Bonus');       
        $query=$CI->db->get();      
        //return  
        if ($query->num_rows() > 0) {
            $direct_inn=$query->row()->total_credit;
        } else {
            $direct_inn=0.00;// Return 0 if no matching records found
        }       
        return $direct_inn;
        
    }
    
    function get_extra_funds_bonus($userid)
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');     
        $CI->db->where('registeruser_id',$userid);
         $CI->db->where('wstatus', 'Funds Bonus');       
        $query=$CI->db->get();      
        //return  
        if ($query->num_rows() > 0) {
            $funds_direct_inn=$query->row()->total_credit;
        } else {
            $funds_direct_inn=0.00;// Return 0 if no matching records found
        }
      
        return $funds_direct_inn;
    }
   

    function get_sallary_tsk_bonus($userid)
    {
         $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(credit) AS total_credit');  
        $CI->db->from('ax_tbl_nonworking');     
        $CI->db->where('registeruser_id',$userid);
         $CI->db->where('wstatus', 'Sallary Bonus');       
        $query=$CI->db->get();      
        //return  
        if ($query->num_rows() > 0) {
            $salldirect_inn=$query->row()->total_credit;
        } else {
            $salldirect_inn=0.00;// Return 0 if no matching records found
        }
        return $salldirect_inn;
    }
    
    function  get_twenty_percent_fund($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(request_amt) AS total_request_amount');  
        $CI->db->from('ax_tbl_fund_request');     
        $CI->db->where('registeruser_id',$userid);  
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
    function  gettrandfund($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(debit) AS total_debit, SUM(credit) AS total_credit');  
        $CI->db->from('roi_wallet');     
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
        //return  
        $debitm=$query->row()->total_debit;
        $creditm=$query->row()->total_credit;
        $mainfund=$creditm-$debitm;
        return $mainfund;

    }
    function get_trand_Debit($userid){
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select_sum('debit');       
        $CI->db->from('roi_wallet');        
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
    function get_trand_Credit($userid){
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select_sum('credit');      
        $CI->db->from('roi_wallet');        
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
    
    
    
    
    
    function  getsalaryfund($userid)
    {
        $CI =& get_instance();      
        $CI->load->database();
        $CI->db->select('SUM(debit) AS total_debit, SUM(credit) AS total_credit');  
        $CI->db->from('salary_wallet');     
        $CI->db->where('registeruser_id',$userid);      
        $query=$CI->db->get();      
        //return  
        $debitm=$query->row()->total_debit;
        $creditm=$query->row()->total_credit;
        $mainfund=$creditm-$debitm;
        return $mainfund;

    }
    function get_salary_Debit($userid){
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select_sum('debit');       
        $CI->db->from('salary_wallet');        
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
    function get_salary_Credit($userid){
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select_sum('credit');      
        $CI->db->from('salary_wallet');        
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
   function get_invest_packdetals($id)
    {
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('invest_ment_pack_for_roi');       
        $CI->db->where('id',$id);     
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
        $CI->db->from('ax_tbl_nonworking');
        $CI->db->where('type_income', 'top-up');
        $CI->db->where('t_id', $id);
        $CI->db->order_by('id', 'DESC');
        $CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();  
    }
    function countroiget($id)
    {
        $CI =& get_instance(); 
        $CI->load->database();
        $CI->db->where('type_income', 'top-up');
        $CI->db->where('t_id', $id);
        $CI->db->from('ax_tbl_nonworking'); 
        $count = $CI->db->count_all_results();
        $reciveRoirow= $count;
        return $reciveRoirow;   
    }
    function countbooster_roiget($userdid)
    {
        $CI =& get_instance(); 
        $CI->load->database();
        $CI->db->where('registeruser_id', $userdid);
        $CI->db->from('booster_wallet'); 
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
    function details_topUp_for_fetch_top_up($top_upId)
    {
         $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_topup');
        $CI->db->where('registeruser_id', $top_upId);
        $CI->db->order_by('id', 'ASC');
        $CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row(); 
    }
    function user_is_topup($user_id)
    {   
        $CI =& get_instance(); 
        $CI->load->database();        
        $CI->db->where('registeruser_id',$user_id);
        $CI->db->from('ax_tbl_topup');  
        $is_topvalue = $CI->db->count_all_results();   
        return $is_topvalue;
    }
    function Last_top_Details_po_up($top_upId)
    { 
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_topup');
        $CI->db->where('id', $top_upId);
        //$CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();
    }
    function Last_bot_Details_po_up($bot_upId)
    { 
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('bot_user_tbl');
        $CI->db->where('id', $bot_upId);
        //$CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row();
    }
    function Last_top_Details_get($top_upId)
    { 
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('ax_tbl_topup');
        $CI->db->where('id', $top_upId);
        //$CI->db->limit(1);    
        $query=$CI->db->get();      
        return  $query->row()->registeruser_id; 
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
    function is_topupUser($user_id)
    {
        $CI =& get_instance();      
        $CI->load->database();      
        $CI->db->select('*');       
        $CI->db->from('ax_tbl_topup');        
        $CI->db->where('registeruser_id',$user_id);  
        $istopvalue = $CI->db->count_all_results();   
        return $istopvalue;

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
function withdrawal_sum_all($iduser)
{
        $CI =& get_instance();      
        $CI->load->database(); 
        $CI->db->select('SUM(request_amt) AS Mywithdral');    
        $CI->db->from('ax_tbl_request');       
        $CI->db->where('registeruser_id',$iduser);
        $CI->db->where('request_status','1');                
        $query=$CI->db->get();      
        //return  
        $mywidth=$query->row()->Mywithdral;
       
        if($mywidth !="")
        {
            return $mywidth;
        }   
        else{
            return "0.00";   
        }   
        
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
function getInrValue(){
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');
    $CI->db->from('ax_tbl_inr_value');  
    $CI->db->order_by('id', 'ASC');
    $CI->db->limit(1);             
    $query=$CI->db->get();      
    return  $query->row();    
}
 
     function sum_total_my_balacece($user_id)
    {
        $CI =& get_instance();  // Get the CodeIgniter instance
    
        
        // Perform the query
        $CI->db->select_sum('credit');  // Sum of credit
        $CI->db->select_sum('debit');   // Sum of debit
        $CI->db->from('ax_tbl_nonworking');
        $CI->db->where('registeruser_id', $user_id);
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $credit_sum = ($result && isset($result->credit)) ? $result->credit : 0;
        $debit_sum = ($result && isset($result->debit)) ? $result->debit : 0;
        
        // Return the total balance (credit - debit)
        return $credit_sum - $debit_sum;
    }
    function income_my_sum($user_id)
    {
        $CI =& get_instance();  // Get the CodeIgniter instance
    
        
        // Perform the query
        $CI->db->select_sum('credit');  // Sum of credit
        $CI->db->from('ax_tbl_nonworking');
        $CI->db->where('registeruser_id', $user_id);
        $CI->db->where('wstatus !=', 'withdrawal Request Cancel');         
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $credit_sum = ($result && isset($result->credit)) ? $result->credit : 0;
        
        
        // Return the total balance (credit - debit)
        return $credit_sum;
          
    }
    function get_profile_by_registeruser_id($registeruser_id)
{
    // Get CI instance to use the database class
    $CI =& get_instance();
    
    // Load the database if it's not already loaded
    $CI->load->database();
    
    // Query to select all columns from the ax_tbl_profile table
    $CI->db->select('*');  // Select all columns
    $CI->db->from('ax_tbl_profile');  // From the ax_tbl_profile table
    $CI->db->where('registeruser_id', $registeruser_id);  // Filter by registeruser_id
    
    // Execute the query
    $query = $CI->db->get();
    
    // Check if any record is found
    if ($query->num_rows() > 0) {
        // Return the result as an array
        return $query->row_array();
    } else {
        // Return an empty array if no result is found
        return [];
    }
   }
    function get_request_commit_amt($commit_id)
   {
      $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();

        // Query to get all columns where commit_id is the provided commit_id
        $CI->db->from('commitments');
        $CI->db->where('commit_id', $commit_id);
        $query = $CI->db->get();

        // Check if there are results and return them
        if ($query->num_rows() > 0) {
            return $query->result(); // returns an array of objects representing all rows
        } else {
            return null; // No results found
        }
   }
    function get_total_sum_coomit_linkthis_commit($commit_id)
   {
    $confm=1;
      $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('commitments_tbl_provide_get_help');
        $CI->db->where('commitemnt_id', $commit_id);
        $CI->db->where('request_status', $confm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $commi_fet_pro = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $commi_fet_pro;
   }
    function get_total_sum_coomit_fund_this_commit($commit_id)
    {
        $confmm=1;
          $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('ax_tbl_fund_request');
        $CI->db->where('commit_id', $commit_id);
        $CI->db->where('request_status', $confmm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
       
    }
    function get_last_user($commit_id)
    {
         $CI =& get_instance();
    
                // Load the database library if not loaded already
                $CI->load->database();

                // Fetch the user ID associated with the commit_id
                $CI->db->select('get_user_id');
                $CI->db->from('ax_tbl_fund_request');
                $CI->db->where('commit_id', $commit_id);
                $CI->db->order_by('id', 'DESC');
                $CI->db->limit(1);
                $query = $CI->db->get();

                // If a row is found, return the user_id, otherwise return null
                if ($query->num_rows() > 0) {
                    return $query->row()->get_user_id;
                } else {
                    return null;
                }
    }
    function get_name_user($userid)
    {
         $CI =& get_instance();
    
                // Load the database library if not loaded already
                $CI->load->database();

                // Fetch the user ID associated with the commit_id
                $CI->db->select('fullname');
                $CI->db->from('reg_table');
                $CI->db->where('user_id', $userid);
                $CI->db->order_by('id', 'DESC');
                $CI->db->limit(1);
                $query = $CI->db->get();

                // If a row is found, return the user_id, otherwise return null
                if ($query->num_rows() > 0) {
                    return $query->row()->fullname;
                } else {
                    return null;
                }
    }
    
    function get_my_fund_recive_amt($withdrol_id)
    {
        $confmm=1;
          $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('ax_tbl_fund_request');
        $CI->db->where('withdrol_id', $withdrol_id);
        $CI->db->where('request_status', $confmm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
       
    }
    function get_my_withdwal_amt($withdrol_id)
    {
        //$confmm=1;
          $CI =& get_instance();

        // Load the database if it's not already loaded
        $CI->load->database();
          $CI->db->select_sum('request_amt');  // Sum of credit
       
        $CI->db->from('ax_tbl_request');
        $CI->db->where('id', $withdrol_id);
      //  $CI->db->where('request_status', $confmm);    
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amt)) ? $result->request_amt : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
       
    }
    function get_growth_id_by_commit($commit_id)
{
    $CI =& get_instance();
    
                // Load the database library if not loaded already
                $CI->load->database();

                // Fetch the user ID associated with the commit_id
                $CI->db->select('growth_roi');
                $CI->db->from('commitments');
                $CI->db->where('commit_id', $commit_id);
                $query = $CI->db->get();

                // If a row is found, return the user_id, otherwise return null
                if ($query->num_rows() > 0) {
                    return $query->row()->growth_roi;
                } else {
                    return null;
                }
}
function get_totol_amout_depoite($register_id)
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
}
function totol_commit_banlece($user_id)
{ 
       $CI =& get_instance();
        // Load the database if it's not already loaded
        $CI->load->database();
        $CI->db->select_sum('request_amount');  // Sum of credit
        $CI->db->from('commitments');
        $CI->db->where('registeruser_id', $user_id);
        // $CI->db->where('status', 1);    
        $query = $CI->db->get();
        $result = $query->row();
        // Calculate the balance (credit - debit)
        $request_fund_su = ($result && isset($result->request_amount)) ? $result->request_amount : 0;
        // Return the total balance (credit - debit)
        return $request_fund_su;
}
function get_widrwal_request_confirm($user_id)
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
function recieve_income_my($register_id)
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
}

function sum_total_my_income($user_id)
    {
        $CI =& get_instance();  // Get the CodeIgniter instance
    
        
        // Perform the query
        $CI->db->select_sum('credit');  // Sum of credit
        $CI->db->select_sum('debit');   // Sum of debit
        $CI->db->from('ax_tbl_nonworking');
        $CI->db->where('registeruser_id', $user_id);
        $query = $CI->db->get();
        $result = $query->row();
        
        // Calculate the balance (credit - debit)
        $credit_sum = ($result && isset($result->credit)) ? $result->credit : 0;
        $debit_sum = ($result && isset($result->debit)) ? $result->debit : 0;
        
        // Return the total balance (credit - debit)
        return $credit_sum - $debit_sum;
    }
     function get_link_details_byId($id){
    $CI =& get_instance();      
    $CI->load->database();      
    $CI->db->select('*');       
    $CI->db->from('commitments_tbl_provide_get_help');     
    $CI->db->where('id',$id);      
    $query=$CI->db->get();      
    return  $query->row();    
}