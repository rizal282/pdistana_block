<?php 
    $id_settingangkat = $_POST["id_settingangkat"];
    $ekodebarang = $_POST["ekodebarang"];
    $enamagenteng = $_POST["enamagenteng"];
    $erangegenteng = $_POST["erangegenteng"];
    $etoleransi = $_POST["etoleransi"];
    $egaji = $_POST["egaji"];

    mysqli_query($koneksi, "update setting_angkatgenteng set kode_barang = '".$ekodebarang."', nama_genteng = '".$enamagenteng."', range_genteng = '".$erangegenteng."', toleransi = '".$etoleransi."', gaji = '".$egaji."' where id_settingangkat = '".$id_settingangkat."' ");
    
    echo '<div class="alert alert-success">Data Setting Angkat Genteng Sudah Diubah!</div>';
    include_once "settings/data_set_genteng.php";
    
    
    
?>