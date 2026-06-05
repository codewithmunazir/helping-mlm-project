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
               <?php
                  if(!empty(get_admi()->Usdt_Qr))
                  {
                    $filees=get_admi()->Usdt_Qr;
                  }
                  else{
                    $filees="qr.png";
                  }
                  ?>
                         <div class="crad-header mt-2 m-auto text-justify">
                            <span> <img src="<?php echo base_url();?>myadmin/upload/<?php echo $filees;?>" alt="not found" height="250" width="250"></span>
                            <br>
                            <br>
                            <?php if(!empty(get_admi()->Usdt_Address))
                            {
                                echo ' <button onclick="myUsdtaddrss()" class="btn btn-info">Copy USDT Address</button><span id="sdlhowcopy" class="text-success mt-2"></span>';
                            }
                           ?>
                      <input type="text" id="upaddiff_Id" value="<?php print_r(get_admi()->Usdt_Address);?>"  style="display:none">

                            <p text-justify p-3> <?php print_r(get_admi()->Usdt_Address);?></p>
                          </div>
                            <script>
                function myUsdtaddrss() {
    // Get the text field
    var copyText = document.getElementById("upaddiff_Id");
  
    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
  
    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
  $("#sdlhowcopy").html('<b>Copied !</b>');
    
    // Alert the copied text
    //alert("Copied the text: " + copyText.value);
  }


                </script>
                  <?php if($msg=$this->session->flashdata('msg_invalid')) {
                $msg_class=$this->session->flashdata('msg_class');?>
                <div class="input-group mb-3 alert <?php echo $msg_class;?>">
                     <?= $msg; ?>
                </div>
              <?php } if($smsg=$this->session->flashdata('msg_success')) {
                $smsg_class=$this->session->flashdata('msg_class');?>
                <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                     <?= $smsg; ?>
                </div>
              <?php } ?>
               <form class="forms-sample" action="<?php echo base_url();?>funds-request"  method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                        <div class="form-group mb-3">
                                        
                                            <label class="mb-1" for="diposiramt"><strong>Deposit Amount ( $)</strong></label>
                                            <?php echo form_error('diposiramt'); ?> 
                                             <input class="form-control" type="text" id="diposiramt" name="diposiramt" placeholder="Deposit in $">

                                        </div>
                                       
                                        
                                        
                                        <div class="form-group mb-3">
                                            <label class="mb-1" for="Utr_no"><strong>Hash Id.</strong></label>
                                            <?php echo form_error('Utr_no'); ?>
                                            <?php echo form_input(['class'=>'form-control','type'=>'text','id'=>'Utr_no', 'name'=>'Utr_no','placeholder'=>'Enter Hash Id']);?>
                                        </div>
                                      
                                        <div class="form-group mb-3">
                                            <label class="mb-1" for="upload"><strong>Upload Reciept</strong></label>
                                            <?php echo form_error('file'); //'name'=>'userfile'?>
                                            <?php echo form_input(['class'=>'form-control','type'=>'file','id'=>'upload', 'name'=>'file']);?>
                                        
                                        </div>
                                        
                            </div>
                            <div class="crad-footer mb-3 p-2">
                                <input type="submit" value="Amount Request" class="btn btn-primary">

                            </div>
                          </form>
        
                </div>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>