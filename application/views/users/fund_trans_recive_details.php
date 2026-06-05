<?php  include('uheader.php');?>
<div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark"><?php $tag;?></h1>
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
                                    <div class="card-body">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                               <!-- fund history -->

                                                        <table class="table text-center auto-index" id="example1">
                                                            <thead class="text-capitalize">
                                                                 <tr>
                                                                     <th>SR No.</th>            
                                                                <th>Credit</th>
                                                                <th>Debit</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Remark</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php
                                                               $count=1; 
                                                               foreach($fundTran_recieve as $fundschange)
                                        {?>

                                                        <tr>
                                                    <td></td>
                                                        <td>$ <?php echo $fundschange['credit'];?></td>
                                                        <td>$ <?php echo $fundschange['debit'];?></td>
                                                        <td><?php echo $fundschange['wdate'];?></td>
                                                        <td><?php  if($fundschange['wstatus']==='A12B13'){
                                                            echo "Recieve From Admin";
                                                        }
                                                            else{
                                                                echo $fundschange['wstatus'];
                                                            }?></td>
                                                        <td><?php echo  $fundschange['to_Id'];?></td>
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