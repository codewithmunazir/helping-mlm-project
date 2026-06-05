
<?php include('admin_header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Withdrawal Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Fund</a></li>
              <li class="breadcrumb-item active">withdrawal Request</li>
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
                
                <table class="table table-dark" id="Mytable">
                    <thead>

                        <tr class="bg-primary">
                         <th scope="col">SI.No</th>
                         <th scope="col">Royalty</th>
                         <th scope="col">Percent %

	                     <th scope="col">Action</th>
	                  </tr>
                        

                        </tr>
                    </thead>
                    <tbody>
                    
                       <?php
                       $coount=1; 
                       foreach($royal_percent_all as $royal_h){
                       ?>

                      <tr>
                   <td><?php echo $coount++;?></td>
                    <td><?php echo $royal_h['rank'];?></td>
                    <td><?php echo $royal_h['perce_nt'];;?></td>
                    
                    <td><a onclick="return percent_Action('<?php echo $royal_h['id'] ?>');" class="btn btn-info " >Edit</a></td>
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
		<div class="modal fade" id="percent_royal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Edit Percent %</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
           
		      </div>
		      <form action="<?php echo base_url();?>royalty-list" method="post">
		      <div class="modal-body">
             <div class="row">
              
              <div class="col-sm-12">
              <label><b>Royalty Name </b></label>
                 <b><span class="text-primary p-2" id="royaltiname"></span></b>
              </div>
              
              
            </div>
            <hr>
		      	<div class="row">
		      		<div class="col-sm-12">
		      			<div class="form-group">
		      				<input type="hidden" name="id" id="percent_id">
		      			</div>
		      		</div>
            
                    <div class="col-sm-12">
		      		 	      <div class="form-group">
		                   	   <label>Royalty % </label>
		                      <input type="text" class="form-control" name="perce_nt" id="royatiper">
                     	</div>
                    </div>
                   <!-- <div class="col-sm-12">
		      		 	      <div class="form-group">
		                   	   <label>Remark / Comment</label>
		                      <input type="text" class="form-control" name="comment" >
                     	</div>
                    </div>-->
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <input type="submit" class="btn btn-primary" value="Submit">
		    </div>
		  </form>
		    </div>
		  </div>
		</div>
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




