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
                            <div class="card-body">
                                <h5 class="card-title anchor mb-1" id="overview">
                                   
                                </h5>
                                <p class="sub-header">
                                    Grid.js is a Free and open-source JavaScript table plugin
                                </p>
                              
                                <div>
                                    <div class="py-3">
                                        <div id="tableyu-gridjs"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

          </div>
     </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>
       <script>
        $(document).ready(function() {
            if (document.getElementById("tableyu-gridjs")) {
                // Fetch data using AJAX
                $.ajax({
                    url: ubase_Url+'Home/get_table', // Adjust this to match your routing
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Initialize the Grid.js table with data from the server
                        new gridjs.Grid({
                            columns: [{
                                name: 'ID',
                                formatter: (cell) => gridjs.html('<span class="fw-semibold">' + cell + '</span>')
                            },
                            "Name",
                            {
                                name: 'Email',
                                formatter: (cell) => gridjs.html('<a href="mailto:' + cell + '">' + cell + '</a>')
                            },
                            "Position", 
                            "User ID", 
                            {
                                name: 'Status',
                                formatter: (cell) => gridjs.html('<span class="status-' + (cell === 'Active' ? 'active' : 'inactive') + '">' + cell + '</span>')
                            },
                            {
                                name: 'Actions',
                                width: '120px',
                                formatter: (cell) => gridjs.html("<a href='#' class='text-reset text-decoration-underline'>Details</a>")
                            }],
                            pagination: {
                                limit: 10
                            },
                            sort: true,
                            search: true,
                            data: response.data // Use the data from the AJAX response
                        }).render(document.getElementById("tableyu-gridjs"));
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching user data:', error);
                    }
                });
            }
        });
    </script>
    