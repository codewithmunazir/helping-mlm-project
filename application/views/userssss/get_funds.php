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
                                <?php if($msg=$this->session->flashdata('msg_invalid_api')) {
                                $msg_class=$this->session->flashdata('msg_class');?>
                              <div class="input-group mb-3 alert <?php echo $msg_class;?>">
                                   <?= $msg; ?>
                              </div>
                            <?php } if($smsg=$this->session->flashdata('msg_success_api')) {
                              $smsg_class=$this->session->flashdata('msg_class');?>
                              <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                                   <?= $smsg; ?>
                              </div>
                          <?php } ?>
              
             </div>
                                          <form action="<?php echo base_url();?>get-fund" method="POST" class="forms-sample">
                      <div class="card-body">

                                        
                                    <div class="form-gorup mb-3">
                                        <label class="mb-1" for="select_plan" ><strong>Select </strong></label>
                                        <?php echo form_error('coin'); ?>
                                        <select name="coin" class="default-select form-control wide mb-3" id="coin">
                                       
                                        <option value="">Select Currency </option>
                                            <?PHP
                                            $response=get_currency();
                                            $value=json_decode($response,true);

                                            foreach($value['data'] as $colors)
                                            {

                                            ?>	
                                            <option value="<?PHP echo $colors['currency']; ?>" ><?PHP echo $colors['currency']; ?></option>
                                            <?PhP
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                            <label class="mb-1" for="amt"><strong>Amount</strong></label>
                                            <?php echo form_error('get_amount'); ?>
                                             <?php echo form_input(['class'=>'form-control','type'=>'text','id'=>'amt', 'name'=>'get_amount','placeholder'=>'Enter Amount']);?>                                       
                                    </div>
                            <div class="crad-footer mb-3 p-2">
                            
                              <input type="submit" value="Submit" class="btn btn-primary"> 
                                
                            </div>
                            </form>
                </div>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>