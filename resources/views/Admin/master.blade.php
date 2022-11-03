<?php   
   $admin_detail=Session::get('admin');
   // print_r($admin_detail->id);die;
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      @include('Admin.includes.header')
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="#" class="nav-link">Contact</a>
            </li>
         </ul>
         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
               <!-- Notifications Dropdown Menu -->
               <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" >
            <i class="fa fa-cogs" aria-hidden="true"></i>
            </a>
            
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right "style="min-width: 175px;">
            <div class="dropdown-divider"></div>         
            <a href="admin-edit/<?php  echo $admin_detail['id'];?>" class="dropdown-item">
            <i class="fas fa-user-edit"></i> Edit
            </a>
            <div class="dropdown-divider"></div>
            <a href="change-password/<?php echo $admin_detail['id'];?>" class="dropdown-item">
            <i class="fas fa-key "></i> Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout" class="dropdown-item">
            <i class="fas fa-lock "></i> Logout
            </a>           
         </div>         
            </li>
         </ul>
      </nav>
     
      <!-- /.navbar -->
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      </nav>
      <!-- Main Sidebar Container -->
      @include('Admin.includes.sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      @yield('content')
      </div>
      <!-- /.content-wrapper -->
      @include('Admin.includes.footer')
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      @include('Admin.includes.foot')
   </body>
</html>