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
                                   Direct team Left and Right Both Position
                                </p>
                              
                                <div>
                                    <div class="py-3">
                                        <div id="dirct-team"></div>
                                    </div>
                                    <div id="pagination-controls">
    <button id="prev-page" onclick="changePage(-1)">Previous</button>
    <button id="next-page" onclick="changePage(1)">Next</button>
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
    
    let currentPage = 1; // Keep track of the current page

    function loadData(page) {
        $.ajax({
            url: ubase_Url+'User/get_mydirect_node', // Adjust this to match your routing
            type: 'GET',
            dataType: 'json',
            data: {
                page: page, // Send the current page number
                limit: 10   // Set the number of records per page
            },
            success: function(response) {
                // Initialize the Grid.js table with data from the server
                new gridjs.Grid({
                    columns: [
                        {
                            name: 'SrNo',
                            formatter: (cell) => gridjs.html('<span class="fw-semibold">' + cell + '</span>')
                        },
                        {
                            name: 'Userid',
                            formatter: (cell) => gridjs.html('<a href="mailto:' + cell + '">' + cell + '</a>')
                        },
                        "Full Name",
                        "Mobile",
                        "Sponsor",
                        "Position",
                        "Joining Date",
                        "Deposit Amount",
                        "Team Business",
                        {
                            name: 'Status',
                            formatter: (cell) => gridjs.html('<span class="status-' + (cell === 'Active' ? 'active' : 'inactive') + '">' + cell + '</span>')
                        }
                    ],
                    pagination: {
                        limit: 10,
                        next: true,
                        previous: true
                    },
                    sort: true,
                    search: true,
                    data: response.data // Use the data from the AJAX response
                }).render(document.getElementById("dirct-team"));
            },
            error: function(xhr, status, error) {
                console.error('Error fetching user data:', error);
            }
        });
    }

    // Load the first page of data on initial load
    loadData(currentPage);
</script>
<script type="text/javascript">
    function changePage(direction) {
    currentPage += direction;
    loadData(currentPage);
}

</script>