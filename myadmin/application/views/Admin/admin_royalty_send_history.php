<?php include('admin_header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Royalty Club  Deposit History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Royalty</a></li>
              <li class="breadcrumb-item active">Royalty Send</li>
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
                  <th scope="col">Date</th>
                  <th scope="col">Get Amount BY BOT </th>
                  <th scope="col">Achiever %</th>
                  <th scope="col">Champion %</th>
                  <th scope="col">Director %</th>
                  <th scope="col">Legend %</th>
                  <th scope="col">Achiever</th>
                  <th scope="col">Champion</th>
                  <th scope="col">Director</th></th>
                  <th scope="col">Legend</th>
                  <th scope="col">Total User</th>
                  </tr>
        
          </thead>
          <tbody>
          <?php foreach($royalthistory as $roideta)
      {?>
         

                      <tr>
                    <td></td>
                    <td><?php  echo $roideta['date'];?></td>
                    <td><?php  echo $roideta['last_month_amount'];?></td>
                    <td><?php  echo $roideta['per_rank1'];?> %</td>
                    <td><?php  echo $roideta['per_rank2'];?> %</td>
                    <td><?php  echo $roideta['per_rank3'];?> %</td>
                    <td><?php  echo $roideta['per_rank4'];?> %</td>
                    <td><?php  echo $roideta['rank1_user'];?></td>
                    <td><?php echo $roideta['rank2_user'];?></td>
                    <td><?php  echo $roideta['rank3_user'];?></td>
                    <td><?php  echo $roideta['rank4_user'];?></td>
                    <td><?php echo $roideta['total_user'];?></td>
                                      
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




