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
                  
                    <h1><?php echo $tag;?></h1>
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
                                          <form action="<?php echo base_url();?>top-up" method="POST" class="forms-sample">
                      <div class="card-body">
                        
                                   <input type="hidden" name="myamount" value="<?php  echo getfunds($userDetai->user_id); ?>">
                            <input type="hidden" name="myuserid" value="<?php echo  $userDetai->user_id; ?>">
                            <h4 class="text-red mt-5">My Activation Amount 
                                    
                                    <span class="text-primary">$ <?php  echo getfunds($userDetai->user_id);?></span></h4>
                        </span>
                                    <div class="form-group mb-3">
                                            <label class="mb-1" for="userid"><strong>User ID</strong></label> <span id="alertmsg" class="ml-2"></span>
                                            <input class="form-control" type="text"  placeholder="User ID" name="sponsed_id"  id="sponsed_id" onchange="return getsponserdId();"> 
                                             <?php echo form_error('sponsed_id'); ?>
                                        </div>
                                    
                                        
                                        <div class="form-gorup mb-3">
                                            <label class="mb-1" for="select_plan" ><strong>Select Pack </strong></label>  <?php echo form_error('roipackselect'); ?>
                                            <select class="default-select form-control wide mb-3" name="roipackselect">
                                               <option value="">Select Pack </option>
                                            <?php foreach($getpack as $pack){ ?>
                                             
        <option value="<?php echo intval($pack['packamount1']) ;?>">$<?php echo $pack['packamount1']." "; echo" Roi "; echo  $pack['packroi']; echo " %,  ".$pack['typeget']; echo " ".$pack['packroidays']." Days";?></option>
        <?php }?>
                      

                    </select>
        </div>
                                        <div class="form-group mb-3">
                                            <label class="mb-1" for="topnewPassword"><strong>Transaction Password</strong></label>
                                            <?php echo form_error('tnxpass'); ?>
                                             
                                         <div class="input-group">
                                             <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'topnewPassword', 'name'=>'tnxpass','placeholder'=>'Enter transaction Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('topnewPassword', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                        
                            </div>
                            <div class="crad-footer mb-3 p-2">
                            
                              <input type="submit" value="Top - Up" class="btn btn-primary"> 
                                
                            </div>
                            </form>
                </div>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>