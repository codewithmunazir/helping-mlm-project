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
                           <?php if($msg=$this->session->flashdata('msg_invalid_usdt')) {
                             $msg_class=$this->session->flashdata('msg_class');?>
                             <div class="input-group mb-3 alert <?php echo $msg_class;?>">
                                 <?= $msg; ?>
                              </div>
                                   <?php } if($smsg=$this->session->flashdata('msg_success_usdt')) {
                                    $smsg_class=$this->session->flashdata('msg_class');?>
                                  <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                                      <?= $smsg; ?>
                                  </div>
                                <?php } ?>
                              <h4>Update USDT Details</h4>
                        </div>

                                            <?php
                                            $userr_id=$userDetai->user_id;
                                             $getbank=is_bankAccount($userr_id);
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
<form role="form" action="<?php echo base_url('User/update_usdt');?>" method="POST"  >
                    <div class="card-body">
                         <div class="row">
                              <div class="col-lg-6">
                                   
                                        <div class="mb-3">
                                        <label for="usdt_add">USDT Address</label><?php echo form_error('usdt_add'); ?>
                                        <input type="text" class="form-control" name="usdt_add"  placeholder="Enter USDT" id="usdt_add" value="<?php echo $usdt;?>">
                                        </div>
                                  
                              </div>
                     
                              
                             
                         </div>

                    </div>
                    <div class="card-footer border-top">
                    <input type="submit"  value="Update-USDT " class="btn btn-primary">
                        
                    </div>
              
               </div>
              </form>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>