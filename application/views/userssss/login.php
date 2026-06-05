<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Sign In </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <!-- <meta name="author" content="Techzaa" /> -->
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="<?php echo base_url();?>User_assets/assets/images/favicon.png">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
     <!-- Vendor css (Require in all Page) -->
     <link href="<?php echo base_url();?>User_assets/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="<?php echo base_url();?>User_assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="<?php echo base_url();?>User_assets/assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="<?php echo base_url();?>User_assets/assets/js/config.js"></script>
</head>

<body class="h-100">
     <div class="d-flex flex-column h-100 p-3">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100">
                    <div class="col-xxl-7">
                         <div class="row justify-content-center h-100">
                              <div class="col-lg-6 py-lg-5">
                                   <div class="d-flex flex-column h-100 justify-content-center">
                                        <div class="auth-logo mb-4">
                                             <a href="index.html" class="logo-dark">
                                                  <!-- <img src="assets/images/logo-dark.png" height="24" alt="logo dark"> -->
                                                  <img src="<?php echo base_url();?>User_assets/assets/images/dark_logo.png"  alt="logo dark">
                                             </a>

                                             <a href="index.html" class="logo-light">
                                                  <!-- <img src="assets/images/logo-light.png" height="24" alt="logo light"> -->
                                                    <img src="<?php echo base_url();?>User_assets/assets/images/dark_logo.png"  alt="logo dark">
                                             </a>
                                        </div>
                                        <?php if($msg=$this->session->flashdata('msg')) {
                $msg_class=$this->session->flashdata('msg_class');?>
                <div class="desc  m-auto mb-2 <?php echo $msg_class;?>">
                     <?= $msg; ?>
                </div>
              <?php } ?>
                                        <h2 class="fw-bold fs-24">Sign In</h2>

                                        <p class="text-muted mt-1 mb-4">Enter your email address and password to access admin panel.</p>

                                        <div class="mb-5">
                                             <form action="<?php echo base_url();?>signin" method="POST" class="authentication-form">
                                                  <div class="mb-3">
                                                       <label class="form-label" for="example-email">User Id</label>
                                                       <?php echo form_error('user_id'); ?>
                                                        <input type="text" name="user_id" id="email" id="user_id" class="form-control" placeholder="Enter user Id" value="user1">
                                                  </div>
                                                  <div class="mb-3">
                                                       <!-- <a href="auth-password.html" class="float-end text-muted text-unline-dashed ms-1">Reset password</a> -->
                                                       <label class="form-label" for="example-password">Password</label>
                                                       <?php echo form_error('password'); ?>
                                                        <div class="input-group">
                                                                    <input type="password" name="password" id="password" class="form-control" value="123456" placeholder="password">
                                                                        <span class="input-group-text" onclick="togglePassword('password', this)"  style="cursor: pointer;">
                                                                            <i class="bi bi-eye"></i>
                                                                        </span>
                                                                    
                                                                    </div>
                                                  </div>
                                                  <div class="mb-3">
                                                       <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                       </div>
                                                  </div>

                                                  <div class="mb-1 text-center d-grid">
                                                       <button class="btn btn-soft-primary" type="submit">Sign In</button>
                                                  </div>
                                             </form>
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
                                             <!-- <p class="mt-3 fw-semibold no-span">OR sign with</p>

                                             <div class="d-grid gap-2">
                                                  <a href="javascript:void(0);" class="btn btn-soft-dark"><i class="bx bxl-google fs-20 me-1"></i> Sign in with Google</a>
                                                  <a href="javascript:void(0);" class="btn btn-soft-primary"><i class="bx bxl-facebook fs-20 me-1"></i> Sign in with Facebook</a>
                                             </div> -->
                                        </div>

                                        <p class="text-danger text-center">Don't have an account? <a href="<?php echo base_url();?>sign_up/fresh" class="text-dark fw-bold ms-1">Sign Up</a></p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-xxl-5 d-none d-xxl-flex">
                         <div class="card h-100 mb-0 overflow-hidden">
                              <div class="d-flex flex-column h-100">
                                   <img src="<?php echo base_url();?>User_assets/assets/images/small/img-10.jpg" alt="" class="w-100 h-100">
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="<?php echo base_url();?>User_assets/assets/js/vendor.js"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="<?php echo base_url();?>User_assets/assets/js/app.js"></script>

</body>

</html>