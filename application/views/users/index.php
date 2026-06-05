<?php include('uheader.php');?>
    <style>
/* Styling for the timer (rectangular box) */
.timer-style {
    font-size: 18px;
    font-weight: bold;
    background-color: #007bff;
    color: white;
    padding: 10px;
    border-radius: 5px;
    width: 140px;
    text-align: center;
    margin-top: 10px;
    border: 2px solid #0056b3; /* Adding border for rectangle look */
}

/* Styling for expired timers (Red color) */
.timer-style.expired {
    background-color: red;
    color: white;
    border: 2px solid #d9534f; /* Border color for expired state */
}
</style>       
            <div class="content-wrapper">
                
                <!--user welcome msg-->
                <div style="background: white; padding: 0px 0px 0px 0px;">
                    <div class="container-fluid">
                      <div class="row">
                          
                        <!--<div class="col-sm-6">-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-lg-2 col-12">-->
                        <!--            <center>-->
                        <!--                -->
                        <!--                <img src="https://aidigitalassets.global/public/brian-hughes.jpg" style="height: 64px; object-fit: contain; border-radius: 50%;">-->
                        <!--                -->
                        <!--            </center>-->
                        <!--        </div>-->
                        <!--        <div class="col-lg-10 col-12">-->
                        <!--            <center>g-->
                        <!--                <span class="welcome-txt">Welcome back, admin!</span>-->
                        <!--            </center>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                         
                        
                        
                        <!--<div class="col-sm-6">-->
                        <!--    <div class="flex items-center mt-6 sm:mt-0 sm:ml-2 space-x-3 dashbtn">-->
                                
                        <!--        <a href="https://aidigitalassets.global/Logout" class="logout-btn">-->
                        <!--           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 20px; width: 20px;">-->
                        <!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>-->
                        <!--            </svg>-->
                        <!--            Sign Out-->
                        <!--        </a>-->
                                
                        <!--        <a href="https://aidigitalassets.global/My-Profile" class="setting-btn">-->
                        <!--            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 20px; width: 20px;">-->
                        <!--            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>-->
                        <!--            </svg>-->
                        <!--            Settings-->
                        <!--        </a>-->
                                
                        <!--    </div>-->
                        <!--</div>-->
                        
                      </div>
                    </div>
                </div>
                <!--user welcome msg-->
                
                <!-- Main content -->
                <section class="content" >
                  <div class="container-fluid">
                      <script src="https://widgets.coingecko.com/gecko-coin-price-marquee-widget.js"></script>
<gecko-coin-price-marquee-widget locale="en" outlined="true" coin-ids="" dark-mode="true" initial-currency="usd"></gecko-coin-price-marquee-widget>
                      
                      <br>
                                            <div style="margin-bottom: -35px;">
                          <div class="progress-group">
                              <span class="progress-text" style="color: white;"></span>
                              <span class="float-right" style="color: white;"></span>
                              <div class="progress progress-sm">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                              </div>
                            </div>
                      </div>

                    <br>  
                    <div class="alert  text-truncate mb-3" role="alert">
                                            <?php if($tag==="Dashboard")
                        {
                            $late_news=Lastest_nesw();
                            $latest_news=$late_news->news_crete;
                        }else{
                            $latest_news="";
                        }
                      
                        ?>
                        <marquee  class="nav-item d-flex align-items-center mb-2" direction="left" scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()">
                                   <p class="fw-bold footer-text"> <?php echo $latest_news;?></p>
                              </marquee>
                                        </div>
                                        <div class="row">
                                            <div class="card shadowa">
                                                <div class="row">  <?php
