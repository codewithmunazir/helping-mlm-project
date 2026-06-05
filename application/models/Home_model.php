<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
   public function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Asia/Kolkata');
    }
   
//
 public function get_multiple_rows_with_same_credit() {
        // $subquery = $this->db->select('registeruser_id, credit')
        //                      ->from('ax_tbl_nonworking')
        //                      ->group_by('registeruser_id, credit')
        //                      ->having('COUNT(*) > 1')
        //                      ->get_compiled_select();  // This generates the subquery

        // // Now use the subquery inside the main query
        // $this->db->select('*')
        //          ->from('ax_tbl_nonworking')
        //          ->where('wstatus', 'withdrawal Request Cancel')
        //          ->where_in('(registeruser_id, credit)', $subquery, FALSE)  // Use the subquery here
        //          ->order_by('id', 'DESC');

        // $query = $this->db->get();
        // return $query->result();  // Return the result as an array of objects
        $subquery = $this->db->select('registeruser_id, credit')
                     ->from('ax_tbl_nonworking')
                     ->group_by('registeruser_id, credit')
                     ->having('COUNT(*) > 1')
                     ->get_compiled_select();  // Generates the subquery

// Main query with join and conditions
$this->db->select('ax_tbl_nonworking.*')
         ->from('ax_tbl_nonworking')
         ->join("($subquery) AS subquery", 'ax_tbl_nonworking.registeruser_id = subquery.registeruser_id AND ax_tbl_nonworking.credit = subquery.credit', 'inner')  // Join with the subquery
         ->where('ax_tbl_nonworking.wstatus', 'withdrawal Request Cancel')  // Filter by wstatus
         ->where('ax_tbl_nonworking.wdate >', '2025-03-19')  // Filter by wdate greater than '2025-03-19'
         ->where('ax_tbl_nonworking.wdate = (SELECT MAX(wdate) FROM ax_tbl_nonworking AS sub WHERE sub.registeruser_id = ax_tbl_nonworking.registeruser_id AND sub.credit = ax_tbl_nonworking.credit)', NULL, FALSE)  // Ensure the latest wdate is selected
         ->order_by('ax_tbl_nonworking.id', 'DESC');  // Order by id in descending order

// Execute the query and return the result
$query = $this->db->get();
return $query->result(); 
    }
//
    public function delete_duplicate_rows() {
        // First, select the rows with the same registeruser_id and credit, where wstatus = 'withdrawal Request Cancel'
        // and wdate is within the specified range.
        $this->db->select('MIN(id) as id');
        $this->db->from('ax_tbl_nonworking');
        $this->db->where('wstatus', 'withdrawal Request Cancel');
        $this->db->where('wdate >', '2025-03-23 19:57:10');
        $this->db->where('wdate <', '2025-03-24 01:57:10');
        $this->db->group_by('registeruser_id, credit');
        $this->db->having('id IS NOT NULL');
        $result = $this->db->get()->result_array();

        // Get all the ids that should be kept (the MIN ids)
        $keep_ids = array_column($result, 'id');

        // Now, delete all rows that are not in the keep_ids
        if (!empty($keep_ids)) {
            $this->db->where('wstatus', 'withdrawal Request Cancel');
            $this->db->where('wdate >', '2025-03-23 19:57:10');
            $this->db->where('wdate <', '2025-03-24 01:57:10');
            $this->db->where_not_in('id', $keep_ids); // Delete duplicates
            $this->db->delete('ax_tbl_nonworking');
        }
    }
    // Check if a position is available under a given parent ID
    public function is_position_available($parent_id, $position) {
        $this->db->where('parent_idd', $parent_id);
        $this->db->where('position', $position);
        return $this->db->count_all_results('reg_table') === 0;
    }

    // Find the next available parent node in the binary tree
    public function find_next_parent($sponsor_id, $position) {
        $queue = [$sponsor_id];  // Start with the sponsor's ID

        while (!empty($queue)) {
            $current_parent_id = array_shift($queue);

            // Check if the position under this parent is available
            if ($this->is_position_available($current_parent_id, $position)) {
                return $current_parent_id;
            }

            // Get children of the current parent for the next level
            $children = $this->db->select('user_id')
                                 ->where('parent_idd', $current_parent_id)
                                 ->get('reg_table')
                                 ->result();

            foreach ($children as $child) {
                $queue[] = $child->user_id;  // Queue the child nodes
            }
        }

        return null;  // No position found
    }

    // Register user and auto-fill the parent_id
    public function register_userty($data) {
         if (!isset($data['sponserd_id']) || !isset($data['position'])) {
            return false;
        }
// echo $data['position'];
        // Find the next available parent for the given sponsor_id and position
        $parent_id = $this->find_next_parent($data['sponserd_id'], $data['position']);

        if ($parent_id !== null) {
            $data['parent_idd'] = $parent_id;
        } else {
            return false;  // No available position
        }

        
        $this->db->insert('reg_table', $data);
        $last_id=$this->db->insert_id();
        return array('last_id'=> $last_id,'msg'=>'1');
  
    }
   function isLogin($user_id,$pass)
    {
        $query=$this->db->where(['user_id'=>$user_id, 'password'=>$pass]);
        $query = $this->db->get('reg_table');
        $datat=$query->row();
        if(!empty($datat))
        {
         return   $datat->id;
        }
        else{
            return 0;
        }
        //echo $this->db->last_query();
//exit();
        //return $query->result_array();sssss
    //return $query->row()->id;
    }
    public function register_user($insertDataw) 
    {
        if($insertDataw)
        {

        $this->db->insert('reg_table',$insertDataw);

        $last_id=$this->db->insert_id();

        return array('last_id'=> $last_id,'msg'=>'1');

        }
        else{

            return  array('last_id'=>'0','msg'=>'0');                    
        }      
    }
    public function valid_sponserd($sid)
    {
        return $this->db->where('user_id', $sid)->get('reg_table')->row(); 
    }
    
    public function check_Roi_stop()
    {
        $service_name="ROI";
        $this->db->select('status');        
        $this->db->from('ax_tbl_servicess');        
        $this->db->where('services_name',$service_name);        
        $query=$this->db->get();        
        return  $query->row(); 
    }
     public function get_genra_dumyroi()
{
    $this->db->where('isvalid', 1);
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get('roi_wallet');
    return $query->result_array();
}
public function fetch_daily_growth_counts($user_ids, $to_up_ids, $batch_size = 1000)
{
    if (empty($user_ids) || empty($to_up_ids)) return [];

    $daily_growth_counts = [];

    // Process in smaller chunks
    $user_batches = array_chunk($user_ids, $batch_size);
    $to_up_batches = array_chunk($to_up_ids, $batch_size);

    foreach ($user_batches as $user_batch) {
        foreach ($to_up_batches as $to_up_batch) {
            $this->db->select('registeruser_id, t_id, COUNT(*) as count');
            $this->db->from('ax_tbl_nonworking');
            $this->db->where_in('registeruser_id', $user_batch);
            $this->db->where_in('t_id', $to_up_batch);
            $this->db->group_by(['registeruser_id', 't_id']);

            $query = $this->db->get();
            $results = $query->result_array();

            foreach ($results as $row) {
                $daily_growth_counts["{$row['registeruser_id']}-{$row['t_id']}"] = $row['count'];
            }
        }
    }

    return $daily_growth_counts;
}

