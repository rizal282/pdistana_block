<?php
    $idbayar = $_POST["idbayar"];

    mysqli_query($koneksi, "delete from pembayaran where id_pembayaran = '".$idbayar."'");

    include_once "keuangan/form_laporan_kasbesar.php";
?>