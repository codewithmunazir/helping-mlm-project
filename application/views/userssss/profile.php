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
                    <div class="card-header">
                         <h4 class="card-title"><?php echo $tag;?></h4>
                    </div>
                    <div class="card-body">
                         <div class="row">
                              <div class="col-lg-6">
                                   <form>
                                        <div class="mb-3">
                                             <label for="roles-name" class="form-label">Name</label>
                                            <input type="text" id="roles-name" class="form-control" value="<?php echo $userDetai->fullname;?>">
                                        </div>
                                   </form>
                              </div>
                              <div class="col-lg-6">
                                   <form>
                                        <div class="mb-3">
                                            
                                             <label for="user_id" class="form-label">UserId</label>
                                            <input type="text" class="form-control" for="user_id" value="<?php echo $userDetai->user_id;?>" readonly="">
                                             
                                        </div>
                                   </form>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="role-tag" class="form-label">Email</label>
                                        <input type="text" id="role-tag" class="form-control" value="<?php echo $userDetai->email;?>">
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="sponser_id" class="form-label">User Name</label>
                                        <input type="text" id="sponser_id" class="form-control" value="<?php echo $userDetai->sponserd_id;?>">
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <p>User Status </p>
                                   <?php $stattus=$userDetai->isactive;
                                   if($stattus==1)
                                   {
                                    $stus="Active";
                                    $clrcalss="text-success";
                                   }else{
                                    $stus="In Active";
                                    $clrcalss="text-danger";
                                   }?>
                                   <div class="d-flex gap-2 align-items-center">
                                        <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="">
                                             <label class="form-check-label <?php echo $clrcalss;?>" for="flexRadioDefault1">
                                                  <?php echo $stus;?>
                                             </label>
                                        </div>
                                        
                                   </div>
                              </div>
                         </div>

                    </div>
                    <div class="card-footer border-top">
                         <a href="#!" class="btn btn-primary">Save Change</a>
                    </div>
               </div>
          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>