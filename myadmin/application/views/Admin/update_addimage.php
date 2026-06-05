<?php include('admin_header.php');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Latest News</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Support</a></li>
              <li class="breadcrumb-item active">Create News</li>
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
            <span id="msgsuccesss"></span>
                <div class="crad-header bg-info text-center"><h4 class="mb-3">Create News </h4>
                   
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
                 <span class="text-danger"> <?php echo isset($error) ? $error : ''; ?></span>
                    <form  action="<?php echo base_url('Admin/uplode_adds_file');?>"  id="adds_file" method="post" enctype="multipart/form-data">
                        
                        <div class="form-froup">
                            <label for="msg">Insert Adds</label><span id="imgges_error" class="text-danger"></span>
                            <input type="file" name="userfile" class="form-control"  Required>
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
        <div class="rowjustify-content-center">
        <div class="col-lg-6 m-auto">
            <div class="card">
           
                <div class="crad-header bg-warning text-center"><h4 class="mb-3">My live adds </h4>
                   
                </div>
                <div class="card-body">
                  <div class="mt-3 mb-3">
                    <?php $getimgadd=getlastAddsImag();
                    $showhi=$getimgadd->visiblity;
                    if($showhi==1)
                    {
                      $msgbutton="Stop show Adds";
                      $img=$getimgadd->my_adds_images;
                       $visvalue=0;
                       $classtt="btn btn-danger";

                    }else{
                      $msgbutton="Start show Adds";
                      $img="hide.png";
                       $visvalue=1;
                       $classtt="btn btn-success";
                    }
                    ?>
                  </div>
                 <dov class="row">
                  <div class="col-lg-8 col-sm-12">
                    <div>
                      <img src="<?php echo base_url();?>/upload_image/<?php echo $img;?>" alt="alt" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-12">
                    <form id="showhide_img" method="POST">
                      <input type="text" name="visiblity" value="<?php echo $visvalue?>"style="display:none">
                      <input type="text" name="id" value="<?php echo $getimgadd->id?>" style="display:none">
                      <input type="submit" value="<?php echo $msgbutton?>" id="submit" class="<?php echo $classtt;?>">
                    </form>
                  </div>
                  </div>
                   
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



