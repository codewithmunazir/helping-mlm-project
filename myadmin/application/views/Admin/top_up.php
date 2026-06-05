<?php include('admin_header.php');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Top - Up</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Fund</a></li>
              <li class="breadcrumb-item active">Top - Up</li>
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
                <div class="crad-header bg-info text-center"><h4 class="mb-3">Top - Up</h4>
                   
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
                    <form action="<?php echo base_url();?>top-up-byadmin" method="POST">
                        <div class="form-froup">
                            
                          <input type="hidden" name="username" value="" id="usname">
                            <label for="userid">UserId <span class="ml-3"id="alertmsg"></span></label>
                            <input type="text" class="form-control" name="userid" id="userid" onchange="return getsponserdId();">
                            <?php 
                              if( (!empty(form_error('username'))) && (!empty(form_error('userid'))))
                              {
                                echo form_error('userid');
                                 }
                              elseif (!empty(form_error('username'))) {?>
                                <span class="text-danger"> <?php echo  "Required Valid User Id"; ?></span>
                                
                            <?php  }else{
                              echo form_error('userid');
                                        
                                        }
                             ?>
                        </div>
                        <div class="form-froup">
                            <label for="userid">Amount</label>
                            <?php echo form_input(['class'=>'form-control','type'=>'text', 'name'=>'amount','placeholder'=>'Enter Amount','id'=>'amout', 'value'=>set_value('amount')]);?>
                            
                            <?php echo form_error('amount'); ?>
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



