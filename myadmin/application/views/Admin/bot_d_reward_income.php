<?php include('admin_header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bot Reward Income  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">BOT Income</a></li>
              <li class="breadcrumb-item active">Reward Income
            </li>
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
        <div class="row m-aoto">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="crad-header bg-info"><p></p></div>
                <div class="card-body">
                <table class="table table-dark auto-index" id="Mytable">
                   <thead>
                  <tr>
                  <th scope="col">SI.No</th>
                  <th scope="col">User Id</th>
                      <th scope="col">Credit</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Activation Amt</th>
                      
                  
                  </tr>
        
          </thead>
          <tbody>
          
<?php
 foreach($bot_reward_income_history as $boostdeta)
 {
   
    ?>
                 <tr>
               <td></td>
               <td><?php  echo $boostdeta['registeruser_id'];?></td>
               <td>$<?php echo $boostdeta['credit'];?></td>
               <td><?php  echo $boostdeta['wdate'];?></td>
               <td><?php echo $boostdeta['wstatus'];?></td>
               <td><?php echo $boostdeta['remark'];?></td>
               
                 </tr>
                 <?php } ?>
    </tbody>
                </table>
                </div>
            </div>
        </div>
                  <!-- /.col -->
        </div>
        <!-- /.row -->


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

<?php include('admin_footer.php');?>