public function bulkInsertRoi($roi_data)
{
    if (!empty($roi_data)) {
        $this->db->insert_batch('ax_tbl_nonworking', $roi_data);
    }
}
    // public function get_genra_dumyroi()
    // {
    //     $visul = 1;
    //     $query = $this->db->where('isvalid', $visul);
    //     $query = $this->db->order_by('id', 'ASC');
    //     $query = $this->db->limit(3000, 0);  // Fetch the first 3000 rows
    //     $query = $this->db->get('roi_wallet');
    //     return $query->result_array(); 
    // }
    // public function get_genra_dumyroi_sec()
    // {
    //     $visul = 1;
    //     $query = $this->db->where('isvalid', $visul);
    //     $query = $this->db->order_by('id', 'ASC');
    //     $query = $this->db->limit(3000, 3000);  // Fetch 3000 rows starting from 2000th row
    //     $query = $this->db->get('roi_wallet');
    //     return $query->result_array(); 
    // }
    // public function get_genra_dumyroi_third()
    // {
    //     $visul = 1;
    //     $query = $this->db->where('isvalid', $visul);
    //     $query = $this->db->order_by('id', 'ASC');
    //     $query = $this->db->limit(3000, 6000);  // Fetch 3000 rows starting from 2000th row
    //     $query = $this->db->get('roi_wallet');
    //     return $query->result_array(); 
    // }
      public function get_genra_dumyroi_secty($node)
    {
        $visul = 1;
         $query = $this->db->where('registeruser_id', $node);
        $query = $this->db->where('isvalid', $visul);
        $query = $this->db->order_by('id', 'ASC');
        $query = $this->db->get('roi_wallet');
        return $query->result_array(); 
    }
   public function get_genra_dumyroifirst()
{
    $visul = 1;
    $query = $this->db->where('isvalid', $visul);
    $query = $this->db->order_by('id', 'ASC');
    $query = $this->db->limit(2000, 0);  // Fetch the first 3000 rows starting from the 1st row
    $query = $this->db->get('roi_wallet');
    return $query->result_array(); 
}

public function get_genra_dumyroi_sec()
{
    $visul = 1;
    $query = $this->db->where('isvalid', $visul);
    $query = $this->db->order_by('id', 'ASC');
    $query = $this->db->limit(2000, 2000);  // Fetch 3000 rows starting from the 3001st row
    $query = $this->db->get('roi_wallet');
    return $query->result_array(); 
}

