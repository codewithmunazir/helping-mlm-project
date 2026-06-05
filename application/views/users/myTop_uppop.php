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
                                    <div class="card mt-5">
                                        <div class="card-body">
                                            <form role="form" action="https://aidigitalassets.global/Deposite-insert" id="mypassform" method="post" enctype="multipart/form-data">
                                             
                                             
                                                 <div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">Amount in USDT</label>
                                                    <input type="number" class="form-control" name="amount" value="" id="validationCustom02" placeholder="Amount In USDT" required="">
                                                </div>
                                                
                                                <!--<div class="col-md-12 mb-3">-->
                                                    <!--<label for="validationCustom02">Amount in BUSD</label>-->
                                                <!--    <input type="number" class="form-control" name="coin" value="USDT.TRC20" id="validationCustom02" placeholder="USDT Token (BSC Chain)" readonly="" >-->
                                                <!--</div>-->

                                                <div class="col-md-12 mb-3">
                                                   <div class="form-group">
                                                        <label class="col-form-label">Select Coin</label>
                                                        <select class="custom-select" name="coin" style='height: 38px;margin-top: 0px;' readonly="" >
                                                            <!--<option  value='TRX'  >TRX</option>-->
                                                            <option  value='USDT.TRC20    '  >USDT.TRC20 Token (TRC20)</option>
                                                            

                                                        </select>
                                                   </div>
                                                </div>
                                                
                                                <br>
                                                <center>
                                                    <button class="btn btn-primary text-center" id="submit" type="submit">Process Request</button>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            <!-- Button trigger modal -->

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