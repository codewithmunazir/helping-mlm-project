
<?php include('admin_header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Inbox</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Inbox</a></li>
              <li class="breadcrumb-item active">Inbox</li>
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
                <table class="table table-dark auto-index" id="Mytable">
                    <thead>

                        <tr class="bg-primary">
                         <th scope="col">SI.No</th>
                         <th scope="col">User Id</th>
	                     <th scope="col">Date</th>
	                     <th scope="col">Subject</th>
                       <th scope="col">Message</th>
	                     <th scope="col">Reply</th>
                       
	                  </tr>    
                    </thead>
                    <tbody>
                    
                       <?php foreach($inbox_request_all as $inbox_request){
             
        ?>

                      <tr>
                    <td></td>
                    <td><?php echo $inbox_request['registeruser_id'];?></td>
                    <td>$<?php echo $inbox_request['create_date'];?></td>
                    <td><?php echo $inbox_request['subject'];?></td>
                    <td><?php echo $inbox_request['description'];?></td>
                    
                    <td><a  href="<?php echo base_url();?>reply_email/<?php echo $inbox_request['chat_key'];?>" class="btn btn-info " >Reply</a></td>
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

		<!-- Modal -->
		
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




