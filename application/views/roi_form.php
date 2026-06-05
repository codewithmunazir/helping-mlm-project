<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <div class="card shadow-lg p-4">
                    <h3 class="text-center mb-4">Enter Details</h3>
                    <form action="https://test.ownzoinnovations.tech/investment-panel/helpingplan/home/roi_generate_staic" method="POST">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID:</label>
                            <span id="alertmsg"></span> <!-- This is where the alert message will appear -->
                            <input type="text" class="form-control" id="user_id" name="user_id" onchange="return getSponsedId();" required>
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">Number:</label>
                            <input type="number" class="form-control" id="number" name="no_time" required>
                        </div>

                        <input type="submit" class="btn btn-primary w-100" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        function getSponsedId() {
            var delurl = 'https://test.ownzoinnovations.tech/investment-panel/helpingplan/Home/getspornserd';
            var userVal = $('#user_id').val(); // Get value from the input field

            // Simple validation to ensure user ID is not empty
            if(userVal.trim() === '') {
                $("#alertmsg").html('<span class="text-warning">Please enter a valid User ID.</span>');
                return; // Stop if the field is empty
            }

            // Trigger AJAX request
            $.ajax({
                url: delurl,
                type: "POST", 
                data: { id: userVal }, // Send user ID as POST data
                dataType: 'html',
                cache: false,
                success: function(data) {
                    // Success response from the server
                    if (data == 0) {
                        // Invalid user ID
                        $("#alertmsg").html('<span class="text-danger">User ID Not Available</span>');
                        alert('Invalid referral Id || User ID Not Available');
                        $("#user_id").val(''); // Reset the input if invalid
                    } else {
                        // Valid user ID response
                        $("#alertmsg").html('<span class="text-success">User ID is valid.</span>');
                        alert(data); // You might want to display the response differently, here just an alert for debugging
                        $("#user_id").val(userVal); // Optionally set the user ID back into the field
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle AJAX errors
                    $("#alertmsg").html('<span class="text-danger">An error occurred, please try again.</span>');
                    alert('AJAX error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        }
    </script>

</body>
</html>
