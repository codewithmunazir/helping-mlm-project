<?php include('admin_header.php');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Admin</a></li>
              <li class="breadcrumb-item active">Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="rowjustify-content-center">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="crad-header bg-info text-center"><h4 class="mb-3">Top - Up</h4>
                   
                </div>
                <div class="card-body">
                  <div class="mt-3 mb-3">
                   <?php if($msg=$this->session->flashdata('msg_invalid')) {
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
                  </div>
                    <form action="<?php echo base_url();?>change_password" method="POST">
                      <div class="row mb-2">
                          <div class="col">
                                                            <label class="form-label">Old Password<span class="text-danger">*</span>  </label>
                 
                                                             <?php  echo form_error('old_password');?>
                                                            <div class="input-group mb-3">
                                                                <input type="password" class="old_password form-control" name="old_password" id="old_password" placeholder="Enter New Password" aria-label="Text input with dropdown button">
                                                                <button class="btn btn-light-dark" type="button" ><span id="old_stoggle_pwd" class="old_stoggle_pwd" style="cursor: pointer; display:none;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                                                <span id="old_htoggle_pwd" class="old_htoggle_pwd" style="cursor: pointer; "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg></span>
                                                                </button>

                                                            </div>
                                                           
                                                        </div>
                      </div>
                         <div class="row mb-2">
                                                         <div class="col">
                                                            <label class="form-label">New Password<span class="text-danger">*</span>  </label>
                                                             <?php  echo form_error('password');?>
                                                            <div class="input-group mb-3">
                                                                <input type="password" class="password form-control" name="password" id="password" placeholder="Enter New Password" aria-label="Text input with dropdown button">
                                                                <button class="btn btn-light-dark" type="button" ><span id="stoggle_pwd" class="stoggle_pwd" style="cursor: pointer; display:none;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                                                <span id="htoggle_pwd" class="htoggle_pwd" style="cursor: pointer; "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg></span>
                                                                </button>

                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <label class="form-label">Repeat-New Password<span class="text-danger">*</span> </label> 
                                                             <?php  echo form_error('repassword');?>
                                                            <div class="input-group mb-3">
                                                                  <input type="password" class="repassword form-control" placeholder="repeat-password" id="repassword" name="repassword" aria-label="Text input with dropdown button">
                                                                    <button class="btn btn-light-dark" type="button" ><span id="stoggle_repwd" class="stoggle_repwd" style="cursor: pointer; display:none;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                                    </span>
                                                                    <span id="htoggle_repwd" class="htoggle_repwd" style="cursor: pointer; "  ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg></span>
                                                                    </button>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                        <div class="form-group mt-5">
                            <input type="submit" class="btn btn-info" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
                  <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include('admin_footer.php'); ?>