foreach ($for_provide as $provide_form) {
    $id_pro = $provide_form['id'];  
    $commmite_id = $provide_form['commitemnt_id'];  
    $for_pro_id = $provide_form['g_registeruser_id'];
    $amt_pending = $provide_form['request_amt'];
    $wid_id = $provide_form['withdrol_id'];
    $requestdate = $provide_form['request_date'];
    $slip = $provide_form['slip_uplode'];
    $expire_time = $provide_form['expire_datetiime'];

    // Your existing logic for showing the upload form or payment slip
    if (empty($slip)) {  
        $upp = '
        <div class="container mt-1">
            <form action="'.base_url().'user/my_fund_request" method="post" enctype="multipart/form-data">
                <input type="hidden" name="commitrowdd" value="'.$id_pro.'">
                <input type="hidden" name="comiit_id" value="'.$commmite_id.'">
                <input type="hidden" name="comittgetuserid" value="'.$for_pro_id.'">
                <input type="hidden" name="diposiramt" value="'.$amt_pending.'">
                <input type="hidden" name="wid_id" value="'.$wid_id.'">
                <div class="form-group">
                    <label for="file">Hash Id:</label>
                    <input type="text" name="hash_id" class="form-control" placeholder="Enter Hash Id" required>
                </div>
                <div class="form-group">
                    <label for="file">Select File to Upload:</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                    <small class="form-text text-muted">Please select a file to upload.</small>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-success" value="Upload">
                </div>
            </form>
        </div>';
    } else {
        $upp = '<div class="container mt-5">
                    <h2>Payment Slip</h2>
                    <a href="'.base_url().'uploads_users/'.$slip.'" target="_blank" class="btn btn-info">View Payment Slip</a>
                </div>';
    }

    $user_deetails = getsposerd($for_pro_id);
    $username = $user_deetails->fullname;
    $mobile = $user_deetails->mobile;
    $get_user_profile = get_profile_by_registeruser_id($for_pro_id);
    $usdt_add = $get_user_profile['usdt_add'];
        $gpay=$get_user_profile['gpay'];
    $paytm=$get_user_profile['paytm'];
    $phone_pay=$get_user_profile['phone_pay'];
    $upi=$get_user_profile['upi'];

    // Output the HTML for each commitment
    echo '<div class="col-lg-6 col-12">
            <div class="card shadowaz">
                <p class="fw-bold footer-text">Provide Help</p>
                <p>User Id: '.$for_pro_id.'</p>
                <p>User Name: '.$username.'</p>
                <p>Mobile No: '.$mobile.'</p>
                <p id="colorButton2"> Link amount: $'.$amt_pending.'</p>
                <p>Link date time: '.$requestdate.'</p>
                <p>Link Expire time: <span class="expire-time" data-expire="'.$expire_time.'">'.$expire_time.'</span></p>
                <p>Remaining Time: <span id="timer-'.$id_pro.'" class="timer-style shadowaz">Loading...</span></p>
                <p>USDT BEP20 Address :  
    <span id="copy_usdt_'.$id_pro.'">
        '.$usdt_add.'
        <input type="text" id="usdtreff_Id_'.$id_pro.'" value="'.$usdt_add.'" style="display:none">
    </span>  
    <button onclick="my_usdt_adr(\''.$id_pro.'\')" class="btn btn-primary">Copy USDT Add</button>
    <span id="show_usdtt_'.$id_pro.'"></span>
</p>
';
                if(!empty($paytm)) {
                                                            echo '<p><strong>Paytm: </strong>
                                                                    <span class="upiId">'.$paytm.'</span>
                                                                    <button class="copyButton">COPY</button>
                                                                    <span class="copiedText" style="display: none;">Copied</span>
                                                                </p>';
                                                        }

                                                        if(!empty($gpay)) {
                                                            echo '<p><strong>Google Pay: </strong>
                                                                    <span class="upiId">'.$gpay.'</span>
                                                                    <button class="copyButton">COPY</button>
                                                                    <span class="copiedText" style="display: none;">Copied</span>
                                                                </p>';
                                                        }

                                                        if(!empty($phone_pay)) {
                                                            echo '<p><strong>PhonePe: </strong>
                                                                    <span class="upiId">'.$phone_pay.'</span>
                                                                    <button class="copyButton">COPY</button>
                                                                    <span class="copiedText" style="display: none;">Copied</span>
                                                                </p>';
                                                        }

                                                        if(!empty($upi)) {
                                                            echo '<p><strong>UPI: </strong>
                                                                    <span class="upiId">'.$upi.'</span>
                                                                    <button class="copyButton">COPY</button>
                                                                    <span class="copiedText" style="display: none;">Copied</span>
                                                                </p>';
                                                        }
                                                        if(!empty($bank_name))
                                                        {
                                                            echo '<div class="row justify-content-center">
                                                                        <div class="col-6 col-sm-6 text-center">
                                                                            <button type="button" class="btn btn-primary m-2 btn-custom w-100" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank" onclick="toggleBankDetails()">
                                                                                Bank Details
                                                                            </button>
                                                                        </div>
                                                                    </div>';
                                                        }
                                                     echo '                
            

            <div id="contentArea" class="content-box mt-4" style="display: none;">
                <!-- Default Bank Details -->
            </div>
            '.$upp.'
        </div>
    </div>';

}
?>
<script>
    // Select all copy buttons
    document.querySelectorAll(".copyButton").forEach((button, index) => {
        button.addEventListener("click", function () {
            let upiId = document.querySelectorAll(".upiId")[index].innerText;
            let copiedText = document.querySelectorAll(".copiedText")[index];

            // Copy UPI ID to clipboard
            navigator.clipboard.writeText(upiId).then(() => {
                copiedText.style.display = "inline";

                // Hide "Copied" message after 2 seconds
                setTimeout(() => {
                    copiedText.style.display = "none";
                }, 2000);
            }).catch(err => {
                console.error("Error copying text: ", err);
            });
        });
    });
    
 </script>


<script>
// Function to format the time into HH:MM:SS format (only up to seconds)
function formatTime(seconds) {
    let hours = Math.floor(seconds / 3600);
    let minutes = Math.floor((seconds % 3600) / 60);
    let remainingSeconds = seconds % 60;
    
    return (
        (hours < 10 ? '0' + hours : hours) + ':' +
        (minutes < 10 ? '0' + minutes : minutes) + ':' +
        (remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds)
    );
}

// Function to update the timers for all commitments
function updateTimers() {
    const now = new Date().getTime(); // Current time in milliseconds
    
    // Loop through all elements with the class '.expire-time'
    document.querySelectorAll('.expire-time').forEach(function (item) {
        const expireTime = new Date(item.getAttribute('data-expire')).getTime(); // Expiration time in milliseconds
        
        // Calculate remaining time in seconds
        const remainingTime = Math.max(0, (expireTime - now) / 1000);
        
        // Get the commitment's unique timer element
        const id = item.closest('.card').querySelector('[id^="timer-"]').id; // Get the ID of the timer
        const timerElement = document.getElementById(id);
        
        // Update the timer display next to the commitment
        timerElement.textContent = formatTime(remainingTime); // Update with formatted time
        
        // If time is up, display "Expired"
        if (remainingTime <= 0) {
            timerElement.textContent = 'Expired';
        }
    });
}

// Update timers every second
setInterval(updateTimers, 1000);

// Initial call to display timers immediately
updateTimers();
</script>

