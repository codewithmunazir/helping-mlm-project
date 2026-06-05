<?php include('uheader.php');?>
<style>
    .addressimg{
        width: auto;
        object-fit: contain;
        height: 200px;
        border: 6px solid black;
        border-radius: 30px;
    }
    .addressimg1{
        width: 100%;
        height: 300px;
        object-fit: contain;
        border-radius: 30px;
    }
    .blahimage{
        margin-bottom: 18px; 
        height: 120px;
    }
    @media  only screen and (min-width:0px) and (max-width: 767px){
        .addressimg1{
            width: 100%;
            object-fit: contain;
            border-radius: 30px;
        }
        .blahimage{
            margin-bottom: 18px;
            height: 100px;
        }
    }
</style>

            <div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark"><?php echo $tag;?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Profile</a></li>
                            <li class="breadcrumb-item active">Change tnx password</li>
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>

                   <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid" style="margin-top: -35px;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-5">
                                        <?php
                  if(!empty(get_admi()->Usdt_Qr))
                  {
                    $filees=get_admi()->Usdt_Qr;
                  }
                  else{
                    $filees="qr.png";
                  }
                  ?>
                                        <div class="card-header m-auto text-justify">
                         <span> <img src="<?php echo base_url();?>myadmin/upload/<?php echo $filees;?>" alt="not found" height="250" width="250"></span>
                            <br>
                            <br>
                            <?php if(!empty(get_admi()->Usdt_Address))
                            {
                                echo ' <button onclick="myUsdtaddrss()" class="btn btn-info">Copy USDT BEP20 Address</button><span id="sdlhowcopy" class="text-success mt-2"></span>';
                            }
                           ?>
                      <input type="text" id="upaddiff_Id" value="<?php print_r(get_admi()->Usdt_Address);?>"  style="display:none">

                            <p class="text-justify p-3"> <?php print_r(get_admi()->Usdt_Address);?></p>          
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
                <div class="col-md-12 mb-3">
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
          </div>
              </div>
                                        <div class="card-body">
                                            <form role="form"  id="mypassform" action="<?php echo base_url();?>funds-request" method="POST" enctype="multipart/form-data">
                                        	
                                        	
                                        	    <div class="col-md-12 mb-3">
                                                    <label for="pppassword">Diposite Amount (USDT BEP20)</label>
                                                      <?php echo form_error('diposiramt'); ?> 
                                             <input class="form-control" type="text" id="diposiramt" name="diposiramt" placeholder="Deposit in $">
                                                </div>
                                                
                                                 <div class="col-md-12 mb-3">
                                                    <label for="Utr_no">Hash Id</label>
                                                       <?php echo form_error('Utr_no'); ?>
                                            <?php echo form_input(['class'=>'form-control','type'=>'text','id'=>'Utr_no', 'name'=>'Utr_no','placeholder'=>'Enter hash id']);?>
                                   
                                                </div>
                                                 <div class="col-md-12 mb-3">
                                                    <label for="upload">file</label>
                                                    <?php echo form_error('file'); //'name'=>'userfile'?>
                                            <?php echo form_input(['class'=>'form-control','type'=>'file','id'=>'upload', 'name'=>'file', 'required' => 'required']);?>
                                        
                                                </div>
                                               
                                                
                                                <br>
                                                <center>
                                                    <button class="btn btn-primary text-center" id="submit" type="submit">Request Amount</button>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                    </section>
                
            </div>
        <!-- main content area end -->
    
<!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="">GoldenChance</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer> -->

  </div>
<!-- ./wrapper -->
<?php include('ufooter.php');?>