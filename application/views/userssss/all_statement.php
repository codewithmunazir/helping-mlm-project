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
                              <th> Credit </th>
                            <th> Debit </th>
                            <th> Date </th>
                            <th> Status </th>
                            <th> Remark </th>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($sstatement as $sst_value) {
                         if($sst_value['wstatus']=='A12B13')
                         {
                          $Stt='admin';
                         }
                         else{
                          $Stt=$sst_value['wstatus'];
                         }
                          ?>
                          <tr>
                           <td></td>
                            <td>$<?php echo $sst_value['credit'];?></td>
                            <td>$<?php echo $sst_value['debit'];?></td>
                            <td><?php echo $sst_value['wdate'];?></td>
                            <td><?php echo $Stt;?></td>
                            <td><?php echo $sst_value['remark'];?></td>

                          </tr>
                        <?php }?>
                               

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
