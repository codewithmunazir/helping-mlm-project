<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Sign-Up </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <!-- <meta name="author" content="Techzaa" /> -->
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
     <!-- App favicon -->
     <link rel="shortcut icon" href="<?php echo base_url();?>User_assets/assets/images/favicon.ico">

     <!-- Vendor css (Require in all Page) -->
     <link href="<?php echo base_url();?>User_assets/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="<?php echo base_url();?>User_assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="<?php echo base_url();?>User_assets/assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="<?php echo base_url();?>User_assets/assets/js/config.js"></script>
</head>

<body class="h-100" >
     <div class="d-flex flex-column h-100 p-3">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100">
                    <div class="col-xxl-7">
                         <div class="row justify-content-center h-100">
                              <div class="col-lg-6 py-lg-5">
                                   <div class="d-flex flex-column h-100 justify-content-center">
                                        <div class="auth-logo mb-4">
                                             <a href="index.html" class="logo-dark">
                                                  <img src="<?php echo base_url();?>User_assets/assets/images/dark_logo.png"  alt="logo dark">
                                             </a>

                                             <a href="index.html" class="logo-light">
                                                  <!-- <img src="assets/images/logo-light.png" height="24" alt="logo light"> -->
                                                  <img src="<?php echo base_url();?>User_assets/assets/images/dark_logo.png"  alt="logo dark">
                                             </a>
                                        </div>

                                        <h2 class="fw-bold fs-24">Sign Up</h2>

                                        <p class="text-muted mt-1 mb-4">New to our platform? Sign up now! It only takes a minute</p>
                                        <?php if($msg=$this->session->flashdata('error')) {
                                $msg_class=$this->session->flashdata('msg_class');?>
                              <div class="input-group mb-3 alert <?php echo $msg_class;?>">
                                   <?= $msg; ?>
                              </div>
                            <?php } if($smsg=$this->session->flashdata('msg_success')) {
                              $smsg_class=$this->session->flashdata('msg_class');?>
                              <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                                   <?= $smsg; ?>
                              </div>
                          <?php } ?>
                                        <div>
                                             <form  class="authentication-form" action="<?php echo base_url();?>signup/fresh" method="POST">
                                             <div class="text-center"> <span class=" <?php echo $msclass;?>"><b><?php echo $name;?></b><span></div>
                        
                      
                        <div  id="chng_pop_p">
                                             <div class="form-group mb-3">
                                                  <label for="sponsed_id">Sponser_id
                                        <span id="alertmsg"></span>   </label>
                                                  <input  type="text"  placeholder="sponsed id" name="sponsed_id" class="form-control" value="<?php echo $refral;?>" id="sponsed_id" onchange="return getsponserdId();" >
                                        <?php echo form_error('sponsed_id'); ?>
                                        <div class="mb-2 mt-2" <?php echo $chkk;?>>
                                             <!-- <div class="form-check custom-checkbox mb-3 check-xs">
                                             <input type="checkbox" class="form-check-input" style="border-color:green;" id="customCheckBox6">
                                             <label class="form-check-label" for="customCheckBox6"><b>Without Referral</b> </label>
                                             </div> -->
                                                            
                                        </div> 
                                                  </div>
                                             </div>
                                             <div class="form-group mb-3">
                                             <label class="form-label" for="last-name">Fullname</label>
                                                  <?php echo form_input(['type'=>'text','id'=>'last-name', 'class'=>'form-control', 'name'=>'fullname','placeholder'=>'Enter your fullname', 'value'=>set_value('fullname')]);?>
                                        
                                        <?php echo form_error('fullname'); ?>
                                                  <!-- <input type="text" name="last_name" id="last_name" value="" placeholder="ex: Kay"> -->
                                             </div>

                                             <div class="form-group mb-3">
                                             <label class="form-label" for="email">Email</label>
                                                  <?php echo form_input(['type'=>'email','id'=>'email','class'=>'form-control', 'name'=>'email','placeholder'=>'Enter your email', 'value'=>set_value('email')]);?>
                                        
                                        <?php echo form_error('email'); ?>
                                                  
                                             </div>
                                             <div class="form-group mb-3">
                                             <label class="form-label" for="mobile">Mobile</label>
                                                  <?php echo form_input(['type'=>'text','id'=>'mobile','class'=>'form-control', 'name'=>'mobile','placeholder'=>'Enter your mobile', 'value'=>set_value('mobile')]);?>
                                        
                                        <?php echo form_error('mobile'); ?>
                                                  
                                             </div>
                                             <div class="form-group mb-3">
                                                                 <label class="form-label" for="password">Password</label>     
                                                                 <div class="input-group">
                                                                 <?php echo form_input(['type'=>'password','id'=>'password','class'=>'form-control', 'name'=>'password','placeholder'=>'Enter password', 'value'=>set_value('password')]);?>
                                                                 <span class="input-group-text" onclick="togglePassword('password', this)"  style="cursor: pointer;">
                                                                      <i class="bi bi-eye"></i>
                                                                 </span>
                                                                 
                                                            </div>
                                        <?php echo form_error('password'); ?>

                                             </div>
                                                  <div class="form-group mb-3">
                                                  <label class="form-label" for="account-cpass">Transaction Password</label>
                                                       <div class="input-group">
                                                                      <?php echo form_input(['type'=>'password','id'=>'account-cpass','class'=>'form-control', 'name'=>'txn_password','placeholder'=>'Enter tnx password', 'value'=>set_value('txn_password')]);?>
                                                                      <span class="input-group-text" onclick="togglePassword('account-cpass', this)"  style="cursor: pointer;">
                                                                           <i class="bi bi-eye"></i>
                                                                      </span>
                                                            </div>              
                                                            <?php echo form_error('txn_password'); ?>
                                                  </div>
                                                  <div class="form-group mb-3">
                                                  <label class="form-label" for="Position">Position</label>
                                                            <?php echo form_error('position'); ?>  
                                                       <select name="position" required class="form-control" id="Position">
                                                            <option value="left">Left</option>
                                                            <option value="right">Right</option>
                                                       </select>
                                                  </div>
                                                  <div class="mb-3">
                                                       <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                            <label class="form-check-label" for="checkbox-signin">I accept Terms and Condition</label>
                                                       </div>
                                                  </div>

                                                  <div class="mb-1 text-center d-grid">
                                                       <input type="submit" class="btn btn-soft-primary" value="Sign Up">
                                                  </div>
                                             </form>


                                             <!-- <p class="mt-3 fw-semibold no-span">OR sign with</p>

                                             <div class="d-grid gap-2">
                                                  <a href="javascript:void(0);" class="btn btn-soft-dark"><i class="bx bxl-google fs-20 me-1"></i> Sign Up with Google</a>
                                                  <a href="javascript:void(0);" class="btn btn-soft-primary"><i class="bx bxl-facebook fs-20 me-1"></i> Sign Up with Facebook</a>
                                             </div> -->
                                        </div>

                                        <p class="mt-auto text-danger text-center">I already have an account  <a href="<?php echo base_url();?>signin" class="text-dark fw-bold ms-1">Sign In</a></p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-xxl-5 d-none d-xxl-flex">
                         <div class="card h-100 mb-0 overflow-hidden">
                              <div class="d-flex flex-column h-100">
                                   <img src="<?php echo base_url();?>User_assets/assets/images/small/img-10.jpg" alt="" class="w-100 h-100">
                              </div>
                         </div> <!-- end card -->
                    </div>
               </div>
          </div>
     </div>

    <!-- Vendor Javascript (Require in all Page) -->
     <script src="<?php echo base_url();?>User_assets/base_urll.js"></script>
    <script src="<?php echo base_url();?>User_assets/assets/js/vendor.js"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="<?php echo base_url();?>User_assets/assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>

