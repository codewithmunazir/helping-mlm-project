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
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Withdrwal</a></li>
                            <li class="breadcrumb-item active">Change tnx password</li>
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>

                   <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid" style="margin-top: 5px;">
                        <div class="row">
                  <div class="col-lg-12 col-sm-12 grid-margin stretch-card m-auto">
                    <div class="row text-white" id="showpaneloo">
                         <!-- <div class="row" id="showpaneloo" style="display:none;"> -->
                            <div class="col-xl-12 col-sm-12">
                             <span class="text-primary">    <span id="nameincome"></span> </span>
                            </div>
                           <!--   <div class="col-xl-12 col-sm-12 mb-1">
                              <div class="card">
                                <div class="card-body px-4">
                                  <h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Credit</h4>
                                  <div class="d-flex align-items-end mt-1 justify-content-between">
                                   
                                     <h4 class="mb-0 fs-32 font-w800">$<?php  //echo getfunds_credit_non_working($userDetai->user_id);?></h4>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-12 col-sm-12 mb-1">
                              <div class="card">
                                <div class="card-body px-4">
                                  <h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Debit</h4>
                                  <div class="d-flex align-items-end mt-1 justify-content-between">
                                  
                                    <h4 class="mb-0 fs-32 font-w800">$ <?php  //echo getfunds_debit_non_working($userDetai->user_id);?></h4>
                                  </div>
                                </div>
                              </div>
                            </div> -->
                            <div class="col-xl-12 col-sm-12 mb-1">
                              <div class="card text-white">
                                                  <div class="card-body px-4">
                                  <h4 class="fs-18 font-w600 mb-5 text-nowrap">Balance</h4>
                                  
                                  <div class="d-flex align-items-end mt-1 justify-content-between">
                                    <!--<span><small class="text-primary">76</small> left from target</span>-->
                                    <!-- <h4 class="mb-0 fs-32 font-w800" >$<span id="balancemy"></span> <?php  //echo getfunds($userDetai->user_id);?></h4> -->
                                     <h4 class="mb-0 fs-32 font-w800" >$ <?php  echo getfunds_non_working($userDetai->user_id);?></h4>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                    </div>
            </div>
          </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-5">
                                     
                                            <div class="col-md-12 mb-3">
                                              <?php if($msg=$this->session->flashdata('msg_invalid')) {
                                                  $msg_class=$this->session->flashdata('msg_class');?>
                                                  <div class="input-group mb-3 alert <?php echo $msg_class;?>">
                                                  <?= $msg; ?>
                                                  </div>
                                                  <?php } if($smsg=$this->session->flashdata('msg_successr')) {
                                                  $smsg_class=$this->session->flashdata('msg_class');?>
                                                  <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                                                  <?= $smsg; ?>
                                                  </div>
                                                  <?php } ?>
                                            </div>
              </div>
                                        <div class="card-body">
                                            <form role="form"   action="<?php echo base_url();?>compound-system"  method="POST" enctype="multipart/form-data">
                                        	<input type="hidden" name="sponsed_id" value="<?php echo $userDetai->bot_id;?> ">
                                            <div class="col-md-12 mb-3">
                                                    <label for="new_typassword">Select Pack</label>
                                                     
                                                     
                                            <select class="default-select form-control wide mb-3" required>
                                               <option value="">Select Pack </option>
                                            <?php foreach($getpack as $pack){ ?>
                                             
        <option value="<?php echo $pack['id'];?>"> $<?php echo $pack['start_amt']." To   $".$pack['end_amount']."  Get ".$pack['roi_percent']." %
Daily ";?></option>
        <?php }?>
                     

                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="amout">Pack Amount</label>
                                                    <?php echo form_error('roipackselect'); ?>
                                                    <input type="number" name="roipackselect" class="form-control" id="amout" placeholder="Enter amount" required>

                                                </div>
                                                 <div class="col-md-12 mb-3">
                                                    <label for="tnxpass">Transaction Password </label>
                                                     <?php echo form_error('tnxpass'); ?>
                                                    <div class="input-group">
                                             <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'topnewPassword', 'name'=>'tnxpass','placeholder'=>'Enter transaction Password']);?>
                                                <span class="input-group-text" onclick="togglePassword('topnewPassword', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                                </div>
                                               
                                                
                                                <br>
                                                <center>
                                                    <input class="btn btn-primary text-center" id="submit" type="submit" value="Submit">
                                                </center>
                                            </form>
                               
                                        </div>
                                    </div>
                                </div>
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