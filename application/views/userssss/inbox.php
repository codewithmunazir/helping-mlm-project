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
                                           
                            <th>Date-Time</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Response</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($inbox_box as $inboxdata)
                                        {?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $inboxdata['create_date'];?></td>
                                            <td><?php echo $inboxdata['subject'];?></td>
                                            <td><?php echo $inboxdata['description'];?></td>
                                            <th><?php echo $inboxdata['reply_des'];?></th>
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
