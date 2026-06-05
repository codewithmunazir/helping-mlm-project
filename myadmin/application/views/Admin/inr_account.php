<?php include('admin_header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update INR  Bank Details</h1>
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
               <h1 class="mt-2">INR Bank Details</h1>
               <span id="msgsuccess"></span>
              <?php
            
              //"<?php //echo base_url();upload/// print_r(get_admi()->InrQr);?> 
               
           </div>
           <form id="inr_Qr"  method="POST"  enctype="multipart/formdata">
             <div class="card-body">
                <span >
                  <?php
                  if(!empty(get_admi()->InrQR))
                  {
                    $filee=get_admi()->InrQR;
                  }
                  else{
                    $filee="qr.png";
                  }
                  ?>
                    <img src="<?php echo base_url();?>/upload/<?php echo $filee;  ?>" alt="alt-msg" height="100" width="100">
                    
                </span>
                <div class="row">
                  <div class="col-lg-12">
                      <span id="update_bank_msg"></span>
                  </div>
                </div>
                  <div class="row">
                    
                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                      <label>QR code </label><span id="imgg_error" class="text-danger"></span>
                      <input type="file" class="form-control" name="file" value="<?php echo  get_admi()->InrQR; ?>">
                      </div>
                      <div class="form-group">
                      <label>INR UPI</label>
                      <input type="text" class="form-control" name="Upi_id" placeholder="Enter INR UPI" value="<?php echo  get_admi()->Upi_id; ?>">
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