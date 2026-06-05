<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Main_model extends CI_Model
{
    //bin2hex((random_bytes(4)));
    //mt_rand(100000,999999),
    public function getuser()
    {
        $query = $this->db->get('ax_tbl_admin_log');
    
        return $query->result_array();
        
    }
    public function aad_user_credential()
        {   
            date_default_timezone_set('Asia/Kolkata');
            $cuurntdatee=date('Y-m-d H:i:s');
            
                            $numbrr=having_three($this->input->post('sponsed_id'));
                            //echo $numbrr;
                            if($numbrr <=2)
                            {
                                $inserta_Data= array(
                                    'user_id'=>"LWI".mt_rand(100000,999999),
                                    'sponserd_id'=>$this->input->post('sponsed_id'),
                                    'email'=>$this->input->post('email'),
                                    'mobile'=>$this->input->post('mobile'),
                                    'fullname'=>$this->input->post('fullname'),
                                    'password'=>$this->input->post('password'),
                                'register_date'=>$cuurntdatee,
                                    //'txn_password'=>$this->input->post('txn_password')
                                    
                                );
                                if($inserta_Data)
                                    {

                                    $this->db->insert('reg_table',$inserta_Data);

                                    $last_id=$this->db->insert_id();

                                    return array('last_id'=> $last_id,'msg'=>'1');

                                    }
                                    else{

                                        return  array('last_id'=>'0','msg'=>'0');                    
                                    }
                                }
                            else{

                                $query = $this->db->get('reg_table');
                                $allvalue=$query->result_array();
                                foreach($allvalue as $checkvalue)
                                    {
                                        $chkk= $checkvalue['user_id'];
                                        $countuser=having_three($chkk);
                                        if($countuser <=2)
                                        {
                                        
                                            $insertDataw= array(
                                                'user_id'=>"LWI".mt_rand(100000,999999),
                                                'sponserd_id'=>$chkk,
                                                'email'=>$this->input->post('email'),
                                                'mobile'=>$this->input->post('mobile'),
                                                'fullname'=>$this->input->post('fullname'),
                                                'password'=>$this->input->post('password'),
                                                'register_date'=>$cuurntdatee
                                                //'txn_password'=>$this->input->post('txn_password')
                                        
                                            );
                                            if($insertDataw)
                                    {

                                    $this->db->insert('reg_table',$insertDataw);

                                    $last_id=$this->db->insert_id();

                                    return array('last_id'=> $last_id,'msg'=>'1');

                                    }
                                    else{

                                        return  array('last_id'=>'0','msg'=>'0');                    
                                    }
                                            break;

                                        }
                                        else{

                                        }
                                    }

                            }

    } 
        function isLogin($user_id,$pass)
            {
                $query=$this->db->where(['user_id'=>$user_id, 'password'=>$pass]);
                $query = $this->db->get('reg_table');

                //echo $this->db->last_query();
//exit();
                //return $query->result_array();sssss
            return $query->row()->id;
            }
       public  function isAdminLogin($adm_Id,$pass)
       {
       
        $query=$this->db->where(['admin_name'=>$adm_Id, 'password'=>$pass]);
        $query = $this->db->get('ax_tbl_admin_log');
            return $query->row()->adminid;
       }
        public function gettopUp()
            {
                $query=$this->db->get('ax_tbl_topup');
                return $query->result_array(); 

            }
        public function createRoi($insertRoi)
        {
            if($insertRoi)
         {
             $this->db->insert('ax_tbl_wallet',$insertRoi);
             $last_id=$this->db->insert_id();
             return array('last_id'=> $last_id,'msg'=>'1');
             
         }else{
             return array('last_id'=>0,'msg'=>'0');
         }
        }
       
        public function getsigle_levelval($top_id)
        {               
                $this->db->distinct(); // Add DISTINCT to the query
                $this->db->select('top_id, level_id'); // Specify the columns which have commo value 
                $this->db->from('ax_tbl_level_income'); // Specify the table
                $query = $this->db->order_by('id', 'DESC');
                $this->db->where('top_id', $top_id); // Add any conditions if needed

                $query = $this->db->get(); // Execute the query

                $result = $query->result_array();
                return $result;
        }
        public function creat_level_icome($per_day_isert)
        {
            if($per_day_isert)
            {

            $this->db->insert('ax_tbl_level_income',$per_day_isert);

            $last_id=$this->db->insert_id();

            return array('last_id'=> $last_id,'msg'=>'1');

            }
        else{

            return array('last_id'=>0,'msg'=>'0');
            }
        }
        public function insert_income_wallet($level_income_insert_mwallete)
        {
            if($level_income_insert_mwallete)
            {
                $this->db->insert('ax_tbl_wallet',$level_income_insert_mwallete);

                $last_id=$this->db->insert_id();
    
                return array('last_id'=> $last_id,'msg'=>'1');
            }
            else{
                return array('last_id'=>0,'msg'=>'0');

            }
        } 
        
    /*    
    public function count_diffrent_level()
    {
       
        $this->db->distinct();     
        $this->db->select('sponserd_id');       
        $this->db->from('reg_table');
        $this->db->where('sponserd_id !=', "0");
        $query = $this->db->get(); // Execute the query

                $result = $query->result_array();
                return $result;
        //$havingLevel = $CI->db->count_all_results();
        //return $havingLevel;    
    // $query=$CI->db->get();      
        //return  $query->row(); 
    }
      */     
}