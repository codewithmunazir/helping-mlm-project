<?php include('uheader.php');?>
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

<!-- Start Container Fluid -->
<div class="container-xxl">

     <div class="row">
          <div class="col-lg-12">
               <div class="card">
               <div class="crad-header mt-2 m-auto">
                     
                         
               <h3><?php echo $tag;?></h3>
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
                    <form action="<?php echo base_url();?>change-txn-password" method="POST" >
                    <div class="card-body">
                         <div class="row">
                              <div class="col-lg-6">
                                   
                                        <div class="mb-3">
                                        <label class="mb-1" for="ccpassword"><strong>Current Tnx Password</strong></label>
                                            <?php echo form_error('tnxpassword'); ?>                                             
                                           
                                            <div class="input-group">
                                              <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'ccpassword', 'name'=>'tnxpassword','placeholder'=>'Enter Current Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('ccpassword', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                        </div>
                                  
                              </div>
                              <div class="col-lg-6">
                                   <form>
                                        <div class="mb-3">
                                        <label class="mb-1" for="tnxnew_password"><strong>New Tnx Password</strong></label>
                                            <?php echo form_error('tnxnew_password'); ?>
                                            <div class="input-group">
                                             <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'tnxnew_password', 'name'=>'tnxnew_password','placeholder'=>'New Transsaction Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('tnxnew_password', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                        </div>
                            
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                   <label class="mb-1" for="repeatt_npassword"><strong>Repeat New Tnx password</strong></label>
                                            <?php echo form_error('repeat_tnxpassword'); ?>
                                           
                                              <div class="input-group">
                                              <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'repeatt_npassword', 'name'=>'repeat_tnxpassword','placeholder'=>'Enter Repeat Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('repeatt_npassword', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                   </div>
                              </div>
                              
                             
                         </div>

                    </div>
                    <div class="card-footer border-top">
                    <input type="submit"  value="submit" class="btn btn-primary">
                        
                    </div>
              
               </div>
              </form>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>