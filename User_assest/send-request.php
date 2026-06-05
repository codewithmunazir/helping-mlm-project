
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AI Digital Assets |  Dashboard </title>
    <!-- Favicon  -->
    <link rel="icon" href="https://aidigitalassets.global/public/favicon.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="https://aidigitalassets.global/public/panel/plugins/toastr/toastr.min.css">
  
</head>
<body class="sidebar-mini accent-info " style="background-color: rgb(0 15 21);">
   <style>
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
      background: linear-gradient(246.62deg, #ff18c0 -10.93%, #5daeef 7.34%, #94ef5b 89.85%, #5fe9e6 106.94%) !important;
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color) !important;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)!important;
    }
    .logout-btn{
        background: #334155; width: 136px; height: 40px; color: white !important; text-align: center; border-radius: 25px; padding-top: 7px;
    }
    .setting-btn{
        background: #4f46e5; width: 136px; height: 40px; color: white !important; text-align: center; border-radius: 25px; padding-top: 7px; margin-left: 10px;
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
</style>

<div class="loading" id='load' style='display: none;z-index: 9999;'>Loading&#8230;</div><div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-info" style="background: #000f15; height: 64px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link siderbtn" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://aidigitalassets.global/admin/dashboard" class="nav-link" style="margin-top: 5px;color: #cde1ff;">User Panel</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          
          <li class="nav-item">
            <a class="nav-link siderbtn" data-widget="fullscreen" href="#" role="button" onclick="toggleFullScreen(document.body);" style="margin-left: 0px !important;">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          
          <!--germany.png-->
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" >
              <img class="w-full" src="https://aidigitalassets.global/public/earth.png" alt="Flag image for en">
            </a>
          </li>
          
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <img src="https://aidigitalassets.global/public/person.png" class="img-circle elevation-2" style="height: 35px; margin-top: 0px;" alt="User Image">
                    </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Last Login</span>
            <div class="dropdown-divider"></div>
            
            <p class="dropdown-item">
              2024-12-18 11:11 am
            </p>
            
            <a href="https://aidigitalassets.global/My-Profile" class="dropdown-item" style="font-size: 16px; font-weight: 400;">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 19px; width: 19px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg> Profile
            </a>
            
            <a href="https://aidigitalassets.global/Logout" class="dropdown-item" style="font-size: 16px; font-weight: 400;">
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
            <img src="https://aidigitalassets.global/public/logo.png" class="logo-s-h" style="    object-fit: contain;">
        </div>
        
        <!--<a class="flex nav-link" data-toggle="dropdown" href="#" aria-expanded="false" style="text-align: right; margin-top: 8px;">-->
        <!--<img src="https://aidigitalassets.global/public/account.png" class="img-circle elevation-2" style="height: 24px; margin-top: -5px;" alt="User Image">-->
        <!--    </a>-->
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="margin-left: 18%; ">
            <span class="dropdown-item dropdown-header" style="margin-top: 5px; text-align: left; color: #3e3e3e;">Signed in as <br> mangi0797@gmail.com</span>
            <div class="dropdown-divider"></div>
            <a href="https://aidigitalassets.global/My-Profile" class="dropdown-item" style="font-size: 16px; font-weight: 400;">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 19px; width: 19px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg> Profile
            </a>
            <a href="https://aidigitalassets.global/Logout" class="dropdown-item" style="font-size: 16px; font-weight: 400;">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" style="height: 19px; width: 19px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg> Sign out
            </a>
          </div>
    </div>
    
    <!--<center>-->
    <!--    <div style="padding: 1rem!important;">-->
    <!--        -->
    <!--        <img src="https://aidigitalassets.global/public/brian-hughes.jpg" style="height: 96px; object-fit: contain; border-radius: 50%;">-->
    <!--        -->
    <!--        <p style="margin-top: 20px; color: white; font-size: 14px; font-family: 'Circular-Loom'; font-weight: 400;">admin</p>-->
            <!--<p style="margin-top: -15px; color: #9097a6; font-size: 14px; font-family: 'Circular-Loom'; font-weight: 400;">mangi0797@gmail.com</p>-->
    <!--    </div>-->
    <!--</center>-->
    
    <p style="margin-top: 15px; color: #7d90ff; font-size: 13px; font-family: 'Circular-Loom'; font-weight: 600; margin-left: 20px;">DASHBOARDS</p>
    <p style="    margin-top: -15px; margin-left: 20px; color: #9097a6; font-size: 11px; font-weight: 600;">By AI Digital Assets</p>
    
    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">-->
      <!--  <div class="image">-->
      <!--      -->
      <!--      <img src="https://aidigitalassets.global/public/profile.png" class="img-circle elevation-2" alt="User Image">-->
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
                                <a href="https://aidigitalassets.global/User-Dashboard"  class="nav-link nav-normal">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <!-- dashboard -->

            <!-- active -->
            <li class="nav-item">
                              <a href="https://aidigitalassets.global/Top-Up-User"  class="nav-link nav-normal">
                              <i class="nav-icon fa fa-user-check"></i>
                <p>
                  Investment Area
                </p>
              </a>
            </li>
            <!-- active -->
            
            <!-- mycontract -->
            <li class="nav-item">
                              <a href="https://aidigitalassets.global/my-contract"  class="nav-link nav-normal">
                              <i class="nav-icon fas fa-file-signature"></i>
                <p>
                  My Investment
                </p>
              </a>
            </li>
            <!-- mycontract -->
            
            <!-- profile list menu -->
                    <!---->
                    <!--<li class="nav-item">-->
                    <!---->
                    <!--    -->
                    <!--    <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">-->
                    <!--    -->
                    <!--    <i class="nav-icon fas fa-user"></i>-->
                    <!--    <p>-->
                    <!--       Profile Area-->
                    <!--    </p>-->
                    <!--  </a>-->
                    <!--    -->
                    <!--    <ul class="nav nav-treeview" >-->
                    <!--    -->
                        
                    <!--    <li  class="nav-item">-->
                    <!--        -->
                    <!--        <a href="https://aidigitalassets.global/My-Profile" class="nav-link ">-->
                    <!--        -->
                    <!--          <i class="fas fa-caret-right-o nav-icon"></i> -->
                    <!--          <p>Edit My Profile</p>-->
                    <!--        </a>-->
                    <!--      </li>-->
                          
                    <!--  </ul>-->
                      
                    <!--</li>-->
            <!-- profile list menu -->

            <!-- deposite list menu -->
                                <li class="nav-item menu-open">
                                                                    <a href="#" class="nav-link active nav-size-c" style="margin-bottom: 0px !important;">
                                                <i class="nav-icon fas fa-arrow-right"></i>
                        <p>
                           Add Fund
                        </p>
                      </a>
                                                <ul class="nav nav-treeview" style="display: block;">
                                                
                        <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Deposite" class="nav-link active">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Send Request</p>
                            </a>
                          </li>

                          <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Deposite-History" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Request History</p>
                            </a>
                          </li>
                          
                      </ul>
                      
                    </li>
            <!-- deposite list menu -->
            
            <!-- fund list menu -->
            <!---->
            <!--        <li class="nav-item">-->
            <!--        -->
            <!--            -->
            <!--            <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">-->
            <!--            -->
            <!--            <i class="nav-icon fa fa-exchange-alt"></i>-->
            <!--            <p>-->
            <!--               Fund Transfer-->
            <!--            </p>-->
            <!--          </a>-->
            <!--            -->
            <!--            <ul class="nav nav-treeview" >-->
            <!--            -->
                        
            <!--              <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="https://aidigitalassets.global/Fund-Convert" class="nav-link">-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>Fund Convert</p>-->
            <!--                </a>-->
            <!--              </li>-->
                        
            <!--              <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="https://aidigitalassets.global/Fund-Transfer" class="nav-link">-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>To User</p>-->
            <!--                </a>-->
            <!--              </li>-->

            <!--              <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="https://aidigitalassets.global/Fund-Transfer-History" class="nav-link">-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>User History</p>-->
            <!--                </a>-->
            <!--              </li>-->
                        
                          
                          <!--<li  class="nav-item">-->
                          <!--  -->
                          <!--  <a href="https://aidigitalassets.global/Admin-Fund-Transfer-History" class="nav-link">-->
                          <!--  -->
                          <!--    <i class="fas fa-caret-right-o nav-icon"></i> -->
                          <!--    <p>Admin History</p>-->
                          <!--  </a>-->
                          <!--</li>-->
                          
                    <!--  </ul>-->
                      
                    <!--</li>-->
            <!-- fund list menu -->

            <!-- withdraw list menu -->
                                <li class="nav-item nav-normal">
                                                                    <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">
                                                <i class="nav-icon fab fa-bitcoin"></i>
                        <p>
                           Crypto Withdraw
                        </p>
                      </a>
                                                <ul class="nav nav-treeview" >
                                                
                          <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Beneficiary-crpto" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Beneficiary</p>
                            </a>
                          </li>
                          
                          <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/View-Withdraw-Request-crpto" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Send Request</p>
                            </a>
                          </li>

                          <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/View-Withdraw-History-crpto" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Request History</p>
                            </a>
                          </li>
                          
                      </ul>
                      
                    </li>
            <!-- withdraw list menu -->
            
            <!-- withdraw list menu -->
            <!---->
            <!--        <li class="nav-item">-->
            <!--        -->
            <!--            -->
            <!--            <a href="#" class="nav-link">-->
            <!--            -->
            <!--            <i class="nav-icon fas fa-university"></i>-->
            <!--            <p>-->
            <!--               Indian Withdraw-->
            <!--            </p>-->
            <!--          </a>-->
            <!--            -->
            <!--            <ul class="nav nav-treeview" >-->
            <!--            -->
                        
            <!--            <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="https://aidigitalassets.global/View-Withdraw-Request" class="nav-link">-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>Send Request</p>-->
            <!--                </a>-->
            <!--              </li>-->

            <!--              <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="https://aidigitalassets.global/View-Withdraw-History" class="nav-link">-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>Request History</p>-->
            <!--                </a>-->
            <!--              </li>-->
                          
            <!--              <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="https://aidigitalassets.global/Beneficiary" class="nav-link">-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>Beneficiary</p>-->
            <!--                </a>-->
            <!--              </li>-->
                          
            <!--          </ul>-->
                      
            <!--        </li>-->
            <!-- withdraw list menu -->

             <!-- team list menu -->
                                 <li class="nav-item nav-normal">
                                        
                                                <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">
                                                <i class="nav-icon fas fa-users"></i>
                        <p>
                           My Team
                        </p>
                        </a>
                        
                                                <ul class="nav nav-treeview" >
                                                
                         <!--<li  class="nav-item">-->
                         <!--   -->
                         <!--   <a href="https://aidigitalassets.global/Register/admin" target="_blank" class="nav-link">-->
                         <!--   -->
                         <!--     <i class="fas fa-caret-right-o nav-icon"></i> -->
                         <!--     <p>Add New Team Member</p>-->
                         <!--   </a>-->
                         <!--</li>-->
                         
                         <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/View-Direct-Active" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Direct Active</p>
                            </a>
                         </li>
                         
                         <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/View-Direct-InActive" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Direct In-Active</p>
                            </a>
                         </li>

                         <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/View-Direct-Team" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Direct Team</p>
                            </a>
                         </li>

                         <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Position-Downline" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>All Team</p>
                            </a>
                         </li>
                         
                         <!--<li  class="nav-item">-->
                         <!--   -->
                         <!--   <a href="https://aidigitalassets.global/Left-Team-Member" class="nav-link">-->
                         <!--   -->
                         <!--     <i class="fas fa-caret-right-o nav-icon"></i> -->
                         <!--     <p>Left Team Member</p>-->
                         <!--   </a>-->
                         <!--</li>-->
                         
                         <!--<li  class="nav-item">-->
                         <!--   -->
                         <!--   <a href="https://aidigitalassets.global/Right-Team-Member" class="nav-link">-->
                         <!--   -->
                         <!--     <i class="fas fa-caret-right-o nav-icon"></i> -->
                         <!--     <p>Right Team Member</p>-->
                         <!--   </a>-->
                         <!--</li>-->

                         <!--<li  class="nav-item">-->
                         <!--   -->
                         <!--   <a href="https://aidigitalassets.global/Genealogy" class="nav-link">-->
                         <!--   -->
                         <!--     <i class="fas fa-caret-right-o nav-icon"></i> -->
                         <!--     <p>Tree View</p>-->
                         <!--   </a>-->
                         <!--</li>-->
                          
                      </ul>
                      
                    </li>
            <!-- team list menu -->

            <!-- earning list menu -->
                                <li class="nav-item nav-normal">
                                                                    <a href="#" class="nav-link nav-size-c" style="margin-bottom: 0px !important;">
                                                <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                           Income Area
                        </p>
                      </a>
                                                <ul class="nav nav-treeview" >
                        
                        <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/ROI-History" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Cashback Bonus</p>
                            </a>
                        </li>
                        
                        <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Direct-Income" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Affiliate Bonus</p>
                            </a>
                        </li>

                        <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Leadership-Income" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Level Affiliate Bonus</p>
                            </a>
                        </li>
                        
                        <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Reward-Income" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Monthly Bonus</p>
                            </a>
                        </li>
                          
                        <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Bonanza-Reward-Income" class="nav-link">
                                                          <i class="fas fa-caret-right-o nav-icon"></i> 
                              <p>Booster Bonus</p>
                            </a>
                        </li>
                          
                      </ul>
                      
                    </li>
            <!-- earning list menu -->
            
            
            <!-- active -->
            <!--<li class="nav-item">-->
            <!--  -->
            <!--    <a href="https://aidigitalassets.global/Crypto"  class="nav-link">-->
            <!--  -->
            <!--    <i class="nav-icon fab fa-bitcoin"></i>-->
            <!--    <p>-->
            <!--      Crypto-->
            <!--    </p>-->
            <!--  </a>-->
            <!--</li>-->
            <!-- active -->
            
            <!-- my ticket list menu -->
                                <li class="nav-item nav-normal">
                                                                    <a href="#" class="nav-link nav-size-c nav-normal" style="margin-bottom: 0px !important;">
                                                <i class="nav-icon fas fa-arrow-right"></i>
                        <p>
                           Ticket Area
                        </p>
                      </a>
                                                <ul class="nav nav-treeview" >
                                                
                         <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Generate-Ticket" class="nav-link">
                                                          <i class="far fa-circle nav-icon"></i> 
                              <p>Generate Ticket</p>
                            </a>
                          </li>
        
                           <li  class="nav-item">
                                                        <a href="https://aidigitalassets.global/Support" class="nav-link">
                                                          <i class="far fa-circle nav-icon"></i> 
                              <p>Support</p>
                            </a>
                          </li>
                          
                      </ul>
                      
                    </li>
            <!-- my ticket list menu -->
            
            
            <!-- promotional tool list menu -->
            <!---->
            <!--        <li class="nav-item menu-open">-->
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
            <!--                <a href="https://aidigitalassets.global/public/pdf/betcoinglobal.pdf" class="nav-link" download>-->
            <!--                -->
            <!--                  <i class="fas fa-caret-right-o nav-icon"></i> -->
            <!--                  <p>Download PDF</p>-->
            <!--                </a>-->
            <!--              </li>-->

            <!--              <li  class="nav-item">-->
            <!--                -->
            <!--                <a href="https://aidigitalassets.global/Banner" class="nav-link">-->
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
                                <a href="https://aidigitalassets.global/Logout"  class="nav-link nav-normal">
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
<style>
    .addressimg{
        width: auto;
        object-fit: contain;
        height: 200px;
        border: 6px solid black;
        border-radius: 30px;
    }
    .addressimg1{
        width: 100%;
        height: 300px;
        object-fit: contain;
        border-radius: 30px;
    }
    .blahimage{
        margin-bottom: 18px; 
        height: 120px;
    }
    @media  only screen and (min-width:0px) and (max-width: 767px){
        .addressimg1{
            width: 100%;
            object-fit: contain;
            border-radius: 30px;
        }
        .blahimage{
            margin-bottom: 18px;
            height: 100px;
        }
    }
</style>

            <div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark">Send Request</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="https://aidigitalassets.global">Home</a></li>
                            <li class="breadcrumb-item active">Send Request</li>
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>

                   <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid" style="margin-top: -35px;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-5">
                                        <div class="card-body">
                                            <form role="form" action="https://aidigitalassets.global/Deposite-insert" id="mypassform" method="post" enctype="multipart/form-data">
                                        	<input type="hidden" name="_token" value="YuZXixLaqSB2ZCasoNLJsSaFRxpCQAPf7ZMYUhtq">
                                        	
                                        	    <div class="col-md-12 mb-3">
                                                    <label for="validationCustom02">Amount in USDT</label>
                                                    <input type="number" class="form-control" name="amount" value="" id="validationCustom02" placeholder="Amount In USDT" required="">
                                                </div>
                                                
                                                <!--<div class="col-md-12 mb-3">-->
                                                    <!--<label for="validationCustom02">Amount in BUSD</label>-->
                                                <!--    <input type="number" class="form-control" name="coin" value="USDT.TRC20" id="validationCustom02" placeholder="USDT Token (BSC Chain)" readonly="" >-->
                                                <!--</div>-->

                                                <div class="col-md-12 mb-3">
                                                   <div class="form-group">
                                                        <label class="col-form-label">Select Coin</label>
                                                        <select class="custom-select" name="coin" style='height: 38px;margin-top: 0px;' readonly="" >
                                                            <!--<option  value='TRX'  >TRX</option>-->
                                                            <option  value='USDT.TRC20	'  >USDT.TRC20 Token (TRC20)</option>
                                                            

                                                        </select>
                                                   </div>
                                                </div>
                                                
                                                <br>
                                                <center>
                                                    <button class="btn btn-primary text-center" id="submit" type="submit">Process Request</button>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                    </section>
                
            </div>
        <!-- main content area end -->
    
<!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="">GoldenChance</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer> -->

  </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://aidigitalassets.global/public/panel/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://aidigitalassets.global/public/panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="https://aidigitalassets.global/public/panel/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="https://aidigitalassets.global/public/panel/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="https://aidigitalassets.global/public/panel/plugins/moment/moment.min.js"></script>
<script src="https://aidigitalassets.global/public/panel/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="https://aidigitalassets.global/public/panel/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="https://aidigitalassets.global/public/panel/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="https://aidigitalassets.global/public/panel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="https://aidigitalassets.global/public/panel/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="https://aidigitalassets.global/public/panel/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="https://aidigitalassets.global/public/panel/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="https://aidigitalassets.global/public/panel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://aidigitalassets.global/public/panel/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="https://aidigitalassets.global/public/panel/dist/js/pages/dashboard2.js"></script>
<!-- Toastr -->
<script src="https://aidigitalassets.global/public/panel/plugins/toastr/toastr.min.js"></script>


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
        function copy1(element) {
          var $temp = $("<input>");
          $("body").append($temp);
          $temp.val($(element).text()).select();
          document.execCommand("copy");
          $temp.remove();
          toastr.success("Copy successfully");
        }
        
        function copy2(element) {
          var $temp = $("<input>");
          $("body").append($temp);
          $temp.val($(element).text()).select();
          document.execCommand("copy");
          $temp.remove();
          toastr.success("Copy successfully");
        }
        
        function copy3(element) {
          var $temp = $("<input>");
          $("body").append($temp);
          $temp.val($(element).text()).select();
          document.execCommand("copy");
          $temp.remove();
          toastr.success("Copy successfully");
        }
</script>

<script>
    
    function changeimg1(input) {
        console.log('hi');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    function checkaddress(coin){
        
        var coin = coin;
        
         if(coin == 'tronLink'){
             document.getElementById("tronLink").style.display    = "block";
             document.getElementById("klever").style.display      = "none";
             document.getElementById("tronwallet").style.display  = "none";
         } else if (coin == 'klever'){
             document.getElementById("tronLink").style.display    = "none";
             document.getElementById("klever").style.display      = "block";
             document.getElementById("tronwallet").style.display  = "none";
         } else if (coin == 'tronwallet'){
             document.getElementById("tronLink").style.display    = "none";
             document.getElementById("klever").style.display      = "none";
             document.getElementById("tronwallet").style.display  = "block";
         } else {
             document.getElementById("tronLink").style.display    = "none";
             document.getElementById("klever").style.display      = "none";
             document.getElementById("tronwallet").style.display  = "none";
         }
         
    
    }
    
    function currency(coin){
    
          $.ajax({
            url:'https://blockchain.info/tobtc?currency=Dollars&value=500',
            type:'GET',
            success: function(data) {
    
              alert(data);
                
            },
            error: function(data){
                alert('Referal User Name Doent Match With Our Records');
            }
    
          });
    
    }


</script>