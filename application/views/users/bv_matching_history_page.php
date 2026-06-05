<?php  include('uheader.php');?>
<div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-white"><?php echo  $tag;?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="https://aidigitalassets.global">Home</a></li>
                            <li class="breadcrumb-item active">Request History</li>
                          </ol>
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
                                  <div class="card-header text-center text-white"><h3></h3></div>
                                    <div class="card-body">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                               <!-- fund history -->

                                                        <table class="table text-center auto-index" id="example">
                                                            <thead class="text-capitalize">
                                                                 <tr>
                                                                    <th>Sr NO</th>
                                                                    <!-- <th>User Id</th> -->
                                                                    <th>Total Amount</th>
                                                                    <!-- <th>BV</th> -->
                                                                    <th>Date</th>
                                                                     <th>Status</th> 
                                                                    <th>Rank Name</th>
                                                                    <th>Trade Income</th>
                                                                    <th>Rewards Income</th>
                                                                    <th>Left BV</th>
                                                                    <th>Right BV</th>
                                                                    <th>Required BV</th>
                                                                     <th>Total BV</th>
                                                                                 
                                                    
                                                            </thead>
                                                            <tbody>
                                                            
  
                             <?php foreach($bv_match_history as $bott)
      {?>

                      <tr>
                   <td></td>
                   <td>$<?php echo $bott['credit'];?></td>
                   <td><?php echo $bott['wdate'];?></td>
                   <td><?php echo $bott['wstatus'];?></td>
                   <td><?php echo $bott['rank_name'];?></td>
                   <td>$<?php echo $bott['trade_income'];?></td>
                   <td>$<?php echo $bott['reward_income'];?></td>
                   <td><?php echo $bott['left_bv'];?></td>
                   <td><?php echo $bott['right_bv'];?></td>
                   <td><?php echo $bott['required_bv'];?></td>
                    <td><?php echo $bott['total_bv'];?></td>
                
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