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
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active">Send Request</li>
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>

                   <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid" style="margin-top: 5px;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-5">
                                        <div class="card-header">
                                                     <?php if($smsg=$this->session->flashdata('msg_successemail')) {
                                        $smsg_class=$this->session->flashdata('msg_class');?>
                                        <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                                        <?= $smsg; ?>
                                        </div>
                                        <?php } ?>          </div>
                                        <div class="card-body">
                                            <form role="form"  id="mypassform" action="<?php echo base_url();?>support-email" method="POST" >
                                        	
                                        	
                                        	    <div class="col-md-12 mb-3">
                                                   <label class="mb-1"><strong>To</strong></label>
                                            <input type="email" class="form-control" value="Admin" Readonly="Readonly" name="emailto" style="background-color: #f0f8ff; color: #2e8b57;">
                                                </div>
                                                
                                                 <div class="col-md-12 mb-3">
                                                    <label class="mb-1"><strong>Subject</strong></label> <?php echo form_error('subject'); ?>  
                                            <input class="form-control" placeholder="Enter Subject" name="subject" size="50" style="color: #ffffff;">
                                                </div>
                                                 <div class="col-md-12 mb-3">
                                                   
                                            
                                               <label class="mb-1"><strong>Message</strong></label><?php echo form_error('message'); ?>
                                            <textarea class="form-control" placeholder="Write Message Here....." style="height:150px; color: #ffffff;" name="message" ></textarea>
                                                </div>
                                               
                                                
                                                <br>
                                                <center>
                                                    <input class="btn btn-primary text-center" id="submit" type="submit" value="Send">
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