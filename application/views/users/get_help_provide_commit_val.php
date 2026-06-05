<?php include('uheader.php'); ?>
<style type="text/css">
    @media (max-width: 768px) {
        .accordion-button {
            font-size: 14px;
        }
        .table th, .table td {
            padding: 8px;
        }
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $tag; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://aidigitalassets.global">Home</a></li>
                        <li class="breadcrumb-item active">Request History</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" style="margin-top: -35px;">
            <div class="row">
                <!-- Primary table start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">
                                    <!-- fund history -->
                                    <table class="table text-center" id="examplert">
                                        
                                        <tbody class="accordion" id="accordionExample">
                                            <?php foreach ($get_help_nt_provide_historyy as $key => $value): ?>
                                                <tr>
                                                    <td>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="heading<?php echo $key + 1; ?>">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key + 1; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key + 1; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Details for item <?php echo $key + 1; ?>">
                                                                    (<?php echo $key + 1; ?>) $<?php echo number_format($value['request_amt'], 2); ?>
                                                                </button>
                                                             </h2>
                                                            <div id="collapse<?php echo $key + 1; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key + 1; ?>" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body bg-dark responsive">
                                                                    <?php  
                                                                        // Fetch the last user associated with the commitment ID
                                                                        $get_user = get_name_user($value['g_registeruser_id']);
                                                                        $get_userp = get_name_user($value['p_registeruser_id']);
                                                                        // Fetch the total approved amount for the current commitment ID
                                                                        //$get_Appvroved_amt = get_total_sum_coomit_fund_this_commit($value['commit_id']);
                                                                    ?>
                                                                    <!-- Commitment Details -->
                                                                   
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
                                                                    <p>Provided : <?php echo $get_userp;?>
                                                                    <!-- Display the Approved Amount -->
                                                                    <!-- <p>Approved Amount: <?php //echo number_format($get_Appvroved_amt, 2); ?></p> -->

                                                                    <!-- Display the Approved Date -->
                                                                    <p><?php echo $value['request_date']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Primary table end -->
            </div>
        </div>
    </section>
</div>
<?php include('ufooter.php'); ?>

<!-- Include jQuery, DataTables JS, and Bootstrap JS (Ensure they're loaded in this order) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        // Initialize DataTables for the table with id "example"
        $('#examplert').DataTable({
            "responsive": true, // Make it responsive
            "paging": true, // Enable pagination
            "searching": true, // Enable search functionality
            "lengthChange": true // Allow changing number of rows per page
        });
        
        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
