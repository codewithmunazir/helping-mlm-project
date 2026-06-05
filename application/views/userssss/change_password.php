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
                     
                         
                    <h4><?php echo $tag;?></h4>
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
                    <form action="<?php echo base_url();?>change-password" method="POST" >
                    <div class="card-body">
                         <div class="row">
                              <div class="col-lg-6">
                                   
                                        <div class="mb-3">
                                        <label class="mb-1" for="pppassword"><strong>Current Password</strong></label>
                                            <?php echo form_error('password'); ?>                                             
                                          
                                            <div class="input-group">
                                                 <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'pppassword', 'name'=>'password','placeholder'=>'Enter Current Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('pppassword', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                        </div>
                                  
                              </div>
                              <div class="col-lg-6">
                                   <form>
                                        <div class="mb-3">
                                        <label class="mb-1" for="new_typassword"><strong>New Password</strong></label>
                                            <?php echo form_error('new_password'); ?>
                                           
                                            <div class="input-group">
                                                <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'new_typassword', 'name'=>'new_password','placeholder'=>'Enter New Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('new_typassword', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                        </div>
                            
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                   <label class="mb-1" for="repeat_nypassword"><strong>Repeat New Password</strong></label>
                                            <?php echo form_error('repeat_npassword'); ?>
                                            <div class="input-group">
                                               <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'repeat_nypassword', 'name'=>'repeat_npassword','placeholder'=>'Enter Repeat Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('repeat_nypassword', this)"  style="cursor: pointer;">
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