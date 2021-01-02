<?php
    include_once "koneksi.php";

    $kodebrglain = $_POST["kodebrglain"];
    $namabaranglain = $_POST["namabaranglain"];
    $limit_stocklain = $_POST["limit_stocklain"];
    $rangecetaklain = $_POST["rangecetaklain"];
    $tolcetaklain = $_POST["tolcetaklain"];
    $gajicetaklain = $_POST["gajicetaklain"];

    mysqli_query($koneksi, "insert into setting_baranglain values('','".$kodebrglain."','".$namabaranglain."','".$limit_stocklain."','".$rangecetaklain."','".$tolcetaklain."','".$gajicetaklain."')");

    echo '<div class="alert alert-success">Setting Baru Barang Lain-lain Disimpan</div>';
?>