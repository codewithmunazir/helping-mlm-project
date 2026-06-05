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
                                           <th>Sr no.</th>
                                             <th >Userid</th>
                                            <th >Full Name</th>
                                            <th >Mobile</th>
                                            <th >Sponsor</th>
                                            <th >Joining Date</th>
                                            <th >Deposit Amount</th>
                                            <th> Team Business</th>
                                 
    </tr>
  </thead>
  <tbody>
  <?php 
                  $count=0; 
                      foreach($myreffuser as $myref)
                         {
                            $count++;
                            
                            $yt=gettopopsum($myref['user_id']);
                            if(!empty($yt))
                            {
                                $topamt=$yt;
                            }
                            else{
                                $topamt="0.00";
                            }
                            $getuser_d=getUserDetailsByspon_Id($myref['user_id']);
                            $myteambus=$getuser_d->teambusiness;
                            $gemybus=gettopopsum($myref['user_id']);
                            if(!empty($gemybus))
                            {
                                if (is_int($gemybus)) {
                
                                    $roi_income=$gemybus;
                                  }
                                else
                                {
                                  $roi_income=round($gemybus, 2);
                                }
                                $finalbus=$myteambus+$roi_income;
                            }
                            else{
                                $finalbus=$myteambus;
                            }
                           
                            
                    

                            ?>
                            <tr>
                               <td></td>
                                <td><?php echo $myref['user_id'];?></td>
                                <td><?php echo $myref['fullname'];?></td>
                                <td><?php echo $myref['mobile'];?></td>

                                <td><?php echo $myref['sponserd_id'];?></td>
                                <td><?php echo $myref['register_date'];?></td>
                                <td><span class="badge badge-primary">$<?php echo  $topamt;?></span></td>
                                <td><span class="badge badge-primary">$<?php echo  $finalbus;?></span> </th>
                               
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
