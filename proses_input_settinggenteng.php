<?php
    include_once "koneksi.php";

    $kodebrggenteng = $_POST["kodebrggenteng"];
    $namagenteng = $_POST["namagenteng"];
    $limit_stockgenteng = $_POST["limit_stockgenteng"];
    $rangecetakgenteng = $_POST["rangecetakgenteng"];
    $tolcetakgenteng = $_POST["tolcetakgenteng"];
    $gajicetakgenteng = $_POST["gajicetakgenteng"];
    $rangecatgenteng = $_POST["rangecatgenteng"];
    $tolcatgenteng = $_POST["tolcatgenteng"];
    $gajicatgenteng = $_POST["gajicatgenteng"];
    $rangeangkatgenteng = $_POST["rangeangkatgenteng"];
    $tolangkatgenteng = $_POST["tolangkatgenteng"];
    $gajiangkatgenteng = $_POST["gajiangkatgenteng"];

    mysqli_query($koneksi, "insert into setting_limitstokgenteng values('','".$kodebrggenteng."','".$namagenteng."','".$limit_stockgenteng."')");
    mysqli_query($koneksi, "insert into setting_cetakgenteng values('','".$kodebrggenteng."','".$namagenteng."','".$rangecetakgenteng."','".$tolcetakgenteng."','".$gajicetakgenteng."')");
    mysqli_query($koneksi, "insert into setting_catgenteng values('','".$kodebrggenteng."','".$namagenteng."','".$rangecatgenteng."','".$tolcatgenteng."','".$gajicatgenteng."')");
    mysqli_query($koneksi, "insert into setting_angkatgenteng values('','".$kodebrggenteng."','".$namagenteng."','".$rangeangkatgenteng."','".$tolangkatgenteng."','".$gajiangkatgenteng."')");

    echo '<div class="alert alert-success">Setting Genteng Baru sudah disimpan</div>';
?>