<script>
    function my_usdt_adr(id) {
    // Get the text field by dynamic ID
    var copyText = document.getElementById("usdtreff_Id_" + id);
    
    // Select the text field
    copyText.style.display = "block"; // Ensure it is visible for selection
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value).then(function() {
        document.getElementById("show_usdtt_" + id).innerHTML = '<b>Copied!</b>';
    });

    // Hide the text field again
    setTimeout(() => {
        copyText.style.display = "none";
    }, 500);
}

</script>
                                                                                                   
                                                   <?php
foreach($for_get_user as $user_to_get_details_procommit)
{
    $id_get = $user_to_get_details_procommit['id'];
    $commmite_id_get = $user_to_get_details_procommit['commitemnt_id'];    
    $for_get_id = $user_to_get_details_procommit['p_registeruser_id'];
    $for_tnx_my_get_id = $user_to_get_details_procommit['g_registeruser_id'];
    $amt_pendings = $user_to_get_details_procommit['request_amt'];
    $requestdates = $user_to_get_details_procommit['request_date'];
    $slips = $user_to_get_details_procommit['slip_uplode'];
    $width_id = $user_to_get_details_procommit['withdrol_id'];
    $uplade_paydate_time = $user_to_get_details_procommit['uplade_date_time'];
    $user_deetailss = getsposerd($for_get_id);
    $usernames = $user_deetailss->fullname;
    $user_deetailss_fortnx = getsposerd($for_tnx_my_get_id);
    $tnx_password = $user_deetailss_fortnx->txn_password;
    $mobiles = $user_deetailss->mobile;
    $get_user_profilee = get_profile_by_registeruser_id($for_get_id);

    echo '<div class="col-lg-6 col-12">
            <div class="card shadowaz">
                <p class="fw-bold footer-text">Get Help</p>
                <p>User id: ' . $for_get_id . '</p>
                <p>User Name : ' . $usernames . '</p>
                <p>Mobile No : ' . $mobiles . '</p>
                <p>Link Amount :  $' . $amt_pendings . '</p>
                <p>Link Status : Slip uploaded</p>
                <p>Link Date : ' . $requestdates . '</p>
                <p>Payment Date : ' . $uplade_paydate_time . '</p>
                <a href="' . base_url() . 'uploads_users/' . $slips . '" target="_blank">View Payment Slip</a>

                <!-- Accept Form -->
                <form action="' . base_url() . 'user/do_active_user" method="post" id="myform2_' . $id_get . '" class="mt-1">
                    <input type="hidden" name="link_id" value="' . $id_get . '">
                    <input type="hidden" name="link_commit_id" value="' . $commmite_id_get . '">
                    <input type="hidden" name="g_id" value="' . $for_tnx_my_get_id . '">
                    <input type="hidden" name="amt_t" value="' . $amt_pendings . '">
                    <input type="hidden" name="withdrol_id" value="' . $width_id . '">
                    <label for="pwd">Enter Transaction Password</label>
                    <input type="password" name="pwd" id="pwd2_' . $id_get . '" class="form-input form-control" required placeholder="Enter Transaction Password">
                    <input type="hidden" name="id" id="ghid" value="' . $for_get_id . '">
                    <br><br>
                    <input type="submit" class="btn btn-success confirmation" value="Accept" id="btn2_' . $id_get . '" onclick="return confirmAction(\'Are you sure you want to accept this action?\', \'myform2_' . $id_get . '\', \'pwd2_' . $id_get . '\', \'' . $tnx_password . '\')">
                </form>

                <!-- Reject Form -->
                <form action="' . base_url() . 'user/reject_link" method="post" id="myform3_' . $id_get . '" class="mt-1">
                    <input type="hidden" name="link_id" value="' . $id_get . '">
                    <input type="hidden" name="link_commit_id" value="' . $commmite_id_get . '">
                    <label for="pwd">Enter Transaction Password</label>
                    <input type="password" name="pwd" id="pwd3_' . $id_get . '" class="form-input form-control" required placeholder="Enter Transaction Password">
                    <input type="hidden" name="nn" id="ph" value="' . $for_get_id . '">
                    <br><br>
                    <input type="submit" class="btn btn-danger confirmation" value="Reject" id="btn3_' . $id_get . '" onclick="return confirmAction(\'Are you sure you want to reject this action?\', \'myform3_' . $id_get . '\', \'pwd3_' . $id_get . '\', \'' . $tnx_password . '\')">
                </form>
            </div>
        </div>';
}
?>

<script>
// Function to show confirmation dialog before submitting the form
function confirmAction(message, formId, passwordFieldId, correctPassword) {
    if (confirm(message)) {
        // Check if the password input is empty before submitting
        var passwordField = document.querySelector('#' + passwordFieldId);
        if (!passwordField.value) {
            alert("Transaction password is required!");
            return false;  // Prevent form submission if the password field is empty
        }

        // Check if the entered password matches the correct password
        if (passwordField.value !== correctPassword) {
            alert("Your transaction password does not match.");
            return false;  // Prevent form submission if the password does not match
        }

        document.getElementById(formId).submit();  // Submit the form if user confirms and password is correct
    } else {
        return false;  // Prevent form submission if user cancels
    }
}
</script>
                                                         <script type="text/javascript">
    // Array of colors to cycle through
    const colors = ["red", "yellow", "orange", "cyan", "magenta"];

    // Function to change the border color of elements with the .shadowa class
    function changeColor(element) {
        // Initialize a color index specific to each element if not set
        if (!element.colorIndex) {
            element.colorIndex = 0; // Set initial color index if not set
        }

        // Change the border color only
        element.style.borderColor = colors[element.colorIndex];
        
        // Update the index to point to the next color, wrapping around when necessary
        element.colorIndex = (element.colorIndex + 1) % colors.length;
    }

    // Get all elements with the .shadowa class
    const elements = document.querySelectorAll('.shadowaz');

    // Call the changeColor function for each element every 200 milliseconds
    setInterval(() => {
        elements.forEach(element => changeColor(element));
    }, 200);
