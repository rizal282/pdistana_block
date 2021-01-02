<?php
    include_once "koneksi.php";

    $kodebrgpaving = $_POST["kodebrgpaving"];
    $namapaving = $_POST["namapaving"];
    $limit_stockpaving = $_POST["limit_stockpaving"];
    $qtymeterpaving = $_POST["qtymeterpaving"];
    $rangecetakpaving = $_POST["rangecetakpaving"];
    $tolcetakpaving = $_POST["tolcetakpaving"];
    $gajicetakpaving = $_POST["gajicetakpaving"];

    mysqli_query($koneksi, "insert into setting_cetakpaving(kode_barang,nama_paving,limit_stock,qtymeter,range_paving,toleransi,gaji) values('".$kodebrgpaving."','".$namapaving."','".$limit_stockpaving."','".$qtymeterpaving."','".$rangecetakpaving."','".$tolcetakpaving."','".$gajicetakpaving."')");

    echo '<div class="alert alert-success">Setting Baru Paving Disimpan</div>';
?>