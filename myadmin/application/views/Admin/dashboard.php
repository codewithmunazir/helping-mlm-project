<?php include('admin_header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>All Members</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary"><?php $usrno=alluser(); 
                if(!empty($usrno))
                  {
                    echo $usrno;
                  }
                  else{
                    echo 0;
                  }?></span></h5></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2 "><h5>Total Inactive User</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary"><?php echo  $total_fresh_user; ?></span></h5>
                 
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2 "><h5>Total Active User  </h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary"><?php echo  $total_active_user; ?></span></h5>
                 
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         
          
          
          
          <!-- <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2 "><h5>Total Buy Fund </h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$<?php //echo $total_request_amt_success;?></span></h5>
                 
                  <small></small>
                </span>
              </div>
             
            </div>
           
          </div> -->
          <div class="col-12 col-sm-12 col-md-12">
   <hr style="border: 3px solid black;">
    <h1 class="text-center"></h1>
</div>        
                 <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2 "><h5>Commitment Amount</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php echo  totol_ccommit_banlece(); ?></span></h5>
                 
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
              <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2 "><h5>Deposit Success</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php echo  $total_request_amt_success; ?></span></h5>
                 
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2 "><h5>Total Earning </h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php echo  $total_income; ?></span></h5>
                 
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Wallet Balance</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php 
                echo  wallete_balancee();
                 
                ?></span></h5></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Withdrwal Request</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php echo get_requsstt_widh();
                 ?></span></h5></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Withdrawl Success</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php 
                echo  $total_request_amt_success;
                 
                ?></span></h5></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2 "><h5>User Withdrawl Requset </h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$<?php echo  $user_withdrall_req; ?></span></h5>
                 
                  <small></small>
                </span>
              </div>
             
            </div>
            
          </div> 
          <!-- /.col -->
         
          
               
         

          <div class="col-12 col-sm-12 col-md-12">
    <hr style="border: 3px solid black;">
    <h1 class="text-center">Income</h1>
    <!-- <hr style="border: 3px solid black;"> -->
</div>

         
           
               
          <!-- /.col -->
            <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Total Daily Growth  Income</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php 
                echo  $total_income_daily_invest_roi;
                 
                ?></span></h5></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Total Direct Income</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php 
                echo  $total_income_invest_direct;
                 
                ?></span></h5></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Total Level Income </h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php 
                echo  $total_income_invest_equity;
                 
                ?></span></h5></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           

            
            <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Total Reward Income</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$ <?php 
                echo  $total_income_invest_reward;
                 
                ?></span></h5></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
             
          
          <!-- /.col -->
          <!--<div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Total Direct Bonus</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$<?php 
                // echo $total_direct_incom;
                ?></span></h5></span>
              </div>
              
            </div>
            
          </div>
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2"><h5>Total Sallery Bonus</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$<?php // echo $total_salary_incom;
                 ?></span></h5></span>
              </div>
              
            </div>
         
          </div>
         
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text ml-2 "><h5>Total Add Funds Bonus</h5></span>
                <span class="info-box-number ml-2"><h5><span class="badge badge-secondary">$<?php // echo $adds_fund_bonus; ?></span></h5>
                 
                  <small></small>
                </span>
              </div>
             
            </div>
            
          </div>-->
          <!-- /.col -->
          
          
          <!-- /.col -->
         
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

         <!-- <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
         -->     
              <!-- /.info-box-content -->
       <!--     </div>           -->
            <!-- /.info-box -->
       <!--   </div> -->
          <!-- /.col -->
          
        </div>
        <!-- /.row -->


        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
         
         <div class="col-lg-4 col-sm-6">
           <div class="info-box mb-3">
              <?php $er="ROI";
  $res=services_SRTART_STOP($er);
 $roi_Status=$res->status;
if($roi_Status==1)
{
  $roi_msg=" btn-success text-white";
  $msg_cldd="ROI Running";
}
elseif ($roi_Status==0) {
  $roi_msg=" btn-danger text-white ";
  $msg_cldd="ROI STOP";
 } 
  # code...

  ?>

              <div class="info-box-content">
                <form action="<?php echo base_url();?>change_status_services" method="POST">
                  <input type="text" name="status" value="<?php echo $roi_Status;?>" style="display:none;">
                  <input type="text" name="service_name" value="ROI" style="display:none;">
                <input type="submit"   class="btn <?php echo $roi_msg;?>" value="<?php  echo $msg_cldd;?>">  
              </form>
              </div>
              <!-- /.info-box-content -->
            </div>
         
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-box mb-3">
             <?php $vaer="Withdraw";
  $re_s=services_SRTART_STOP($vaer);
 $width_Status=$re_s->status;
if($width_Status==1)
{
  $w_idth_msg=" btn-success text-white";
  $msg_c_wldd="Withdraw Running";
}
elseif ($width_Status==0) {
  $w_idth_msg=" btn-danger text-white ";
  $msg_c_wldd="Withdraw STOP";
 } 
  # code...

  ?>
              <div class="info-box-content">
                <form action="<?php echo base_url();?>change_status_services" method="POST">
                  <input type="text" name="status" value="<?php echo $width_Status;?>" style="display:none;">
                  <input type="text" name="service_name" value="Withdraw" style="display:none;">
                <input type="submit"   class="btn <?php echo $w_idth_msg;?>" value="<?php  echo $msg_c_wldd;?>">  
              </form>
          
      </div>
    </div>
          <!-- /.col -->
        </div>
        <!-- <div class="col-lg-4 col-sm-6">
           <div class="info-box mb-3">
              <div class="info-box-content">
                 <button class="btn btn-success" id="club_royalty_send">Club Royalty Send</a>
              </div>
            </div>
        </div> -->
         <div class="col-lg-4 col-sm-6">
           <div class="info-box mb-3">
    

              <div class="info-box-content">
                 <button class="btn btn-success" id="trrade_roi">Daily Growth Send</a>
              </div>
             
            </div>
         
        </div>
        <div class="col-lg-4 col-sm-6">
           <div class="info-box mb-3">
           

              <div class="info-box-content">
                <button class="btn btn-success" id="sallry_booster">Manuall Reward Run</button>
              </div>
              
            </div>
         
        </div> 
        <!--
        <div class="col-lg-4 col-sm-6">
           <div class="info-box mb-3">
              

              <div class="info-box-content">
                 <button class="btn btn-success" id="Level_roi">close level</button>
              </div>
            </div>
         
        </div>
        <div class="col-lg-4 col-sm-6">
           <div class="info-box mb-3">
              

              <div class="info-box-content">
                <button class="btn btn-success" id="Level_booster">close booster</button>
              </div>
              
            </div>
         
        </div>
        <div class="col-lg-4 col-sm-6">
           <div class="info-box mb-3">
           

              <div class="info-box-content">
                <button class="btn btn-success" id="sallry_booster">close sallary</button>
              </div>
              
            </div>
         
        </div> -->
        <!-- /.row -->
      </div>

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="">Me</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b></b> 
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url();?>Assets_s/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo  base_url(); ?>Assets_s/plugins/base_urll.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/admin_custom.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>Assets_s/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>Assets_s/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>Assets_s/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url();?>Assets_s/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>Assets_s/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>Assets_s/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();?>Assets_s/dist/js/pages/dashboard2.js"></script>
<script>
$(document).ready( function () {
    $('#admin_usertable').DataTable();
    });
    </script>
</body>
</html>
