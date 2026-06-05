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
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">profile</a></li>
                            <li class="breadcrumb-item active">My Profile</li>
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
                                        <div class="card-body">
                                            <form role="form" id="mypassform">
                                        	<!-- <input type="hidden" name="_token" value="YuZXixLaqSB2ZCasoNLJsSaFRxpCQAPf7ZMYUhtq"> -->
                                        	
                                        	    <div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">Name</label>
                                                    <input type="text" class="form-control"  value="<?php echo $userDetai->fullname;?>" readonly>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">User Name</label>
                                                     <input type="text" class="form-control"  value="<?php echo $userDetai->fullname;?>" readonly="readonly">
                                                </div><div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">UserId</label>
                                                     <input type="text" class="form-control"  value="<?php echo $userDetai->user_id;?>" readonly="readonly">
                                                </div><div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">Mobile</label>
                                                    <input type="text" class="form-control"  value="<?php echo $userDetai->mobile;?>" readonly="readonly">
                                                </div><div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">Email</label>
                                                    <input type="text" class="form-control"  value="<?php echo $userDetai->email;?>" readonly="readonly">
                                                </div>
                                               <div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">Register Date</label>
                                                    <input type="text" class="form-control"  value="<?php echo $userDetai->register_date;?>" readonly="readonly">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">Sponserd Id</label>
                                                      <input type="text" class="form-control"  value="<?php echo $userDetai->sponserd_id;?>" readonly="readonly">
                                                <!--<div class="col-md-12 mb-3">-->
                                                    <!--<label for="validationCustom02">Amount in BUSD</label>-->
                                                <!--    <input type="number" class="form-control" name="coin" value="USDT.TRC20" id="validationCustom02" placeholder="USDT Token (BSC Chain)" readonly="" >-->
                                                <!--</div>-->

                                                
                                            
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