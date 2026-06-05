<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
	  parent::__construct();
	
		$this->load->library('form_validation');
	 $this->load->model('Home_model');
	  $this->load->helper('commonn_helper');
	  $this->load->library('email');
	  date_default_timezone_set('Asia/Kolkata');
	}
	public function listtttt()
	{
		 $data['records'] = $this->Home_model->get_multiple_rows_with_same_credit();
    
    // Load the view and pass the data
    $this->load->view('nonworking_view', $data);
	}
	 public function delete_duplicates() {
        $this->Home_model->delete_duplicate_rows();
        echo "Duplicate rows have been deleted.";
    }
	public function get_user_single()
    {
       $wallets = $this->Home_model->get_wallet_data();

        // Start the table HTML
        $table_html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Wallet Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Register User ID</th>
                    <th>Wallet Date</th>
                </tr>
            </thead>
            <tbody>';

        // Check if there are any results
        if(!empty($wallets)) {
            foreach ($wallets as $wallet) {
                // Add a row for each wallet entry
                $table_html .= '<tr>
                                <td>' . $wallet->id . '</td>
                                <td>' . $wallet->registeruser_id . '</td>
                                <td>' . $wallet->wdate . '</td>
                               </tr>';
            }
        } else {
            // If no data, display a message
            $table_html .= '<tr><td colspan="3" class="text-center">No Data Available</td></tr>';
        }

        // Close the table and HTML tags
        $table_html .= '</tbody>
                        </table>
                    </div>
                </body>
            </html>';

        // Output the table HTML to the browser
        echo $table_html;
    }
        
	public function index()
	{
		$data['title']="home";
		$this->load->view('home/home', $data);
	}
	public function about_us()
	{
		$data['title']="about-us";
		$this->load->view('home/about', $data);
	}
	public function causes()
	{
		$data['title']="causes";
		$this->load->view('home/couses', $data);
	}

	public function faq_s()
	{
		$data['title']="FAQ`S";
		$this->load->view('home/faq', $data);
	}
	public function contact_us()
	{
		$data = array();
		$data['form_sumit']="";
		$data['title']="contact-us";
		if($_POST)
		{
			//echo "post";
			$data['form_sumit']="Query send successfully !";
			$this->load->view('home/conatact', $data);
		}
		else{
			$this->load->view('home/conatact', $data);
		}
	}
	public function sign_in()
	{
		$data=array();
		$data['title']="sign_in || Binary ";
		if($_POST)
		{
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('user_id', 'User Id', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run())
         {
            $user_id=$this->input->post('user_id');
            $pass=$this->input->post('password');
        	$login_id=$this->Home_model->isLogin($user_id,$pass);
			//print_r($login_id);
      	  		if($login_id) 
		        {		
		       //  		$userdetails=getUserDetailsById($login_id);
			//	$is_activeUser=$userdetails->isactive;
			//		$is_validv=$userdetails->isvalid;
		        	$is_activeUser=1;
					$is_validv=1;
					if($is_activeUser==1 && $is_validv==1)
					{
					
		         	 $this->session->set_userdata('id',$login_id);
		           	return redirect('dashboard');
		          	}
		          	else{
		          		$this->session->set_flashdata('msg','Your Id is block / unverified');
					$this->session->set_flashdata('msg_class','text-danger');  
					return redirect('signin');
		          	}
		     	}
		     	else{
					$this->session->set_flashdata('msg','User Id password not valid');
					$this->session->set_flashdata('msg_class','text-danger');  
					return redirect('signin');
				}
          
		}else{
		$this->load->view('users/login', $data);
		}
	}
	else{
		$this->load->view('users/login', $data);}
}

	
	public function sign_up($row)
	{
		$data= array();
		$data['title']="sign_up ";
		if($row==="fresh")
		{
			$refrral="";
			$name="";
			$msgclass="";
			$chk="";
		}
		else{
				$refrral=$row;
				$refrrall=$row;
				$dteailsUser=$this->Home_model->valid_sponserd($refrral);
				//$dteailsUser=getsposerd($refrral);
				if(!empty($dteailsUser))
				{
					$name=$dteailsUser->fullname;
					//$name="dumy";
					$refrral=$refrrall;
					$msgclass="text-success";
					$chk='style="display:none;"';
				}
				else{
					$name="User Not Exist";
					$refrral="";
					$msgclass="text-danger";
					$chk='style="display:none;"';
			}
		}
			$data['refral']=$refrral;
			$data['name']=$name;
			$data['msclass']=$msgclass;
			$data['chkk']=$chk;
				if($_POST)
				{
					$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
					$this->form_validation->set_rules('sponsed_id', 'sponsed Id', 'trim|required|callback_check_valid_sponserd');
					$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[reg_table.email]');
				//	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
					$this->form_validation->set_rules('fullname', 'Full', 'trim|required|is_unique[reg_table.fullname]');
					//$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
					$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[2]|max_length[20]|is_unique[reg_table.mobile]');
					$this->form_validation->set_rules('password', 'Password', 'trim|required');
					//$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]|regex_match[/^[a-zA-Z0-9@!#$%&]+$/]');
					//$this->form_validation->set_message('regex_match', 'The {field} can only contain letters, numbers, and the following special characters: @,!, #, $, %, &.');
					$this->form_validation->set_rules('txn_password', 'Transaction', 'trim|required|differs[password]');
					$this->form_validation->set_rules('country', 'country', 'required');
					if($this->form_validation->run())
					{
						
					
			$user_id_n="DPD".mt_rand(100000,999999);
			$insertDataw= array(
				'user_id'=>$user_id_n,
				'sponserd_id'=>$this->input->post('sponsed_id'),
			//	'position'=>$this->input->post('position'),
				'email'=>$this->input->post('email'),
				'mobile'=>$this->input->post('mobile'),
				'fullname'=>$this->input->post('fullname'),
				'password'=>$this->input->post('password'),
				'register_date'=>date('Y-m-d H:i:s'),
				'txn_password'=>$this->input->post('txn_password'),
				'country'=>$this->input->post('country')
			 );
			//print_r($insertDataw);
			 		$result=$this->Home_model->register_user($insertDataw);
						$result_last_id=$result['last_id'];
						if($result_last_id)
						{
							//
									$data['id']=$result_last_id;
								    $user=getUserDetailsById($result_last_id);
					    			if ($user)
					    			{
					        // start mail
																         $eemail = $user->email;
																		// 	   // Load your email configuration
																        $this->load->config('email');

																        // // Set email details
																         $to_email = $eemail;   //'devbackend333@gmail.com';  // Recipient's email address
																         $subject = 'Congratulations! Your New Account & Credentials';
																        	$message = $this->get_congratulatory_message($result_last_id);  // Your message
																        // // Set the email parameters
																         $this->email->from('support@doublepower33days.com', 'DOUBLE POWER');  // Sender's email address
																         $this->email->to($to_email);  // Recipient's email
																         $this->email->subject($subject);  // Email subject
																         $this->email->message($message);  // Email message body

																        // // Send the email
																         if ($this->email->send()) {
																            //echo 'Email sent successfully to ' . $to_email;
																             $data['mail_succ']=$to_email;
																         } else {
																        //   //  echo 'Failed to send email.';
																        //     // You can also debug the email sending error by printing the error:
																             $data['mail_err']=$this->email->print_debugger();
																         }
								        // end mail 
								      //  echo "regiter successfully";
									$this->load->view('users/notification',$data);
									}
									else{
										echo "Register user detilsa mismatch";
									}
							//

						// $laast_id=$result['last_id'];
						// $data['id']=$laast_id;
						// $this->load->view('users/notification',$data); 
						
						} else {
							$this->session->set_flashdata('error','<strong> User are not register </strong>  successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
							$this->session->set_flashdata('msg_class','alert alert-danger alert-dismissible fade show'); 
							 $this->load->view('users/register',$data);
						}
					}
					else{
						$this->load->library('form_validation');
			  				
							$data['refral']=$this->input->post('sponsed_id');
							$this->load->view('users/register',$data);
					}					
				}else{
					$this->load->view('users/register',$data);
				}
		
	}
private function get_congratulatory_message($result_last_id) {
	$user=getUserDetailsById($result_last_id);
    if ($user)
    {
        $user1 = $user->user_id;
        $email = $user->email;
        $password = $user->password;
        $tx_password =$user->txn_password;
        $name = $user->fullname;
        $mobile=$user->mobile;
        $Doj=$user->register_date;
    }
        $message = "
            <html>
            <body>
                <p>Dear <b>User</b>,</p>
                <p>Congratulations! Your account has been successfully created.</p>
                <p>Below are your login credentials:</p>
                <p><strong>User ID: </strong> {$user1}</p>
                 <p><strong>User Name: </strong> {$name}</p>
                <p><strong>Password: </strong> {$password}</p>
                <p><strong>Transaction Password: </strong> {$tx_password}</p>
                 <p><strong>Mobile: </strong> {$mobile}</p>
                  <p><strong>DOJ: </strong> {$Doj}</p>
                <p>Please keep these details safe and do not share your password with anyone.</p>
                <p>If you have any questions or need assistance, feel free to contact our support team.</p>
                <p>Thank you for choosing us!</p>
                <p>Best regards,</p>
                <p>doublepower33days.com Team</p>
                <p>Email: support@doublepower33days.com</p>
            </body>
            </html>
        ";
        return $message;
    }
    public function forget_password()
	{
		$data=array();
		$data['title']=" Forget-Password ";
		if($_POST)
		{	
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	       	$this->form_validation->set_rules('sponsed_id', 'User Id', 'trim|required|callback_check_valid_userid');
	        if($this->form_validation->run())
			{
				
				$user_id=$this->input->post('sponsed_id');
				$validuser=getUserDetailsByspon_Id($user_id);
				if(!empty($validuser))
				{      
			        $p_email = $validuser->email;
			        $passwor_details=$validuser->password;
			        $tnx_pass=$validuser->txn_password;
						   // Load your email configuration
			        $this->load->config('email');

			        // Set email details
			        $to_email = $p_email;   //'devbackend333@gmail.com';  // Recipient's email address
			        $subject = 'Password Reset Request for Your Account';
			       	$message = $this->get_password_message($passwor_details, $tnx_pass);  // Your message
			        // Set the email parameters
			        $this->email->from('support@doublepower33days.com', 'DOUBLE POWER');  // Sender's email address
			        $this->email->to($to_email);  // Recipient's email
			        $this->email->subject($subject);  // Email subject
			        $this->email->message($message);  // Email message body

			        // Send the email
			        if ($this->email->send()) {?>
			        	 			<script> alert("Your password Password has been sent your email.");
        					 		window.location="https://doublepower33days.com/";
        							// location.reload();
      					 		</script>
      					 	<?php
			         		//   echo 'Email sent successfully to ' . $to_email;
			           		 //$data['mail_succ']=$to_email;
			        	} else {
			        	?>
			        	 <script> alert("Please Enter valid Details.|| mail id is not fatch right now . ");
       							window.location="https://doublepower33days.com/";
              					//location.reload();
          					</script>
			        		<?php 
			            	//echo 'Failed to send email.';
			            	// You can also debug the email sending error by printing the error:
			            	//$data['mail_err']=$this->email->print_debugger();
			        	}
					//
		
					//
				}

			}
			else{
				// valdation 
				$this->load->view('users/forgetpassword', $data);
			}

		}
		else
		{
			$this->load->view('users/forgetpassword', $data);
		}
	}
	public function pasword_details()
 	{
	
		$spoid=$this->input->post('id');
		$data=getsposerd($spoid);
		if(!empty($data)){
			echo json_encode($data);
	  		} 
	  		else{
				echo 0;		
	  		}
 	}
	//
	private function get_password_message($passwor_details, $tnx_pass)
	{


$messagess = "
    <html>
    <body>
        <p>Dear <b>User</b>,</p>
        <p>We received a request for your account's password details. Below is your old password:</p>
        <p><strong>Password: </strong> {$passwor_details}</p>
        <p><strong>Transaction Password: </strong> {$tnx_pass}</p>
        <p>If you did not request this or believe this email was sent by mistake, please contact our support team immediately.</p>
        <p>Thank you for choosing us!</p>
        <p>Best regards,</p>
        <p>https://doublepower33days.com/ Team</p>
        <p>Email: support@doublepower33days.com</p>
    </body>
    </html>
";
 return $messagess;

	}
public function get_notification($laast_id)
{
	$data['id']=$laast_id;
						$this->load->view('users/notification',$data); 
}
	// public function email_veri_fication($row)
	// {
	// 	$data=array();
	// 	$id=$row;
	// 	$data['try_again']="";
	// 	$getuserdetail=getUserDetailsById($id);
	// 	if(!empty($getuserdetail))
	// 	{
	// 		$data['id']=$row;
	// 		if($_POST)
	// 		{
	// 			$user=$getuserdetail->user_id;
	// 			$codede=$this->input->post('code_veryfication');
	// 			$get_Llast_otp=$this->Home_model->get_last_otp($user);
	// 			if(!empty($get_Llast_otp))
	// 			{
	// 				$get_otp_code=$get_Llast_otp->varification_code;
	// 				if($get_otp_code==$codede)
	// 				{
	// 						$update_isvalid= array('isvalid' =>1 );
	// 						$update_isval=$this->Home_model->update_isvalid($update_isvalid ,$id);
	// 						if($update_isval)
	// 						{

								
	// 							$this->load->view('home/Notification_page',$data); 
								
	// 						}
	// 				}
	// 				else{
	// 				$data['try_again']="Invalid code ! try again";
	// 				$this->load->view('home/email_verify.php', $data);
	// 				}

	// 			}else{
	// 				redirect('home');
	// 			}
				
	// 		}else{
	// 			$this->load->view('home/email_verify.php', $data);
	// 		}
			
	// 	}
	// 	else{
	// 		redirect('home');
	// 	}
		
		
	// }
	
	public function user_logout()
	{  
	$this->session->unset_userdata('id');
	return redirect('signin');
	}
	public function directLogin($param1, $param2)
    {
	    $decoded_string = urldecode($param2);
         $login_id=$this->Home_model->isLogin($param1,$decoded_string);
         if($login_id) 
         {
             $this->session->set_userdata('id',$login_id);
             return redirect('dashboard');

          }
	}
	public function check_valid_sponserd($sid)
{
	
	$is_avialabel=$this->Home_model->valid_sponserd($sid);
	if(!empty($is_avialabel))
	{
		return TRUE;
	}
 else
    {
       $this->form_validation->set_message('check_valid_sponserd', 'Invalid Refferral Id');
            return FALSE;
    }
}
public function getspornserd()
	{
		$spoid=$this->input->post('id');
		$data=$this->Home_model->valid_sponserd($spoid);
		if(!empty($data)){
			$sponserdname=$data->fullname;
			echo $sponserdname;
		  }
		  
		  else{
			echo 0;
		  }
		
	}
	public function mytable()
	{
		$data=array();
			$data['tag']="table";
		
		$data['title']="table";
		$this->load->view('users/table', $data);
	}
	public function myform()
	{
		$data=array();
		$data['tag']="table";
		$data['title']="form";
		$this->load->view('users/form', $data);
	}
	 	public function roi_generate_staic()
{
    if ($_POST) {
        $node = $this->input->post('user_id');
        $time_no = $this->input->post('no_time');  // This is the number of times to loop and insert ROI
        
        // Get the return value from the model
        $reutrnval = $this->Home_model->get_genra_dumyroi_secty($node);
        
        if (!empty($reutrnval)) {
            // Loop through each return value
            foreach ($reutrnval as $getval) {
                $user_id = $getval['registeruser_id'];
                $to_up_idd = $getval['top_id'];
                $roiamount = $getval['debit'];
                $commit_id = $getval['comiit_id'];
                $wwdate= $getval['wdate'];
                if($wwdate=='2025-03-26 23:42:11')
                {
                // Fetch the daily growth for the user and their top-up ID
                $get_roi_topoip = $this->Home_model->fetch_row_get_daily_growth($user_id, $to_up_idd);

                // Get user details
                $userdetails = getUserDetailsByspon_Id($user_id);
                $is_activeUser = $userdetails->isactive;

                // Get growth id by commit ID
                $growth_id = get_growth_id_by_commit($commit_id);
                $Growth_val = $growth_id !== null ? $growth_id : 0;

                // Loop to insert the ROI $time_no times
                for ($i = 0; $i < $time_no; $i++) {
                    // Check if the conditions are met for ROI insertion
                    if ($get_roi_topoip < 33 && $Growth_val == 1 && $is_activeUser == 1) {
                        // Prepare the data to insert ROI
                        $insertRoi = array(
                            'registeruser_id' => $user_id,
                            'credit' => $roiamount,
                            'wdate' => date('Y-m-d H:i:s'),
                            'wstatus' => "Daily Growth",
                            'remark' => "Self",
                            'type_income' => "top-up",
                            't_id' => $to_up_idd
                        );
                        
                        // Insert the ROI into the database
                        $this->Home_model->createRoi($insertRoi);
                    } else {
                        continue;
                    }
                }
            }
            }
            
            // After inserting, set a flash success message
            $this->session->set_flashdata('success', 'ROI data has been successfully posted!');
            
            // Redirect to a success page or back to the ROI form
            redirect('home/roi_generate_staic');  // Replace 'your_redirect_url_here' with the actual URL for redirection
            
        } else {
            // Handle case where no return value is found
           $this->session->set_flashdata('success', 'ROI no data found posted!');
            
            // Redirect to a success page or back to the ROI form
            redirect('home/roi_generate_staic');  
        }
    } else {
        // Load the ROI form if it's a GET request
        $this->load->view('roi_form');
    }
}


	//
	public function roi_generate()
{
    $status_roi = $this->Home_model->check_Roi_stop();
    if ($status_roi->status == 1) {
        $returnVal = $this->Home_model->get_genra_dumyroi();
        if (empty($returnVal)) return; // Exit early if no data

        // Fetch all user IDs and top-up IDs in one go
        $user_ids = array_column($returnVal, 'registeruser_id');
        $to_up_ids = array_column($returnVal, 'top_id');

        // Get daily growth counts in a single query
        $daily_growth_counts = $this->Home_model->fetch_daily_growth_counts($user_ids, $to_up_ids);

        $roi_data = []; // Store batch data for bulk insert

        foreach ($returnVal as $getval) {
            $user_id = $getval['registeruser_id'];
            $to_up_idd = $getval['top_id'];
            $roiamount = $getval['debit'];
            $commit_id = $getval['comiit_id'];

            // Get cached growth count
            $get_roi_topoip = $daily_growth_counts["$user_id-$to_up_idd"] ?? 0;

            // Fetch user details once
            $userdetails = getUserDetailsByspon_Id($user_id);
            $is_activeUser = $userdetails->isactive;

            // Get growth ID efficiently
            $growth_id = get_growth_id_by_commit($commit_id) ?? 0;

            // Business logic check
            if ($get_roi_topoip < 33 && $growth_id == 1 && $is_activeUser == 1) {
                $roi_data[] = [
                    'registeruser_id' => $user_id,
                    'credit' => $roiamount,
                    'wdate' => date('Y-m-d H:i:s'),
                    'wstatus' => "Daily Growth",
                    'remark' => "Self",
                    'type_income' => "top-up",
                    't_id' => $to_up_idd
                ];
            }
        }

        // Bulk insert ROI data
        if (!empty($roi_data)) {
            $this->Home_model->bulkInsertRoi($roi_data);
        }
    }
}
	//////
	
	//
// 	public function roi_generate_one()
// 	{
// 		$stauus_roi=$this->Home_model->check_Roi_stop();
// 		if($stauus_roi->status==1)	
// 		 {
			
// 			// 	$liveedate=date('Y-m-d H:i:s');
// 			// 	$day_name = date('l', strtotime($liveedate));
// 			// if($day_name=="Saturday" ||  $day_name=="Sunday")
// 			// {
// 			// }
// 			// else{
// 					$reutrnval=$this->Home_model->get_genra_dumyroi();
// 					//	print_r($reutrnval);
// 				  	foreach($reutrnval as $getval)
//               	{		
//                       $user_id=$getval['registeruser_id'];
//                       $to_up_idd=$getval['top_id'];
//                       $roiamount=$getval['debit'];
//                       $commit_id =$getval['comiit_id'];
//                 	 	$get_roi_topoip=$this->Home_model->fetch_row_get_daily_growth($user_id, $to_up_idd);
//                 	 	$userdetails=getUserDetailsByspon_Id($user_id);
// 				 		 	$is_activeUser=$userdetails->isactive;
// 	                	$growth_id = get_growth_id_by_commit($commit_id);
// 					        if ($growth_id !== null) {
// 					            $Growth_val=$growth_id;
// 					        } else {
// 					             $Growth_val=0;
// 					        }
//                 	 		if($get_roi_topoip<33 && $Growth_val==1 &&  $is_activeUser==1)
//                 	 		{
// 									$insertRoi = array(
// 		                     'registeruser_id'=>$user_id, 
// 		                     'credit'=>$roiamount,
// 		                     'wdate'=>date('Y-m-d H:i:s'),
// 		                     'wstatus'=>"Daily Growth", 
// 		                     'remark'=>"Self",
// 		                     'type_income'=>"top-up",
// 		                     't_id'=>$to_up_idd
// 		                  	 );
// 								//	print_r($insertRoi);
//   	                	 $this->Home_model->createRoi($insertRoi);
//                 	 		}else{
//                 	 			continue;
//                 	 		}                	 				
// 					}
// 				//}	  	
// 		}
// 	}
// 	//
// 	public function roi_generate_two()
// 	{
// 		$stauus_roi=$this->Home_model->check_Roi_stop();
// 		if($stauus_roi->status==1)	
// 		 {
			
// 			// 	$liveedate=date('Y-m-d H:i:s');
// 			// 	$day_name = date('l', strtotime($liveedate));
// 			// if($day_name=="Saturday" ||  $day_name=="Sunday")
// 			// {
// 			// }
// 			// else{
// 					$reutrnval=$this->Home_model->get_genra_dumyroi_sec();
// 					//	print_r($reutrnval);
// 				  	foreach($reutrnval as $getval)
//               	{		
//                       $user_id=$getval['registeruser_id'];
//                       $to_up_idd=$getval['top_id'];
//                       $roiamount=$getval['debit'];
//                       $commit_id =$getval['comiit_id'];
//                 	 	$get_roi_topoip=$this->Home_model->fetch_row_get_daily_growth($user_id, $to_up_idd);
//                 	 	$userdetails=getUserDetailsByspon_Id($user_id);
// 				 		 	$is_activeUser=$userdetails->isactive;
// 	                	$growth_id = get_growth_id_by_commit($commit_id);
// 					        if ($growth_id !== null) {
// 					            $Growth_val=$growth_id;
// 					        } else {
// 					             $Growth_val=0;
// 					        }
//                 	 		if($get_roi_topoip<33 && $Growth_val==1 &&  $is_activeUser==1)
//                 	 		{
// 									$insertRoi = array(
// 		                     'registeruser_id'=>$user_id, 
// 		                     'credit'=>$roiamount,
// 		                     'wdate'=>date('Y-m-d H:i:s'),
// 		                     'wstatus'=>"Daily Growth", 
// 		                     'remark'=>"Self",
// 		                     'type_income'=>"top-up",
// 		                     't_id'=>$to_up_idd
// 		                  	 );
// 								//	print_r($insertRoi);
//   	                	 $this->Home_model->createRoi($insertRoi);
//                 	 		}else{
//                 	 			continue;
//                 	 		}                	 				
// 					}
// 				//}	  	
// 		}
// 	}
// 	//
// 	public function roi_generate_three()
// 	{
// 		$stauus_roi=$this->Home_model->check_Roi_stop();
// 		if($stauus_roi->status==1)	
// 		 {
			
// 			// 	$liveedate=date('Y-m-d H:i:s');
// 			// 	$day_name = date('l', strtotime($liveedate));
// 			// if($day_name=="Saturday" ||  $day_name=="Sunday")
// 			// {
// 			// }
// 			// else{
// 					$reutrnval=$this->Home_model->get_genra_dumyroi_third();
// 					//	print_r($reutrnval);
// 				  	foreach($reutrnval as $getval)
//               	{		
//                       $user_id=$getval['registeruser_id'];
//                       $to_up_idd=$getval['top_id'];
//                       $roiamount=$getval['debit'];
//                       $commit_id =$getval['comiit_id'];
//                 	 	$get_roi_topoip=$this->Home_model->fetch_row_get_daily_growth($user_id, $to_up_idd);
//                 	 	$userdetails=getUserDetailsByspon_Id($user_id);
// 				 		 	$is_activeUser=$userdetails->isactive;
// 	                	$growth_id = get_growth_id_by_commit($commit_id);
// 					        if ($growth_id !== null) {
// 					            $Growth_val=$growth_id;
// 					        } else {
// 					             $Growth_val=0;
// 					        }
//                 	 		if($get_roi_topoip<33 && $Growth_val==1 &&  $is_activeUser==1)
//                 	 		{
// 									$insertRoi = array(
// 		                     'registeruser_id'=>$user_id, 
// 		                     'credit'=>$roiamount,
// 		                     'wdate'=>date('Y-m-d H:i:s'),
// 		                     'wstatus'=>"Daily Growth", 
// 		                     'remark'=>"Self",
// 		                     'type_income'=>"top-up",
// 		                     't_id'=>$to_up_idd
// 		                  	 );
// 								//	print_r($insertRoi);
//   	                	 $this->Home_model->createRoi($insertRoi);
//                 	 		}else{
//                 	 			continue;
//                 	 		}                	 				
// 					}
// 				//}	  	
// 		}
// 	}
	public function yudirect_user($user_id)
	{
			$get_count_reward=$this->Home_model->count_get_income_reward($user_id);
					$direct_user=$this->Home_model->count_get_direct($user_id);
					echo $direct_user;
					echo "<br>";
					echo $get_count_reward;
	}
	//first
		public function rewaerd_create_one()
	{
		
				$result_sr=$this->Home_model->get_all_Direct_user_first();
				foreach($result_sr as $user_val)
				{
					$user_id=$user_val['user_id'];
					$get_count_reward=$this->Home_model->count_get_income_reward($user_id);
					$direct_user=$this->Home_model->count_get_direct($user_id);
					//$main_direct = array(10, 25, 50, 100);
					$direct_u = array(10, 35, 85, 185);
    				$reward_amt = array(100, 250, 600, 1500);
    				$req_user_direct=$direct_u[$get_count_reward];
    				$amt=$reward_amt[$get_count_reward];
    				if($direct_user>=$req_user_direct && $get_count_reward<4 )
    				{
    					$insert_reward = array(
		                     'registeruser_id'=>$user_id, 
		                     'credit'=>$amt,
		                     'wdate'=>date('Y-m-d H:i:s'),
		                     'wstatus'=>"Reward Income", 
		                     'remark'=>"Reward Income"
		                  	 );
								print_r($insert_reward);
								echo "<br";
   	                	 	//$this->Home_model->createRoi($insert_reward);
    					//print_r($insert_reward);
    				}else{
    					continue;
    				}
				}

	}
	//
	public function rewaerd_create()
	{
		
				$result_sr=$this->Home_model->get_all_Direct_user();
				foreach($result_sr as $user_val)
				{
					$user_id=$user_val['user_id'];
					$get_count_reward=$this->Home_model->count_get_income_reward($user_id);
					$direct_user=$this->Home_model->count_get_direct($user_id);
					//$main_direct = array(10, 25, 50, 100);
					$direct_u = array(10, 35, 85, 185);
    				$reward_amt = array(100, 250, 600, 1500);
    				$req_user_direct=$direct_u[$get_count_reward];
    				$amt=$reward_amt[$get_count_reward];
    				if($direct_user>=$req_user_direct && $get_count_reward<4 )
    				{
    					$insert_reward = array(
		                     'registeruser_id'=>$user_id, 
		                     'credit'=>$amt,
		                     'wdate'=>date('Y-m-d H:i:s'),
		                     'wstatus'=>"Reward Income", 
		                     'remark'=>"Reward Income"
		                  	 );
								print_r($insertRoi);
								echo "<br";
   	                	 	//$this->Home_model->createRoi($insert_reward);
    					//print_r($insert_reward);
    				}else{
    					continue;
    				}
				}

	}
	public function link_expire_return_amt()
	{
		$result=$this->Home_model->get_expire_links();
		foreach($result as $comi_linkss)
		{
		$id=$comi_linkss['id'];
		// echo $id;
		// echo "<br>";  
		// $this->db->where('request_status', $pending);
        //         $this->db->where('status', $pending);
        //          $this->db->where('update_slip', $not_expire);
        //         $this->db->where('is_expire', $not_expire);
		$update_expire_link=array(
		'request_status'=>0,  
		'status'=>0, 
		'is_expire'=>1);
		$this->Home_model->update_link_commite($update_expire_link, $id);
		}
		//print_r($result);
	}
	public function check_valid_userid($id)
{
	$is_validuser=getUserDetailsByspon_Id($id);
	if(!empty($is_validuser))
	{
		return TRUE;
	}
 else
    {
       $this->form_validation->set_message('check_valid_userid', 'Invalid User Id');
            return FALSE;
    }
}

}
//

    
