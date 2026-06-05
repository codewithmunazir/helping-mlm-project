<?php include('admin_header.php');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Compose Mail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Support</a></li>
              <li class="breadcrumb-item active">Compose Mail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="rowjustify-content-center">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="crad-header bg-info text-center"><h4 class="mb-3">Compose a mail</h4>
                   
                </div>
                <div class="card-body">
                  <div class="mt-3 mb-3">
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
                                   
                    <form action="<?php echo base_url();?>email_reply" method="POST">
                      <input type="hidden" name="msg_id" value="<?php echo  $get_user_masg->registeruser_id;?>">
                      <input type="hidden" name="user_id" value="<?php echo  $get_user_masg->id;?>">
                        <div class="form-froup">
                           <label for="userid">Subject</label>
                            <input type="text" value="<?php echo  $get_user_masg->subject;?>" name="subject" Readonly="readonly" id="userid" class="form-control">
                        </div>
                        <div class="form-froup">
  
                            <label for="text_area" >Message</label>
                                            <textarea id="text_area" class="form-control" placeholder="Write Message Here....." style="height:150px;" name="msg"><?php echo  $get_user_masg->description;?></textarea>

                        </div>
                        <div class="form-froup">
  
                            <label for="text_area" >Reply</label><?php echo form_error('message'); ?>
                                            <textarea id="text_area" class="form-control" placeholder="Write reply Here....." style="height:150px;" name="message" required></textarea>

                        </div>
                        <div class="form-group mt-5">
                            <input type="submit" class="btn btn-info" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
                  <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include('admin_footer.php'); ?>



