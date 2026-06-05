<?php include('admin_header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">All user</a></li>
              <li class="breadcrumb-item active">Users List</li>
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
          <?php         $myurl = base_url();
$baseUrlll = rtrim(dirname($myurl), '/') . '/';
?>

         <div class="col-lg-12 col-12">

          <table class="table table-dark"  id="admin_usertable" style="font-size:14px;">
          <thead>
                  <tr>
                     <th scope="col">SI.No</th>
                    <!-- <th scope="col">Userid</th>-->
                     <th scope="col">UserID</th>
                     <th scope="col">Sponser</th>
                     <th scope="col">&nbsp;&nbsp;&nbsp;FullName&nbsp;&nbsp;&nbsp;</th>                    
                     <th scope="col">Mobile</th>
                     <th scope="col">Password</th>
                     <th scope="col">Tnx Password</th>
                   
                     <th scope="col">Investment</th>
                     <th scope="col">Register_at</th>
                     <th scope="col">Provide</th>
                     <th scope="col">Get</th>
                     <th scope="col">Email</th>
                     <th scope="col" class="text-center">Edit</th>
                      <th scope="col" class="text-center">Block</th>
                  </tr>
                     </thead>
                      <tbody>
                             <?php 
                             $countyu=count_tableuser_rows();
                             foreach($allUsers as $user_list)                             
                           {

                            $istopup=isuserTopup($user_list['user_id']);
                            if(empty($istopup))
                            {
                              $kyc="Inactive";
                              $kmsg="text-danger";
                              $topupdate="0000-00-00";
                              $topam_t="0.00";
                              //$topdate=
                            }
                            elseif(!empty($istopup)) {

                              $kyc="Active";
                            $kmsg="text-success";
                            $topupdate=$istopup->topupdate;
                            $topam_t=Sum_all_top_user($user_list['user_id']);
                            
                          }

  
                            $istatus=$user_list['isactive'];
                            if($istatus==1){
                              $activity="Block";
                              $actmsg="btn-success";
                            }
                            elseif($istatus==0) {
                             $activity="Unblock";
                              $actmsg="btn-warning"; 
                            }
                           // $string = 'ajsdbvv323@!#$';
$encoded_string = urlencode($user_list['password']);

                           //echo $user_list['id'];  ?>
                           <!-- <?php //echo base_url();?>User-->

                      <tr>
                    <td><?php echo $countyu--;?></td>
                    <td><a href="<?php  echo $baseUrlll;?>godirect/<?php echo $user_list['user_id'];?>/<?php echo $encoded_string?>" target="_blank"><?php echo $user_list['user_id'];?></a></td>
                    <td><?php echo $user_list['sponserd_id'];?></td>
                    <td><?php echo $user_list['fullname'];?></td>
                    
                     <td><?php echo $user_list['mobile'];?></td>

                      
                       <td><?php echo $user_list['password'];?></td>
                       <td><?php echo $user_list['txn_password'];?></td>
                       <td><span class="<?php echo $kmsg; ?>"><?php echo $kyc; ?></span></td>
                       <!-- <td><span class="<?php// echo $kmsg; ?>">$<?php// echo $topam_t; ?></span></td> -->
                       <td> <?php echo $user_list['register_date']; ?></td>
                       <td> <?php echo send_provideer_amout( $user_list['user_id']); ?> / <?php echo my_commite_request( $user_list['user_id']); ?> </td>
                        <td> <?php echo get_take_amout_comiit( $user_list['user_id']); ?> / <?php echo all_get_requsstt_widh( $user_list['user_id']); ?> </td>
                       
                      
                       <td><?php echo $user_list['email'];?></td>
                       <td class="text-center"><a href="<?php echo base_url();?>update_user_profile/<?php echo $user_list['user_id'] ?>" class="btn btn-info m-1 p-1">Edit</a></td>
                       <td class="text-center"><a onclick="return block_unblok('<?php echo $user_list['user_id'] ?>');"  class="btn <?php echo $actmsg;?>"><?php echo $activity;?></a></td>
                    
                      </tr>
                      <?php } ?>
                  </tbody>
                 
                  
                </table>
          <!-- /.col -->
        </div>
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
    $('#admin_usertable').DataTable({
            "order": [[ 0, "desc" ]] // Sort by the first column (ID) in descending order
        });
    });
   
    </script>
</body>
</html>
