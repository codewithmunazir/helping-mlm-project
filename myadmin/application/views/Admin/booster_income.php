

<?php include('admin_header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
     
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Level Income History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Income</a></li>
              <li class="breadcrumb-item active">level Income</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

         <div class="col-lg-12 col-12">
          <label for="user_id">Filter by User ID:</label>
    <input type="text" id="user_id" placeholder="Enter User ID">
    <button id="filter">Filter</button>
          <table class="table table-dark"  id="recordsTable">
          <thead>
                  <tr>
                     <th scope="col">Sr. No</th>
                     <th scope="col">UserID</th>
                     <!-- <th scope="col">Sponser</th> -->
                     <!-- <th scope="col">Full Name</th> -->
                     <th scope="col">Credit</th>
                     <th scope="col">Date</th>
                     <th scope="col">Status</th>
                     <th  scope="col">Remark</th>
                    
                     
                     
                  </tr>
                     </thead>
                      <tbody>
                           
                  </tbody>
                </table>
                 <div id="pagination">
        <button id="prev" disabled>Previous</button>
        <span id="page_info">Page 1</span>
        <button id="next">Next</button>
    </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="">Me</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b></b> 
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url();?>Assets_s/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo  base_url(); ?>Assets_s/plugins/base_urll.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/admin_custom.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>Assets_s/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>Assets_s/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>Assets_s/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url();?>Assets_s/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>Assets_s/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>Assets_s/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();?>Assets_s/dist/js/pages/dashboard2.js"></script>

   
    <script type="text/javascript">
    $(document).ready(function() {
    var current_page = 1;
    var total_records = 0;
    var records_per_page = 20;

    // Function to load data with or without filter and paginate
    function load_data(user_id = '', page = 1) {
        $.ajax({
            url: base_Url+'Admin/fetch_data_level_incme',
            type: "POST",
            data: {user_id: user_id, page: page},
            dataType: "json",
            success: function(data) {
                var tableBody = $('#recordsTable tbody');
                tableBody.empty(); // Clear the table before adding new rows
                
                total_records = data.total_records;
                
                if (data.records.length > 0) {
                    var sr_no = (page - 1) * records_per_page + 1; // Start the Sr. No from the correct number based on the page
                    $.each(data.records, function(index, record) {
                        var row = '<tr>' +
                            '<td>' + sr_no + '</td>' +  // Use the counter variable here for Sr. No
                            '<td>' + record.registeruser_id + '</td>' +
                            '<td>' + record.credit + '</td>' +
                            '<td>' + record.wdate + '</td>' +
                            '<td>' + record.wstatus + '</td>' +
                             '<td>' + record.remark + '</td>' +
                            '</tr>';
                        tableBody.append(row);
                        
                        sr_no++; // Increment Sr. No for the next row
                    });
                } else {
                    tableBody.append('<tr><td colspan="5">No records found</td></tr>');
                }

                update_pagination_info(page);
            },
            error: function() {
                alert('Failed to fetch data');
            }
        });
    }

    // Function to update pagination controls
    function update_pagination_info(page) {
        var total_pages = Math.ceil(total_records / records_per_page);
        $('#page_info').text('Page ' + page + ' of ' + total_pages);

        // Enable/disable pagination buttons based on the current page
        if (page <= 1) {
            $('#prev').attr('disabled', true);
        } else {
            $('#prev').attr('disabled', false);
        }

        if (page >= total_pages) {
            $('#next').attr('disabled', true);
        } else {
            $('#next').attr('disabled', false);
        }
    }

    // Load all data when the page loads
    load_data();

    // Filter data when the filter button is clicked
    $('#filter').on('click', function() {
        var user_id = $('#user_id').val();
        current_page = 1; // Reset to page 1 when filtering
        load_data(user_id, current_page);
    });

    // Pagination buttons
    $('#prev').on('click', function() {
        if (current_page > 1) {
            current_page--;
            var user_id = $('#user_id').val();
            load_data(user_id, current_page);
        }
    });

    $('#next').on('click', function() {
        var total_pages = Math.ceil(total_records / records_per_page);
        if (current_page < total_pages) {
            current_page++;
            var user_id = $('#user_id').val();
            load_data(user_id, current_page);
        }
    });
});

    </script>

</body>
</html>
