<?php $this->db->query("CALL cek()"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ADMIN TRAVELIKU</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.css') ?>">
  <script src="<?= base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/lokasi') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Pulau</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/destinasi') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Destinasi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/transportasi') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transportasi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/hotel') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Hotel</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/invoice') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Invoice</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('admin/logout') ?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <input type="hidden" class="baseurl" value="<?= base_url() ?>">
        <?php $this->db->query("CALL cek()"); ?>