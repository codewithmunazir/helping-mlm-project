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
              <?php } ?>           </div>
                                        <div class="card-body">
                                            <form role="form"  id="mypassform" action="<?php echo base_url();?>change-txn-password" method="POST" >
                                        	
                                        	
                                        	    <div class="col-md-12 mb-3">
                                                    <label for="pppassword">Current Tnx Password</label>
                                                      <?php echo form_error('tnxpassword'); ?>                                             
                                                        <div class="input-group">
                                                          <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'ccpassword', 'name'=>'tnxpassword','placeholder'=>'Enter Current Password']);?>
                                                            <span class="input-group-text" onclick="togglePassword('ccpassword', this)"  style="cursor: pointer;">
                                                                <i class="bi bi-eye"></i>
                                                            </span>
                                                           
                                                        </div>
                                                </div>
                                                
                                                 <div class="col-md-12 mb-3">
                                                    <label for="new_typassword">New Tnx Password</label>
                                                       <?php echo form_error('tnxnew_password'); ?>
                                                        <div class="input-group">
                                                         <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'tnxnew_password', 'name'=>'tnxnew_password','placeholder'=>'New Transsaction Password']);?>
                                                            <span class="input-group-text" onclick="togglePassword('tnxnew_password', this)"  style="cursor: pointer;">
                                                                <i class="bi bi-eye"></i>
                                                            </span>
                                                           
                                                        </div>
                                                </div>
                                                 <div class="col-md-12 mb-3">
                                                    <label for="repeat_nypassword">Repeat- Tnx Password</label>
                                                      <?php echo form_error('repeat_tnxpassword'); ?>
                                                          <div class="input-group">
                                                          <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'repeatt_npassword', 'name'=>'repeat_tnxpassword','placeholder'=>'Enter Repeat Password']);?>
                                                            <span class="input-group-text" onclick="togglePassword('repeatt_npassword', this)"  style="cursor: pointer;">
                                                                <i class="bi bi-eye"></i>
                                                            </span>
                                                           
                                                        </div>
                                                </div>
                                               
                                                
                                                <br>
                                                <center>
                                                    <button class="btn btn-primary text-center" id="submit" type="submit">Change Tnx Password</button>
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