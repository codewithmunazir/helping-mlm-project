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
  <div class="container" id="redir" baseuiurl="<?php echo base_url();?>top-up">
    <div class="row justify-content-center">
      <div class="col-md-6 m-auto">
        <div class="card mt-5" style="background-color:#2f3944;
                                                    border-radius: 20px; transition: all 0.3s ease; border: 4px solid #ff6e40!important;  --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color) !important; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5), 0 0 20px rgba(255, 110, 64, 0.6) !important; ">
                                                        <div style="margin-top:10px; margin-bottom:10px; margin: 10px;">
         
          <div class="card-body text-center">
             
              <?php
                                       
                                         $getdtails=Last_top_Details_po_up($top_up_id);
                                       //  print_r($getdtails);
                                         $datetime = $getdtails->topupdate;// Example datetime from database
                                            list($date, $time) = explode(' ', $datetime);

                                        // echo "Date: " . $date;  // Outputs: 2024-10-09
                                       // echo "Time: " . $time;  // Outputs: 14:30:00
                                                    $spo_id= $getdtails->registeruser_id;
                                        $usrdetailstts=getUserDetailsByspon_Id($spo_id);
                                        //print_r($usrdetailstts);
                                       
?>
                                         
                                                    <div >
                                                       
                                               <h3><span style="color:#ff6e40!important;"><b>Congratulation!<b></span></h3>
                                                <h4>Your Account Is Successfully Activated With<br><sanp style=" font-size: 30px; /* Adjust font size as needed */    font-weight: bold;    background: -webkit-gradient(linear, left top, right top, color-stop(0%, #ff6c2f), color-stop(25%, #f9b931), color-stop(50%, #22c55e), color-stop(75%, #3b82f6), color-stop(100%, #8b5cf6)); background: linear-gradient(to right, #ff6c2f 0%, #f9b931 25%, #22c55e 50%, #3b82f6 75%, #8b5cf6 100%); background-size: 400% 100%; background-clip: text;  color: transparent;  -webkit-background-clip: text; -webkit-text-fill-color: transparent;   -webkit-animation: textclip 5s linear infinite;  animation: textclip 5s linear infinite; display: inline-block;">EQUITY PLUS
ROBOTS TRADING</sanp></h4>
                                               <h4>User Name: <?php echo $usrdetailstts->fullname;?></h4>
                                               
                                                 <h4><?php echo "Your User ID: ";?> <?php echo $getdtails->registeruser_id;?></h4>
                                                
                                                  <h4>Package <span style=" font-size: 30px; /* Adjust font size as needed */  font-weight: bold; background: -webkit-gradient(linear, left top, right top, color-stop(0%, #ff6c2f), color-stop(25%, #f9b931), color-stop(50%, #22c55e), color-stop(75%, #3b82f6), color-stop(100%, #8b5cf6)); background: linear-gradient(to right, #ff6c2f 0%, #f9b931 25%, #22c55e 50%, #3b82f6 75%, #8b5cf6 100%); background-size: 400% 100%; background-clip: text;  color: transparent;
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; -webkit-animation: textclip 5s linear infinite; animation: textclip 5s linear infinite; display: inline-block;"><b> ($ <?php echo $getdtails->topup_amt;?>)</b></span></h4>
                                                 
                                                        <h4>Topup Date : <?php echo $date;?></h4>
                                                         <h4>Topup Time :<?php echo $time;?></h4>
                                                         
                                                        <img src="<?php echo base_url();?>User_assest/public/logo.png" alt="not found" class="img-fluid" height="80px" width="135px">
                                                        
                                                    </div>
                                                    <br>
                                                    <a class="btn btn-success" href="<?php echo base_url();?>top-up">Next</a>
                                                    </div>
                                                     
                                                                </div>
                          
            
                                
              
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

   <script>
        document.addEventListener("click", function() {
         const element = document.getElementById("redir");
const dataInfo = element.getAttribute("baseuiurl");
    window.location.href =dataInfo; // Redirects to the homepage
});
</script>

</body>
</html>
