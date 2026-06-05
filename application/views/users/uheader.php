
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title;?> </title>
    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url();?>User_assest/public/favicon.png">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (Optional, if you're using these) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS (CDN version) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- DataTables CSS (CDN version) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@2.0.0/css/dataTables.bootstrap5.min.css">

    <!-- Local styles (Custom, ensure files are correctly uploaded) -->
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/css/daterangepicker.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/bootstrap/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/bootstrap/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/css/select2.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/bootstrap/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/bootstrap/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/css/bs-stepper.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/css/dropzone.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/css/adminlte.min.css">
    <link rel="stylesheet" href="<?PHP echo base_url();?>User_assest/css/toastr.min.css">

    <!-- Chart.js (for sales chart) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  
</head>
<body class="sidebar-mini accent-info " style="background-color: rgb(0 15 21);">


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/678b6ee43a8427326070f5df/1ihsaibtf';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

   <style>
    body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}


    .auto-index td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: counter(Serial); /* Display the counter */
}
/* Style for the answer text */


  .answer-text {
            padding: 10px;
            background-color: #696a6ee6;
            color: white;
            border-radius: 5px;
        }
        .question-text {
            font-weight: bold;
        }
    .node circle {
            fill: #ff6c2f;
            cursor: pointer;
            height: 100px;
            width: 100px;
        }
        .node text {
            font: 12px sans-serif;
            pointer-events: none; /* Prevent mouse events on the text */
        }



      .tooltip {
        position: absolute;
        padding: 8px;
        background: lightgray;
        border: 1px solid #ddd;
        border-radius: 4px;
        pointer-events: none;
        font-size: 12px;
        color: #333;
        display: none;
    }

    /* Tooltip table styling */
    .tooltip table {
        width: 100%;
        border-collapse: collapse;
    }

    .tooltip th, .tooltip td {
        padding: 4px;
        border: 1px solid #ccc;
        text-align: left;
        
    }

    .tooltip th, .tooltip td{
        background-color: #2D2D2D;
        font-weight: bold;
    }
    th, td{
      white-space: nowrap;
    }
    .table.text-center, .table.text-center td, .table.text-center th{
        text-align: left !important;
    }
    .nav-pills .nav-link:not(.active):hover {
        color: #17a2b8  ;
    }
    .content-wrapper {
      background: #000f15; 
      background-repeat: repeat;
    }
    .text-dark {
        color: #fff !important;
    }
    p {
        color: #fff;
        margin-top: 0;
        margin-bottom: 1rem;
    }
    label {
        color: #fff;
        display: inline-block;
        margin-bottom: .5rem;
    }
    .table.text-center, .table.text-center td, .table.text-center td {
        text-align: left !important;
        color: white;
    }
    th {
        color: white;
    }
    .form-control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #000f15;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    .form-control:disabled, .form-control[readonly] {
        background-color: #3c414e;
        color: #9d9c9c;
        border-color: #717378;
        opacity: 1;
    }
    .custom-select{
        background: #000f15;
        color: #828181;
    }
    .custom-select:disabled {
        color: #b2b1b0;
        background-color: #3c414e;
    }
    .form-control:focus {
        color: #949ca4;
        background-color: #000f15;
        border-color: #798081 !important;
        outline: 0;
        box-shadow: inset 0 0 0 transparent, none;
    }
    .content-header{
        background: #000f15;
        padding-bottom: 1px !important;
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1) !important;
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color) !important;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)!important;
    }
    .content-header h1{
        font-size: 1.8rem;
        font-weight: bold;
    }
    .content-header .breadcrumb{
        display: none !important;
    }
    .text-capitalize{
        background: #000f15;
        color: #828fa2 !important;
    }
    @media (min-width: 1200px)
    .col-lg-3 .small-box h3, .col-md-3 .small-box h3, .col-xl-3 .small-box h3 {
        font-size: 1.9rem !important;
    }
    .small-box h3 {
        font-size: 1.7rem;
        font-weight: 700;
        margin: 0 0 10px 0;
        padding: 0;
        white-space: nowrap;
    }
    
    @media (max-width: 767.98px){
      .small-box .icon {
        display: block;
      }
      .small-box>.inner {
        padding: 10px;
        text-align: left;
      }
    .navr-1{
        margin-bottom: -20px !important;
    }
    .navr-3{
        margin-bottom: -25px !important;
    }
        
    }
    .navbar-info {
        background-color: #eaeaea;
    }
    .sidebar-dark-info .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-info .nav-sidebar>.nav-item>.nav-link.active {
        background: linear-gradient(92.36deg, #8cba0d -9.78%, #49967a 47.15%, #05a59d 105.24%) !important;
        color: #fff;
        /*background: linear-gradient(to right, #f9b708, #f5b407);*/
        width: 95%;
        border-radius: 5px;
        margin: auto;
        font-weight: 500;
    }
    
    .nav-link.active>.nav-icon{
        margin-left: 2px !important;
    }
    .nav-sidebar>.nav-item .nav-icon{
        margin-right: 0.5rem;
    }
    .bg-info {
        background-color: #ed3b48 !important;
    }
    .nav-pills .nav-link:not(.active):hover {
        color: #ed3b48;
    }
    
    .accent-info .btn-link, .accent-info a:not(.dropdown-item):not(.btn-app):not(.nav-link):not(.brand-link):not(.page-link):not(.btn) {
        color: #e10400;
    }
    .nav-flat.nav-sidebar>.nav-item .nav-treeview, .nav-flat.nav-sidebar>.nav-item>.nav-treeview{
       background: rgb(255 255 255 / 0%);
    }
    .nav-flat.nav-sidebar>.nav-item .nav-treeview .nav-item>.nav-link, .nav-flat.nav-sidebar>.nav-item>.nav-treeview .nav-item>.nav-link{
        border-left: 0rem solid;
    }
    [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link:hover{
        background-color: #2c3344 !important;
        width: 95%;
        border-radius: 5px;
        margin: auto;
    }
    
    [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link{
        color: #c5c5c5;
    }
    
    [class*=sidebar-light-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-light-] .nav-sidebar>.nav-item:hover>.nav-link{
        background-color: linear-gradient(92.36deg, #8cba0d -9.78%, #49967a 47.15%, #05a59d 105.24%) !important;
        width: 95%;
        border-radius: 5px;
        margin: auto;
        color: #fff;
    }
    .accent-info .dropdown-item.active, .accent-info .dropdown-item:active{
        background: #e5e5e5;
    }
    .dropdown-menu-lg {
        min-width: 220px !important;
    }
    [class*=sidebar-light-] .sidebar a {
        color: #9fa2aa;
    }
    
    /*.nav-size-c{*/
    /*    margin-bottom: 0px !important;*/
    /*}*/
    
    /*buttton style*/
    .btn-primary {
        color: #fff !important;
        font-weight: 500;
        background: linear-gradient(to right, #1089ac, #b83add) !important;
        border-color: none !important;
        padding: 7px 25px;
        border: none !important;
        border-radius: 10px !important;
    }
    .btn-primary:hover {
        color: #fff;
        font-weight: 500;
        background-color: #e91e63;
        border-color: #e91e63;
        border: 2px solid #e91e63;
        box-shadow: none;
    }
    .btn-primary:focus{
        color: #fff;
        font-weight: 500;
        background-color: #e91e63;
        border-color: #e91e63;
        border: 2px solid #e91e63;
        box-shadow: none;
    }
    .accent-info .btn-link, .accent-info a:not(.dropdown-item):not(.btn-app):not(.nav-link):not(.brand-link):not(.page-link):not(.btn) {
        color: #e5a600;
    }
    
    /*shadow animation*/
    
    .btn {
      display: block;
      border-radius: 0%;
         background: #ff4040;
    box-shadow: none !important;
      color: white;
      cursor: pointer;
      box-shadow: 0 0 10px 0 #ff4081;
      /*animation: pulse 2s infinite;*/
    }
    .btn:hover {
      animation: none;
    }
    
    @-webkit-keyframes pulse {
      0% {
        -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
      }
      70% {
          -webkit-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
      }
      100% {
          -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
      }
    }
    @keyframes  pulse {
      0% {
        -moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
        box-shadow: 0 0 0 0 rgba(204,169,44, 0.4);
      }
      70% {
          -moz-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
          box-shadow: 0 0 0 10px rgba(204,169,44, 0);
      }
      100% {
          -moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
          box-shadow: 0 0 0 0 rgba(204,169,44, 0);
      }
    }
    
    /*shadow animation*/
    
    /*slider*/
    .sidebar-collapse .main-sidebar, .sidebar-collapse .main-sidebar::before {
        margin-left: -280px;
    }
    .main-sidebar, .main-sidebar::before {
        transition: margin-left .3s ease-in-out,width .3s ease-in-out;
        width: 280px;
    }
    
    .main-header{
        border-bottom: none !important;
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1) !important;
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color) !important;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)!important;
        z-index: 1034;
    }
    .siderbtn{
        border-radius: 50% !important;
        width: 47px !important;
        font-size: 22px !important;
        font-weight: unset !important;
        height: 47px !important;
        margin-left: 20px !important;
        color: #d7d7ff   !important;
        padding-left: 14px !important;
    }
    .siderbtn:hover{
        background: #eaedf1 !important;
    }
    .w-full {
        width: 100% !important;
        height: 35px;
        margin-top: 0px;
    }
    .flex { 
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
    }
    .justify-center {
        justify-content: center!important;
    }
    .items-center {
        align-items: center!important;
    }
    .logo-s-h{
        height: 45px;
        width: 80%;
    }
    .welcome-txt{
        font-size: 2.1rem;
        font-weight: 500;
        font-family: sans-serif;
        color: #28293b;
    }
    .dashbtn{
        margin-top: 7px;
        float: right;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
        color: #495057;
        background-color: #dde3e9;
        border-radius: 25px;
        border-color: #dee2e6 #dee2e6 #fff;
    }
    .nav-tabs .nav-link{
        border: 0px solid transparent !important;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        color: #bab5b5;
    }
    .bg-white {
        background-color: #2c3344 !important;
    }
    .nav-pills .nav-link {
        color: #c5c5c6;
    }
    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #2c3344;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }
    .nav-tabs{
        border-bottom: 0px solid !important;
    }
    [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active:hover{
        color: #ffffff;
    }
    .text-lg {
        font-size: 1.25rem !important;
        color: white;
    }
    /*linear-gradient(246.62deg, #F47BFF -10.93%, #6D73D4 7.34%, #0DCBB3 89.85%, #27FF14 106.94%);*/
    /*    --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1)*/
    .shadow {
      border-radius: 20px;   
       transition: all 0.3s ease; 
      /* background: linear-gradient(246.62deg, #ff18c0 -10.93%, #5daeef 7.34%, #94ef5b 89.85%, #5fe9e6 106.94%) !important; */
      /* background: linear-gradient(246.62deg, #2c3e50 -10.93%, #4680ff 40%, #34495e 80%, #2c3e50 106.94%) !important; */
/*      background: linear-gradient(246.62deg, #f0f4f8 -10.93%, #4680ff 40%, #a1c4fd 80%, #f0f4f8 106.94%) !important;*/
/*background: linear-gradient(246.62deg, #f0f4f8 -10.93%, #00FFBE 40%, #02af96 80%, #f0f4f8 106.94%) !important;*/
 border: 4px solid #03d0bd; 
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color) !important;
/*     //   box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)!important;*/
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5), 0 0 20px rgba(3, 208, 189, 0.6); /* Shadow around the border */

    }
    hr.solid-line {
    border: none; /* Remove default border */
    border-top: 5px solid #03d0bd;; /* 5px solid black top border */
    color: #03d0bd; /* Optional, applies color to the line */
    height: 0; /* Ensures no extra height is added */
    margin: 2px 0; /* Optional: adds spacing above and below the line */
}
    .shadowa{
        border-radius: 20px;   
    background-color: #212529 !important; /* Background color */
    background: black; /* Optional, as the background color is already set */
    border: 4px solid #03d0bd; /* Border with color */
    position: relative; /* Allows us to position the shadow relative to the div */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5), 0 0 20px rgba(3, 208, 189, 0.6); /* Shadow around the border */
    padding: 20px; /* Add padding to prevent the shadow from being too close to content */
    transition: all 0.3s ease; /* Optional transition for smooth effect */

    }
    .shadowaz{
        border-radius: 20px;   
    background-color: #212529 !important; /* Background color */
    background: black; /* Optional, as the background color is already set */
    border: 4px solid #03d0bd; /* Border with color */
    position: relative; /* Allows us to position the shadow relative to the div */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5), 0 0 20px rgba(3, 208, 189, 0.6); /* Shadow around the border */
    padding: 20px; /* Add padding to prevent the shadow from being too close to content */
    transition: all 0.3s ease; /* Optional transition for smooth effect */

    }
    .shadowass{
      border-radius: 20px;   
      background-image: url('<?php echo base_url();?>User_assest/public/frontnew/assets/images/bg-min.jpg'); /* Replace with your image URL */
      background-size: cover; /* Ensures the div is fully covered, but may crop the image */
    background-repeat: no-repeat; /* Prevents repeating the image */
    background-position: center; /* Centers the image within the div */
   /* background-color: #212529 !important; Background color */ 
   /* background: black; /* Optional, as the background color is already set */
    border: 4px solid #03d0bd; /* Border with color */
    position: relative; /* Allows us to position the shadow relative to the div */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5), 0 0 20px rgba(3, 208, 189, 0.6); /* Shadow around the border */
    padding: 20px; /* Add padding to prevent the shadow from being too close to content */
    transition: all 0.3s ease; /* Optional transition for smooth effect */
    }
    .shadowd{
           border-radius: 20px;   
       transition: all 0.3s ease; 
        background: linear-gradient(92.36deg,#BCFF04 -9.78%,#66D6AD 47.15%,#03EEE3 105.24%) !important;

        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color) !important;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)!important;

    }
    .shadoww
    {
          border-radius: 20px;   
       transition: all 0.3s ease; 
      /* background: linear-gradient(246.62deg, #ff18c0 -10.93%, #5daeef 7.34%, #94ef5b 89.85%, #5fe9e6 106.94%) !important; */
      /* background: linear-gradient(246.62deg, #2c3e50 -10.93%, #4680ff 40%, #34495e 80%, #2c3e50 106.94%) !important; */
      background: linear-gradient(246.62deg, #f0f4f8 -10.93%, #4680ff 40%, #a1c4fd 80%, #f0f4f8 106.94%) !important;
/*background: linear-gradient(246.62deg, #f0f4f8 -10.93%, #00FFBE 40%, #02af96 80%, #f0f4f8 106.94%) !important;*/

        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color) !important;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)!important;
    }
    .shadoww:hover {
         background: linear-gradient(92.36deg,#BCFF04 -9.78%,#66D6AD 47.15%,#03EEE3 105.24%) !important;
         /*linear-gradient(246.62deg, #f0f4f8 -10.93%, #4680ff 40%, #a1c4fd 80%, #f0f4f8 106.94%) !important;*/
     /*background-color: #028f73;  /* Darker shade on hover */
      transform: scale(1.04); /* Increases the size by 5% */
    }



    .shadow:hover {
         background: linear-gradient(92.36deg,#BCFF04 -9.78%,#66D6AD 47.15%,#03EEE3 105.24%) !important;
         /*linear-gradient(246.62deg, #f0f4f8 -10.93%, #4680ff 40%, #a1c4fd 80%, #f0f4f8 106.94%) !important;*/
     /*background-color: #028f73;  /* Darker shade on hover */
      transform: scale(1.04); /* Increases the size by 5% */
    }
    .shadow:active {
    border-color: red;
    color: red;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5), 0 0 20px red;
}
    .shadow:hover p {
    color: white; /* On hover, set p text color to white */
}

.shadow:hover a {
    color: red; /* On hover, set a text color to red */
}
    .logout-btn{
        background: #334155; width: 136px; height: 40px; color: white !important; text-align: center; border-radius: 25px; padding-top: 7px;
    }
    .setting-btn{
        background: #4f46e5; width: 136px; height: 40px; color: white !important; text-align: center; border-radius: 25px; padding-top: 7px; margin-left: 10px;
    }
    .footer-textpro
    {
        font-size: 14px; /* Adjust font size as needed */
    font-weight: bold;
    background: -webkit-gradient(linear, left top, right top, color-stop(0%, #ff6c2f), color-stop(25%, #f9b931), color-stop(50%, #22c55e), color-stop(75%, #3b82f6), color-stop(100%, #8b5cf6));
    background: linear-gradient(to right, #ff6c2f 0%, #f9b931 25%, #22c55e 50%, #3b82f6 75%, #8b5cf6 100%);
    background-size: 400% 100%;
    background-clip: text;
    color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-animation: textclip 5s linear infinite;
    animation: textclip 5s linear infinite;
    display: inline-block;
    }

    .footer-texttt {
    font-size: 20px; /* Adjust font size as needed */
    font-weight: bold;
    background: -webkit-gradient(linear, left top, right top, color-stop(0%, #ff6c2f), color-stop(25%, #f9b931), color-stop(50%, #22c55e), color-stop(75%, #3b82f6), color-stop(100%, #8b5cf6));
    background: linear-gradient(to right, #ff6c2f 0%, #f9b931 25%, #22c55e 50%, #3b82f6 75%, #8b5cf6 100%);
    background-size: 400% 100%;
    background-clip: text;
    color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-animation: textclip 5s linear infinite;
    animation: textclip 5s linear infinite;
    display: inline-block;
  }
    .footer-textt {
    font-size: 20px; /* Adjust font size as needed */
    font-weight: bold;
    background: -webkit-gradient(linear, left top, right top, color-stop(0%, #ff6c2f), color-stop(25%, #f9b931), color-stop(50%, #22c55e), color-stop(75%, #3b82f6), color-stop(100%, #8b5cf6));
    background: linear-gradient(to right, #ff6c2f 0%, #f9b931 25%, #22c55e 50%, #3b82f6 75%, #8b5cf6 100%);
    background-size: 400% 100%;
    background-clip: text;
    color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-animation: textclip 5s linear infinite;
    animation: textclip 5s linear infinite;
    display: inline-block;
  }
  .footer-text {
    font-size: 30px; /* Adjust font size as needed */
    font-weight: bold;
    background: -webkit-gradient(linear, left top, right top, color-stop(0%, #ff6c2f), color-stop(25%, #f9b931), color-stop(50%, #22c55e), color-stop(75%, #3b82f6), color-stop(100%, #8b5cf6));
    background: linear-gradient(to right, #ff6c2f 0%, #f9b931 25%, #22c55e 50%, #3b82f6 75%, #8b5cf6 100%);
    background-size: 400% 100%;
    background-clip: text;
    color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-animation: textclip 5s linear infinite;
    animation: textclip 5s linear infinite;
    display: inline-block;
  }

  @-webkit-keyframes textclip {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
  }

  @keyframes textclip {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
  }
 
    @media (min-width: 768px){
        body:not(.sidebar-mini-md) .content-wrapper, body:not(.sidebar-mini-md) .main-footer, body:not(.sidebar-mini-md) .main-header {
            transition: margin-left .3s ease-in-out;
            margin-left: 280px !important;
        }
    }
    @media (min-width: 992px){
        .sidebar-mini.sidebar-collapse .content-wrapper, .sidebar-mini.sidebar-collapse .main-footer, .sidebar-mini.sidebar-collapse .main-header {
            margin-left: -0.4rem!important;
        }
        .sidebar-mini.sidebar-collapse .main-sidebar, .sidebar-mini.sidebar-collapse .main-sidebar::before {
            margin-left: 0;
            width: 0rem;
        }
    }
    
    @media    only screen and (min-width: 320px) and (max-width: 812px){
        .sidebar-dark-info .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-info .nav-sidebar>.nav-item>.nav-link.active {
            margin-bottom: -20px !important;
        }
        [class*=sidebar-light-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-light-] .nav-sidebar>.nav-item:hover>.nav-link{
            margin-bottom: -20px !important;
        }
        .welcome-txt{
            font-size: 18px !important;
            color: #28293b;
        }
        .dashbtn{
            margin-top: 7px;
            margin-left: 7px;
            float: none;    
        }
        .logout-btn{
            background: #334155; width: 47%; height: 40px; color: white !important; text-align: center; border-radius: 25px; padding-top: 7px;
        }
        .setting-btn{
            background: #4f46e5; width: 47%; height: 40px; color: white !important; text-align: center; border-radius: 25px; padding-top: 7px; margin-left: 10px;
        }
    }
    
</style>
<style>
    /* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes  spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.social-buttons a {
    display: inline-block;
    margin: 5px;
    padding: 5px;
    border-radius: 50%;
    background-color: #fff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow */
    transition: box-shadow 0.3s ease, transform 0.3s ease; /* Smooth transition for hover effect */
    cursor: pointer; /* Change cursor to pointer */
}

.social-buttons a:hover {
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3); /* Stronger shadow on hover */
    transform: translateY(-4px); /* Slightly lift the icon on hover */
}

.social-buttons a i {
    font-size: 20px;
    color: #555; /* Change icon color */
}

.social-buttons a.facebook i {
    color: #3b5998;
}

.social-buttons a.twitter i {
    color: #1da1f2;
}

.social-buttons a.linkedin i {
    color: #0077b5;
}

.social-buttons a.whatsapp i {
    color: #25d366;
}

.social-buttons a.telegram i {
    color: #0088cc;
}

</style>
<?php
                        $getU_id=$this->session->userdata('id'); 
                        $userDetai=getUserDetailsById($getU_id);
            ?>
<div class="loading" id='load' style='display: none;z-index: 9999;'>Loading&#8230;</div><div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-info" style="background: #000f15; height: 64px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link siderbtn" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="<?php //echo base_url();?>admin/dashboard" class="nav-link fw-bold footer-texttt" >DOUBLE POWER</a> -->
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          
         <!--  <li class="nav-item">
            <a class="nav-link siderbtn" data-widget="fullscreen" href="#" role="button" onclick="toggleFullScreen(document.body);" style="margin-left: 0px !important;">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          
          <--germany.png--
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" >
              <img class="w-full" src="<?php // echo base_url();?>User_assest/public/earth.png" alt="Flag image for en">
            </a>
          </li> -->
          <a href="<?php echo base_url();?>admin/dashboard" class="nav-link fw-bold footer-texttt" style="float:left; margin-left:0px;" >Helping</a>
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" style="float: left;">
                <img src="<?php echo base_url();?>User_assest/public/person.png" class="img-circle elevation-2" style="height: 35px; margin-top: 0px;" alt="User Image">
                    </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Last Login</span>
            <div class="dropdown-divider"></div>
            
            <p class="dropdown-item">
              2024-12-18 11:11 am
            </p>
            
            <a href="<?php echo base_url();?>My-Profile" class="dropdown-item" style="font-size: 16px; font-weight: 400;">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 19px; width: 19px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg> Profile
            </a>
            
            <a href="<?php echo base_url();?>user-logout" class="dropdown-item" style="font-size: 16px; font-weight: 400;">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 19px; width: 19px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg> Sign out
            </a>
          </div>
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-info" style="background: #000f15; min-height: 1400px;">
    <!-- Brand Logo -->
    <div class="flex" style="padding: 1.5rem!important;">
        <div class="flex items-center justify-center" style="width: 100%;">
            <img src="<?php echo base_url();?>User_assest/public/logo.png" class="logo-s-h" style="    object-fit: contain;">
        </div>
        
        <!--<a class="flex nav-link" data-toggle="dropdown" href="#" aria-expanded="false" style="text-align: right; margin-top: 8px;">-->
        <!--<img src="<?php echo base_url();?>public/account.png" class="img-circle elevation-2" style="height: 24px; margin-top: -5px;" alt="User Image">-->
        <!--    </a>-->
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="margin-left: 18%; ">
            <span class="dropdown-item dropdown-header" style="margin-top: 5px; text-align: left; color: #3e3e3e;">Signed in as <br> mangi0797@gmail.com</span>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url();?>My-Profile" class="dropdown-item" style="font-size: 16px; font-weight: 400;">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 19px; width: 19px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg> Profile
            </a>
            <a href="<?php echo base_url();?>Logout" class="dropdown-item" style="font-size: 16px; font-weight: 400;">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 19px; width: 19px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg> Sign out
            </a>
          </div>
    </div>
    
    <!--<center>-->
    <!--    <div style="padding: 1rem!important;">-->
    <!--        -->
    <!--        <img src="<?php echo base_url();?>public/brian-hughes.jpg" style="height: 96px; object-fit: contain; border-radius: 50%;">-->
    <!--        -->
    <!--        <p style="margin-top: 20px; color: white; font-size: 14px; font-family: 'Circular-Loom'; font-weight: 400;">admin</p>-->
            <!--<p style="margin-top: -15px; color: #9097a6; font-size: 14px; font-family: 'Circular-Loom'; font-weight: 400;">mangi0797@gmail.com</p>-->
    <!--    </div>-->
    <!--</center>-->
    
    <p style="margin-top: 15px; color: #7d90ff; font-size: 13px; font-family: 'Circular-Loom'; font-weight: 600; margin-left: 20px;">DASHBOARDS</p>
    <p style="    margin-top: -15px; margin-left: 20px; color: #9097a6; font-size: 11px; font-weight: 600;">By Helping</p>
    
    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">-->
      <!--  <div class="image">-->
      <!--      -->
      <!--      <img src="<?php echo base_url();?>public/profile.png" class="img-circle elevation-2" alt="User Image">-->
      <!--       <i class="fas fa-circle" style="color: #2dfb2d; font-size: 11px; position: relative; left: -10px; top: -10px;" ></i>  -->
      <!--      -->
      <!--  </div>-->
      <!--  <div class="info">-->
      <!--    <a href="#" class="d-block" style="margin-top: -10px;"> admin</a>-->
      <!--    <p style="margin-bottom: -5px; font-size: 14px;">admin</p>-->
      <!--  </div>-->
      <!--</div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- dashboard -->
            <li class="nav-item">
                                <a href="<?php echo base_url();?>dashboard" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <!-- dashboard -->
            <li class="nav-item">
                        <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                           Profile Area
                        </p>
                      </a>
                        <ul class="nav nav-treeview" >
                        <li  class="nav-item">
                            <a href="<?php echo base_url();?>profile" class="nav-link ">
                             <i class="fas fa-caret-right-o nav-icon"></i>
                              <p>My Profile</p>
                            </a>
                          </li>
                          <li  class="nav-item">
                            <a href="<?php echo base_url();?>change-password" class="nav-link ">
                             <i class="fas fa-caret-right-o nav-icon"></i>
                              <p>Change Password</p>
                            </a>
                          </li>
                          <li  class="nav-item">
                            <a href="<?php echo base_url();?>change-txn-password" class="nav-link ">
                             <i class="fas fa-caret-right-o nav-icon"></i>
                              <p>Change Transection Password</p>
                            </a>
                          </li>
                          <li  class="nav-item">
                            <a href="<?php echo base_url();?>update-usdt" class="nav-link ">
                             <i class="fas fa-caret-right-o nav-icon"></i>
                              <p>Update USDT BEP20 </p>
                            </a>
                          </li>

                          <!-- <li  class="nav-item">
                
                            <a href="<?php // echo base_url();?>update-bank" class="nav-link ">
                             <i class="fas fa-caret-right-o nav-icon"></i>
                              <p>Edit Bank Details</p>
                            </a>
                          </li> -->
                          
                      </ul>
                      
                    </li>
                    <li class="nav-item">
                              <a href="#"  class="nav-link nav-normal">
                              <i class="nav-icon fas fa-users"></i>
                <p>
                  Team Area
                </p>
              </a>
                <ul class="nav nav-treeview" >
                      
                        
                        <li  class="nav-item">
                    
                            <a href="<?php echo base_url();?>myrefrral" class="nav-link ">
                    
                             <i class="fas fa-caret-right-o nav-icon"></i>
                              <p>My Direct</p>
                            </a>
                          </li>
                         
                           <li  class="nav-item">
                    
                            <a href="<?php echo base_url();?>level-team" class="nav-link ">
                    
                             <i class="fas fa-caret-right-o nav-icon"></i>
                              <p>My Team</p>
                            </a>
                          </li>
                          
                      </ul>
           
            </li>
                    <li class="nav-item">
                    
                        <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">
                    
                     <i class="nav-icon fas fa-coins"></i>
                        <p>
                           Commitments
                        </p>
                      </a>
                    
                        <ul class="nav nav-treeview" >
                            <li  class="nav-item">
                                <a href="<?php echo base_url();?>commitments" class="nav-link ">
                                 <i class="fas fa-caret-right-o nav-icon"></i>
                                  <p>Commitments</p>
                                </a>
                            </li>
                            <li  class="nav-item">
                                <a href="<?php echo base_url();?>commitments-history" class="nav-link ">
                                 <i class="fas fa-caret-right-o nav-icon"></i>
                                  <p>Commitments History</p>
                                </a>
                            </li>
                            <li  class="nav-item">
                                <a href="<?php echo base_url();?>get-help" class="nav-link ">
                                 <i class="fas fa-caret-right-o nav-icon"></i>
                                  <p>Get Help</p>
                                </a>
                            </li>
                            <li  class="nav-item">
                                <a href="<?php echo base_url();?>provide-help" class="nav-link ">
                                 <i class="fas fa-caret-right-o nav-icon"></i>
                                  <p>Provide Help</p>
                                </a>
                            </li>

                   
                      </ul>
                     
                      
                    </li>
                    <!-- <li class="nav-item">
                    
                        <a href="<?php // echo base_url();?>activation-history" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">
                    
                       <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                           Activation - History
                        </p>
                      </a>
                  </li> -->

            <!-- active -->
             
            <!-- active -->
            <!-- mycontract -->
            
            <!-- profile list menu -->
                    
                   <!--   <li class="nav-item">
                    
                        <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">
                    
                     <i class="nav-icon fas fa-coins"></i>
                        <p>
                           Fund Area
                        </p>
                      </a>
                    
                        <ul class="nav nav-treeview" >
                            
                            <li  class="nav-item">
                                <a href="<?php // echo base_url();?>fund-request-history" class="nav-link ">
                                 <i class="fas fa-caret-right-o nav-icon"></i>
                                  <p>Fund Send History</p>
                                </a>
                            </li>
                            <li  class="nav-item">
                                <a href="<?php  //echo base_url();?>fund_get_history" class="nav-link ">
                                 <i class="fas fa-caret-right-o nav-icon"></i>
                                  <p>Fund Get History</p>
                                </a>
                            </li>

                   
                      </ul>
                      
                    </li> -->
                    <li class="nav-item">
                          <a href="#" class="nav-link" id="requestHistoryLink">
                             <i class="fas fa-chart-line nav-icon"></i> 
                            <p>INCOME</p>
                          </a>
                          <ul class="nav nav-treeview" id="requestHistorySubmenu" style="display: none;">
                            <!-- Option C under Request History -->
                            <li class="nav-item">
                              <a href="<?php echo base_url();?>daily-growth" class="nav-link">
                                <i class="fas fa-caret-right-o nav-icon"></i> 
                                <p >Daily Growth</p>
                              </a>
                            </li>
                            <!-- Option D under Request History -->
                            <li class="nav-item">
                              <a href="<?php echo base_url();?>direct-income" class="nav-link">
                                <i class="fas fa-caret-right-o nav-icon"></i> 
                                <p >Direct Income</p>
                              </a>
                            </li>
                             <li class="nav-item">
                              <a href="<?php echo base_url();?>level-income" class="nav-link">
                                <i class="fas fa-caret-right-o nav-icon"></i> 
                                <p >Level Income</p>
                              </a>
                            </li>
                            <!-- Option D under Request History -->
                            <li class="nav-item">
                              <a href="<?php echo base_url();?>reward-income" class="nav-link">
                                <i class="fas fa-caret-right-o nav-icon"></i> 
                                <p >Reward</p>
                              </a>
                            </li>
                             
                        </ul>
                    </li>
                    <!-- withdraw list menu -->
                                <li class="nav-item nav-normal">
                                                                    <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">
                                                <i class="nav-icon fas fa-arrow-circle-down"></i>
                        <p>
                            Withdraw
                        </p>
                      </a>
                                                <ul class="nav nav-treeview" >
                                                
                        
                          
                          <li  class="nav-item">
                                                        <a href="<?php echo base_url();?>withdrawal" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Send Request</p>
                            </a>
                          </li>

                          <li  class="nav-item">
                                                        <a href="<?php echo base_url();?>widthrawal-history" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Request History</p>
                            </a>
                          </li>
                          
                          
                      </ul>
                      
                    </li>
            <!-- active -->
            
            <!-- my ticket list menu -->
                                <li class="nav-item nav-normal">
                                                                    <a href="#" class="nav-link nav-size-c nav-normal" style="margin-bottom: 0px !important;">
                                                <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                          Support
                        </p>
                      </a>
                                                <ul class="nav nav-treeview" >
                                                
                         <li  class="nav-item">
                                                        <a href="<?php echo base_url();?>support-inbox" class="nav-link">
                                                          <i class="fa fa-envelope nav-icon"></i> 
                              <p>Inbox</p>
                            </a>
                          </li>
        
                           <li  class="nav-item">
                                                        <a href="<?php echo base_url();?>support-outbox" class="nav-link">
                                                          <i class="fa fa-paper-plane nav-icon"></i> 
                              <p>Outbox</p>
                            </a>
                          </li>
                           <li  class="nav-item">
                                                        <a href="<?php echo base_url();?>support-email" class="nav-link">
                                                          <i class="fa fa-pencil-alt nav-icon"></i> 
                              <p>Write Email</p>
                            </a>
                          </li>
                         
                          
                      </ul>
                      
                    </li>
            <!-- my ticket list menu -->
            
            
            <!-- promotional tool list menu -->
            <!---->
            <!--        <li class="nav-item">-->
            <!--        -->
            <!--            -->
            <!--            <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">-->
            <!--            -->
            <!--            <i class="nav-icon fas fa-ad"></i>-->
            <!--            <p>-->
            <!--               Promotional Tool-->
            <!--            </p>-->
            <!--          </a>-->
            <!--            -->
            <!--            <ul class="nav nav-treeview" >-->
            <!--            -->
                        
            <!--            <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="<?php echo base_url();?>public/pdf/betcoinglobal.pdf" class="nav-link" download>-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>Download PDF</p>-->
            <!--                </a>-->
            <!--              </li>-->

            <!--              <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="<?php echo base_url();?>Banner" class="nav-link">-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>Banner</p>-->
            <!--                </a>-->
            <!--              </li>-->
                          
            <!--          </ul>-->
                      
            <!--        </li>-->
            <!-- promotional tool list menu -->

             <!--logout -->
            <li class="nav-item">
                                <a href="<?php echo base_url();?>user-logout"  class="nav-link nav-normal">
                                <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 20px; width: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <p>
                  Sign Out
                </p>
                </a>
            </li>
             <!--logout -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>