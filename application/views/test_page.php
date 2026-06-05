<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commitments History</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .accordion-button {
            background-color: #d8cccc14 !important;
            color: green !important;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <!-- Accordion -->
    <div class="accordion" id="accordionExample">
        <?php foreach ($Commitment_historyy as $key => $value): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $key + 1; ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key + 1; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key + 1; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Details for item <?php echo $key + 1; ?>">
                        (<?php echo $key + 1; ?>) $<?php echo number_format($value['request_amount'], 2); ?>
                    </button>
                </h2>
                <div id="collapse<?php echo $key + 1; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key + 1; ?>" data-bs-parent="#accordionExample">
                    <!-- <div class="accordion-body">
                        <p>Status: <?php //echo $value['status']; ?></p>
                        <p>Get Help: <?php //echo $value['get_help']; ?></p>
                        <p><?php //echo $value['created_at']; ?></p>

                    </div> -->

                    <div class="accordion-body">
    <!-- Commented out the echo statements for 'status', 'get_help', and 'created_at' to show dynamic values -->
    
    <?php  
        // Fetch the last user associated with the commitment ID
        $get_user = get_last_user($value['commit_id']);
        
        // Fetch the total approved amount for the current commitment ID
        $get_Appvroved_amt = get_total_sum_coomit_fund_this_commit($value['commit_id']);
    ?>

    <!-- Display Commitment Details -->
    <p>Register User ID: <?php echo $value['registeruser_id']; ?></p>

    <!-- Status Handling -->
    <p>Status: <?php 
        $stt = $value['status']; // The status from the commitment data
        switch ($stt) {
            case 1:
                $status = 'Complete Success';
                break;
            case 2:
                $status = 'Pending';
                break;
            case 0:
                $status = 'Cancelled / Rejected';
                break;
            default:
                $status = 'Unknown';
        }
        echo $status;
    ?></p>

    <!-- Display the "Get Help" information -->
    <p>Get Help: <?php echo $get_user; ?></p>

    <!-- Display the Approved Amount -->
    <p>Approved Amount: <?php echo number_format($get_Appvroved_amt, 2); ?></p>

    <!-- Display the Approved Date -->
    <p>Approved Date: <?php echo date('d/m/Y H:i:s', strtotime($value['approved_date'])); ?></p>
</div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        <?php echo $pagination_links; ?>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<!-- Tooltip Initialization -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</body>
</html>
