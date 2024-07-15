<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIKMA | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('Adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('Adminlte') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('Adminlte') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="<?= base_url() ?>" class="h1"><i class="fas fa-mosque fa-2x text-success"></i><br><b>SIKMA</b></a>
        <h4 class="login-box-msg">Masjid Nurul Iman</h4>
      </div>
      <div class="card-body">
        <?php
        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-success">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
        if (session()->getFlashdata('gagal')) {
          echo '<div class="alert alert-danger">';
          echo session()->getFlashdata('gagal');
          echo '</div>';
        }
        ?>
        <form action="<?= base_url('loginAction') ?>" method="post">
          <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p><br>
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email" value="<?= old('email') ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p><br>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" <?= old('remember') ? 'checked' : '' ?>>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-success btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('Adminlte') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('Adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('Adminlte') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>