</script>

                                                </div>   
                                            </div>                                          
         
                                        </div>
                    <!-- Info boxes -->

                    <div class="row">
                    
                    
                                        
                            <!--<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist"  style="width: 100%; margin: 25px 20px 25px 20px;">-->
                            <!--  <li class="nav-item">-->
                            <!--    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Wallet</a>-->
                            <!--  </li>-->
                            <!--  <li class="nav-item">-->
                            <!--    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Payout</a>-->
                            <!--  </li>-->
                            <!--  <li class="nav-item">-->
                            <!--    <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Team</a>-->
                            <!--  </li>-->
                            <!--</ul>-->
                            
                            <!--<div class="tab-content" id="custom-content-below-tabContent" style="width: 100%;">-->
                            <!--  <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">-->
                            
                                <div class="col-lg-4 col-sm-12 mt-4 mb-1">
                                    <div class="card shadowa">
                                        <div class="row" >
                                            <div class="col-lg-12 col-12" >
                                                 <div class="card shadowass" >
                                                <div class="padding-2" style="padding: 1px 2px 0px 2px;">
                                                    <div class="row">
                                                       <div class="col-lg-12 col-sm-12" >

                                                            <div class="row">
                                                                 <?php $istop=$userDetai->istopup;
                                                            if($istop)
                                                            {
                                                                 $sttus= "Active";
                                                                 $hrrf=base_url().'video-ads';
                                                                 $clssmsg ="bg-success";
                                                            }else{
                                                                 $sttus="Inactive";
                                                                 $hrrf='';
                                                                 $clssmsg ="bg-danger";
                                                            }
                                                            ?>
                                                                <div class="col-6 col-sm-6 col-xxl-8">
                                                                    <p>Account Name</p>
                                                                    <p class="fw-bold footer-textt"><?php echo $userDetai->fullname;?></p>
                                                                </div>
                                                                <div class="col-6 col-sm-6 col-xxl-4 text-right">
                                                                    <p>Joining</p>
                                                                    <p><?php echo $userDetai->register_date;?></p>
                                                                </div>    
                                                            </div>
                                                            
                                                       </div>
                                                             <div class="col-lg-12 col-sm-12">
                                                                     <hr class="solid-line">
                                                            </div>
                                                       
                                                       <div class="col-lg-12 col-sm-12">
                                                        <div class="row">
                                                               <div class="col-6 col-sm-6 col-xxl-8">
                                                                     <p>ID</p>
                                                                    <p class="fw-bold footer-textt"><?php echo $userDetai->user_id;?></p>
                                                                </div>
                                                                <div class="col-6 col-sm-6 col-xxl-4 text-right">
                                                                    <p>Status</p>
                                                                     <a href="javascript:void(0)" class="btn <?php echo $clssmsg;?>" style="border-radius: 18px;   "><?php echo $sttus;?></a>
                                                                    
                                                                </div>    
                                                            </div>
                                                       </div>
                                                             <div class="col-lg-12 col-12">
                                                                     <hr class="solid-line">
                                                            </div>
                                                       <div class="col-lg-12 col-sm-12">
                                                       
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            
                                             <div class="col-lg-12 col-12 col-sm-12">
                                                 <div class="card shadowa">
                                                    <div class="row">
                                                    <div class="d-flex flex-wrap gap-2  mt-4">
                                                              <button onclick="window.location.href='commitments'" type="button" class="btn btn-primary d-inline-flex" style="font-size: 12px;
                                                              font-weight: 600;align-items: center;">
                                                               Commitement </button>
                                                               <?php $lastt_topup=Last_top_Date_get($userDetai->user_id);
                                                               if(!empty($lastt_topup))
                                                               {

                                                                    $datetopup=$lastt_topup->topupdate;
                                                                    
                                                                    $first_date_time = $datetopup; // Assume this is your first date (e.g., '2024-12-01 12:00:00')
                                                                    $livee = date('Y-m-d H:i:s'); // Current date and time

                                                                    // Create DateTime objects for both the first date and the current date
                                                                    $top_updddtt = new DateTime($first_date_time);
                                                                    $current = new DateTime($livee);

                                                                    // Calculate the interval between the two dates
                                                                    $interval = $top_updddtt->diff($current);

                                                                    // Get the number of days difference
                                                                    $days = $interval->days;
                                                                    
                                                                                if ($days >= 30) {
                                                                                    // Display Retopup message if the days are greater than or equal to 33
                                                                                    echo '<button onclick="window.location.href=\'recommitments\'" type="button" class="btn btn-primary d-inline-flex" style="font-size: 12px; font-weight: 600; align-items: center;" id="colorButton1">
                                                                                            Re-Commitment
                                                                                          </button>';
                                                                                } else {
                                                                                    // Display Commitment and Re-Commitment buttons if the days are less than 33
                                                                                    echo '<button onclick="window.location.href=\'recommitments\'" type="button" class="btn btn-primary d-inline-flex" style="font-size: 12px; font-weight: 600; align-items: center;">
                                                                                            Re-Commitment
                                                                                          </button>';

                                                                                    
                                                                                }
                                                               }
                                                               ?>
                                                                <script type="text/javascript">
                                                                    // Array of colors to cycle through
                                                                    const colors = ["red", "yellow", "orange", "cyan", "magenta"];

                                                                    // Function to change the background color of a button
                                                                    function changeColor(buttonId) {
                                                                        // Get the button element
                                                                        const button = document.getElementById(buttonId);

                                                                        // Initialize a color index specific to each button
                                                                        if (!button.colorIndex) {
                                                                            button.colorIndex = 0; // Set initial color index if not set
                                                                        }

                                                                        // Change the background color
                                                                        button.style.backgroundColor = colors[button.colorIndex];
                                                                        
                                                                        // Update the index to point to the next color, wrapping around when necessary
                                                                        button.colorIndex = (button.colorIndex + 1) % colors.length;
                                                                    }

                                                                    // Call the changeColor function for each button every 200 milliseconds
                                                                    setInterval(() => changeColor("colorButton1"), 200);
                                                                    setInterval(() => changeColor("colorButton2"), 200);
                                                                    setInterval(() => changeColor("colorButton3"), 200);
                                                                </script>
                                                               <!-- <button onclick="window.location.href='commitments'" type="button" class="btn btn-primary d-inline-flex" style="font-size: 12px;
                                                              font-weight: 600;align-items: center;">
                                                               Re-Commitment</button>   -->
                                                               <!-- <button onclick="window.location.href='buy-bv'" type="button" class="btn btn-primary d-inline-flex" style="font-size: 12px;
                                                              font-weight: 600;align-items: center;">
                                                               View</button>  -->
                                                              
                                                               <!-- <button onclick="window.location.href='top-up'" type="button" class="btn btn-primary d-inline-flex" style="font-size: 12px;
                                                              font-weight: 600;align-items: center;">
                                                              Activation </button> -->
                                                               <!-- <button onclick="window.location.href='compound-system'" type="button" class="btn btn-primary d-inline-flex" style="font-size: 12px;
                                                              font-weight: 600;align-items: center;">
                                                               Compound </button> -->
                                                               <button onclick="window.location.href='withdrawal'" type="button" class="btn btn-primary d-inline-flex" style="font-size: 12px;
                                                              font-weight: 600;align-items: center;">
                                                              Withdrawal </button>
 
   
  
  
                                                    </div>
                                                       
                                                        
                                                        
                                                    </div>
                                                   

                                                 </div>
                                             </div>
                                            
                                        </div>
                                    </div>
                                           
                    </div>
                        <div class="col-lg-8 col-sm-12 mt-4 mb-2">
                            <div class="card shadowa">
                                <div class="row">
                                    <div class="col-lg-12 col-12 text-center"><h3 class="text-center fw-bold footer-text">My All Income</h3></div>
                                </div>
                                <div class="row mt-1">
                                          
                                      
                                       
                                         <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center" > <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Commitment Amount</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <?php echo totol_commit_banlece($userDetai->user_id);?></p>
                                                                     <a href="#" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;  "></a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Deposit Success</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <?php echo get_totol_amout_depoite($userDetai->user_id);?></p>
                                                                     <a href="#" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;  "></a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center" > <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Total Earning</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <?php echo income_my_sum($userDetai->user_id);?></p>
                                                                     <a href="#" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;  "></a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Wallet Balance</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                             <div class="row">
                                                            <!--    <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php //echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <?php  echo sum_total_my_balacece($userDetai->user_id);?></p>
                                                                     <a href="#" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;  "></a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>                                               
                                                </div>
                                            </div>
                                        </div>                                                                                                                  
                                        
                                           <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Withdraw Request</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <?php echo get_widrwal_request_confirm($userDetai->user_id);?></p>
                                                                     <a href="#" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;  "></a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-xxl-4">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Withdraw Success</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <?php echo recieve_income_my($userDetai->user_id);?></p>
                                                                     <a href="#" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;  "></a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                         
                                       
                                        
                                    </div>
                                </div>                
                        </div>
                         
                                    <div class="row">
                                           <div class="card shadowa">
                                         <div class="row">
                                             <div class="col-lg-12 col-12"> <div class="card shadowa"><h1 class="text-center fw-bold footer-text">My Income Status</h1></div></div>
                                         <div class="col-6 col-sm-3 col-xxl-3">
                                            <div class="card shadow">
                                                 <div class="padding-4" style="padding: 10px 10px 5px 10px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Daily Growth</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                 <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php // echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <span class="daily-sum"></span></p>
                                                                     <a href="<?php echo base_url();?>daily-growth" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;">Details</a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>                                                 
                                                </div>
                                            </div>
                                        </div>     
                                         <div class="col-6 col-sm-3 col-xxl-3">
                                            <div class="card shadow">
                                                 <div class="padding-4" style="padding: 10px 10px 5px 10px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Direct Income</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                 <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php // echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <span class="direct-sum"></span> </p>
                                                                     <a href="<?php echo base_url();?>bv-matching-history" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;">Details</a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>                                                 
                                                </div>
                                            </div>
                                        </div>     
                                         <div class="col-6 col-sm-3 col-xxl-3">
                                            <div class="card shadow">
                                                 <div class="padding-4" style="padding: 10px 10px 5px 10px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Level Income</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                 <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php // echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <span class="level-sum"></span></p>
                                                                     <a href="<?php echo base_url();?>level-income" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;">Details</a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>                                                 
                                                </div>
                                            </div>
                                        </div>     
                                         <div class="col-6 col-sm-3 col-xxl-3">
                                            <div class="card shadow">
                                                 <div class="padding-4" style="padding: 10px 10px 5px 10px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Reward Income</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                 <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php // echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;">$ <span class="reward-sum"></span></p>
                                                                     <a href="<?php echo base_url();?>reward-income" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px;">Details</a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>                                                 
                                                </div>
                                            </div>
                                        </div>     
                                                
                                        
                                           
                                    </div>
                                    </div>                                    
                                    </div>
                                    <div class="row">
                                           <div class="card shadowa">
                                         <div class="row">
                                             <div class="col-lg-12 col-12"> <div class="card shadowa"><h1 class="text-center fw-bold footer-text">My Team Status</h1></div></div>
                                         <div class="col-6 col-sm-3 col-xxl-3">
                                            <div class="card shadow">
                                                <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">My Direct  Team</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;"><span class="dirct-team-value"></span></p>
                                                                     <a href="<?php echo base_url();?>myrefrral" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px; ">Details</a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-6 col-sm-3 col-xxl-3">
                                            <div class="card shadow">
                                                <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Total Team</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;"><span class="teammem-value"></span></p>
                                                                     <a href="<?php echo base_url();?>level-team" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px; ">Details</a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-6 col-sm-3 col-xxl-3">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Active Team</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;"><span class="active-value"></span></p>
                                                                     <a href="<?php echo base_url();?>level-team" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px; ">Details</a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6 col-sm-3 col-xxl-3">
                                            <div class="card shadow">
                                            <div class="padding-4" style="padding:10px 5px 15px 5px;">
                                                      <div class="row">
                                                        <div class="col-lg-12 col-12 text-center"> <p style="font-size: 18px !important; font-weight: bold; color: white;margin-top: 5px;">Inactive Team</p>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-6 col-6">
                                                                    <center>
                                                                         <img src="<?php echo base_url();?>User_assest/images/img25.png" style="height: 75px; object-fit: contain;" />
                                                                     </center>
                                                                </div> -->
                                                                <div class="col-lg-12 col-12"><p class="text-center" style="font-size: 19px !important;font-weight: bold;color: ##f0faf6;;margin-top:1px;"><span class="inactive-value"></span></p>
                                                                     <a href="<?php echo base_url();?>level-team" class="btn btn-primary" style="font-size: 14px !important;font-weight: bold;color: #000;margin-top:2px; ">Details</a>
                                                                 </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </div>     
                                                
                                        
                                           
                                    </div>
                                    </div>                                    
                                    </div>
                                    
                                    <!------------------------------end -->
                                    <div class="row">
                                           <div class="card shadowa">
                                         <div class="row">
                                             
                                               <div class="col-lg-12 col-12">
                                                 <div class="card shadowa">
                                                    <div class="row">
                                                        <script>
                                                                    function myReferral() {
                                                                // Get the text field
                                                                var copyText = document.getElementById("reff_Id");
                                                              
                                                                // Select the text field
                                                                copyText.select();
                                                                copyText.setSelectionRange(0, 99999); // For mobile devices
                                                              
                                                                // Copy the text inside the text field
                                                                navigator.clipboard.writeText(copyText.value);
                                                                 $("#showcopy").html('<b>Copied !</b>');
                                                                
                                                                // Alert the copied text
                                                                //alert("Copied the text: " + copyText.value);
                                                              }
                                                                                                    </script>
                                                        <div class="col-lg-12 col-12">
                                                             <a href="<?php echo base_url().'signup/'.$userDetai->user_id;?>" target="_blank">Referral Link :  <?php echo '<span style="color:green; font-size:12px;">'.base_url().'signup/'.$userDetai->user_id.'</sapn>';?></a>
                                                                
                                                        </div>
                                                         <div class="col-lg-9 col-9">
                                                             <button onclick="myReferral()" class="btn btn-primary">Copy Referral Link</button>
                                                        </div>
                                                         <div class="col-lg-3 col-3">
                                                             <span id="showcopy" class="text-success"></span>
                                                            <input type="text" id="reff_Id" value="<?php echo base_url();?>signup/<?php echo  $userDetai->user_id;?>" style="display:none">
                                                        </div>
                                                        
                                                                
                                                        
                                                    </div>
                                                     <div class="row mt-1">
                                                    <div class="col-lg-12 col-12">
                                                    <div class="social-buttons">
                                                            <!-- Facebook Share Button -->
                                                            <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://secure.botdaddy.biz/signup.php?p=left&amp;refer=BOT386553" target="_blank">
                                                                 <i class="fab fa-facebook-f"></i>
                                                            </a>

                                                            <!-- Twitter Share Button -->
                                                            <a class="twitter" href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fsecure.botdaddy.biz%2Fsignup.php%3Fp%3Dleft%26refer%3DBOT386553&amp;text=Join%20this%20amazing%20platform!" target="_blank">
                                                               <i class="fab fa-twitter"></i>
                                                            </a>

                                                            <!-- LinkedIn Share Button -->
                                                            <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fsecure.botdaddy.biz%2Fsignup.php%3Fp%3Dleft%26refer%3DBOT386553" target="_blank">
                                                                  <i class="fab fa-linkedin-in"></i>
                                                            </a>

                                                            <!-- WhatsApp Share Button -->
                                                            <a class="whatsapp" href="https://api.whatsapp.com/send?text=https%3A%2F%2Fsecure.botdaddy.biz%2Fsignup.php%3Fp%3Dleft%26refer%3DBOT386553" target="_blank">
                                                               <i class="fab fa-whatsapp"></i>
                                                            </a>
                                                            <a class="telegram" href="https://t.me/share/url?url=https%3A%2F%2Fsecure.botdaddy.biz%2Fsignup.php%3Fp%3Dleft%26refer%3DBOT386553&amp;text=Join%20this%20amazing%20platform!" target="_blank">
                                                                <i class="fab fa-telegram-plane"></i> <!-- Telegram Icon -->
                                                            </a>
                                                        </div>

                                                    </div>
                                                   </div>
                                                  

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                    <!------------- start ---------------->
                              <!--</div>-->
                              <!--<div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">-->
                              <!--      <div class="row">-->
                                     
                              <!--  </div>-->
                              <!--</div>-->
                              <!--<div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">-->
                              <!--    <div class="row">-->
                                     
                            <!--        </div>-->
                            <!--  </div>-->
                            <!--</div>-->
                            
                            <br>
                            <br>
                            
                            <!-- information -->
                            <div class="col-12"> 
                                <div style="background: linear-gradient(246.62deg, #F47BFF -10.93%, #6D73D4 7.34%, #0DCBB3 89.85%, #27FF14 106.94%);padding: 4px;border-radius: 25px;" >
                                    <div class="card" style="border-radius: 25px; margin-bottom: 0px;background: #0f1018;">
                                    <div class="card-header" style="border-bottom: none;">
                                      <h3 class="card-title" style="font-weight: 500; font-size: 20px; color: white;">Profile Info</h3>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer bg-white p-0" style="border-radius: 25px;background: #0f1018 !important;">
                                      <ul class="nav nav-pills flex-column">
                                        <li class="nav-item">
                                          <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            My Sponsor
                                            <span class="float-right text-success">
                                            <i class="fas fa-user text-sm"></i>
                                           <?php echo $userDetai->sponserd_id;?></span>
                                          </a>
                                          <!--<a href="javascript:void(0)" class="nav-link border-bottom" style="font-weight: bold;">-->
                                          <!--  My Package-->
                                          <!--  <span class="float-right text-white">-->
                                          <!--  <i class="fas fa-dollar-sign dollarsign text-sm"></i>-->
                                          <!--  100</span>-->
                                          <!--</a>-->
                                          <!--  <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            My Level Achieved
                                            <span class="float-right text-info">
                                            LEVEL 1</span>
                                          </a> -->
                                          <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            ID Status
                                            <?php $activ=$userDetai->istopup;
                                                if($activ==1)
                                                {
                                                    echo '<span class="float-right text-success">
                                                <i class="fas fa-user-check text-sm"></i>
                                                Active
                                                                                        </span>';
                                                }else{
                                                    echo '<span class="float-right text-danger">
                                                <i class="fas fa-user-cross text-sm"></i>
                                                Inactive
                                                                                        </span>';
                                                }?>
                                                                                            
                                          </a>
                                          <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            Joining Date
                                            <span class="float-right text-info">
                                            <i class="far fa-calendar-alt text-sm"></i>
                                            <?php echo $userDetai->register_date;?></span>
                                          </a>
                                                   <?php $fist_topup=start_top_Date_get($userDetai->user_id);
                                                   if(!empty($fist_topup))
                                                {
                                                    $topupamt=$fist_topup->topup_amt;
                                                    $datetopup=$fist_topup->topupdate;

                                                }else{
                                                    $topupamt='0.00';
                                                    $datetopup='-- -- --';
                                                }?>
                                                                                    <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            Activation Date
                                            <span class="float-right text-info">
                                            <i class="far fa-calendar-alt text-sm"></i>
                                            <?php  echo $datetopup; ?></span>
                                          </a>
                                          
                                          <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            Activation Amount
                                            <span class="float-right text-info">
                                            <i class="far fa-coin-alt text-sm"></i>
                                            $ <?php  echo $topupamt; ?></span>
                                          </a>
                                          <!--<a href="javascript:void(0)" class="nav-link border-bottom" style="font-weight: bold;">-->
                                          <!--  Days Left-->
                                          <!--  <span class="float-right text-white">-->
                                          <!--  <i class="fas fa-user-clock text-sm"></i>-->
                                          <!--   Days</span>-->
                                          <!--</a>-->
                                                                                    
                                                                                    <a href="javascript:void(0)" class="nav-link" >
                                            Joining Link
                                            <span class="float-right text-primary">
                                            <span onclick="copyToClipboard('#p1')" id="copybtn1" style="width: 80%;">copy</span></span>
                                          </a>
                                          <!-- new info div -->
                                          <p id="p1" style="display: none;"><?php echo base_url().'signup/'.$userDetai->user_id;?></p>
                                        </li>
                                      </ul>
                                    </div>
                                    <!-- /.footer -->
                              </div>
                                </div>
                            </div>
                            <br>
                            
                            <!--   <div class="col-12"style="margin-top: 15px;">
                                    <iframe src="https://fxpricing.com/fx-widget/forex-cross-rates.php?symbol=EUR,USD,CHF,JPY,GBP,NZD,AED,INR&click_target=blank&theme=dark&tm-cr=212529&hr-cr=FFFFFF13&flags=circle&font=Arial, sans-serif" width="100%" height="370" style="border: 1px solid #eee;"></iframe>
                              </div> -->
                              
                    </div>
                    
                    
                                        
                    <!-- Info boxes -->
                    <div class="row">
                        
                           
                            <!-- information -->
                            <div class="col-12"   style="display: none;">
                              <div class="card" style="border-radius: 25px; padding: 20px;">
                                    <div class="card-header" style="border-bottom: none;">
                                      <h3 class="card-title" style="font-weight: 500; font-size: 20px; color: white;">Profile Info</h3>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer bg-white p-0">
                                      <ul class="nav nav-pills flex-column">
                                        <li class="nav-item">
                                          <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            My Sponsor
                                            <span class="float-right text-success">
                                            <i class="fas fa-user text-sm"></i>
                                            ----</span>
                                          </a>
                                          <!--<a href="javascript:void(0)" class="nav-link border-bottom" style="font-weight: bold;">-->
                                          <!--  My Package-->
                                          <!--  <span class="float-right text-white">-->
                                          <!--  <i class="fas fa-dollar-sign dollarsign text-sm"></i>-->
                                          <!--  100</span>-->
                                          <!--</a>-->
                                           <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            My Level Achieved
                                            <span class="float-right text-info">
                                            LEVEL 1</span>
                                          </a>
                                          <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            ID Status
                                                                                            <span class="float-right text-success">
                                                <i class="fas fa-user-check text-sm"></i>
                                                                                        Active</span>
                                          </a>
                                          <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            Joining Date
                                            <span class="float-right text-info">
                                            <i class="far fa-calendar-alt text-sm"></i>
                                            2024-10-09</span>
                                          </a>
                                                                                    <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            Activation Date
                                            <span class="float-right text-info">
                                            <i class="far fa-calendar-alt text-sm"></i>
                                            </span>
                                          </a>
                                          
                                          <a href="javascript:void(0)" class="nav-link border-bottom" >
                                            Income Limit
                                            <span class="float-right text-info">
                                            <i class="far fa-coin-alt text-sm"></i>
                                            300</span>
                                          </a>
                                          <!--<a href="javascript:void(0)" class="nav-link border-bottom" style="font-weight: bold;">-->
                                          <!--  Days Left-->
                                          <!--  <span class="float-right text-white">-->
                                          <!--  <i class="fas fa-user-clock text-sm"></i>-->
                                          <!--   Days</span>-->
                                          <!--</a>-->
                                                                                    
                                          <a href="javascript:void(0)" class="nav-link" >
                                            Joining Link
                                            <span class="float-right text-primary">
                                            <span onclick="copyToClipboard('#p1')" id="copybtn1" style="width: 80%;">copy</span></span>
                                          </a>
                                          <!-- new info div -->
                                          <p id="p1" style="display: none;"><?php echo base_url().'signup/'.$userDetai->user_id;?></p>
                                        </li>
                                      </ul>
                                    </div>
                                    <!-- /.footer -->
                              </div>
                            </div>
                               <br>
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
<script>
// Pass the PHP variable to JavaScript
var sponser_id = "<?php echo $userDetai->user_id; ?>"; // Embedding PHP value into JS

