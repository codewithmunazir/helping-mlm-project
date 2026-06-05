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
                    <div class="card-header">
                    <h3><?php echo $tag;?></h3>
                                               <div class="crad-header mt-2 m-auto">
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
                                       <form role="form" action="<?php echo base_url();?>update-bank" method="POST" >
                    <div class="card-body">
                         <div class="row">
                              <div class="col-lg-6">
                                   
                                        <div class="mb-3">
                                        <label  class="form-label" for="bank_name">Bank Name</label> <?php echo form_error('bank_name'); ?>
                                        <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name" value="<?php echo $bank_name;?>">
                                        </div>
                                  
                              </div>
                              <div class="col-lg-6">
                                  
                                        <div class="mb-3">
                                            
                                        <label class="form-label" for="acc_holder_name">Account Holder</label><?php echo form_error('acc_holder_name'); ?>
                                        <input type="text" class="form-control" name="acc_holder_name" id="acc_holder_name" value="<?php echo $acc_holder_name; ?>" placeholder="Enter account holder name" >
                                             
                                        </div>
                                  
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                   <label  class="form-label" for="acc_no">Account No.</label><?php echo form_error('acc_no'); ?>
                                   <input type="text" class="form-control" id="acc_no" placeholder="Enter account " name="acc_no" value="<?php echo $acc_no;?>" >
                                  
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   
                                  
                                   <label class="form-label" for="confirm_acc_no">Confirm Account.</label><?php echo form_error('confirm_acc_no'); ?>
                                    <input type="text" class="form-control" id="confirm_acc_no" placeholder="Confirm account "  name="confirm_acc_no"  >
                                  
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="ifsc">IFSC Code</label><?php echo form_error('ifsc'); ?>
                                    <input type="text" class="form-control" name="ifsc" placeholder="Enter Ifsc" id="ifsc" value="<?php echo $ifsc; ?>" >
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                <input type="submit"  value="submit" class="btn btn-success">
                                </div>
                              </div>

                         </div>

                    </div>
                    <!-- <div class="card-footer">
                  
                    </div> -->
                                            </form>
               </div>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>