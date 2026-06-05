<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $tittle;?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>Assets_s/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}

table
{
    border-collapse: separate;
}
    .auto-index td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: counter(Serial); /* Display the counter */
}
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>-->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url();?>Admin/logout" class="nav-link btn btn-danger text-white">Logout</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
  <!--  <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>Assets_s/images/Luckylogo.png" alt="codewithmunazir" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>Assets_s/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">(Comapany) </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url();?>Admin" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>our-all-users" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                All Users
                <span class="right badge badge-danger">*</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>change_password" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Change Password
              
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>withdrwal-fund-transfer" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Fund Transfer 
              
              </p>
            </a>
          </li>
        
         <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Updates Company Acc
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php //echo base_url();?>inr-qr" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>INR Account</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php //echo  base_url();?>usdt-qr" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>USDT Account</p>
                </a>
              </li>
            </ul>
          </li> -->
           <!-- <li class="nav-item">
            <a href="<?php //echo base_url()?>royalty-list" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Royalty Club Set %
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Links
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>commitments-send" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Links</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>commit_all_link" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Links</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo base_url();?>all_commitments_history" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Commitments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo base_url();?>all_get_help_history" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Get Helps</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <!--<li class="nav-item has-treeview">
            <a href="<?php //echo base_url();?>invest_statement" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Statement
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php //echo base_url();?>fund-request_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo base_url();?>fund-history_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Provide Or Help   History</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="<?php //echo base_url();?>fund-transfer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Transfer</p>
                </a>
              </li> -->
             <!--  <li class="nav-item">
                <a href="<?php //echo base_url();?>funds-transfer-history" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Transfer Details</p>
                </a>
              </li> -->
              <!--<li class="nav-item">
                <a href="<?php// echo base_url();?>top-up-byadmin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insert Income</p>
                </a>
              </li>-->
              <!--<li class="nav-item">
                <a href="<?php// echo base_url();?>top-up-history-byadmin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insert Income History</p>
                </a>
              </li>-->
             <!--  <li class="nav-item">
                <a href="<?php echo base_url();?>invest_statement" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Statement</p>
                </a>
              </li>
              
            </ul> 
          </li>-->

          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Withdrawal
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>withdrawal-request_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdrawal Request </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>withdrawal-history_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdrawal History</p>
                </a>
              </li>
              <!--<li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>-->
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                INCOME
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
          <a href="<?php echo base_url();?>daily-growth-history_admin" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Daily Growth Income</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url();?>direct-income-history_admin" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Direct Income</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url();?>level-admin" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Level income</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url();?>reward-income-history_admin" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Reward Income</p>
          </a>
        </li>
        
            </ul>
          </li>
     


          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>non-working-statement" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Wallete Statement
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
           <!--  <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php // echo base_url();?>non-working-statement" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non-working Wallete</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php // echo base_url();?>working-statement" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Working Wallete</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul> -->
          </li>
           <!-- <li class="nav-item has-treeview">
            <a href="<?php //echo base_url();?>invest_statement" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Statement
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
          </li> -->

<!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                BV MATCHING
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
  
        <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php// echo base_url();?>bv-matching" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BInary BV Match</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo base_url();?>bv-royalty" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Royalty Club User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php //echo base_url();?>send-royalty-details" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Royalty Club Details</p>
                </a>
              </li>
              </ul>
          </li> -->
            <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>create_news" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>Update latest News</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>update_adds" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>Update latest adds</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Support
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
  
        <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>inbox" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>outbox" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>compose" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose Mail</p>
                </a>
              </li>
              </ul>
          </li>
         <li class="nav-item">
                <a href="<?php echo base_url();?>top-up-history-byadmin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Activation User</p>
                </a>
              </li> 
          <!--
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="auto_global_team" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>