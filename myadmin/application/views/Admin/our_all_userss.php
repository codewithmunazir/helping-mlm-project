<?php include('admin_header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $tittle;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Links</a></li>
              <li class="breadcrumb-item active">Get all Help-History</li>
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
          <label for="user_id">Filter by :</label>
    <input type="text" id="user_id" placeholder="Enter ....">
    <button id="filter">Filter</button>
          <table class="table table-dark"  id="recordsTable">
          <thead>
                  <tr>
                      <th scope="col">SI.No</th>
                     <th scope="col">UserID</th>
                     <th scope="col">Sponser</th>
                     <th scope="col">&nbsp;&nbsp;&nbsp;FullName&nbsp;&nbsp;&nbsp;</th>                    
                     <th scope="col">Mobile</th>
                     <th scope="col">Password</th>
                     <th scope="col">Tnx Password</th>
                     <th scope="col">Investment</th>
                     <th scope="col">Register_at</th>
                     <th scope="col">Provide</th>
                     <th scope="col">Get</th>
                     <th scope="col">Email</th>
                     <th scope="col" class="text-center">Edit</th>
                     <th scope="col" class="text-center">Block</th>
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
            url: base_Url+'Admin/fetch_data_register_data',
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
                        var encoded_password = encodeURIComponent(record.password);
                        var kyc;
                        var kmsg;
                        var activity;
                        var actmsg;
                             var deletee;
                              if(record.istopup==1)
                              {
                                kyc='Active';
                                kmsg='text-success';
                              }else{
                                kyc='Active';
                                kmsg='text-danger';
                              }
                       
                            if(record.isactive==1){
                              activity="Block";
                              actmsg="btn btn-success";
                            }
                            else {
                             activity="Unblock";
                              actmsg="btn btn-warning"; 
                            }
                            
                        var row = '<tr>' +
                            '<td>' + sr_no + '</td>' +  // Use the counter variable here for Sr. No
                             '<td><a href="' + main_base_Urll + 'godirect/' + record.user_id + '/' + encoded_password + '" target="_blank">' + record.user_id + '</a></td>' +
                             '<td>' + record.sponserd_id + '</td>' +
                            '<td> ' + record.fullname + '</td>' +
                            '<td>' + record.mobile + '</td>' +
                             '<td>' + record.password + '</td>' +
                              '<td>' + record.txn_password + '</td>' +
                               
                               '<td class="' + kmsg + '">' + kyc + '</td>'+
                               '<td>' + record.register_date + '</td>'+
                           
                              '<td>' + record.send_provider_amount + '/ '+record.my_commit_requestt+'</td>'+
                                '<td>' + record.take_amount_committty + '/ '+record.all_getrequest_withdraw+'</td>'+
                            '<td>' + record.email + '</td>' +
                         
                            
                             '<td class="text-center"><a href="' + base_Url + 'update_user_profile/' + record.user_id + '" class="btn btn-info m-1 p-1">Edit</a></td>' +
                              '<td class="text-center"><a onclick="return block_unblok(\'' + record.user_id + '\');" class="' + actmsg + '">' + activity + '</a></td>' +
                           
                            
                            
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
