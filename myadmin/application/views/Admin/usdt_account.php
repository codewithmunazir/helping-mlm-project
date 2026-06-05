
<?php include('admin_header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update USDT QR  Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Update</a></li>
              <li class="breadcrumb-item active">QR Details</li>
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
        <div class="row">

         
        <div class="col-lg-12 col-12 mt-5">
         <div class="card border border-dark bg-secondary">
           <div class="crad-header bg-warning text-center">
               <h1 class="mt-2">USDT BEP 20 Details</h1>
               <span id="msgsuccess"></span>
               
           </div>
           <!--action="<?php// echo base_url();?>usdt-qr"-->
           <form id="usdt_form"  method="POST"  enctype="multipart/formdata">
           <?php
                  if(!empty(get_admi()->Usdt_Qr))
                  {
                    $filee=get_admi()->Usdt_Qr;
                  }
                  else{
                    $filee="usqw.png";
                  }
                  ?>
                    <img src="<?php echo base_url();?>/upload/<?php echo $filee;  ?>" alt="alt-msg" height="100" width="100">
             <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                      <label>USDT QR code </label><span id="img_error" class="text-danger"></span>
                      <input type="file" class="form-control" name="file" value="<?php echo  get_admi()->Usdt_Qr; ?>">
                      </div>
                      <br>
                      <div class="form-group">
                      <label>BEP 20 Address</label>
                      <input type="text" class="form-control" name="Usdt_Address" placeholder="Enter INR UPI" value="<?php echo  get_admi()->Usdt_Address; ?>">
                      </div>
                    </div>
                   
                  </div>  
             </div>
             <div class="card-footer">
               <input type="submit" class="btn btn-warning" value="update QR">
             </div>
          </form>
         </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

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