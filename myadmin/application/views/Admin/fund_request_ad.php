
<?php include('admin_header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Funds Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Fund</a></li>
              <li class="breadcrumb-item active">Fund Request</li>
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
                         <th scope="col">Name</th>
	                     <th scope="col">Fund Amount</th>
	                     <th scope="col">Type Request</th>
                       <th scope="col">Hash Id / UTR no.</th>
	                     <th scope="col">Date</th>
                         <th scope="col">status</th>
                         <th scope="col">Reciept</th>
	                     <th scope="col">Action</th>
	                  </tr>    
                    </thead>
                    <tbody>
                    
                       <?php foreach($fund_request_all as $fund_request){
       $detail_user=getUserDetailsByspon_Id($fund_request['registeruser_id']);
       $fullname=$detail_user->fullname;
               $status=$fund_request['request_status'];
              if( $status == 2)
              {
              $statuss= "On pending";
              $msg="";
              }
              
              else{
                $statuss="none";
                $msg="";

              }
             


        ?>

                      <tr <?php echo $msg;?>>
                    <td></td>
                    <td><?php echo $fund_request['registeruser_id'];?></td>
                    <td><?php echo $fullname;?></td>
                    <td>$<?php echo $fund_request['request_amt'];?></td>
                    <td><?php echo $fund_request['fund_type'];
                    if($fund_request['inr_amt']>0)
                    {
                      echo  "( ₹ ".$fund_request['inr_amt']." )";
                    }?></td>
                    <td><?php  if(!empty($fund_request['utr']))
                    {
                      $referance=$fund_request['utr'];
                    }
                    elseif(!empty($fund_request['hash_id']))
                    {
                      $referance=$fund_request['hash_id'];
                    }
                    else{
                      $referance="";
                    }
                    echo $referance;?></td>
                    <td><?php echo $fund_request['request_date'];?></td>
                    
                    <td><?php echo $statuss;?></td>
                    <td><?php if(!empty($fund_request['reciept']))
                    {
                      $recitt=$fund_request['reciept'];
                      $recit=base_url().'../uploads_users/'.$recitt;
                      $image='<img src="'.$recit.'" alt="not found" height="100" width="100">';
                    }
                    else{
                     $image="";
                    }?>
                   <?php echo $image;?></td>
                    <td><a onclick="return funcdrequestAction('<?php echo $fund_request['id'] ?>');" class="btn btn-info " >click</a></td>
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
		<div class="modal fade" id="actionfund_rquest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Action on Requiest</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
           
		      </div>
		      <form action="<?php echo base_url();?>fund-request_admin" method="post">
		      <div class="modal-body">
             <div class="row">
              
             
              
            </div>
            <hr>
		      	<div class="row">
		      		<div class="col-sm-12">
		      			<div class="form-group">
		      				<input type="hidden" name="id" id="fundrequest_id">
		      			</div>
		      		</div>
		      		<div class="col-sm-12">
		      		 	                      <div class="form-group">
                                        <label><b>ON ACTION</b></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="action" value="1">
                          <label class="form-check-label">Accept</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="action" value="0" >
                          <label class="form-check-label">Reject</label>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
		      		 	<div class="form-group">
		                   	   <label>UTR No. / Refence</label>
		                      <input type="text" class="form-control" name="refrence" >
		                     
		                   	
                     	</div>
                    </div>
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




