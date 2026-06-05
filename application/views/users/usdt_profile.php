<?php include('uheader.php');?>
<style>
    .addressimg{
        width: auto;
        object-fit: contain;
        height: 200px;
        border: 6px solid black;
        border-radius: 30px;
    }
    .addressimg1{
        width: 100%;
        height: 300px;
        object-fit: contain;
        border-radius: 30px;
    }
    .blahimage{
        margin-bottom: 18px; 
        height: 120px;
    }
    @media  only screen and (min-width:0px) and (max-width: 767px){
        .addressimg1{
            width: 100%;
            object-fit: contain;
            border-radius: 30px;
        }
        .blahimage{
            margin-bottom: 18px;
            height: 100px;
        }
    }
</style>

            <div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark"><?php echo $tag;?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Profile</a></li>
                            <li class="breadcrumb-item active">Change tnx password</li>
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>

                   <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid" style="margin-top: -35px;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-5">
                                        <div class="card-header">
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
                                </div>
                                        <div class="card-body"> <?php
                                            $userr_id=$userDetai->user_id;
                                             $getbank=is_bankAccount($userr_id);
                                             // print_r($getbank);
                                             if(empty($getbank)){
                                              $bank_name =" ";
                                              $acc_holder_name=" "; 
                                              $acc_no=" ";
                                              $ifsc =" " ;
                                              $usdt=" ";
                                               $gpay=" ";
                                              $paytm=" ";
                                              $phone_pay=" ";
                                              $upi=" ";
                                             }
                                             elseif (!empty($getbank)) {
                                                                $bank_name =$getbank->bank_name;
                                                                $acc_holder_name=$getbank->acc_holder_name; 
                                                                $acc_no=$getbank->acc_no;
                                                                $ifsc = $getbank->ifsc;
                                                                $usdt=$getbank->usdt_add;
                                                                      $gpay=$getbank->gpay;
                                                                $paytm=$getbank->paytm;
                                                                $phone_pay=$getbank->phone_pay;
                                                                $upi=$getbank->upi;

                                             }

                                             ?>

                                            <form role="form"  id="mypassform" action="<?php echo base_url('User/update_usdt');?>" method="POST">
                                        	
                                        	
                                        	    <div class="col-md-12 mb-3">
                                                    <p class="text-danger">"Before updating the address, please ensure you fill in your correct USDT BEP-20 address."</p>
                                                    <label for="usdt_add">USDT BEP20 Address </label>
                                                                                                  
                                                        <?php echo form_error('usdt_add'); ?>
                                        <input type="text" class="form-control" name="usdt_add" placeholder="Enter USDT BEP20" id="usdt_add" value="<?php echo $usdt;?>" required >
                                                </div>
                                                
                                                
                                               
                                                
                                                <br>
                                                <center>
                                                    <button class="btn btn-primary text-center" id="submit" type="submit">Update USDT BEP 20</button>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                            <!-- next-->
            <div class="col-lg-12">
                    <div class="personal-informations-from">
                        <div class="card mt-5 body-bg">
                            <div class="card-header">
                                <h3 class="text-white text-center mb-1">Update Other Method</h3>
                            </div>
                        <div class="card-body">
                            
                            <div class="personal-informations-from-item">
                                <form role="form" id="mypassform" action="<?php echo base_url('User/update_gpay');?>" method="POST" onsubmit="return confirmSubmitusdtother();" >
                                    <div class="personal-informations-from-item-inner">
                                                <div class="col-md-12 mb-3">
                                                    <label class="mb-1 form-label" for="usdt_add"><strong>G-pay</strong></label> 
                                                    <input class="form-control" type="text"  placeholder="Enter gpay address" name="gpay"   id="gpay" value="<?php echo $gpay;?>"> 
                                                    <?php echo form_error('gpay'); ?>
                                                    <input type="submit" class="btn btn-info text-center" id="submit" value="Update">
                                                </div>
                                    </div>
                                </form>
                                <form role="form" id="mypassform" action="<?php echo base_url('User/update_phonepay');?>" method="POST" onsubmit="return confirmSubmitusdtother();" >
                                    <div class="personal-informations-from-item-inner">
                                                <div class="col-md-12 mb-3">
                                                    <label class="mb-1 form-label" for="usdt_add"><strong>Phonepay</strong></label> 
                                            <input class="form-control" type="text"  placeholder="Enter phonepay address" name="phone_pay"   id="gpay" value="<?php echo $phone_pay;?>"> 
                                            <?php echo form_error('phone_pay'); ?>
                                                    <input type="submit" class="btn btn-info text-center" id="submit" value="Update">
                                                </div>
                                    </div>
                                </form>
                                <form role="form" id="mypassform" action="<?php echo base_url('User/update_paytm');?>" method="POST" onsubmit="return confirmSubmitusdtother();" >
                                    <div class="personal-informations-from-item-inner">
                                                <div class="col-md-12 mb-3">
                                                        <label class="mb-1 form-label" for="usdt_add"><strong>Paytm</strong></label> 
                                            <input class="form-control" type="text"  placeholder="Enter paytm" name="paytm"   id="gpay" value="<?php echo $paytm;?>"> 
                                            <?php echo form_error('paytm'); ?>
                                                    <input type="submit" class="btn btn-info text-center" id="submit" value="Update">
                                                </div>
                                    </div>
                                </form>
                                <form role="form" id="mypassform" action="<?php echo base_url('User/update_upi');?>" method="POST" onsubmit="return confirmSubmitusdtother();" >
                                    <div class="personal-informations-from-item-inner">
                                                <div class="col-md-12 mb-3">
                                                    <label class="mb-1 form-label" for="usdt_add"><strong>UPI</strong></label> 
                                            <input class="form-control" type="text"  placeholder="Enter UPI " name="upi"   id="gpay" value="<?php echo $upi;?>"> 
                                            <?php echo form_error('upi'); ?>
                                                    <input type="submit" class="btn btn-info text-center" id="submit" value="Update">
                                                </div>
                                    </div>
                                </form>
                                        <!-- <div class="col-md-12 mb-3">
                                            
                                        </div>
                                        
                                        <div class="col-md-12 mb-3">
                                        
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            
                                        </div>
                                        
                                        <center>
                                            <button class="btn btn-info text-center" id="submit" type="submit">Update</button>
                                        </center> -->
                                    <!-- </div>
                                </form> -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- next -->
                            </div>
                            
                            </div>
                    </section>
                
            </div>
        <!-- main content area end -->
    
<!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="">GoldenChance</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer> -->

  </div>
<!-- ./wrapper -->
<?php include('ufooter.php');?>