public function get_genra_dumyroi_third()
{
    $visul = 1;
    $query = $this->db->where('isvalid', $visul);
    $query = $this->db->order_by('id', 'ASC');
    $query = $this->db->limit(2000, 4000);  // Fetch 3000 rows starting from the 6001st row
    $query = $this->db->get('roi_wallet');
    return $query->result_array(); 
}

    
    
    public function fetch_row_get_daily_growth($user_id, $to_up_idd)
    {
         $this->db->where('registeruser_id', $user_id);
         $this->db->where('t_id', $to_up_idd);
        $query = $this->db->get('ax_tbl_nonworking');
        return $query->num_rows();
    }
     public function createRoi($insert_reward)
        {

             $this->db->insert('ax_tbl_nonworking',$insert_reward);    
            return true;
        }
         public function getdist()
        {               
            
                 $this->db->distinct();
                $this->db->select('registeruser_id');
                $query = $this->db->get('ax_tbl_topup');

                // Return the result as an array of register_ids
                return $query->result_array();
        }  
    public function get_all_Direct_user()
    {
        $isone=1;
         $this->db->select('user_id');
        $this->db->from('reg_table');
        $this->db->where('isactive', $isone);
        $this->db->where('istopup', $isone);
        
        $query = $this->db->get();

        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // No results, return empty array
            return [];
        }
    }
    public function get_all_Direct_user_first()
{
    $isone = 1;
    $this->db->select('user_id');
    $this->db->from('reg_table');
    $this->db->where('isactive', $isone);
    $this->db->where('istopup', $isone);
    $this->db->order_by('user_id', 'ASC');
    // Set the limit to 2000 records starting from the first one
    $this->db->limit(1500, 0); 

    $query = $this->db->get();

    // Check if there are any results
    if ($query->num_rows() > 0) {
        // Return the result as an array
        return $query->result_array();
    } else {
        // No results, return an empty array
        return [];
    }
}
   public function get_all_Direct_user_secd()
{
    $isone = 1;
    $this->db->select('user_id');
    $this->db->from('reg_table');
    $this->db->where('isactive', $isone);
    $this->db->where('istopup', $isone);
    $this->db->order_by('user_id', 'ASC');
    // Set the limit to 2000 records starting from the first one
    $this->db->limit(3000, 3000); 

    $query = $this->db->get();

    // Check if there are any results
    if ($query->num_rows() > 0) {
        // Return the result as an array
        return $query->result_array();
    } else {
        // No results, return an empty array
        return [];
    }
}
  public function get_all_Direct_user_third()
{
    $isone = 1;
    $this->db->select('user_id');
    $this->db->from('reg_table');
    $this->db->where('isactive', $isone);
    $this->db->where('istopup', $isone);
    $this->db->order_by('user_id', 'ASC');
    // Set the limit to 2000 records starting from the first one
    $this->db->limit(3000, 6000); 

    $query = $this->db->get();

    // Check if there are any results
    if ($query->num_rows() > 0) {
        // Return the result as an array
        return $query->result_array();
    } else {
        // No results, return an empty array
        return [];
    }
}
public function get_all_Direct_user_four()
{
    $isone = 1;
    $this->db->select('user_id');
    $this->db->from('reg_table');
    $this->db->where('isactive', $isone);
    $this->db->where('istopup', $isone);
    $this->db->order_by('user_id', 'ASC');
    // Set the limit to 2000 records starting from the first one
    $this->db->limit(3000, 9000); 

    $query = $this->db->get();

    // Check if there are any results
    if ($query->num_rows() > 0) {
        // Return the result as an array
        return $query->result_array();
    } else {
        // No results, return an empty array
        return [];
    }
}
public function get_all_Direct_user_five()
{
    $isone = 1;
    $this->db->select('user_id');
    $this->db->from('reg_table');
    $this->db->where('isactive', $isone);
    $this->db->where('istopup', $isone);
    $this->db->order_by('user_id', 'ASC');
    // Set the limit to 2000 records starting from the first one
    $this->db->limit(3000, 12000); 

    $query = $this->db->get();

    // Check if there are any results
    if ($query->num_rows() > 0) {
        // Return the result as an array
        return $query->result_array();
    } else {
        // No results, return an empty array
        return [];
    }
}

     public function count_get_income_reward($node_id)
        {
            $sttyu='Reward Income';
            $this->db->where('registeruser_id', $node_id);
            $this->db->where('wstatus', $sttyu);
            $query = $this->db->get('ax_tbl_nonworking');
            return $query->num_rows();
        } 
    
    public function count_get_direct($user_id)
    {
       $isone=1;
        $this->db->where('sponserd_id', $user_id);
        $this->db->where('isactive', $isone);
        $this->db->where('istopup', $isone);
            $query = $this->db->get('reg_table');
            return $query->num_rows();
    }
