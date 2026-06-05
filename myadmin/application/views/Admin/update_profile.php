<?php include('admin_header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Profile | Bank Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Update</a></li>
              <li class="breadcrumb-item active">Update User Details</li>
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
        <div class="row">

         <div class="col-lg-12 col-12">
         <div class="card border border-dark bg-secondary">
           <div class="crad-header bg-info text-center">
         
               <h1 class="mt-2">Update-Profile <?php echo $for_this_user_id; ?></h1>
               <?php 
               $up_user=getUserDetailsByspon_Id($for_this_user_id);
              
               ?>
           </div>
           <form id="update_profile" method="POST">
           <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                  <span id="success_msg"></span>
                    <?php
          if($smsg=$this->session->flashdata('msg_success')) {
                $smsg_class=$this->session->flashdata('msg_class');?>
                       <div class="<?php echo $smsg_class;?>" role="alert">

                     <?= $smsg; ?>
                </div>
              <?php } ?>
              </div>
              
            </div>
             <div class="row">
                   <div class="col-12 col-sm-6 col-md-6">
                    <input type="hidden" name="user_id" value="<?php echo $for_this_user_id; ?>">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label><span id="email_error" class="text-danger"></span>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $up_user->email;?>" >
                      </div>
                   </div>
                   <div class="col-12 col-sm-6 col-md-6">
                     <div class="form-group">
                        <label for="exampleInputuser">FullName</label><span id="fullname_error" class="text-danger"></span>
                        <input type="text" class="form-control" name="fullname" id="exampleInputuser" placeholder="Enter Full Name" value="<?php echo $up_user->fullname;?>">
                      </div>
                   </div>
                   <div class="col-12 col-sm-6 col-md-6">
                     <div class="form-group">
                        <label for="mobile">Mobile No</label><span id="mobile_error" class="text-danger"></span>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile " name="mobile" value="<?php echo $up_user->mobile;?>">
                      </div>
                   </div>
                   <div class="col-12 col-sm-6 col-md-6">
                     <div class="form-group">
                                <label for="password">Password</label><span id="password_error" class="text-danger"></span>
                                <input type="text" class="form-control" name="password" id="password" placeholder="Enter password" value="<?php echo $up_user->password;?>" >
                              </div>
                   </div>
               
             </div>
           </div>

           <div class="card-footer">

             <input type="submit" class="btn btn-info" value="Update Profile">
           </div>
         </form>
         </div>
        
          <!-- /.col -->
        </div>
        <div class="col-lg-12 col-12 mt-5">
         <div class="card border border-dark bg-secondary">
           <div class="crad-header bg-warning text-center">
               <h1 class="mt-2">Update USDT BEP20 Details</h1>
               <?php $getbank=is_bankAccount($for_this_user_id);
               // print_r($getbank);
               if(empty($getbank)){
                $bank_name =" ";
                $acc_holder_name=" "; 
                $acc_no=" ";
                $ifsc =" " ;
                $usdt=" ";

               }
               elseif (!empty($getbank)) {
                                  $bank_name =$getbank->bank_name;
                                  $acc_holder_name=$getbank->acc_holder_name; 
                                  $acc_no=$getbank->acc_no;
                                  $ifsc = $getbank->ifsc;
                                  $usdt=$getbank->usdt_add;
               }

               ?>
           </div>
           <form id="update_bank" method="POST">
             <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                      <span id="update_bank_msg"></span>
                  </div>
                </div>
                  <div class="row">
                       <input type="hidden" name="user_id" value="<?php echo $for_this_user_id; ?>">
                   <!--  <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                          <label for="bank_name">Bank Name</label><span id="bank_name_error" class="text-danger"></span>
                          <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name" value="<?php //echo $bank_name;?>">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                          <label for="acc_holder_name">Account Holder</label><span id="acc_holder_name_error" class="text-danger"></span>
                          <input type="text" class="form-control" name="acc_holder_name" id="acc_holder_name" placeholder="Enter account holder name" value="<?php// echo $acc_holder_name;?>" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                          <label for="acc_no">Account No.</label><span id="acc_no_error" class="text-danger"></span>
                          <input type="text" class="form-control" id="acc_no" placeholder="Enter Mobile " name="acc_no" value="<?php// echo $acc_no;?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                          <label for="confirm_acc_no">Confirm Account.</label><span id="confirm_acc_no_error" class="text-danger"></span>
                          <input type="text" class="form-control" id="confirm_acc_no" placeholder="Confirm account " name="confirm_acc_no" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                          <label for="ifsc">IFSC Code</label><span id="ifsc_error" class="text-danger"></span>
                            <input type="text" class="form-control" name="ifsc" placeholder="Enter Ifsc" id="ifsc" value="<?php //echo $ifsc; ?>">
                        </div>
                    </div> -->
                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                          <label for="ifsc">USDT BEP20 Address</label><span id="usdt_add_error" class="text-danger"></span>
                            <input type="text" class="form-control" name="usdt" placeholder="Enter usdt" id="usdt" value="<?php echo $usdt; ?>">
                        </div>
                    </div>
                  </div>  
             </div>
             <div class="card-footer">
               <input type="submit" class="btn btn-warning" value="update account">
             </div>
          </form>
         </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

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