    <!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" class="h-100"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url();?>User_assest/public/favicon.png">
    <!--plugins-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="<?php echo base_url();?>User_assest/public/frontnew/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"><link href="<?php echo base_url();?>User_assest/public/frontnew/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"><link href="<?php echo base_url();?>User_assest/public/frontnew/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <!-- loader-->
    <link href="<?php echo base_url();?>User_assest/public/frontnew/assets/css/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>User_assest/public/frontnew/assets/js/pace.min.js"></script>
    
    <!--plugin-->
    <link rel="stylesheet" href="<?php echo base_url();?>User_assest/public/panel/assets/plugins/toastr/toastr.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url();?>User_assest/public/frontnew/assets/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>User_assest/public/frontnew/assets/css/bootstrap-extended.css" rel="stylesheet"><link href="<?php echo base_url();?>User_assest/css2-1?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet"><link href="<?php echo base_url();?>User_assest/public/frontnew/assets/css/app.css" rel="stylesheet"><link href="<?php echo base_url();?>User_assest/public/frontnew/assets/css/icons.css" rel="stylesheet">
    <!-- Website Title -->
    <title>Login</title>
    <script src="<?php echo base_url();?>User_assest/public/frontnew/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>User_assest/public/frontnew/js/customJS.js"></script>
    <script type="text/javascript">
        function ValidateCheckBox(sender, args) {

            if ($('#flexSwitchCheckChecked').is(':checked')) {
                args.IsValid = true;
            } else {
                args.IsValid = false;
            }

        }
    </script>

    
    <style>
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-weight: 400;
            font-family: Poppins;
            overflow-x: hidden;
        }

        * {
            box-sizing: border-box;
        }
        .toast {
            width: 350px;
            max-width: 100%;
            font-size: .875rem;
            pointer-events: auto;
            background-color: rgb(32 32 32 / 85%);
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .1);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
            border-radius: .25rem;
        }
        img {
            max-width: 100%
        }

        .logo {
            text-align: center;
            max-width: 300px;
            margin: auto;
        }

        .dflex {
            display: flex;
            height: 100vh;
            align-items: center;
            flex-direction: row;
            justify-content: space-between;
        }

        .dLeft {
            padding: 2rem;
            background: #fff;
            width: 50%;
            margin: auto;
        }

        .dRight {
            background-image: url(<?php echo base_url();?>User_assest/public/banner-bg.webp);
            height: 100vh;
            background-size: cover;
            width: 50%;
            float: right;
            display: flex;
            align-items: center;
            padding: 40px;
        }

        .loginForm {
            padding: 20px 0;
        }

        .loginForm .loginTitle {
            text-align: center;
            font-size: 15px;
            color: #000;
            font-weight: 500;
            margin-bottom: 50px;
        }

        .loginForm .field-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"] {
            height: 46px;
            border-radius: 0;
            border: 0;
            border-bottom: 1px solid rgba(235, 237, 242, .8);
            padding: 1rem 0;
            color: #6c7293;
            width: 100%;
            margin-bottom: 5px;
            font-family: 'Poppins', sans-serif;
        }

        input:focus {
            outline: none;
        }

        .error {
            color: #F00;
            font-size: 12px;
        }

        .loginExtra {
            margin-top: 26px;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            font-size: 14px;
            font-weight: 500
        }

        a {
            color: #6c7293;
            text-decoration: none;
            transition: all ease-in-out 0.5s;
        }

        a:hover {
            color: #000;
        }

        .loginAction {
            margin-top: 35px;
            text-align: center;
        }

        .btn-default {
            width: 100%;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(92.36deg,#BCFF04 -9.78%,#66D6AD 47.15%,#03EEE3 105.24%);
            border: none;
            color: #000;
            height: 46px;
            padding-left: 25px;
            padding-right: 25px;
            font-weight: 500;
            border-radius: 30px;
            cursor: pointer;
            transition: all ease-in-out 0.5s;
        }
.form-control {
    display: block;
    border-color: #625e5e !important;
    font-size: 1rem;
    color: white !important;
    font-weight: 400;
    line-height: 1.5;
    background-color: #272b31;
    background-clip: padding-box;
    appearance: none;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.form-control:focus{
    
            background-color: #272b31;
}
/* For modern browsers */
input::placeholder {
    color: #fff !important; /* Change to your desired color */
    opacity: 1; /* Ensures the color is fully visible */
}

/* For older versions of Mozilla Firefox */
input:-moz-placeholder {
    color: #fff; /* Change to your desired color */
    opacity: 1;
}

/* For older versions of Internet Explorer */
input:-ms-input-placeholder {
    color: #fff; /* Change to your desired color */
}

        .btn-default:hover {
            background-color: #000;
            border-color: #000
        }

        h3 {
            color: #fff;
            font-size: 42px;
            margin: 0 0 15px;
        }

        .companyDesc {
            color: #fff;
            display: block
        }

        .wow {
            visibility: hidden;
        }
        .absolute{
            position: absolute!important;
        }
        .text-gray-700 {
            --tw-text-opacity: 1 !important;
            color: rgb(51 65 85 / var(--tw-text-opacity))!important;
        }
        .-right-16 {
            right: 0rem!important;
        }
        .-top-16 {
            top: -4rem!important;
        }
        .inset-0 {
            top: 0px!important;
            right: 0px!important;
            bottom: 0px!important;
            left: 0px!important;
        }
        
        .half-cir-img{
            width: 50%;
            margin-left: 50%;
            z-index: 1;
        }
        .form-wid{
            width: 50%;
            float: right;
        }
        
        input[type="text"], input[type="password"]{
            height: 46px;
            border-radius: 5px;
            border: 0;
            border: 1.5px solid rgb(173 178 189 / 90%);
            padding: 1rem 5px;
            color: #6c7293;
            width: 100%;
            margin-bottom: 5px;
            font-family: 'Poppins', sans-serif;
        }
        
        .inp-lab{
            float: left;
            font-size: 14px;
            padding-bottom: 3px;
            color: white;
        }
        .form-group{
            margin-bottom: 10px;
        }
        .input-group {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            width: 100%;
        }
        
        .number-ps{
            height: 45px;
            background: #272b31;
            padding: 0px 10px 0px 10px;
            color: white;
            margin-top: -9px;
            border: none;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
        }

        @media  only screen and (max-width: 800px) {
            .dflex {
                flex-direction: column;
                background: #f1f5f9;
            }

            .dRight {
                /*width: 100%;*/
                /*text-align: center*/
                display: none;
            }
            .half-cir-img{
                display: none;
            }
            .form-wid{
                width: 100%;
                float: none !important;
            }
        }

        @media  only screen and (max-width: 479px) {
            .dLeft {
                width: 100%;
                padding: 30px 15px;
            }

            h3 {
                font-size: 20px;
            }

            .dRight {
                padding: 40px 15px;
            }
        }
        
    </style>
    
</head>
<body class="bg-login">

    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <!-- <div class="my-4 text-center">
                            <a href="<?php echo base_url();?>">
                                <img src="<?php echo base_url();?>User_assest/public/logo.png" alt="" style="height: 55px;"></a>
                        </div> -->
                        <div class="mt-5">
                            <div class="card-body" style=" margin: auto; padding: 2rem; background: rgb(255 255 255 / 22%); border-radius: 16px; backdrop-filter: blur(7.4px);">
                                <div class=" p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="" style="color: white;">Sign-In</h3>
                                        <p style="color: white;">
                                            Forgot? - password <a href="#" style="color: #9edbf2">Forgot Passwod</a>
                                        </p>
                                        <p style="color: white;">
                                            New? create an account? <a href="<?php echo base_url();?>signup/fresh" style="color: #9edbf2">Sign-up in here</a>
                                        </p>
                                    </div>
                                    
                                    <div class="form-body">
                                                          <?php if($msg=$this->session->flashdata('msg')) {
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
                          <br>
                                        <form  action="<?php echo base_url();?>signin" method="POST">

                        		    	
                                        <div style="clear: both;"></div>
                                            
                                            <p id='msg' style=" margin-top: 10px; font-size: 14px; font-weight: bold; color: rgb(56, 255, 53); text-align: center;"></p>
                                            
                                            <div class="form-group col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.3s">
                                                 <label for="sponsed_id" class="inp-lab">User Id
                                                    </label>
                                                  <input  type="text"  placeholder="User id" name="user_id" class="form-control"  id="user_id"  required="reqired" value="user1">
                                                     <?php echo form_error('sponsed_id'); ?>  
                                                    
                                            
                                            
                                           
                                        	<div class="form-group col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.5s">
                                        	    <label class="inp-lab">Password</label>
                                                 <div class="input-group">
                                                      <input  type="password"  id="password" placeholder="User id" name="password" class="form-control"  id="user_id"  required="reqired" value="12345">
                                                                 <?php //echo form_input(['type'=>'password','id'=>'password','class'=>'form-control', 'name'=>'password','placeholder'=>'Enter password','readonly'=>'readonly' 'value'=>'12345']);?>
                                                                 <span class="input-group-text" onclick="togglePassword('password', this)"  style="cursor: pointer;">
                                                                      <i class="bi bi-eye"></i>
                                                                 </span>
                                                                 
                                                            </div>
                                        <?php echo form_error('password'); ?>
                                           
                                            </div>
                                            
                                        	
                                                  
                                            
                                            <div class="col-12">
                                                <div class="icheck-primary">
                                                  <input type="checkbox" id="agreeTerms" name="terms" value="agree" required="">
                                                  <label for="agreeTerms" style="
    color: white;
">
                                                   I agree to the terms & condition
                                                  </label>
                                                </div>
                                              </div>
                                            
                                          <div class="loginAction wow flipInX">
                                              <input type="submit"  value="Sign-In" id="submit" class="btn-default btn-block">
                                          </div>
                        
                                        </form>
                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <!--end wrapper-->
        <!-- Bootstrap JS -->
        <script src="<?php echo base_url();?>User_assest/public/frontnew/assets/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="<?php echo base_url();?>User_assest/public/frontnew/assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="<?php echo base_url();?>User_assest/public/frontnew/assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>User_assest/public/frontnew/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <!--Password show & hide js -->

        <!--app JS-->
        <script src="<?php echo base_url();?>User_assest/public/frontnew/assets/js/app.js"></script>
     


</div></body></html>

 <!--login Scripts-->
    <script src="<?php echo  base_url();?>User_assest/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>User_assest/ajax/libs/wow/1.1.2/wow.min.js" type="text/javascript"></script>
    <script type="text/javascript">new WOW().init();</script>
    <!--plugin-->
    <script src="<?php echo base_url();?>User_assest/public/panel/assets/plugins/toastr/toastr.min.js"></script>


<!-- Bootstrap JS + Popper.js -->
<script src="<?php echo base_url();?>User_assest/npm/bootstrap%405.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- Modal Structure -->
<!--<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-dialog-centered">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <h5 class="modal-title" id="imageModalLabel"> </h5><button type="button" class="btn-close btn btn-primary" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
        <!-- Image inside the modal -->
<!--        <img src="https://aidigitalassets.global/<?php echo base_url();?>User_assest/public/banner-reg.jpeg" alt="Full Size Image" class="img-fluid">-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->


<script>
  window.addEventListener('load', function() {
    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
    myModal.show();
  });
</script>

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
