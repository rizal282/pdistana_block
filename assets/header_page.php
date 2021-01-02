<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">
  <title>APLIKASI PD ISTANA</title>
  <link rel="File-List" href="order/faktur_pembelian.files/filelist.xml"/>
  <link id="shLink" href="order/faktur_pembelian.files/sheet002.htm"/>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/pd_istana.css" rel="stylesheet">
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo $url; ?>">Istana Block</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <!-- <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> -->
    </form>

    <?php

      if($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin"){

          // $tgltagihan = date("Y-m-d");
          // $tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgltagihan))); //operasi penjumlahan tanggal sebanyak 6 hari
          //   $sqlcounttagihantempo = "select count(sts_lunas) as total_pembeli from order_pembeli inner join total_bayar_pembeli on order_pembeli.no_transaksi = total_bayar_pembeli.no_transaksi where order_pembeli.jatuh_tempo = '".$tgl2."' and total_bayar_pembeli.sts_lunas = 'Belum Lunas'";
          //   $aksicounttagihantempo = mysqli_query($koneksi, $sqlcounttagihantempo);
          //   $rowcounttagihantempo = mysqli_fetch_array($aksicounttagihantempo);

          $getlimittempo = mysqli_query($koneksi, "select limit_tempopembeli from setting_tempo");
          $rowlimittempo = mysqli_fetch_array($getlimittempo);

          $limitnotif = $rowlimittempo["limit_tempopembeli"];

          $tglskrg = date("Y-m-d");
          $tglnotif = date('Y-m-d', strtotime('+'.$limitnotif.' days', strtotime($tglskrg)));

          $getdatatempo = mysqli_query($koneksi, "select baca_notif, jatuh_tempo, count(sts_lunas) as total_tempo from total_bayar_pembeli inner join order_pembeli on total_bayar_pembeli.no_transaksi = order_pembeli.no_transaksi where total_bayar_pembeli.sts_lunas = 'Belum Lunas' and order_pembeli.pembayaran = 'Tempo' and order_pembeli.jatuh_tempo = '".$tglnotif."' and order_pembeli.baca_notif = 'Belum'");
          $rowdatatempo = mysqli_fetch_array($getdatatempo);
    ?>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger">
            <?php echo $rowdatatempo["total_tempo"]; ?>
          </span>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <!-- <a class="nav-link dropdown-toggle" href="#">
          <i class="fas fa-bell fa-fw"></i>
        </a> -->
        <div class="nav-link">
          <form action="<?php echo $url; ?>" method="post">
            <input type="hidden" name="menu" value="pagenotifikasi">
            <button class="btn btn-link" type="submit"><i class="fas fa-bell fa-fw"></i></button>
          </form>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <!-- <a class="nav-link dropdown-toggle" href="#">
          <i class="fas fa-bell fa-fw"></i>
        </a> -->
        <div class="nav-link">
          <form action="<?php echo $url; ?>" method="post">
            <!--<input type="hidden" name="menu" value="pagenotifikasi">-->
            <button class="btn btn-link" type="submit"><i class="fas fa-bell fa-user"></i> <?php echo ucwords($_SESSION["username"]); ?></button>
          </form>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <!-- <a class="nav-link dropdown-toggle" href="#">
          <i class="fas fa-bell fa-fw"></i>
        </a> -->
        <div class="nav-link">
          <form action="<?php echo $url; ?>" method="post">
            <input type="hidden" name="menu" value="logoutadmin">
            <button class="btn btn-link" type="submit"><i class="fas fa-sign-out-alt"></i> Keluar</button>
          </form>
        </div>
      </li>
    </ul>

  <?php 
    }elseif($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "Staff"){

      // $tgltagihan = date("Y-m-d");
      // $tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgltagihan))); //operasi penjumlahan tanggal sebanyak 6 hari
      //   $sqlcounttagihantempo = "select count(sts_lunas) as total_pembeli from order_pembeli inner join total_bayar_pembeli on order_pembeli.no_transaksi = total_bayar_pembeli.no_transaksi where order_pembeli.jatuh_tempo = '".$tgl2."' and total_bayar_pembeli.sts_lunas = 'Belum Lunas'";
      //   $aksicounttagihantempo = mysqli_query($koneksi, $sqlcounttagihantempo);
      //   $rowcounttagihantempo = mysqli_fetch_array($aksicounttagihantempo);

      $getlimittempo = mysqli_query($koneksi, "select limit_tempo from setting");
      $rowlimittempo = mysqli_fetch_array($getlimittempo);

      $limitnotif = $rowlimittempo["limit_tempo"];

      $tglskrg = date("Y-m-d");
      $tglnotif = date('Y-m-d', strtotime('+'.$limitnotif.' days', strtotime($tglskrg)));

      $getdatatempo = mysqli_query($koneksi, "select baca_notif, jatuh_tempo, count(sts_lunas) as total_tempo from total_bayar_pembeli inner join order_pembeli on total_bayar_pembeli.no_transaksi = order_pembeli.no_transaksi where total_bayar_pembeli.sts_lunas = 'Belum Lunas' and order_pembeli.pembayaran = 'Tempo' and order_pembeli.jatuh_tempo = '".$tglnotif."' and order_pembeli.baca_notif = 'Belum'");
      $rowdatatempo = mysqli_fetch_array($getdatatempo);
  ?>
      <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger">
            <?php echo $rowdatatempo["total_tempo"]; ?>
          </span>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <!-- <a class="nav-link dropdown-toggle" href="#">
          <i class="fas fa-bell fa-fw"></i>
        </a> -->
        <div class="nav-link">
          <form action="<?php echo $url; ?>" method="post">
            <input type="hidden" name="menu" value="pagenotifikasi">
            <button class="btn btn-link" type="submit"><i class="fas fa-bell fa-fw"></i></button>
          </form>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <!-- <a class="nav-link dropdown-toggle" href="#">
          <i class="fas fa-bell fa-fw"></i>
        </a> -->
        <div class="nav-link">
          <form action="<?php echo $url; ?>" method="post">
            <!--<input type="hidden" name="menu" value="pagenotifikasi">-->
            <button class="btn btn-link" type="submit"><i class="fas fa-bell fa-user"></i> <?php echo ucwords($_SESSION["username"]); ?></button>
          </form>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <!-- <a class="nav-link dropdown-toggle" href="#">
          <i class="fas fa-bell fa-fw"></i>
        </a> -->
        <div class="nav-link">
          <form action="<?php echo $url; ?>" method="post">
            <input type="hidden" name="menu" value="logoutstaff">
            <button class="btn btn-link" type="submit"><i class="fas fa-sign-out-alt"></i> Keluar</button>
          </form>
        </div>
      </li>
    </ul>
<?php } ?>
  </nav>

  <div id="wrapper">