</html>
<script type="text/javascript">
   function togglePassword(passwordFieldId, eyeIcon) {
    const passwordField = document.getElementById(passwordFieldId);
    const icon = eyeIcon.querySelector('i');

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}

</script>
<script>
        // Get the checkbox element
        var checkbox = document.getElementById('customCheckBox6');

        // Add an event listener for when the checkbox is changed
        checkbox.addEventListener('change', function() {
            // Check if the checkbox is checked
            if (this.checked) {
                // Show an alert if checked
               // alert('Checkbox is checked!');
                var vl_u="User";
               $("#sponsed_id").val(vl_u);
               $('#chng_pop_p').hide();
            }
        });
    </script>

      <script>
function getsponserdId()
{
  
 
var us_val = $('#sponsed_id').val();
$.ajax({
                url: ubase_Url+'Home/getspornserd',
                data: {id: us_val},
                cache: false,
                dataType: 'html',
                type: "POST",
                success: function(data)
                {
                    //alert(data);
          if(data==0)
        {
            $("#alertmsg").html('<span class="text-danger">User ID Not Available</span>');
            $("#sponsed_id").val('');
            
    

        }
        if(data != 0)
        {
            $("#alertmsg").html('<span class="text-success">'+data+'</span>');
          
          $("#sponsed_id").val(us_val);
         
          
        }
        
        
     },
      error: function (jqXHR, textStatus, errorThrown)
      {
      alert('ajaxError get data from ajax');
      }

      });

    }

    </script>