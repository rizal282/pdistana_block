<?php 
    $kodebarang = $_POST["kodebarang"];

    mysqli_query($koneksi, "delete from stock_barang where kode_barang = '".$kodebarang."'");

    mysqli_query($koneksi, "insert into stock_barang(kode_barang,nama_barang,jenis_brg,stock_awal,stock_masuk,terjual,stock_akhir,kondisi_stock,harga,modal_stock) select kode_barang,nama_barang,jenis_brg,stock_awal,stock_masuk,terjual,stock_akhir,kondisi_stock,harga,modal_stock from backup_stock where kode_barang = '".$kodebarang."'");

    echo "<div class='alert alert-success'>Data Barang di Sudah Restore</div>";

    include_once "stock_barang/data_stock_barang.php";
?>