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

    <title>Perpustakaan SMAN 4 Kupang</title>

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
          <a class="navbar-brand" href="<?php echo base_url('siswa/halaman_awal'); ?>">Perpustakaan SMA 4 Kupang</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('siswa/t_buku'); ?>">Buku <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url('siswa/t_ebook'); ?>">E-Book</a></li>
            <li><a href="<?php echo base_url('siswa/t_peminjaman'); ?>">Data Peminjaman</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('siswa/auth/logout'); ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Keluar</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- /.tambahan area supaya konten tidak tertutup header -->
    <div class="margin_botom_head">
      
    </div>