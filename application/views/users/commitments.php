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
                          <h1 class="m-0 text-dark"><?php //echo $tag;?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active">Send Request</li>
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
                                  <div class="card shadowa">
                                <div class="row">
                                <div class="col-lg-12 col-12 text-center"><h3 class="text-center fw-bold footer-text"><?php echo $tag;?></h3></div>
                                 <div class="col-lg-12 col-12 text-center"><p class="text-center ">Tnx Password : 123456</p></div>
                                //
                                <div class="col-md-12 col-12 text-center mb-2">
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
                                //
                                </div>
                                <div class="row mt-1">
                                          
                                       <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                                <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Pack 1</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="https://doublepower33days.com/User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 14px !important;font-weight: bold;color: ##f0faf6;"><span class="fw-bold footer-textpro">Provide Help </span> $50</p>
                                                                    <p class="text-center" style="font-size: 10px !important;font-weight: bold;color: ##f0faf6;"> Daily Growth 6%</p>
                                                                    <form action="<?php echo base_url();?>commitments" method="post">
                                                                        <input type="hidden" name="amt" value="50">
                                                                         <input type="text" class="form-control" name="tnxpass" placeholder="Enter Tnx Password" required="" style="font-size: 10px !important; font-weight: bold;  margin-bottom:5px;margin-top: 1px; margin-left: auto; margin-right: auto; height:25px; width: 132px;">
                                                                        <div class="d-flex justify-content-center">
                                                                            <input type="submit" class="btn btn-primary" style="font-size: 14px !important; font-weight: bold; color: #000; margin-top:1px; margin-left: auto; margin-right: auto;" value="Commitment">
                                                                        </div>
                                                                 </form>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Pack 2</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="https://doublepower33days.com/User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                 <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 14px !important;font-weight: bold;color: ##f0faf6;"><span class="fw-bold footer-textpro">Provide Help </span> $100</p>
                                                                    <p class="text-center" style="font-size: 10px !important;font-weight: bold;color: ##f0faf6;"> Daily Growth 6%</p>
                                                                    <form action="<?php echo base_url();?>commitments" method="post">
                                                                        <input type="hidden" name="amt" value="100">
                                                                         <input type="text" class="form-control" name="tnxpass" placeholder="Enter Tnx Password" required="" style="font-size: 10px !important; font-weight: bold;  margin-bottom:5px;margin-top: 1px; margin-left: auto; margin-right: auto; height:25px; width: 132px;">
                                                                        <div class="d-flex justify-content-center">
                                                                            <input type="submit" class="btn btn-primary" style="font-size: 14px !important; font-weight: bold; color: #000; margin-top:1px; margin-left: auto; margin-right: auto;" value="Commitment">
                                                                        </div>
                                                                 </form>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                      <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Pack 3</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="https://doublepower33days.com/User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                 <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 14px !important;font-weight: bold;color: ##f0faf6;"><span class="fw-bold footer-textpro">Provide Help </span> $250</p>
                                                                    <p class="text-center" style="font-size: 10px !important;font-weight: bold;color: ##f0faf6;"> Daily Growth 6%</p>
                                                                    <form action="<?php echo base_url();?>commitments" method="post">
                                                                        <input type="hidden" name="amt" value="250">
                                                                        <input type="text" class="form-control" name="tnxpass" placeholder="Enter Tnx Password" required="" style="font-size: 10px !important; font-weight: bold;  margin-bottom:5px;margin-top: 1px; margin-left: auto; margin-right: auto; height:25px; width: 132px;">
                                                                        <div class="d-flex justify-content-center">
                                                                            <input type="submit" class="btn btn-primary" style="font-size: 14px !important; font-weight: bold; color: #000; margin-top:1px; margin-left: auto; margin-right: auto;" value="Commitment">
                                                                        </div>
                                                                 </form>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </div> 
                                       <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Pack 4</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                             <div class="row">
                                                            <!--    <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                 <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 14px !important;font-weight: bold;color: ##f0faf6;"><span class="fw-bold footer-textpro">Provide Help </span> $500</p>
                                                                    <p class="text-center" style="font-size: 10px !important;font-weight: bold;color: ##f0faf6;"> Daily Growth 6%</p>
                                                                    <form action="<?php echo base_url();?>commitments" method="post">
                                                                        <input type="hidden" name="amt" value="500">
                                                                        <input type="text" class="form-control" name="tnxpass" placeholder="Enter Tnx Password" required="" style="font-size: 10px !important; font-weight: bold;  margin-bottom:5px;margin-top: 1px; margin-left: auto; margin-right: auto; height:25px; width: 132px;">
                                                                        <div class="d-flex justify-content-center">
                                                                            <input type="submit" class="btn btn-primary" style="font-size: 14px !important; font-weight: bold; color: #000; margin-top:1px; margin-left: auto; margin-right: auto;" value="Commitment">
                                                                        </div>
                                                                 </form>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>                                               
                                                </div>
                                            </div>
                                        </div>                                                                                                                  
                                       
                                        
                                        <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Pack 5</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="https://doublepower33days.com/User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                 <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 14px !important;font-weight: bold;color: ##f0faf6;"><span class="fw-bold footer-textpro">Provide Help </span> $1000</p>
                                                                    <p class="text-center" style="font-size: 10px !important;font-weight: bold;color: ##f0faf6;"> Daily Growth 6%</p>
                                                                    <form action="<?php echo base_url();?>commitments" method="post">
                                                                        <input type="hidden" name="amt" value="1000">
                                                                         <input type="text" class="form-control" name="tnxpass" placeholder="Enter Tnx Password" required="" style="font-size: 10px !important; font-weight: bold;  margin-bottom:5px;margin-top: 1px; margin-left: auto; margin-right: auto; height:25px; width: 132px;">                                 
                                                                       <div class="d-flex justify-content-center">
                                                                            <input type="submit" class="btn btn-primary" style="font-size: 14px !important; font-weight: bold; color: #000; margin-top: 1px; margin-left: auto; margin-right: auto;" value="Commitment">
                                                                        </div>
                                                                 </form>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Pack 6</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="https://doublepower33days.com/User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                 <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 14px !important;font-weight: bold;color: ##f0faf6;"><span class="fw-bold footer-textpro">Provide Help </span> $2500</p>
                                                                    <p class="text-center" style="font-size: 10px !important;font-weight: bold;color: ##f0faf6;"> Daily Growth 6%</p>
                                                                    <form action="<?php echo base_url();?>commitments" method="post">
                                                                        <input type="hidden" name="amt" value="2500">
                                                                        <input type="text" class="form-control" name="tnxpass" placeholder="Enter Tnx Password" required="" style="font-size: 10px !important; font-weight: bold;  margin-bottom:5px;margin-top: 1px; margin-left: auto; margin-right: auto; height:25px; width: 132px;">
                                                                        <div class="d-flex justify-content-center">
                                                                            <input type="submit" class="btn btn-primary" style="font-size: 14px !important; font-weight: bold; color: #000; margin-top:1px; margin-left: auto; margin-right: auto;" value="Commitment">
                                                                        </div>
                                                                 </form>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                        
                                        
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