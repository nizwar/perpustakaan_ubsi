<!DOCTYPE html>
<html>

<head>
  <title>Dashboard - Aplikasi Perpustakaan</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datatable/datatables.css' ?>">
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/datatable/jquery.datatables.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/datatable/datatables.js'; ?>"></script>
  <style>
    i {
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-examplenavbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url() . 'admin'; ?>">Perpustakaan</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-examplenavbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url() . 'admin'; ?>"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
          <li><a href="<?php echo base_url() . 'admin/buku'; ?>"><i class="glyphicon glyphicon-folder-open"></i>Data Buku</a></li>
          <li><a href="<?php echo base_url() . 'admin/anggota'; ?>"><i class="glyphicon glyphicon-user"></i>Data Anggota</a></li>
          <li><a href="<?php echo base_url() . 'admin/peminjaman'; ?>"><i class="glyphicon glyphicon-sort"></i>Transaksi Peminjaman</a></li>
          <li class="dropdown">
            <a href="<?php echo base_url() . '#'; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ariaexpanded="false">
              <i class="glyphicon glyphicon-list-alt"></i>Laporan<i class="caret" style="margin-left:10px;"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url() . 'admin/cetak_laporan_buku' ?>">
                  <i class="glyphicon glyphicon-lock"></i>Laporan Data Buku
                </a>
              </li>
              <li>
                <a href="<?php echo base_url() . 'admin/cetak_laporan_anggota' ?>">
                  <i class="glyphicon glyphicon-lock"></i>Laporan Data Anggota
                </a>
              </li>
              <li>
                <a href="<?php echo base_url() . 'admin/laporan_transaksi' ?>">
                  <i class="glyphicon glyphicon-lock"></i>Laporan Data Transaksi
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url() . 'admin/logout'; ?>"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ariaexpanded="false"><?php echo "Halo,<b>" . $this->session->userdata('nama'); ?></b><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url() . 'admin/ganti_password' ?>"><i class="glyphicon glyphicon-lock"></i>Ganti Password</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">