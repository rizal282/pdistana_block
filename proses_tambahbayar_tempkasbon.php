<?php
    include_once "koneksi.php";

    $kasbonnmkaryawan = $_POST["kasbonnmkaryawan"];
    $byrkasbon = explode(".", $_POST["byrkasbon"]);
    $formatangka = implode($byrkasbon);

    // ambil data kasbon karyawan
    $getdatakasbon = mysqli_query($koneksi, "select * from kasbon_kry where id_kry = '".$kasbonnmkaryawan."' and sts_kasbon = 'Belum Lunas'");
    $rowdatakasbon = mysqli_fetch_array($getdatakasbon);

    $sisa_kasbon = $rowdatakasbon["nominal"] - $formatangka;

    if($sisa_kasbon == 0){
        mysqli_query($koneksi, "update kasbon_kry set nominal = '".$sisa_kasbon."', sts_kasbon = 'Sudah Lunas' where id_kry = '".$kasbonnmkaryawan."'");
    }else{
        mysqli_query($koneksi, "update kasbon_kry set nominal = '".$sisa_kasbon."' where id_kry = '".$kasbonnmkaryawan."' and sts_kasbon = 'Belum Lunas'");
    }

    mysqli_query($koneksi, "insert into temp_bayarkasbon values('','".$kasbonnmkaryawan."','".$formatangka."')");
?>