<?php
    mysqli_query($koneksi, "delete from pengeluaran where tgl_pengeluaran = '".date("Y-m-d")."'");

    include_once "keuangan/kas_keuangan.php";
?>