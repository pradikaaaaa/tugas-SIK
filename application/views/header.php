<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
    <!--<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>-->

    <link rel="stylesheet" href="<?=base_url()?>assets/DataTables/datatables.min.css">

</head>
<body scroll="no">

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Pegawai</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=site_url()?>/Barang/index">Beranda</a></li>
            <li><a href="<?=site_url()?>/Customer/">Tambah Customer</a></li>
            
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Barang
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=site_url()?>/Barang/index">Lihat Barang</a></li>
                <li><a href="<?=site_url()?>/Barang/tambahBarang">Tambah Barang</a></li>
                <li><hr></li>
                <li><a href="<?=site_url()?>/BahanBaku/index">Lihat Bahan Baku</a></li>
                <li><a href="<?=site_url()?>/BahanBaku/tambahBahan">Tambah Bahan Baku</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaksi
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=site_url()?>/Transaksi/">Lihat Transaksi</a></li>
                <li><a href="<?=site_url()?>/Transaksi/tambahTransaksi">Tambah Transaksi</a></li>
              </ul>
            </li>

            

          </ul>
        </div>
      </div>
    </nav>

    <br><br><br><br>