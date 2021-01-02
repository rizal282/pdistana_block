<?php
    include_once "koneksi.php";

    $id = $_POST["id"];
    $kryid = $_POST["kryid"];

    // ambil data kasbon karyawan
    $getdatakasbon = mysqli_query($koneksi, "select * from kasbon_kry where id_kry = '".$kryid."' and sts_kasbon = 'Belum Lunas'");
    $rowdatakasbon = mysqli_fetch_array($getdatakasbon);

    // ambil data bayar kasbon
    $getdatabayarkasbon = mysqli_query($koneksi, "select * from temp_bayarkasbon where id_tempbyr = '".$id."'");
    $rowdatabayarkasbon = mysqli_fetch_array($getdatabayarkasbon);

    $kasbonkembali = $rowdatakasbon["nominal"] + $rowdatabayarkasbon["nominal"];

    mysqli_query($koneksi, "update kasbon_kry set nominal = '".$kasbonkembali."' where id_kry = '".$kryid."' and sts_kasbon = 'Belum Lunas'");

    mysqli_query($koneksi, "delete from temp_bayarkasbon where id_tempbyr = '".$id."'");

    echo "{}";
?>