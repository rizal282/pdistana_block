<?php
  include_once "koneksi.php";

  if(isset($_POST["nama_jenis"])){
    $nama_jenis = $_POST["nama_jenis"];

    // cek jenis barang
    $cekjenisbarang = mysqli_query($koneksi, "select * from jenis_barang where nama_jenisbarang = '".$nama_jenis."'");
    $hitungdatajenis = mysqli_num_rows($cekjenisbarang);

    if($hitungdatajenis == 1){
      echo 'Nama Jenis Barang Sudah Ada';
    }else{
      mysqli_query($koneksi, "insert into jenis_barang values('','".$nama_jenis."')");

      echo 'Nama Jenis Barang Sudah Dismpan';
    }
  }
?>
