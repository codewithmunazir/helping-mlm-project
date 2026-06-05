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
                    <?php if($smsg=$this->session->flashdata('msg_successemail')) {
                                        $smsg_class=$this->session->flashdata('msg_class');?>
                                        <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                                        <?= $smsg; ?>
                                        </div>
                                        <?php } ?>
                            </div>
                             <form action="<?php echo base_url();?>support-email" method="POST" class="forms-sample">
                             <div class="card-body">
                                
                                    <div class="form-group mb-3">
                                            <label class="mb-1"><strong>To</strong></label>
                                            <input type="email" class="form-control" value="Admin" Readonly="Readonly" name="emailto" style="background-color: #f0f8ff; color: #2e8b57;">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="mb-1"><strong>Subject</strong></label> <?php echo form_error('subject'); ?>  
                                            <input class="form-control" placeholder="Enter Subject" name="subject" size="50" style="color: #ffffff;">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="mb-1"><strong>Message</strong></label><?php echo form_error('message'); ?>
                                            <textarea class="form-control" placeholder="Write Message Here....." style="height:150px; color: #ffffff;" name="message" ></textarea>
                                        
                                        </div>
                                        
                            </div>
                            <div class="crad-footer mb-3 p-2">
                            <input type="submit" class="btn btn-primary" value="Send">

                            </div>

                      <!--</div> card body-->
                </form>
                </div>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>