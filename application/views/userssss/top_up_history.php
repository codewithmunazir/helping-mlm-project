<?php include('uheader.php');?>
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

<!-- Start Container Fluid -->
<div class="container-xxl">

     <div class="row">
          <div class="col-lg-12">
          <div class="card">
                            <div class="card-body">
                                <h5 class="card-title anchor mb-1" id="overview">
                                   
                                </h5>
                                <p class="sub-header">
                                 Inbox 
                                </p>
                              
                                <div>
                                    <div class="py-3">
                                    <div class="table-responsive">
                                    <table id="datatable-example" class="table table-centered auto-index">
  <thead>
    <tr>                    <th>Sr NO</th>
                            <th>Userid</th>
                            <th>Activation Amount</th>
                            <th>Activation Date</th>
                            <th>Topup By</th>
    </tr>
  </thead>
  <tbody>
  
                             <?php foreach($topup_history as $topup)
      {?>

                      <tr>
                   <td></td>
                    <td><?php echo $topup['registeruser_id'];?></td>
                    <td>$<?php echo $topup['topup_amt'];?></td>
                    <td><?php echo $topup['topupdate'];?></td>
                    <td><?php  echo $topup['topup_by'];?> / <?php echo  getUserDetailsByspon_Id( $topup['topup_by'])->fullname;?></td>
                  <!--  <td><a href="#topuprefund" class="btn btn-danger">Refund</a></td>-->
                      </tr>
                      <?php } ?>
               
                               

  </tbody>
</table>
      </div>
                                </div>
                                    </div>
                                   

                                </div>
                            </div>
                        </div>

          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>
