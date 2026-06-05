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
<script>
$(document).ready( function () {
    $('#Mytable').DataTable();
    $('#Mytable_ty').DataTable();
    });

    </script>
</body>
</html>