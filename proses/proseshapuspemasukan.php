<?php
    $idbayar = $_POST["idbayar"];

    mysqli_query($koneksi, "delete from pembayaran where id_pembayaran = '".$idbayar."'");

    include_once "laporan/form_laporan_pemasukan.php";
?>