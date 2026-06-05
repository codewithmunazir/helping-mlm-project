



<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin- Login</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

  
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid mt-5">
      <div class="register-box m-auto">
        <div class="register-logo">
          <a href="../../index2.html"><b>ADMIN</b> - Login</a>
       </div>

        <div class="card m-auto">
          <div class="card-header">
          <?php if($msg=$this->session->flashdata('msg_invalid')) {
                $msg_class=$this->session->flashdata('msg_class');?>
                <div class="input-group mb-3 alert <?php echo $msg_class;?>">
                     <?= $msg; ?>
                </div>
              <?php } ?>
          </div>
          <div class="card-body register-card-body">
            <p class="login-box-msg">Login</p>

            <form action="<?php echo base_url('home/login_admin');?>" method="post">
            <?php echo form_error('adminid'); ?>
              <div class="input-group mb-3">
             
              <?php echo form_input(['class'=>'form-control','type'=>'text','id'=>'email', 'name'=>'adminid','placeholder'=>'Admin-Id','value'=>set_value('adminid')]);?>
                               
                               
             
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <?php echo form_error('password'); ?>
              <div class="input-group mb-3">
              
                    <?php echo form_password(['class'=>'form-control','type'=>'password', 'name'=>'password','placeholder'=>'Enter Password','value'=>set_value('password')]);?>
                         
                
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <!-- /.col -->
                <div class="col-5">
                  <input type="submit" class="btn btn-primary btn-block" value="Admin Login">
                </div>
                <!-- /.col -->
              </div>
            </form>



          <!--  <a href="<?php// echo base_url();?>admin-register" class="text-center">Register Admin</a>-->
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>

       

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url();?>Assets_s/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/mycustom.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>Assets_s/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>Assets_s/dist/js/adminlte.min.js"></script>
</body>
</html>
