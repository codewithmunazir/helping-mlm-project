
<?php include('admin_header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fund Tranfer P2P History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Fund</a></li>
              <li class="breadcrumb-item active">P2P History</li>
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
        	<div class="col-sm-12">
            
          </div>
        </div>
        <div class="row m-aoto">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="crad-header">
                	<?php
          if($smsg=$this->session->flashdata('msg_success')) {
                $smsg_class=$this->session->flashdata('msg_class');?>
                       <div class="<?php echo $smsg_class;?>" role="alert">

                     <?= $smsg; ?>
                </div>
              <?php } ?>
                </div>
                <div class="card-body">
                <table class="table table-dark auto-index " id="Mytable">
                    <thead>

                        <tr class="bg-primary">
                         <th scope="col">SI.No</th>
                         <th scope="col">Sender</th>
                         <th scope="col">Name</th>
	                     <th scope="col">Withdrawal Amountt</th>
	                     <th scope="col"> Date</th>
	                     <th scope="col">Status</th>
                       <th scope="col">Reciever</th>
	                     
	                  </tr>
                        

                        </tr>
                    </thead>
                    <tbody>
                    
                       <?php foreach($getfund_request_exicute as $funds_request){

                           $detail_user=getUserDetailsByspon_Id($funds_request['registeruser_id']);
                           $fullname=$detail_user->fullname;

               $status=$funds_request['request_status'];
             
              if($status == 1) {
               $statuss= "Success";
               $msg='class="bg-success"';
              }
               elseif ($status == 0) {
                $statuss= "Reject";
                 $msg='class="bg-danger"';
              }
              else{
                $statuss="none";
                $msg="";

              }


        ?>

                      <tr <?php echo $msg;?>>
                    <td></td>
                    <td><?php echo $funds_request['registeruser_id'];?></td>
                    <td><?php echo $fullname;?></td>
                    <td><?php echo $funds_request['request_amt'];?></td>
                    <td><?php echo $funds_request['request_date'];?></td>
                    <td><?php echo $statuss;?></td>
                    <td><?php echo $funds_request['get_user_id'];?></td>
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
    <!-- start modal --><!-- Button trigger modal -->


    <!-- end modal -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<?php include('admin_footer.php');?>




