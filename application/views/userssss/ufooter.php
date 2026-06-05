        <!-- ========== Footer Start ========== -->
               <footer class="footer">
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-12 text-center">
                               <script>document.write(new Date().getFullYear())</script> &copy;Fo<iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                                   href="" class="fw-bold footer-text" target="_blank">Techzaa</a>
                           </div>
                       </div>
                   </div>
               </footer>
               <!-- ========== Footer End ========== -->

          </div>
          <!-- ==================================================== -->
          <!-- End Page Content -->
          <!-- ==================================================== -->

     </div>
     <!-- END Wrapper -->

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="<?php echo base_url();?>User_assets/base_urll.js"></script>

     <script src="<?php echo base_url();?>User_assets/assets/js/vendor.js"></script>

     <!-- App Javascript (Require in all Page) -->
      <script src="<?php echo base_url();?>User_assets/assets/js/app.js"></script>

     <!-- Vector Map Js -->
     <script src="<?php echo base_url();?>User_assets/assets/vendor/jsvectormap/js/jsvectormap.min.js"></script>
     <script src="<?php echo base_url();?>User_assets/assets/vendor/jsvectormap/maps/world-merc.js"></script>
     <script src="<?php echo base_url();?>User_assets/assets/vendor/jsvectormap/maps/world.js"></script>

     <!-- Dashboard Js -->
     <script src="<?php echo base_url();?>User_assets/assets/js/pages/dashboard.js"></script>
     <script src="<?php echo base_url();?>User_assets/assets/vendor/gridjs/gridjs.umd.js"></script>

<!-- Gridjs Demo js -->
<script src="<?php echo base_url();?>User_assets/assets/js/components/table-gridjs.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   function togglePassword(passwordFieldId, eyeIcon) {
    const passwordField = document.getElementById(passwordFieldId);
    const icon = eyeIcon.querySelector('i');

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}

</script>
</body>

</html><script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="<?php echo base_url();?>User_assets/base_urll.js"></script>
    
    <!-- Bootstrap 4 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
function getsponserdId()
{
  
 
var us_val = $('#sponsed_id').val();
$.ajax({
                url: ubase_Url+'Home/getspornserd',
                data: {id: us_val},
                cache: false,
                dataType: 'html',
                type: "POST",
                success: function(data)
                {
                    //alert(data);
          if(data==0)
        {
            $("#alertmsg").html('<span class="text-danger">User ID Not Available</span>');
            $("#sponsed_id").val('');
            
    

        }
        if(data != 0)
        {
            $("#alertmsg").html('<span class="text-success">'+data+'</span>');
          
          $("#sponsed_id").val(us_val);
         
          
        }
        
        
     },
      error: function (jqXHR, textStatus, errorThrown)
      {
      alert('ajaxError get data from ajax');
      }

      });

    }

    </script>
         <script>
   $(document).ready(function() {
    $('#datatable-example').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true
    });

    // // Set background color using jQuery after DataTable initialization
    // $('#datatable-example').css('background-color', '#f5f5f5'); // Set general table background
    // $('#datatable-example thead').css('background-color', '#4a90e2').css('color', 'white'); // Header
    // $('#datatable-example tbody').css('background-color', '#ffffff'); // Body
    // $('#datatable-example tfoot').css('background-color', '#d3d3d3'); // Footer (if present)
});
    </script>