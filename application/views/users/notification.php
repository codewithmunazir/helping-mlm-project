<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Details Popup</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      .bg-image {
      background-image: url('<?php echo base_url();?>User_assest/public/frontnew/assets/images/bg-min.jpg'); /* Replace with your image URL */
      background-size: cover;
      background-position: center;
      height: 100vh;
    }
    .card {
  border-radius: 10px;           /* Rounded corners */
  border: 5px solid white;       /* White border around the card */
  color: white;                  /* White text color */
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);/* Shadow effect */
}
 .brt {
      border: 2px solid black;
      padding: 10px;
      text-align: center;
      border-radius: 10px; /* Rounded corners for columns */
    }
.rrow {
      border: 2px solid white;
   
      border-radius: 10px; /* Rounded corners for columns */
    }
       .btn-custom-1 {
        background: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradient colors */
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 25px; /* Rounded corners */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Button shadow */
        transition: all 0.3s ease; /* Smooth transition for effects */
      }
      .btn-custom-1:hover {
        transform: translateY(-5px); /* Lift effect on hover */
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3); /* Stronger shadow on hover */
      }

      /* Styling for the second button */
      .btn-custom-2 {
        background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient colors */
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 25px; /* Rounded corners */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Button shadow */
        transition: all 0.3s ease; /* Smooth transition for effects */
      }
      .btn-custom-2:hover {
        transform: translateY(-5px); /* Lift effect on hover */
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3); /* Stronger shadow on hover */
      }

      /* Optional: Center the buttons */
      .button-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 50px;
      }
    </style>
</head>
<body class="bg-image">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 m-auto">
        <div class="bg-image shadow-lg card mt-5">
          <div class="card-header text-center " >
           <a href="<?php echo base_url();?>">
                                <img src="<?php echo base_url();?>User_assest/public/logo.png" alt="" style="height: 55px;"></a>
            <?php $user=getUserDetailsById($id);?>
          </div>
          <div class="card-body text-center">
              <h4>Registration Completed Successfully !</h4>
              <h5>Your Registration Details</h5>
               <div class="row rrow">
                  <div class="col-lg-4 col-sm-12 brt"> User ID</div>
                  <div class="col-lg-8 col-sm-12 brt"> <?php echo $user->user_id;?></div>
                  <div class="col-lg-4 col-sm-12 brt">User Name</div>
                  <div class="col-lg-8 col-sm-12 brt"><?php echo $user->fullname;?></div>
                  
                  <div class="col-lg-4 col-sm-12 brt">Password</div>
                  <div class="col-lg-8 col-sm-12 brt"><?php echo $user->password;?></div>
                  <div class="col-lg-4 col-sm-12 brt">Transaction Password </div>
                  <div class="col-lg-8 col-sm-12 brt"><?php echo $user->txn_password;?></div>
                  <div class="col-lg-4 col-sm-12 brt">Mobile </div>
                  <div class="col-lg-8 col-sm-12 brt"><?php echo $user->mobile;?></div>

                  <div class="col-lg-4 col-sm-12 brt">Email</div>
                  <div class="col-lg-8 col-sm-12 brt"><?php echo$user->email;?></div>

                    <div class="col-lg-4 col-sm-12 brt">DOJ</div>
                  <div class="col-lg-8 col-sm-12 brt"><?php echo $user->register_date;?></div>
            </div>
            <div class="row">
              <div class="col-6 col-sm-12 text-center m-auto">
                    <div class="button-container">
                      <form action="<?php echo base_url();?>signin" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">
                        <input type="hidden" name="password" value="<?php echo $user->password;?>">
                        <input type="submit" class="btn-custom-1" style="border-radius: 12px;" value="Go To Dashboard">
                    </form>
                    </div>
                  </div>
              
            </div>
                                
              
            </div>
            <div class="card-footer">
          
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
