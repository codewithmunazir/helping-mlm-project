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
                                                                        <th>Request Amount</th>
                                                                        <th>Refference No</th>
                                                                        <th>Status</th>
                                                                        <th>Date</th>
                                                                        <th>Hash Id/Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($fundrequest_his as $fund_req_his){
                                                        $status=$fund_req_his['request_status'];
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
                                                                <td>$<?php echo $fund_req_his['request_amt'];?></td>
                                                                <td><?php echo $fund_req_his['hash_id'];?></td>
                                                                <td><?php echo $statuss;?></td>
                                                                <td><?php  echo  $fund_req_his['request_date'];?></td>
                                                                <td><?php  echo  $fund_req_his['remark'];?></td>
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
