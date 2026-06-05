<?php  include('uheader.php');?>
<div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark"><?php echo  $tag;?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <div class="float-sm-right text-dark"><p>INCOME<span class="text-primary">/</span>INVESTMENT INCOME</p></div>
                          <!-- <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="https://aidigitalassets.global">Home</a></li>
                            <li class="breadcrumb-item active">Request History</li>
                          </ol> -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>

                   <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid" style="margin-top: -35px;">
                            <div class="row">
                            <!-- Primary table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                               <!-- fund history -->

                                                        <table class="table text-center auto-index" id="example">
                                                            <thead class="text-capitalize">
                                                                 <tr>
                                                                    <th>Sr NO</th>
                                                                    <th>Credit</th>
                                                                    <th>Date</th>

                                                                    <th>Status</th>
                                                                     <th>Reamrk</th> 
                                                                   
                                                                </tr>
                                                              </thead>
                                                            <tbody>
                                                            
  
                             <?php foreach($roi_history as $btott)
      {?>

                      <tr>
                   <td></td>
                   <td>$<?php echo $btott['credit'];?></td>
                   <td><?php echo $btott['wdate'];?></td>
                   <td><?php echo $btott['wstatus'];?></td>
                   <td><?php echo $btott['remark'];?></td>
                 
                    
                      </tr>
                      <?php } ?>
                                                        
                                                                        

                                                                            
                                                           </tbody>
                                                        </table>
                                                        <br><br>
                                                        <center>
                                                            <div>
                                                                
                                                            </div>
                                                        </center>

                                                        <!-- fund history -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Primary table end -->
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