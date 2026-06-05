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
    <tr>
                             <th>Sr No</th>              
                           <th>Withdrawal Amount</th>
                            <th>Deduction</th>
                            <th>Net Amount</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Wallet</th>
                            <th>Status</th>
                            <th>Hash Id/Remark</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($withdrawal_history as $withdrawal_h){
               $status=$withdrawal_h['request_status'];
              if( $status == 2)
              {
              $statuss= "On pending";
              }
              elseif ($status == 1) {
               $statuss= "Success";
              }
               elseif ($status == 0) {
                $statuss= "Reject";
              }
              else{
                $statuss="none";
              }

        ?>

                      <tr>
                    <td></td>
                    <td>$<?php echo $withdrawal_h['request_amt'];?></td>
                    <td>$<?php echo $withdrawal_h['decuct_amt'];?></td>
                    <td>$<?php echo ($withdrawal_h['request_amt']-$withdrawal_h['decuct_amt']);?></td>
                    <td><?php echo $withdrawal_h['request_date'];?></td>
                    <td><?php  echo  $withdrawal_h['eth_add'];?></td>
                    <td><?php  echo  $withdrawal_h['wallet_namew'];?></td>
                    <td><?php echo $statuss;?></td>
                    <td><?php echo $withdrawal_h['comment'];?></td>
                   
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
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>
