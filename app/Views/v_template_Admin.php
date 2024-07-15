<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIKMA | <?= $judul ?></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('Adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('Adminlte') ?>/dist/css/adminlte.min.css">
  <style>
    /* Custom styles for full-height sidebar */
    .sidebar {
      height: 100vh;
      /* Full viewport height */
      position: fixed;
      /* Fix the sidebar in place */
    }

    .content-wrapper {
      margin-left: 250px;
      /* Adjust to match sidebar width */
    }

    .main-footer {
      position: fixed;
      bottom: 0;
      width: calc(100% - 250px);
      /* Adjust for sidebar */
      left: 250px;
      /* Align with sidebar */
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
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
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Other navbar items... -->
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-success elevation-4">
      <a href="<?= base_url('Admin') ?>" class="brand-link text-center">
        <i class="fas fa-mosque text-success fa-3x"></i>
        <h2><b>SIKMA</b></h2>
      </a>
      <a class="brand-link text-center text-success ">
        <b><?= session()->get('nama_user') ?></b>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('admin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item <?= $menu == 'uang-kas' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'uang-kas' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <p>
                  Uang Kas Masjid
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/uang-kas-masjid') ?>" class="nav-link <?= $menu == 'kas-masuk' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-success"></i>
                    <p>Kas Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>Kas Keluar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/uang-kas-masjid/rekap') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rekap</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item <?= $menu == 'uang-kas-sosial' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'uang-kas-sosial' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-hand-holding-heart"></i>
                <p>
                  Uang Kas Sosial
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/uang-kas-sosial') ?>" class="nav-link <?= $menu == 'kas-masuk-sosial' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-success"></i>
                    <p>Kas Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>Kas Keluar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/uang-kas-sosial/rekap') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rekap</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item <?= $menu == 'uang-kas-sosial' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'uang-kas-sosial' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-hand-holding-heart"></i>
                <p>
                  Laporan Kas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/laporan-kas/masjid') ?>" class="nav-link <?= $menu == 'kas-masuk-sosial' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-success"></i>
                    <p>Laporan Kas Masjid</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/laporan-kas/sosial') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>Laporan Kas Sosial</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>User</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $judul ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php if ($page) {
              echo view($page);
            } ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <script src="<?= base_url('Adminlte') ?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('Adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('Adminlte') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>