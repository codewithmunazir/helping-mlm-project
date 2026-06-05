<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Robot_model extends CI_Model
{ 
     public function __construct()
      {
      
    parent::__construct();
        $this->load->helper('commonn_helper');
        
        date_default_timezone_set('Asia/Kolkata');
    }
      
      
	 public function getpack_robot()
    {        
        $query=$this->db->get('trade_robot_pack');
         return $query->result_array(); 
    
    }
   
    public function my_bot_exist($user_id)
    {
          
        $this->db->where('registeruser_id', $user_id); 
        $query = $this->db->get('bot_user_tbl');
        
        // Return the number of rows that match the conditions
        return $query->num_rows();
    }
     public function bot_up($purchage_robot)
    {   
        $isbot=1;
        $appointment_id =$purchage_robot['registeruser_id'];
        $my_bot_t_id =$purchage_robot['bot_user_id'];
        $month=$purchage_robot['valid_month'];
        
        //
  
    // Example usage
// $lastdate = '2025-01-02 14:26:23';
// $month = 2; // Add 2 months

// $expire_date =$this->Robot_model->calculate_expiry_date($lastdate, $month);
// echo "Expiry date: " . $expire_date;
        //
        
        $bvvvvv =$purchage_robot['bv'];
         $rty=getsposerd($appointment_id);
         $usrrr_iddd=$rty->user_id;
         $lastdate=$this->last_date_get_mybot($usrrr_iddd);
         $expire_date =$this->calculate_expiry_date($lastdate, $month);
         $LastBV=$rty->BV; 
         if($LastBV==0)
         {
             $update_vbv=$bvvvvv;  
         }
         else{
            $update_vbv=$LastBV;  
         }
         //$update_vbv=$bvvvvv+$LastBV;
         $vbbbb=$update_vbv;  
        $appointment = array('BV'=>$vbbbb,'bot_id'=>$my_bot_t_id,'isbot' => $isbot,'bot_expire_date' => $expire_date);    
        $this->db->where('user_id', $appointment_id);
        $query=$this->db->update('reg_table', $appointment);
        if($query){
            if($purchage_robot)
            {
             $this->db->insert('bot_user_tbl',$purchage_robot);
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
    public  function calculate_expiry_date($lastdate, $month)
{
    // Create a DateTime object from the given last date
    $date = new DateTime($lastdate);
    
    // Add the specified number of months
    $date->modify("+$month month");
    
    // Return the expiry date in Y-m-d H:i:s format
    return $date->format('Y-m-d H:i:s');
}

//
 public function last_date_get_mybot($user_id)
    {

        $get_my_bot_user_details=getsposerd($user_id);
        $my_bot_expir_date=$get_my_bot_user_details->bot_expire_date;
        if($my_bot_expir_date=='0000-00-00 00:00:00')
        {   
            $date_exprr=date('Y-m-d H:i:s', strtotime('-1 day'));
        }else{

            $date_exprr=$my_bot_expir_date;
        }
        $current_date=date('Y-m-d H:i:s');

         $get_check_expire_d=$this->is_robot_expire_date_valid($date_exprr, $current_date);
         if($get_check_expire_d==1)
         {
            $last_ddddate=$date_exprr;
         }
         else{
            $last_ddddate=date('Y-m-d H:i:s');
         }
        return $last_ddddate;    

    } 
           public  function is_robot_expire_date_valid($expire_date, $current_date)
            {
                // Convert both dates to timestamps for easy comparison
                $expire_timestamp = strtotime($expire_date);
                $current_timestamp = strtotime($current_date);
                
                // Check if expire_date is greater than or equal to current_date
                if ($expire_timestamp >= $current_timestamp) {
                    return 1;  // Valid
                } else {
                    return 0;  // Expired
                }
            }
//
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
    public function update_teambusiness($updteambuns, $forusrsid)
    {
        $appointment_id = $forusrsid;
        $appointment = array('teambv' => $updteambuns,);    
        $this->db->where('user_id', $appointment_id);
        $query=$this->db->update('reg_table', $appointment);
        if($query){
            return 1;
        }
        else{
            return 0;
        }
    }
     public function get_bot_history($myuserid)
    {
        
        $query=$this->db->where('registeruser_id',$myuserid);
      //  $query=$this->db->or_where('registeruser_id',$myuserid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('bot_user_tbl');
        return $query->result_array();
        
    } 
     public function bv_reward__history($myuserid)
    {
        $stty='Bot Reward Income';
        $type='BOT';
        $query=$this->db->where('registeruser_id',$myuserid);
        $query=$this->db->where('wstatus',$stty);
        $query=$this->db->where('type',$type);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
        
    } 
     public function bv_trade_history($myuserid)
    {
        
        $query=$this->db->where('registeruser_id',$myuserid);
      //  $query=$this->db->or_where('registeruser_id',$myuserid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('trade_income');
        return $query->result_array();
        
    } 
     public function bv_matching_history($myuserid)
    {
        
        $query=$this->db->where('registeruser_id',$myuserid);
      //  $query=$this->db->or_where('registeruser_id',$myuserid);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('bv_matching');
        return $query->result_array();
        
    } 
    public function bv_daily_trade_incomeee_history($myuserid)
    {
        $user_id=$myuserid;
        $stkty='Daily Bot Trade Income';
        $type='BOT';
        $query=$this->db->where('registeruser_id',$user_id);
        $query=$this->db->where('wstatus',$stkty);
        $query=$this->db->where('type',$type);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    public function bv_royalty_incomeee_history($myuserid)
    {
        $user_id=$myuserid;
        $type='BOT';
        $stkty='Royalty Club Income';
        $query=$this->db->where('registeruser_id',$user_id);
        $query=$this->db->where('wstatus',$stkty);
        $query=$this->db->where('type',$type);
        $query=$this->db->order_by('id', 'DESC');
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->result_array();
    }
    ///index page 
 
      public function sum_bv_match($node_id)
      {
         $this->db->select_sum('required_bv');  // Select the sum of 'amt' column
        $this->db->from('bv_matching');
        $this->db->where('registeruser_id',$node_id);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->required_bv)) ? $result->required_bv : 0;

        return $amt_sum;  // Output the sum or 0
 
      }
      public function sum_bv_reward_income($node_id)
      {
         $stty='Bot Reward Income';
         $type='BOT';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $this->db->where('registeruser_id', $node_id);
        $this->db->where('wstatus', $stty);
        $this->db->where('type', $type);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
      }
      public function trade_amount($node_id)
      {
        // $stty='Reward Income';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('trade_income');
        $this->db->where('registeruser_id', $node_id);
      //  $this->db->where('wstatus',$stty);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
        
      }
      public function daily_trade_income($node_id){
          $stty='Daily Bot Trade Income';
          $type='BOT';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $this->db->where('registeruser_id', $node_id);
        $this->db->where('wstatus',$stty);
        $this->db->where('type',$type);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
        
      }
      public function bv_royalty_club_income($node_id){
          $stty='Royalty Club Income';
          $type='BOT';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $this->db->where('registeruser_id', $node_id);
        $this->db->where('wstatus',$stty);
        $this->db->where('type',$type);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
        
      }
      public function bv_total_income($node_id){
         $stty='BOT';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $this->db->where('registeruser_id', $node_id);
        $this->db->where('type',$stty);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
        
      }
      
    
}