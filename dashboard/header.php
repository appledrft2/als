<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome to Web Based Assistance Liquidation with SMS Notification</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $baseurl ?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $baseurl ?>template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $baseurl ?>template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $baseurl ?>template/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $baseurl ?>template/dist/css/skins/_all-skins.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="<?php echo $baseurl ?>template/plugins/pace/pace.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $baseurl ?>template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo $baseurl ?>template/plugins/iCheck/all.css">
    <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo $baseurl; ?>template/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo $baseurl; ?>template/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">WBALS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo 'Welcome, '.$_SESSION['dbg'].' '.$_SESSION['dbf'].' '.$_SESSION['dbl'].' ('.$_SESSION['dbtype'].')' ?></span>
            </a>
            <ul class="dropdown-menu">
             
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div >
                  <form method="POST" action="#">
                      <button name="btnLogout" class="btn btn-block btn-default btn-flat">Sign out</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-center">MAIN NAVIGATION</li>
        <li class="<?php if($pages == 'dashboard/index'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="<?php if($pages == 'intake/index'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/intake"><i class="fa fa-file"></i><i class="fa fa-pencil"></i> <span>Intake</span></a></li>
        
        

        <li class="treeview <?php if($pages == 'pending/index' || $pages == 'pending/edu'|| $pages == 'pending/med'|| $pages == 'pending/burial'){echo 'active'; } ?>" <?php if($_SESSION['dbtype'] == 'Encoder'){ echo 'style="display:none"';} ?>>
          <a href="#">
            <i class="fa fa-clock-o"></i> <span>Pending</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($pages == 'pending/index'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/pending"><i class="fa fa-users"></i> View Beneficiaries</a></li>
            <li class="<?php if($pages == 'pending/edu'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/pending/edu.php"><i class="fa fa-university"></i> Educational Assistance</a></li>
            <li class="<?php if($pages == 'pending/med'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/pending/med.php"><i class="fa fa-ambulance"></i> Medical Assistance</a></li>
            <li class="<?php if($pages == 'pending/burial'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/pending/burial.php"><i class="fa fa-hotel"></i> Burial Assistance</a></li>
            
          </ul>
        </li>
        <li class="treeview <?php if($pages == 'released/index' || $pages == 'released/edu'|| $pages == 'released/med'|| $pages == 'released/burial'){echo 'active'; } ?>" <?php if($_SESSION['dbtype'] == 'Encoder'){ echo 'style="display:none"';} ?>>
          <a href="#">
            <i class="fa fa-history"></i> <span>Released</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="<?php if($pages == 'released/index'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/released"><i class="fa fa-users"></i> View Beneficiaries</a></li>
           <li class="<?php if($pages == 'released/edu'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/released/edu.php"><i class="fa fa-university"></i> Educational Assistance</a></li>
           <li class="<?php if($pages == 'released/med'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/released/med.php"><i class="fa fa-ambulance"></i> Medical Assistance</a></li>
           <li class="<?php if($pages == 'released/burial'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/released/burial.php"><i class="fa fa-hotel"></i> Burial Assistance</a></li>
            
          </ul>
        </li>


        <li class="treeview <?php if($pages == 'user/index' || $pages == 'user/add'){echo 'active'; } ?>" <?php if($_SESSION['dbtype'] == 'Encoder'){ echo 'style="display:none"';} ?>>
          <a href="#">
            <i class="fa fa-users"></i> <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($pages == 'user/add'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/users/add.php"><i class="fa fa-plus-circle"></i> Add User</a></li>
            <li class="<?php if($pages == 'user/index'){echo 'active'; } ?>"><a href="<?php echo $baseurl; ?>dashboard/users"><i class="fa fa-list"></i> View Users</a></li>
          </ul>
        </li>
         
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
