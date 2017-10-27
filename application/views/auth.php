<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="perpustakaan sma 4 kota kupang">
    <meta name="author" content="jofi.fora@gmail.com">
    <link rel="icon" href="<?php echo base_url('assets/50305120.png') ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cssAuthBeta.css') ?>"/>

  </head>

  <body>
    <div class="site-wrapper">
    <div class="container">
      <div class="row main">
        <div class="panel-heading">
                 <div class="panel-title text-center">
                    <h1 class="title">SMAN 4 KUPANG</h1>
                    <h3 class="title">Login Admin</h3>
                    <hr />
                  </div>
              </div> 
        <div class="main-login main-center">
          <form class="form-horizontal" method="post" action="">

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username <?php echo form_error('username') ?></label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Silahkan Masukan Username Anda" required data-validation-required-message="Username Belum Diisi."/>
                </div>
              </div>
            </div>
          

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password <?php echo form_error('password') ?></label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Silahkan Masukan Password Anda" required data-validation-required-message="Password Belum Diisi."/>
                </div>
              </div>
            </div>
            

            <div class="form-group ">
              <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
            </div>
          </form>
          <?php if ($this->session->flashdata('error') == "Username is invalid") echo "<div class='alert alert-warning'>Anda Salah Mengisi Username</div>"; ?>
          <?php if ($this->session->flashdata('error') == "Password is invalid") echo "<div class='alert alert-warning'>Anda Salah Mengisi Password</div>"; ?>
        </div>
      </div>
    </div>
  </div>

    

    <!-- Optional JavaScript -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
  </body>
</html>