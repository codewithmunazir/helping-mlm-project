<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Details Popup</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 m-auto">
        <div class="shadow-lg card  mt-5">
          <div class="card-header text-center" style="background-color:#FF8A65;">
          <img src="<?php echo base_url();?>User_assets/assets/images/logo-dark.png" alt="logo" class="img-fluid">
            <?php $user=getUserDetailsById($id);?>
           
         
          </div>
          <div class="card-body text-center mt-3">
              <h4>Registration Completed Successfully !</h4>
              <br>
              <h5>Your Registration Details</h5>
              <p> User ID : <span class="mt-2 p-2 text-success"> <?php echo $user->user_id;?></p>
               
              <p>User Name : <span class="mt-2 p-2 text-success"> <?php echo $user->fullname;?></span></label>
                      </p>
              <p>Password : <span class="mt-2 p-2 text-success"> <?php echo $user->password;?></p>
              <p>Transaction Password : <span class="mt-2 p-2 text-success"> <?php echo $user->txn_password;?></p>
              <p>Mobile No : <span class="mt-2 p-2 text-success"> <?php echo $user->mobile;?></span></p>
              <p>Email :  <span class="mt-2 p-2 text-success"> <?php echo$user->email;?></span></p>
              <p>DOJ : <span class="mt-2 p-2 text-success"> <?php echo $user->register_date;?></p>
            </div>
            <div class="card-footer">
              <div class="text-center">
              <a href="<?php echo  base_url();?>signin" class="btn btn-success">Login</a>
              <a href="<?php echo base_url();?>sign_up/fresh" class="btn btn-info ml-3">Create Account</a>
             <!-- <a href="<?php //echo base_url();?>admin" class="btn btn-warning ml-3">Back</a>-->
              </div>
              
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>


<!-- Modal -->

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>