$(document).ready(function() {
    // Call the function to get the sponsored ID information
    get_user_detilsuser(sponser_id);
     get_user_teams(sponser_id);
     get_user_income(sponser_id);
     get_user_get_teambusness(sponser_id);
});

function get_user_detilsuser(sponser_id) {
    $.ajax({
        url: 'https://demo.ownzoinnovations.site/helpingplan/user/get_valll',
        data: { id: sponser_id },  // Sending the sponser_id to the server
        cache: false,
        dataType: 'json',  // Expecting JSON response
        type: "POST",
        success: function(response) {
            if (response.error) {
                // If there's an error (team member not found)
                alert(response.error);
            } else {
                // If the response contains active and inactive values
                var active = response.active;
                var inactive = response.inactive;

                // Update the HTML elements with the active and inactive values
                $(".active-value").text(active);  // Update active value in the corresponding element
                $(".inactive-value").text(inactive);  // Update inactive value in the corresponding element
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ajaxError: Could not get data from server');
        }
    });
}
function get_user_teams(sponser_id) {
    $.ajax({
        url: 'https://demo.ownzoinnovations.site/helpingplan/user/teammember',
        data: { id: sponser_id },  // Sending the sponser_id to the server
        cache: false,
        dataType: 'json',  // Expecting JSON response
        type: "POST",
        success: function(response) {
            if (response.teammem !== undefined && response.dirct_team !== undefined) {
                var teammem = response.teammem;
                var dirct_team = response.dirct_team;

                // Update the HTML elements with the team member counts
                $(".teammem-value").text(teammem);  // Update team member value
                $(".dirct-team-value").text(dirct_team);  // Update direct team value
            } else {
                alert('Invalid response data');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ajaxError: Could not get data from server');
        }
    });
}
function get_user_income(sponser_id) {
    $.ajax({
        url: 'https://demo.ownzoinnovations.site/helpingplan/user/get_all_income',
        data: { id: sponser_id },  // Sending the sponser_id to the server
        cache: false,
        dataType: 'json',  // Expecting JSON response
        type: "POST",
        success: function(response) {
            if (response.daily_sum !== undefined &&
                response.direct_sum !== undefined &&
                response.level_sum !== undefined &&
                response.reward_sum !== undefined) {

                // Extract the income values from the response
                var daily_sum = response.daily_sum;
                var direct_sum = response.direct_sum;
                var level_sum = response.level_sum;
                var reward_sum = response.reward_sum;

                // Update the HTML elements with the income values
                $(".daily-sum").text(daily_sum);  // Update daily income value
                $(".direct-sum").text(direct_sum);  // Update direct income value
                $(".level-sum").text(level_sum);  // Update level income value
                $(".reward-sum").text(reward_sum);  // Update reward income value
            } else {
                alert('Invalid response data');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ajaxError: Could not get data from server');
        }
    });
}
function get_user_get_teambusness(sponser_id) {
    $.ajax({
        url: 'https://demo.ownzoinnovations.site/helpingplan/user/get_teambusness',
        data: { id: sponser_id },  // Sending the sponser_id to the server
        cache: false,
        dataType: 'html',
        type: "POST",
        success: function(data) {
           // alert(data);
            // Check the response and show the appropriate message
            // if (data == 0) {
            //     $("#alertmsg").html('<span class="text-danger">User ID Not Available</span>');
            // } else {
            //     $("#alertmsg").html('<span class="text-success">' + data + '</span>');
            // }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('ajaxError: Could not get data from server');
        }
    });
}

</script>
