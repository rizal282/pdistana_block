<?php 
    $id_settingcetak = $_POST["id_settingcetak"];
    $ekodebarang = $_POST["ekodebarang"];
    $enamagenteng = $_POST["enamagenteng"];
    $erangegenteng = $_POST["erangegenteng"];
    $etoleransi = $_POST["etoleransi"];
    $egaji = $_POST["egaji"];

    mysqli_query($koneksi, "update setting_cetakgenteng set kode_barang = '".$ekodebarang."', nama_genteng = '".$enamagenteng."', range_genteng = '".$erangegenteng."', toleransi = '".$etoleransi."', gaji = '".$egaji."' where id_settingcetak = '".$id_settingcetak."' ");
    
    echo '<div class="alert alert-success">Data Setting Cetak Genteng Sudah Diubah!</div>';
    include_once "settings/data_set_genteng.php";
    
    
    
?>