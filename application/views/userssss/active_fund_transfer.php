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
                      <h1>P2P Fund Transfer</h1>
                  </div>
            <form action="<?php echo base_url();?>fund_transfer_active" method="POST" >
                            <div class="card-body">
                                  <h4 class="text-red mt-5">My Activation Amount 
                                    
                                    <span class="text-primary">$ <?php  echo getfunds($userDetai->user_id);?></span></h4>
                                    <div class="form-group mb-3">
                                            <label class="mb-1" for="userid"><strong>User ID</strong></label> <span id="alertmsg" class="ml-2"></span>
                                            <input class="form-control" type="text"  placeholder="User ID" name="sponsed_id"  id="sponsed_id" onchange="return getsponserdId();"> 
                                             <?php echo form_error('sponsed_id'); ?>
                                        </div>
                                    
                                        <div class="form-group mb-3">
                                            <label class="mb-1" for="amount"><strong>Amount</strong></label>
                                            <?php echo form_error('amount'); ?>
                                            <?php echo form_input(['class'=>'form-control','type'=>'number','id'=>'amount', 'name'=>'amount','placeholder'=>'Enter amount']);?>
                                        
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="mb-1" for="tnxpass_1"><strong>Transaction Password</strong></label>
                                            <?php echo form_error('tnxpass'); ?>
                                            
                                            <div class="input-group">
                                              <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'tnxpass_1', 'name'=>'tnxpass','placeholder'=>'Enter transaction Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('tnxpass_1', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                        
                                        </div>
                                        
                            </div>
                            <div class="crad-footer mb-3 p-2">
                                <input type="submit" value="Transfer P2P" class="btn btn-primary">
                                
                            </div>
                            </form>
                </div>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>