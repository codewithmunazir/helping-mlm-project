<?php include('admin_header.php');?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Withdrawal Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Fund</a></li>
              <li class="breadcrumb-item active">withdrawal Request</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-12">
            <label for="user_id">Filter by User ID:</label>
            <input type="text" id="user_id" placeholder="Enter User ID">
            <button id="filter">Filter</button>

            <table class="table table-dark" id="recordsTable">
              <thead>
                <tr>
                  <th scope="col">Req.Id</th>
                  <th scope="col">User Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mobile</th>
                  <th scope="col">Withdrawal Amount</th>
                   <th scope="col">Success</th>
                     <th scope="col">Balance</th>
                      <th scope="col">Request By</th>
                       <th scope="col"> Date</th>
                       <th scope="col">Status</th>
                   <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                <!-- Table rows will be appended here -->
              </tbody>
            </table>

            <div id="pagination">
              <button id="prev" disabled>Previous</button>
              <span id="page_info">Page 1</span>
              <button id="next">Next</button>
            </div>
          </div>
        </div>
      </div>
    </section>
      <div class="modal fade" id="actionwithdrawal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Action on Requeest</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
           
          </div>
          <form action="<?php echo base_url();?>withdrawal-request_admin" method="post" onsubmit="return confirmSubmit(event)" >
          <div class="modal-body">
             <div class="row">
              
              <div class="col-sm-12"  id="bankname"></div>
              <div class="col-sm-12" id="Holder_acc"></div>
              <div class="col-sm-12" id="Account_no"></div>
              <div class="col-sm-12" id="ifsc_no"> </div>
              <div class="col-sm-12" id="usdt_no"></div>
              <div class="col-sm-12">
              <label><b>CURRENCY TYPE </b></label>
                <b><span class="text-primary  p-2" id="amountty"></span></b>
              </div>
              <div class="col-sm-12">
              <label><b>Amount </b></label>
                <b><span class="text-primary p-2" id="reqamt"></span></b>
              </div>
              <div class="col-sm-12" id="reqamtinr">
              
              </div>
              
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <input type="hidden" name="id" id="withdwal_id">
                </div>
              </div>
            
              <div class="col-sm-12">
                                      <div class="form-group">
                                        <label><b>ON ACTION</b></label>
                                        <input type="hidden" name="action" value="0">
                        <!-- <div class="form-check">
                          <input class="form-check-input" type="radio" name="action" value="0">
                          <label class="form-check-label">Accept</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="action" value="0" >
                          <label class="form-check-label">Reject</label>
                        </div> -->
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                           <label> Referance / Hash Id / Reason</label>
                          <input type="text" class="form-control" name="refrence" required>
                      </div>
                    </div>
                   <!-- <div class="col-sm-12">
                      <div class="form-group">
                           <label>Remark / Comment</label>
                          <input type="text" class="form-control" name="comment" >
                      </div>
                    </div>-->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
      </form>
        </div>
      </div>
    </div>
    <!-- end modal -->
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="">Me</a>.</strong>
    All rights reserved.
  </footer>
</div>

<!-- REQUIRED SCRIPTS -->
<script src="<?php echo base_url();?>Assets_s/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/base_urll.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/admin_custom.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url();?>Assets_s/dist/js/adminlte.js"></script>

<script>
$(document).ready(function() {
    var user_id = ''; // User ID filter
    var currentPage = 1; // Current page
    var recordsPerPage = 100; // Records per page, can adjust as needed

    // Function to fetch data with pagination and filtering
    function fetchWithdrawalData(page) {
        $.ajax({
            url: base_Url + 'Admin/fetch_data_withdrwaldata', // Correct URL
            type: 'POST',
            data: { user_id: user_id, page: page },
            dataType: 'json',
            success: function(response) {
                console.log('AJAX Response:', response);

                if (response && response.results) {
                    var results = response.results;
                    var totalRecords = response.total_records;
                    var totalPages = Math.ceil(totalRecords / recordsPerPage);

                    // Empty the table and populate it with new data
                    $('#recordsTable tbody').empty();
                    $.each(results, function(index, record) {
                      var typee = record.eth_add; // Assign the value of record.eth_add to typee

                      var statust;  // Declare the status variable
                      var vcvl;
                      // Check if typee is null or empty
                      if (typee === null || typee === '') {
                          statust = '<span style="color:green;">admin</span>'; 
                          vcvl = '<a class="btn btn-success">Admin</a>'
                           // Set status to "empty" if typee is null or an empty string
                      } else {
                          statust = '';  // Set status to "not empty" if typee is not null or empty
                          vcvl= '<a onclick="return withdrawalAction(' + record.id+ ');" class="btn btn-danger">Reject</a>'
                      }
                      var status;
                      if(record.request_status  == 2)
                      {
                      status= 'On pending';
                     
                      }
                      
                      else{
                        status='none';
                       
                      }

                      
                        var row = `
                            <tr>
                                <td>${record.id}</td>
                                <td>${record.registeruser_id}</td>
                                <td>${record.fullname}</td>
                                <td>${record.email}</td>
                                <td>${record.mobile}</td>
                                 <td>$ ${record.request_amt}</td>
                                  <td>$ ${record.take_success_amt}</td>
                                  <td>$ ${record.request_amt - record.take_success_amt}</td>
                                   <td>${statust}</td>
                                    <td> ${record.request_date}</td>
                                     <td>${status}</td>
                                
                                <td>
                                    ${vcvl}
                                </td>
                            </tr>
                        `;
                        $('#recordsTable tbody').append(row);
                    });

                    // Update pagination
                    $('#page_info').text(`Page ${currentPage} of ${totalPages}`);
                    $('#prev').prop('disabled', currentPage === 1);
                    $('#next').prop('disabled', currentPage === totalPages);
                } else {
                    console.error('Error: Unexpected response format');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }

    // Handle pagination
    $('#prev').click(function() {
        if (currentPage > 1) {
            currentPage--;
            fetchWithdrawalData(currentPage);
        }
    });

    $('#next').click(function() {
        currentPage++;
        fetchWithdrawalData(currentPage);
    });

    // Handle filtering by user ID
    $('#filter').click(function() {
        user_id = $('#user_id').val(); // Get the filter value
        currentPage = 1; // Reset to the first page
        fetchWithdrawalData(currentPage);
    });

    // Initial fetch
    fetchWithdrawalData(currentPage);
});
</script>
<script>function confirmSubmit(event) {
    event.preventDefault(); // Stop form submission
    let confirmation = confirm("Are you sure you want to submit this form?");
    if (confirmation) {
        event.target.submit(); // If confirmed, submit the form
}
}
</script>
</body>
</html>
