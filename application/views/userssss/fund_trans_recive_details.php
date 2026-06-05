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
                                                                <th>SR No.</th>            
                                                                <th>Credit</th>
                                                                <th>Debit</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($fundTran_recieve as $fundschange)
                                        {?>

                                                        <tr>
                                                    <td></td>
                                                        <td>$<?php echo $fundschange['credit'];?></td>
                                                        <td>$<?php echo $fundschange['debit'];?></td>
                                                        <td><?php echo $fundschange['wdate'];?></td>
                                                        <td><?php  if($fundschange['wstatus']==='A12B13'){
                                                            echo "Recieve From Admin";
                                                        }
                                                            else{
                                                                echo $fundschange['wstatus'];
                                                            }?></td>
                                                        <td><?php echo  $fundschange['to_Id'];?></td>
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
