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

                                                        <table class="table text-center auto-index" id="example3">
                                                            <thead class="text-capitalize">
                                                                 <tr>
                                                                    <th>SN.</th>
                                                                         <th >Userid</th>
                                                                        <th >Full Name</th>
                                                                        <th >Mobile</th>
                                                                        <th >Sponsor</th>
                                                                        <th >Joining Date</th>
                                                                        <th >Deposit Amount</th>
                                                                        <th> Team Business</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php 
                  $count=0; 
                      foreach($myreffuser as $myref)
                         {
                        
                            
                            $yt=gettopopsum($myref['user_id']);
                            if(!empty($yt))
                            {
                                $topamt=$yt;
                            }
                            else{
                                $topamt="0.00";
                            }
                            $getuser_d=getUserDetailsByspon_Id($myref['user_id']);
                            $myteambus=$getuser_d->teambusiness;
                            $gemybus=gettopopsum($myref['user_id']);
                            if(!empty($gemybus))
                            {
                                if (is_int($gemybus)) {
                
                                    $roi_income=$gemybus;
                                  }
                                else
                                {
                                  $roi_income=round($gemybus, 2);
                                }
                                $finalbus=$myteambus+$roi_income;
                            }
                            else{
                                $finalbus=$myteambus;
                            }
                           
                            
                    

                            ?>
                            <tr>
                                <td></td>
                                <td><?php echo $myref['user_id'];?></td>
                                <td><?php echo $myref['fullname'];?></td>
                                <td><?php echo $myref['mobile'];?></td>

                                <td><?php echo $myref['sponserd_id'];?></td>
                                <td><?php echo $myref['register_date'];?></td>
                                <td>$ <?php echo  $topamt;?></td>
                                <td>$ <?php echo  $finalbus;?></th>
                               
                          </tr>

                          <?php }?>
                                                                            
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