public function get_wallet_data() {
        // Select the columns needed
        $this->db->select('id, registeruser_id, wdate');
        // Get distinct values based on registeruser_id
        $this->db->from('roi_wallet');
        $this->db->group_by('registeruser_id');  // Group by 'registeruser_id'
        $this->db->order_by('id', 'DESC'); // Order by 'id' in descending order
        
        // Execute the query
        $query = $this->db->get();

        // Return the result as an array of objects
        return $query->result();
    }

   /* public function insert_binary_busines($insertDataw)
    {
        if($insertDataw)
             {
    
             $this->db->insert('ax_tbl_nonworking',$insertDataw);
    
        //     $last_id=$this->db->insert_id();
    
            return true;
    
            }
            else{
    
                return  false;                    
            }  
    }
    public function getdist()
    {               
            $this->db->distinct(); // Add DISTINCT to the query
            $this->db->select('registeruser_id'); // Specify the columns which have commo value 
            $this->db->from('ax_tbl_topup'); // Specify the table
            $query = $this->db->order_by('id', 'ASC');
            //$this->db->where('top_id', $top_id); // Add any conditions if needed

            $query = $this->db->get(); // Execute the query

            $result = $query->result_array();
            return $result;
    }
    public function get_regv()
    {
        $this->db->select('id, user_id, position, email, mobile, fullname, isactive');
        $this->db->from('reg_table');
        $query = $this->db->get();
        $data = [];

        // Loop through the query result and format it
        foreach ($query->result_array() as $row) {
            $data[] = [
                $row['id'],
                $row['fullname'],
                $row['email'],
                $row['position'],
                $row['user_id'], // Assuming you want to include user_id as part of the data
                $row['isactive'] ? 'Active' : 'Inactive' // Example formatting for isactive
            ];
        }
        return $data;

    }
    ///////////////////////////////////////////////////////////////
     public function get_all_user_which_have_left_right()
     {
      //  $isone=1;
          $this->db->select('parent_idd'); // Select the parent_idd (the user)
    $this->db->from('reg_table'); // From the reg_table
   //  $this->db->where('isactive', $isone);
    //$this->db->where('isbot', $isone);
     $this->db->where('teambv >', 0); 
    $this->db->group_by('parent_idd'); // Group by parent_idd
    $this->db->having('COUNT(DISTINCT position) = 2'); // Ensure there are both left and right positions

    // Execute the query
    $query = $this->db->get();

    // Check if the query returned any results
    if ($query->num_rows() > 0) {
        // Return the result as an array of parent_idd
        return $query->result_array();
        } else {
            // No results, return empty array
            return [];
        }

       
     } 
    public function get_left_user($user_id)
    {
        $this->db->select('user_id');
        $this->db->from('reg_table');
        $this->db->where('parent_idd', $user_id);
        $this->db->where('position', 'left');
         $query = $this->db->get();
        // Check if a result is found
        if ($query->num_rows() > 0) {
            // Return the user_id
            return $query->row()->user_id;
        } else {
            // Return null if no result found
            return null;
        }
    }
    public function get_rank_value($user_id)
    {
         $this->db->select('rank_vb');
        $this->db->from('reg_table');
        $this->db->where('user_id', $user_id);
         $query = $this->db->get();
        // Check if a result is found
        if ($query->num_rows() > 0) {
            // Return the user_id
            return $query->row()->rank_vb;
        } else {
            // Return null if no result found
            return null;
        }
    }

     public function get_royalty_club_value($user_id)
    {
         $this->db->select('royalty_club');
        $this->db->from('reg_table');
        $this->db->where('user_id', $user_id);
         $query = $this->db->get();
        // Check if a result is found
        if ($query->num_rows() > 0) {
            // Return the user_id
            return $query->row()->royalty_club;
        } else {
            // Return null if no result found
            return null;
        }
    } 
    public function get_right_user($user_id)
    {
         $this->db->select('user_id');
        $this->db->from('reg_table');
        $this->db->where('parent_idd', $user_id);
        $this->db->where('position', 'right');
        // Execute the query and get the result
        $query = $this->db->get();
        // Check if a result is found
        if ($query->num_rows() > 0) {
            // Return the user_id
            return $query->row()->user_id;
        } else {
            // Return null if no result found
            return null;
        }
        
    }
    public function get_all_user()
    {
        $isone=1;
         $this->db->select('user_id, rank_vb');
        $this->db->from('reg_table');
        //$this->db->where('sponserd_id', $user_id);
        $this->db->where('isactive', $isone);
        $this->db->where('isbot', $isone);
        
        $query = $this->db->get();

        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // No results, return empty array
            return [];
        }
    }
    
    public function get_left_bv($user_id)
    {
            $this->db->select_sum('BV');  // Select the sum of 'bv'
            $this->db->from('reg_table');  // From 'reg_table'
            $this->db->where('sponserd_id', $user_id);  // Where the sponserd_id matches the given user_id
            $this->db->where('position', 'left');  // Where the position is 'right'

            $query = $this->db->get();  // Execute the query

            // Get the result
            $result = $query->row();

            // Return the sum of BV, or 0 if no result
            $bv_sumleft = $result ? $result->BV : 0;
            return $bv_sumleft;
    }

    public function get_right_bv($user_id)
    {
         $this->db->select_sum('BV');  // Select the sum of 'bv'
            $this->db->from('reg_table');  // From 'reg_table'
            $this->db->where('sponserd_id', $user_id);  // Where the sponserd_id matches the given user_id
            $this->db->where('position', 'right');  // Where the position is 'right'

            $query = $this->db->get();  // Execute the query

            // Get the result
            $result = $query->row();

            // Return the sum of BV, or 0 if no result
            $bv_sumright = $result ? $result->BV : 0;
            return $bv_sumright;
    }
   
        public function update_rank_val($update_rank, $user_id)
        {
            $appointment_id= $user_id;
            $update_vrankv=$update_rank;
             $appointment = array('rank_vb'=>$update_vrankv);    
            $this->db->where('user_id', $appointment_id);
            $this->db->update('reg_table', $appointment);
              return true;
        }
        public function update_rank_val_royal($update_rank, $user_id)
        {
            $appointment_id= $user_id;
            $update_vrankv=$update_rank;
             $appointment = array('royalty_club'=>$update_vrankv);    
            $this->db->where('user_id', $appointment_id);
            $this->db->update('reg_table', $appointment);
              return true;
        }
        public function insert_bvv_detials($insert_bvdd)
        {
             $this->db->insert('bv_matching',$insert_bvdd);    
            return true; 
        }
        public function Insert_rewardInc($insert_reward)
        {

             $this->db->insert('ax_tbl_nonworking',$insert_reward);    
            return true;
        }
        public function Insert_tradeInc($insert_trade)
        {
            $this->db->insert('trade_income',$insert_trade);    
            return true;

        }
               
         public function get_royalty_income_percent($id)
        {
            // Query the table to get the row where id = 1
            $this->db->where('id', $id); // Add a condition for the 'id' column
            $query = $this->db->get('ax_tbl_royalti_percent'); // Get the data from ax_tbl_royalti_percent table
            
            // Check if the row exists
            if ($query->num_rows() > 0) {
                return $query->row(); // Return the first row as an object
            }
            return null; // Return null if no record is found
        }
         public function get_all_royalty_percentages()
    {
        // Select only the perce_nt column
        $this->db->select('perce_nt');
        $query = $this->db->get('ax_tbl_royalti_percent'); // Get all rows from the table

        // Check if any data is found
        if ($query->num_rows() > 0) {
            // Return perce_nt values as an array
            return array_column($query->result_array(), 'perce_nt');
        }
        return []; // Return an empty array if no data is found
    }

       public function count_royal_userby_royalty($Rank_name)
    {
        $this->db->where('rank_name', $Rank_name);
        $query = $this->db->get('royal_club_match_user');
        return $query->num_rows();
    }  
    public function insert_royalty_detials($insert_Royal_club_user)
    {
        $this->db->insert('royal_club_match_user', $insert_Royal_club_user);    
            return true;
    }
    public function get_all_royal_user()
    {
        $this->db->select('registeruser_id, rank_id');
        $this->db->from('royal_club_match_user');
        $query = $this->db->get();
        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // No results, return empty array
            return [];
        }
    }
     public function get_all_dinstict_royal_user()
    {
                    $this->db->distinct(); // Add DISTINCT to the query
                    $this->db->select('registeruser_id'); // Specify the columns which have commo value 
                    $this->db->from('royal_club_match_user'); // Specify the table
                    $query = $this->db->order_by('id', 'ASC');
                    $query = $this->db->get(); // Execute the query
        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // No results, return empty array
            return [];
        }
                    
           
    }

    public function get_last_month_botpurchage()
    {
        $this->db->select_sum('amt');  // Select the sum of 'amt' column
        $this->db->from('bot_user_tbl');
        $this->db->where('purchage_date >=', date('Y-m-01', strtotime('first day of last month')));  // Start of last month
        $this->db->where('purchage_date <', date('Y-m-01'));  // Start of this month
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->amt)) ? $result->amt : 0;

        return $amt_sum;  // Output the sum or 0

    }
    public function get_user_count_by_rank() {
        // First, get the highest rank_id for each user
        $this->db->select('registeruser_id, MAX(rank_id) as highest_rank');
        $this->db->from('royal_club_match_user');
        $this->db->group_by('registeruser_id');
        $subquery = $this->db->get_compiled_select();  // Get the compiled select query

        // Now, use the subquery to count users by highest rank
        $this->db->select('royal_club_match_user.rank_id, COUNT(DISTINCT royal_club_match_user.registeruser_id) as user_count');
        $this->db->from('royal_club_match_user');
        $this->db->join("($subquery) as highest_ranks", 'royal_club_match_user.registeruser_id = highest_ranks.registeruser_id', 'inner');
        $this->db->where('royal_club_match_user.rank_id = highest_ranks.highest_rank');
        $this->db->group_by('royal_club_match_user.rank_id');
        $query = $this->db->get();

        return $query->result();  // Return result as an array of objects
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

        return $query->result();  // Return result as an array of objects
    }
    public function insert_main_debit_alldetails($inser_royal_dd)
    {
         $this->db->insert('royalty_income_done_details',$inser_royal_dd);    
            return true; 
    }
    public function get_bot_trade_income_user()
    {
        $query=$this->db->get('trade_income');
        return $query->result_array(); 
    }
  
     public function sum_get_daily_trade_roi($node_id)
    {
        $traderoiin = "Daily Bot Trade Income";
        // Query to sum 'credit' based on condition
        $this->db->select_sum('credit');
        $this->db->where('registeruser_id', $node_id);
        $this->db->where('wstatus', $traderoiin);
        $query = $this->db->get('ax_tbl_nonworking');

        // Check if the query returned a result

         $rowaa=$query->num_rows();
         
        echo "<br>";
        echo  $query->row()->credit;

        // if ($query->num_rows() ==0) {
        //     // Return the sum of credit if rows are found
        //     return $query->row()->credit;
        // } else {
        //     // Return 0 if no results found
        //     return 0;
        // }
    }
    public function get_daily_bot_trade_income_credit_sum($registeruser_id) {
        // Define the condition
        $traderoiin = "Daily Bot Trade Income";
        
        // Condition array
        $condition = array(
            'registeruser_id' => $registeruser_id,
            'wstatus' => $traderoiin
        );

        // Query to sum the 'credit' field based on the condition
        $this->db->select_sum('credit');   // Sum of 'credit' column
        $this->db->where($condition);      // Apply condition to query
        $query = $this->db->get('ax_tbl_nonworking');  // Execute the query

        // Check if the query returned a result
        if ($query->num_rows() > 0) {
            // If rows are found, return the sum of credit
            return $query->row()->credit;
        } else {
            // If no results are found, return 0
            return 0;
        }
    }
    public function check_user_isactive($user_id) {
    // Set the value for 'isactive' as 1 (active user)
    $stats = 1;

    // Apply the conditions for the query
    $this->db->where('user_id', $user_id);
    $this->db->where('isactive', $stats);

    // Execute the query
    $query = $this->db->get('reg_table');

    // Check if any rows are returned
    if ($query->num_rows() > 0) {
        // If there is a match, return isactive value or 1 (since the user is active)
        return 1;  // User is active
    } else {
        // If no match, return 0 (either user not found or is not active)
        return 0;  // User is not active
    }
}

     public function get_user_expi($user_id)
        {
    
          $this->db->select('expire_date');
          $this->db->from('bot_user_tbl');
          $this->db->order_by('id', 'DESC');
          $this->db->limit(1);   
          $this->db->where('registeruser_id', $user_id);
          $query = $this->db->get();

           // Return the result as an array
            return $query->row()->expire_date;
    
     }
      public function check_expiry($expire_date)
    {
        // Get current date and time
        $current_date = date('Y-m-d H:i:s');
        
        // Compare the expiry date with the current date
        if (strtotime($expire_date) > strtotime($current_date)) {
            return 1; // Not expired
        } else {
            return 0; // Expired
        }
    }
    //
    public function get_all_usersdetisl_for_invest_roi()
    {
        $visul=1;
      
        $query=$this->db->where('isvalid',$visul);
        $query=$this->db->order_by('id', 'ASC');
        $query = $this->db->get('roi_wallet');
        return $query->result_array(); 
        //id`, `registeruser_id`, `credit`, `debit`, `wdate`, `wstatus`, `top_id`, `days`, `pack_amt`, `roi_percent`, `isvalid`
    }
    public function get_level_detils_for_genate_roi()
    {
        
       //$visul=1;
      
//$query=$this->db->where('isvalid',$visul);
        $query=$this->db->order_by('id', 'ASC');
        $query = $this->db->get('ax_tbl_level_income');
        return $query->result_array(); 
    }
    public function sum_total_roi_income($t_id){
          $stty='Trading ROI Income';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $this->db->where('t_id', $t_id);
        $this->db->where('wstatus',$stty);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
        
      }
      public function sum_total_invest_income($user_id){
          $stty='Investment';
         $this->db->select_sum('credit');  // Select the sum of 'amt' column
        $this->db->from('ax_tbl_nonworking');
        $this->db->where('registeruser_id', $user_id);
        $this->db->where('type',$stty);
        $query = $this->db->get();

        $result = $query->row();  // Fetch the result as a single row

        // Check if the result exists, and return the sum or 0
        $amt_sum = ($result && isset($result->credit)) ? $result->credit : 0;

        return $amt_sum;  // Output the sum or 0
        
        
      }
      public function update_invalid_roi_user($t_id)
      {
        $top_idd=$t_id;
              $update_roi_data =   array('isvalid'=>0);    
        $this->db->where('top_id', $top_idd);
        return($this->db->update('roi_wallet', $update_roi_data));

      }
      //


    public function get_first_topup_for_each_user() {
        // Prepare the query to get the first row for each unique registeruser_id
        $this->db->select('registeruser_id, topup_amt, topupdate');
        $this->db->from('ax_tbl_topup');
        $this->db->where('topupdate IN (SELECT MIN(topupdate) FROM ax_tbl_topup GROUP BY registeruser_id)');
        
        // Execute the query
        $query = $this->db->get();

        // Check if there are results and return them
        if ($query->num_rows() > 0) {
            // return $query->result(); // Return results as an array of objects
             return $query->result_array();
        } else {
            return []; // No results found
        }
    }
    public function get_all_Direct_user($user_id)
    {
        $isone=1;
         $this->db->select('user_id');
        $this->db->from('reg_table');
        $this->db->where('sponserd_id', $user_id);
        $this->db->where('isactive', $isone);
        $this->db->where('istopup', $isone);
        
        $query = $this->db->get();

        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // No results, return empty array
            return [];
        }
    }
    public function get_first_topup_for_each_user_re($tada) {
    // Prepare the query to get the first row for each unique registeruser_id
       $this->db->select('registeruser_id, topup_amt, topupdate');
    $this->db->from('ax_tbl_topup');

    // Use DATEDIFF to calculate the difference between topupdate and the $tada date
    // Directly pass $tada into the query instead of using array()
    $this->db->where("DATEDIFF('$tada', topupdate) < 95"); // Corrected query

    // Add condition for the first topup of each user based on the minimum topupdate
    $this->db->where('topupdate IN (SELECT MIN(topupdate) FROM ax_tbl_topup GROUP BY registeruser_id)');

    // Execute the query
    $query = $this->db->get();

    // Check if there are results and return them
    if ($query->num_rows() > 0) {
        return $query->result_array(); // Return results as an array of objects
    } else {
        return []; // No results found
    }
}
   
   //
    public function get_first_topup_for_fast_trackeach_user_re($tada) {
    // Prepare the query to get the first row for each unique registeruser_id
       $this->db->select('registeruser_id, topup_amt, topupdate');
    $this->db->from('ax_tbl_topup');

    // Use DATEDIFF to calculate the difference between topupdate and the $tada date
    // Directly pass $tada into the query instead of using array()
    $this->db->where("DATEDIFF('$tada', topupdate) < 32"); // Corrected query

    // Add condition for the first topup of each user based on the minimum topupdate
    $this->db->where('topupdate IN (SELECT MIN(topupdate) FROM ax_tbl_topup GROUP BY registeruser_id)');

    // Execute the query
    $query = $this->db->get();

    // Check if there are results and return them
    if ($query->num_rows() > 0) {
        return $query->result_array(); // Return results as an array of objects
    } else {
        return []; // No results found
    }
} 

  //
    public function getdata_level()
    {
        $query= $this->db->select('*');
      $query= $this->db->from('reg_table');
       //$query  = $this->db->where('id',$id);
      $query = $this->db->get();
       return $query->result_array(); 
    }

  //
    public function showUserTree($userId, $lleve)
{
  
    
    // Fetch data from the model
    $data = $this->getdata_level();

    // Process data into a tree structure
    $items = [];
    foreach ($data as $row) {
        $items[$row['user_id']] = $row;
        $items[$row['user_id']]['children'] = [];
    }

    // Build the tree starting from the given userId
    $tree = $this->buildSubTree($items, $userId);

    // Initialize arrays to store the levels
    $level1 = [];
    $level2 = [];
    $level3 = [];
    $level_other = [];

    // Process the tree and store the results in arrays
    $this->processTree($tree, 1, $level1, $level2, $level3, $level_other);

    // Print the arrays for each level
    if($lleve==1)
    {
        return $level1;
    }elseif($lleve==2)
    {
        return $level2;
    }elseif ($lleve==3) {
            return $level3;
    }
    else{
        return array();
    }
    // echo "Level 1 Users: ";
    // print_r();
    
    // echo "<br> Level 2 Users: ";
    // print_r($level2);
    
    // echo "<br>  Level 3 Users: ";
    // print_r($level3);
    
    // echo "<br>  Other Users: ";
    // print_r($level_other);
}

// Function to recursively build the tree structure starting from a given user_id
private function buildSubTree(&$items, $parentId)
{
    $branch = [];
    foreach ($items as &$item) {
        // Check if this item is a child of the parentId (sponserd_id = parentId)
        if ($item['sponserd_id'] == $parentId) {
            // Add children recursively
            $children = $this->buildSubTree($items, $item['user_id']);
            if ($children) {
                $item['children'] = $children;
            }
            // Add this item to the branch (tree)
            $branch[] = $item;
        }
    }
    return $branch;
}

// Function to process the tree and store results in arrays
private function processTree($tree, $level, &$level1, &$level2, &$level3, &$level_other)
{
    foreach ($tree as $node) {
        // Check the level and store the node accordingly
        if ($level == 1) {
            $level1[] = $node['user_id'];
        } elseif ($level == 2) {
            $level2[] = $node['user_id'];
        } elseif ($level == 3) {
            $level3[] = $node['user_id'];
        } else {
            $level_other[] = $node['user_id'];
        }

        // Recursively process the children if they exist
        if (!empty($node['children'])) {
            $this->processTree($node['children'], $level + 1, $level1, $level2, $level3, $level_other);
        }
    }
}
public function insert_level_maintain_val($insert_level_mantane)
{
    $this->db->insert('level_maintain_wallet',$insert_level_mantane);    
            return true; 
}
public function get_level_incomeUser_detsi()
{
        $query= $this->db->select('*');
      $query= $this->db->from('level_maintain_wallet');
       //$query  = $this->db->where('id',$id);
      $query = $this->db->get();
       return $query->result_array();
}
//
 public function get_month_gap($get_date, $today) {
    $date1 = new DateTime($get_date);
    $date2 = new DateTime($today);

    // Calculate the difference between the two dates
    $interval = $date1->diff($date2);

    // Calculate the total months
    $months = ($interval->y * 12) + $interval->m;

    // Check if today's date is before the activation day in the month
    if ($date2->format('d') < $date1->format('d')) {
        $months++;
    }

    return $months;
}
//
public function count_maintain_level_entry($myuserid_id)
{
      $this->db->where('registeruser_id', $myuserid_id);
        $query = $this->db->get('level_maintain_wallet');
        return $query->num_rows();
}
 
     public function get_all_user_isactiv_topup()
    {
        $isone=1;
         $this->db->select('user_id');
        $this->db->from('reg_table');
        $this->db->where('isactive', $isone);
        $this->db->where('istopup', $isone);
        
        $query = $this->db->get();

        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // No results, return empty array
            return [];
        }
    }
    public function count_get_value_reward($node_id)
    {
        $this->db->where('registeruser_id', $node_id);
        $query = $this->db->get('salary_wallet');
        return $query->num_rows();
    }
    public function count_dirct_user($node_id)
    {
        $isone=1;
        $this->db->where('sponserd_id', $node_id);
        $this->db->where('isactive', $isone);
        $this->db->where('istopup', $isone);
        $query =$this->db->get('reg_table'); // 'users' is your table name
        return $query->num_rows();    // Returns the number of rows found
    }
     public function get_direct_children($node_id) {
            $this->db->select('user_id, teambusiness');
            $this->db->from('reg_table');
            $this->db->where('sponserd_id', $node_id);
            $this->db->order_by('teambusiness', 'DESC'); // Order by money in descending order
            $query = $this->db->get();
    
            return $query->result(); // Return the result as an array of objects
        }
        public function insert_myreward_user_list($insert_reward)
        {
            $this->db->insert('salary_wallet',$insert_reward);    
            return true;
        }
        public function gets_rewarded_user_list_invest()
        {
            $this->db->select('*');
            $this->db->from('salary_wallet');
            $query = $this->db->get();
            // Check if there are any results
            if ($query->num_rows() > 0) {
                // Return the result as an array
                return $query->result_array();
            } else {
                // No results, return empty array
                return [];
            }   
        }
        
        public function count_get_income_reward($node_id)
        {
            $sttyu='Reward Income';
            $type='Investment';
            $this->db->where('registeruser_id', $node_id);
            $this->db->where('wstatus', $sttyu);
            $this->db->where('type', $type);
            $query = $this->db->get('ax_tbl_nonworking');
            return $query->num_rows();
        } 
        public function bot_actvation_valid($user_id)
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

         $get_check_expire_d=$this->is_ropppbot_expire_date_valid($date_exprr, $current_date);
         return  $get_check_expire_d;

    } 
           public  function is_ropppbot_expire_date_valid($expire_date, $current_date)
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

     */
     public function get_expire_links()
            {
             $current_date_time = date('Y-m-d H:i:s'); // Current date and time

                $pending = 2;
                $not_expire = 0;

                // Build the query with necessary conditions
               
                $this->db->where('request_status', $pending);
                $this->db->where('status', $pending);
                 $this->db->where('update_slip', $not_expire);
                $this->db->where('is_expire', $not_expire);
                $this->db->where('expire_datetiime <', $current_date_time); // Correct column name and condition

                $this->db->order_by('id', 'DESC');

                // Execute the query and return the result as an array
                $query = $this->db->get('commitments_tbl_provide_get_help');
                return $query->result_array();   
            }
            public function update_link_commite($update_expire_link, $id)
            {
                 $this->db->where('id', $id);
                return ($this->db->update('commitments_tbl_provide_get_help',$update_expire_link));
            }
   
}