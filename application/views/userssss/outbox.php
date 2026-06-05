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
                                                              <th>Date-Time</th>
                                                              <th>Send To</th>
                                                              <th>Subject</th>
                                                              <th>Message</th>
                                                              <th>Action</th>
                                               
                                                      </tr>
                                                </thead>
                                              <tbody>
                                                <?php foreach($outbox as $outmail){
                                            $head_ing=$outmail['description'];
                                            $short_heading= substr($head_ing, 0, 15);
                                            ?>
                                        
                                        <tr><a href="#">
                                            <td></td>     
                                            <td><?php echo $outmail['create_date'];?></td>
                                            <td><?php echo $outmail['mail_to'];?></td>
                                            <td><?php echo $outmail['subject']; ?></td>
                                             <td><?php echo  $short_heading;?>  ... <a href="<?php echo base_url();?>mail/<?php echo $outmail['chat_key'];?>">Show</a></td>
                                             <td>
                                                    <div class="d-flex">
                                                
                                        
                                                        <a href="<?php echo base_url()?>delemail/<?php echo $outmail['chat_key'];?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    </div>                                              
                                                </td>
                                        </a>
                                        </tr><?php } ?>    
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
