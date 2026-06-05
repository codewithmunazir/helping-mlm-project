
<?php include('admin_header.php');?>
<style type="text/css">
    /* Remove the default radio button appearance */
/* Remove the default radio button appearance */
/* Remove the default radio button appearance */
.success-radio {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    
    width: 20px;   /* Width of the rectangle */
    height: 20px;  /* Height of the rectangle */
    border: 2px solid #ccc;  /* Border color (light gray by default) */
    background-color: white; /* White background */
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease; /* Smooth transition effect */
}

/* When the radio is checked */
.success-radio:checked {
    background-color: white; /* White background when checked */
    border-color: #28a745;  /* Green border when checked */
}

/* Create the inner checkmark when checked */
.success-radio:checked::after {
    content: '✓';   /* Checkmark symbol */
    position: absolute;
    top: 50%;       /* Vertically center */
    left: 50%;      /* Horizontally center */
    transform: translate(-50%, -50%);  /* Offset by 50% to perfectly center */
    font-size: 14px;   /* Size of the checkmark */
    color: #28a745;    /* Checkmark color (green) */
    font-weight: bold;
}

/* Optional: Add hover effect */
.success-radio:hover {
    background-color: #f1f1f1; /* Light gray background on hover */
}



</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $tittle;?></h1>
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
        <form action="<?= base_url('commitments-send'); ?>" method="post">
        <div class="row m-aoto">
        	<div class="col-lg-12 col-sm-12 m auto">
                        <div class="card">
                                <div class="card-body"> 
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="link_amt">Enter Amount</label>
                                                <input type="text" placeholder="Enter Link Amount" name="link_amt" id="link_amt" class="form-control">
                                            </div>
                                           
                                        </div>
                                        <div class="col-2">   <label for="link_amt"> </label><div class="form-group"> <input type="submit" class="btn btn-success" value="Send Link"></div></div>
                                        
                                        <div class="col-6">
                                            <div class="mt-3 mb-3">
                     <?php  if($smsg=$this->session->flashdata('msg_success')) {
                $smsg_class=$this->session->flashdata('msg_class');?>
                <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                     <?= $smsg; ?>
                </div>
              <?php } ?>
                  </div>
                                            <p> <?php echo form_error('link_amt'); ?></p>
                                            <p><?= form_error('id_provide[]'); ?></p>
                                            <p> <?= form_error('ids[]'); ?></p>

                                        </div>
                                    </div>
                                    
                                
                                </div>
                      </div>
        </div></div>
        <div class="row m-aoto">
        <div class="col-lg-6 ">
            <div class="card">
                <div class="crad-header">
                     <h2 class="ml-3">Provided Help</h2>
                </div>
                <div class="card-body">
                        <table class="table table-responsive table-dark" id="Mytable">
                            <thead>
                                <tr class="bg-primary">
                                 <th scope="col">SI.No</th>
                                 <th scope="col">Select</th>
                                 <th scope="col">UserId</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Commit</th>
                                 <th scope="col">Balance</th>
                                 <th scope="col">Date</th>
        	                  </tr>    
                            </thead>
                            <tbody>
                           <tr>
                               <?php 
                               $provid=1;
                               foreach($fund_provide_all as $fund_request){
                                 $detail_user=getUserDetailsByspon_Id($fund_request['registeruser_id']);
                                $fullname=$detail_user->fullname;
                                $isactive = $detail_user->isactive;

                                    // Skip the row if the user is not active
                                    if ($isactive == 0) {
                                        continue;
                                    }
                                
                                ?>
                            <td><?php echo $provid++;?></td>
                            <td><!-- Radio button instead of checkbox, ensure name is the same for all radio buttons -->
                                <input   type="checkbox" class="success-checkbox bg-primary" name="id_provide[]" value="<?php echo $fund_request['id'];?>">
                    <!-- <input type="radio" class="success-radio bg-white"  name="id_provide" value="<?php echo $fund_request['id'];?>"></td> -->
                            <td><?php echo $fund_request['registeruser_id'];?></td>
                            <td><?php echo $fullname;?></td>
                            <td>$<?php echo $fund_request['request_amount'];?></td>
                            
                            <td>$ <?php  $p_regiter_id=$fund_request['registeruser_id'];
                            $commitemnt_id=$fund_request['commit_id'];
                                                         $get_amt_pentding_con=pro_balace($p_regiter_id, $commitemnt_id);
                            $request_amm=$fund_request['request_amount'];
                            $pro_ballace=$request_amm-$get_amt_pentding_con;
                            echo $pro_ballace;?></td>
                            <td><?php echo $fund_request['wdate'];?></td>
                            </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ">
            <div class="card">
                <div class="crad-header">
                    <h2 class="ml-3">Get Help</h2>
                </div>
                <div class="card-body">
                <table class="table table-responsive table-dark" id="Mytable_ty">
                    <thead>
                        <tr class="bg-info">
                         <th scope="col">SI.No</th>
                         <th scope="col">Select</th>
                         <th scope="col">UserId</th>
                         <th scope="col">Name</th>
                         <th scope="col">Balance</th>
	                     <th scope="col">Date</th>
	                  </tr>    
                    </thead>
                    <tbody>
                    
                       <?php 
                       $gett=1;
                       foreach($fund_help_all as $fund_get_request){
                                $detail_user=getUserDetailsByspon_Id($fund_get_request['registeruser_id']);
                                    $fullname=$detail_user->fullname;
                                     $isssactive = $detail_user->isactive;

                                    // Skip the row if the user is not active
                                    if ($isssactive == 0) {
                                        continue;
                                    }


                                    ?>

                     <tr>
                    <td><?php echo $gett++;?></td>
                    <td><input   type="checkbox" class="success-checkbox bg-primary" name="ids[]" value="<?php echo $fund_get_request['id'];?>"></td>
                    <td><?php echo $fund_get_request['registeruser_id'];?></td>
                    <td><?php echo $fullname;?></td>
                    <td>$<?php 

                    //echo $fund_get_request['request_amt'];
                    $g_regiter_id=$fund_get_request['registeruser_id'];
                            $widht_id=$fund_get_request['id'];
                            $getget_amt_pentding_con=get_get_help_balance($g_regiter_id, $widht_id);
                            $requestwamt_amm=$fund_get_request['request_amt'];
                            $get_bballace=$requestwamt_amm-$getget_amt_pentding_con;
                            echo $get_bballace;?></td>
                    <td><?php echo $fund_get_request['request_date'];?></td>
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
</form>

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- start modal --><!-- Button trigger modal -->

		<!-- Modal -->
		
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<?php include('admin_footer.php');?>




