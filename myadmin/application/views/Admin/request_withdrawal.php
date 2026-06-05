
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
             <a href="<?php echo base_url();?>export" class="btn btn-success">Export File</a>
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
                         <th scope="col">Req.Id</th>
                         <th scope="col">User Id</th>
                         <th scope="col">Name</th>
                         <th scope="col">Email</th>
                         <th scope="col">Mobile</th>
	                     <th scope="col">Withdrawal Amount</th>
                       <th scope="col">Success</th>
                       <th scope="col">Balance</th>
                       
                       <th scope="col">Request By</th>
                       <th scope="col">Final Amount</th>
                       <!-- <th scope="col">Wallet</th> -->
	                     <th scope="col"> Date</th>
	                     <th scope="col">Status</th>
                       <th scope="col">USDT Address</th>
                       <!-- <th scope="col">BANK</th>
                       <th scope="col">Ac Holder</th>
                       <th scope="col">Account No</th>
                       <th scope="col">IFSC</th> -->
	                    <th scope="col">Action</th>
	                  </tr>
                        

                        </tr>
                    </thead>
                    <tbody>
                    
                       <?php foreach($withdrawal_all as $withdrawal_h){
                       if($withdrawal_h['eth_add']=="INR")
                       {
                         $class="text-success"; 
                         $final_amt=$withdrawal_h['inr_amtt']-$withdrawal_h['inr_deduct_amout'];
                         $amtin_inr=" ( ".$final_amt." ) ";
                         $disble="";
                       }
                       else 
                       {
                         $class="text-danger";
                         $dol_final= $withdrawal_h['request_amt']- $withdrawal_h['Doular_deduct_amont'];
                         $amtin_inr=" $".$dol_final;
                         $disble="disabled";
                       }
               $status=$withdrawal_h['request_status'];
              if( $status === 2)
              {
              $statuss= "On pending";
              $msg="";
              }
              
              else{
                $statuss="none";
                $msg="";

              }
   // $detail_user=getUserDetailsByspon_Id($withdrawal_h['registeruser_id']); 
   //  $email=$detail_user->email;
   //  $mobile=$detail_user->mobile;
   //  $fullname=$detail_user->fullname;
        ?>

                      <tr <?php echo $msg;?>>
                   <td><?php echo $withdrawal_h['id'];?></td>
                    <td><?php echo $withdrawal_h['registeruser_id'];?></td>
                    <td><?php echo $withdrawal_h['fullname'];?></td>
                    <td><?php echo $withdrawal_h['email'];?></td>
                    <td><?php echo $withdrawal_h['mobile'];?></td>
                      
                    <td>$<?php echo $withdrawal_h['request_amt'];?></td>
                    <td>$ <?php echo get_success_take_amout($withdrawal_h['id']);?></td>
                     <td>$ <?php echo ($withdrawal_h['request_amt']-get_success_take_amout($withdrawal_h['id']));?></td>
                    <td><?php $type= $withdrawal_h['eth_add'];
                    if($type ==null)
                      {
                        echo '<span style="color:green;">admin</span>';
                      }else{
                        echo '';}?></td>
                    <td class="<?php echo $class;?>"><b><?php echo $amtin_inr;?></b></td>
                    <!-- <td><?php // echo $withdrawal_h['wallet_namew'];?></td> -->
                    <td><?php echo $withdrawal_h['request_date'];?></td>
                  
                    <td><?php echo "On pending";?></td>
                    <td><?php echo $withdrawal_h['usdt_add'];?></td>
                    <!-- <td><?php //echo $withdrawal_h['bank_name'];?></td>
                    <td><?php //echo $withdrawal_h['acc_holder_name'];?></td>
                    <td><?php //echo $withdrawal_h['acc_no'];?></td>
                    <td><?php //echo $withdrawal_h['ifsc'];?></td> -->
                   <?php  $userTypee= $withdrawal_h['eth_add']; 
                   if ($userTypee == null) {
                        $vcvl = '<a class="btn btn-success">Admin</a>';
                    } else {
                        $vcvl = '<a onclick="return withdrawalAction(' . $withdrawal_h['id'] . ');" class="btn btn-danger">Reject</a>';
                    }?>
                    <td><?php echo $vcvl;?></td>
                    
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
		<div class="modal fade" id="actionwithdrawal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Action on Requeest</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
           
		      </div>
		      <form action="<?php echo base_url();?>withdrawal-request_admin" method="post" onsubmit="return confirmSubmit(event)" >
		      <div class="modal-body">
             <div class="row">
              
              <div class="col-sm-12"  id="bankname"></div>
              <div class="col-sm-12" id="Holder_acc"></div>
              <div class="col-sm-12" id="Account_no"></div>
              <div class="col-sm-12" id="ifsc_no"> </div>
              <div class="col-sm-12" id="usdt_no"></div>
              <div class="col-sm-12">
              <label><b>CURRENCY TYPE </b></label>
                <b><span class="text-primary  p-2" id="amountty"></span></b>
              </div>
              <div class="col-sm-12">
              <label><b>Amount </b></label>
                <b><span class="text-primary p-2" id="reqamt"></span></b>
              </div>
              <div class="col-sm-12" id="reqamtinr">
              
              </div>
              
            </div>
            <hr>
		      	<div class="row">
		      		<div class="col-sm-12">
		      			<div class="form-group">
		      				<input type="hidden" name="id" id="withdwal_id">
		      			</div>
		      		</div>
            
		      		<div class="col-sm-12">
		      		 	                      <div class="form-group">
                                        <label><b>ON ACTION</b></label>
                                        <input type="hidden" name="action" value="0">
                        <!-- <div class="form-check">
                          <input class="form-check-input" type="radio" name="action" value="0">
                          <label class="form-check-label">Accept</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="action" value="0" >
                          <label class="form-check-label">Reject</label>
                        </div> -->
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
		      		 	      <div class="form-group">
		                   	   <label> Referance / Hash Id / Reason</label>
		                      <input type="text" class="form-control" name="refrence" required>
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
<script>function confirmSubmit(event) {
    event.preventDefault(); // Stop form submission
    let confirmation = confirm("Are you sure you want to submit this form?");
    if (confirmation) {
        event.target.submit(); // If confirmed, submit the form
}
}
</script>
<?php include('admin_footer.php');?>




