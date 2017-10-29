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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cssBeta.css') ?>"/>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url('halaman_awal'); ?>">Perpustakaan SMA 4 Kupang</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url('t_buku'); ?>">Buku <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url('t_anggota'); ?>">Anggota</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('t_peminjaman'); ?>">Peminjaman</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo base_url('t_pengembalian'); ?>">Pengembalian</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nama Buku">
            </div>
            <button type="submit" class="btn btn-default">Cari</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('t_rak'); ?>">Rak</a></li>
            <li><a href="<?php echo base_url('t_kategori'); ?>">Kategori</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('t_admin'); ?>">Data Admin</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo base_url('auth/logout'); ?>">Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- /.tambahan area supaya konten tidak tertutup header -->
    <div class="margin_botom_head">
      
    </div>