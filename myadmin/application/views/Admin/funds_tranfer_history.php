<?php include('admin_header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fund Transfer History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Fund</a></li>
              <li class="breadcrumb-item active">Fund Transfer</li>
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

                        <tr class="bg-primary">
                        <th scope="col">SI.No</th>
                     
                        <th scope="col">Credit</th>
                        <th scope="col">Debit</th>
                        <th scope="col"> Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Remark</th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i=0;
                      foreach($fundHistory as $walletfunds)
                      {
                        $i++;
                      /* $adminr=$walletfunds['wstatus'];
                       $admins=$walletfunds['registeruser_id'];
                       if($adminr=="A12B13")
                       {
                        $memberId=$admins;
                       }
                       else{
                        $memberId=$adminr;
                       }
                       //$admins=$walletfunds['registeruser_id'];

                      
                     */
                      //`(`withdrawal_method`, `id`, `registeruser_id`, `credit`, ``, `wdate`, `wstatus`, `remark`, `admin_charge`, `tds`, `isactive
                      ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $walletfunds['credit'];?></td>
                            <td><?php echo $walletfunds['debit'];?></td>
                            <td><?php echo $walletfunds['wdate'];?></td>
                          
                            <td><?php echo "status"; //$walletfunds[];?></td>
                            
                            <td><?php echo "remark"; //$walletfunds[];?></td>
                            
                            

                        </tr>
                        <?php  } ?>
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




