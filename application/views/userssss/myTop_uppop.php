<?php include('uheader.php');?>
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

<!-- Start Container Fluid -->
<div class="container-xxl">
</div>
<div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                       <?php
                                         $getdtails=Last_top_Details_po_up($top_up_id);
                                         $datetime = $getdtails->topupdate;// Example datetime from database
                                            list($date, $time) = explode(' ', $datetime);

                                        // echo "Date: " . $date;  // Outputs: 2024-10-09
                                       // echo "Time: " . $time;  // Outputs: 14:30:00
                                                    $spo_id= $getdtails->registeruser_id;
                                        $usrdetailstts=getUserDetailsByspon_Id($spo_id);
?>
                                         
                                                <div class="modal-body text-center mt-3">
                                                    <div style="border: 2px solid #ff6c2f;">
                                                        <div style="margin-top:10px; margin-bottom:10px; margin: 10px;">
                                                       
                                               <h3><span style="color:#7ED957;"><b>Congratulation!<b></span></h3>
                                                <h4>Your Account Is Successfully Activated With<br>
comapany
</h4>
                                               <h4>User Name: <?php echo $usrdetailstts->fullname;?></h4>
                                               
                                                 <h4><?php echo "Your User ID: ";?> <?php echo $getdtails->registeruser_id;?></h4>
                                                
                                                  <h4>Package <span style="color: #ff6c2f;"><b> ($<?php echo $getdtails->topup_amt;?>)</b></span></h4>
                                                 
                                                        <h4>Topup Date : <?php echo $date;?></h4>
                                                         <h4>Topup Time : <?php echo $time;?></h4>
                                                         <img src="<?php echo base_url();?>User_assets/assets/images/logo-dark.png" class="img-fluid" alt="logo dark">
                                                        
                                                    </div>
                                                    </div>
                                                     
                                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <a href="<?php echo base_url();?>top-up" class="btn btn-primary " baseurl="<?php echo base_url();?>top-up"  id="redir" style="background-color: #7ED957;" ><b>OK</b></a>
                                                   
                                                </div>
                            </div>
                        </div>
                    </div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>
       <script>
        document.addEventListener("click", function() {
       var dataInfo=ubase_Url+'top-up'; 
    window.location.href =dataInfo; // Redirects to the homepage
});
    $(document).ready(function(){
     
        $("#exampleModalCenteredScrollable").modal('show');

        //$("#exampleModalLong").modal('show');
    });
</script>