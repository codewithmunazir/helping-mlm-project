
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS (CDN version) -->
    <script src="https://cdn.jsdelivr.net/npm/datatables.net@1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@2.0.0/js/dataTables.bootstrap5.min.js"></script>

    <!-- Select2 JS (ensure it's loaded after jQuery) -->
    <script src="<?PHP echo base_url();?>User_assest/js/select2.full.min.js"></script>

    <!-- Other Custom JS libraries -->
    <script src="<?PHP echo base_url();?>User_assest/js/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/moment.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/jquery.inputmask.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/daterangepicker.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/bootstrap-switch.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/bs-stepper.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/dropzone.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/adminlte.min.js"></script>
    <script src="<?PHP echo base_url();?>User_assest/js/demo.js"></script>

    <!-- Page-specific scripts -->
    <script src="<?PHP echo base_url();?>User_assest/js/dashboard2.js"></script>

    <!-- Toastr notifications -->
    <script src="<?PHP echo base_url();?>User_assest/js/toastr.min.js"></script>

    <!-- Optional base URL JS script -->
    <script src="<?PHP echo base_url();?>User_assest/base_urll.js"></script>

    <!-- Ensure proper initialization of salesChartCanvas -->
    <script>
        $(document).ready(function() {
            // Ensure the canvas element is defined and accessible
            var salesChartCanvas = document.getElementById("salesChartCanvas").getContext("2d");

            // Initialize the chart after the DOM is ready
            var salesChart = new Chart(salesChartCanvas, {
                type: 'line', // Example chart type
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Sales',
                        data: [100, 200, 150, 250, 300],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false
                    }]
                }
            });
        });
    </script>



  <!-- Initialize DataTable -->
   <script>
function getsponserdId()
{
var us_val = $('#sponsed_id').val();
$.ajax({
                url: 'https://demo.ownzoinnovations.site/helpingplan/Home/getspornserd',
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
      $('#example').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#example1').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#example2').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#example3').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#example4').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#example5').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#example6').DataTable();
    });
  </script>
  <script type="text/javascript">
    $('#example').DataTable({
  "paging": true,       // Enable pagination
  "searching": true,    // Enable search
  "ordering": true,     // Enable column sorting
  "info": true,         // Show table info
  "lengthMenu": [5, 10, 15, 20],  // Set the page length options
  "language": {
    "search": "Filter records:"  // Customize search box text
  }
});

</script>
<script type="text/javascript">
    $('#example1').DataTable({
  "paging": true,       // Enable pagination
  "searching": true,    // Enable search
  "ordering": true,     // Enable column sorting
  "info": true,         // Show table info
  "lengthMenu": [5, 10, 15, 20],  // Set the page length options
  "language": {
    "search": "Filter records:"  // Customize search box text
  }
});

</script>
<script type="text/javascript">
    $('#example2').DataTable({
  "paging": true,       // Enable pagination
  "searching": true,    // Enable search
  "ordering": true,     // Enable column sorting
  "info": true,         // Show table info
  "lengthMenu": [5, 10, 15, 20],  // Set the page length options
  "language": {
    "search": "Filter records:"  // Customize search box text
  }
});

</script>
<script type="text/javascript">
    $('#example5').DataTable({
  "paging": true,       // Enable pagination
  "searching": true,    // Enable search
  "ordering": true,     // Enable column sorting
  "info": true,         // Show table info
  "lengthMenu": [5, 10, 15, 20],  // Set the page length options
  "language": {
    "search": "Filter records:"  // Customize search box text
  }
});

</script>
<script type="text/javascript">
    $('#example4').DataTable({
  "paging": true,       // Enable pagination
  "searching": true,    // Enable search
  "ordering": true,     // Enable column sorting
  "info": true,         // Show table info
  "lengthMenu": [5, 10, 15, 20],  // Set the page length options
  "language": {
    "search": "Filter records:"  // Customize search box text
  }
});

</script>
<script type="text/javascript">
    $('#example3').DataTable({
  "paging": true,       // Enable pagination
  "searching": true,    // Enable search
  "ordering": true,     // Enable column sorting
  "info": true,         // Show table info
  "lengthMenu": [5, 10, 15, 20],  // Set the page length options
  "language": {
    "search": "Filter records:"  // Customize search box text
  }
});

</script>
<script>
function toggleFullScreen(elem) {
  if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
    if (elem.requestFullScreen) {
      elem.requestFullScreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullScreen) {
      elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    }
  } else {
    if (document.cancelFullScreen) {
      document.cancelFullScreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitCancelFullScreen) {
      document.webkitCancelFullScreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }
  }
}

</script>

<script>
function passwordclick(){
    
    var buttomclass = document.getElementById('pass'); 
    
    if($('#pass').hasClass('hide')){
        $('input[name="password"]').attr('type','text');
        $('#pass').removeClass('hide');
        $('#pass').addClass('show');
        $('#pass').text('Hide');
    }else{
        $('input[name="password"]').attr('type','password');
        $('#pass').removeClass('show');
        $('#pass').addClass('hide');
        $('#pass').text('Show');
    }
}
</script>

<script>
    $('form').submit(function(){
        $(this).find('button[type=submit]').prop('disabled', true);
    });
</script>

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
<!-- toast r alert start -->


        

<!-- toast r alert end -->

<!-- toast r form error alert start -->

                
<!-- toast r form error alert start -->

<script type="text/javascript">

  function showpass(val){
    alert(val);
  }

</script>
                
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $('#reservationdate1').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  // document.addEventListener('DOMContentLoaded', function () {
  //   window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  // });

  // DropzoneJS Demo Code End
</script>
<!-- toast r alert start -->
<script>
  function baseurl(){
      var url = "https://demo.ownzoinnovations.site/helpingplan";
      return url;
  }
</script>

<script>
    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
      toastr.success("Refereal link copy successfully");
    }

    function copyToClipboard1(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
      toastr.success("Refereal link copy successfully");
    }
    
</script>
