<?php 
    $eid_settingpaving = $_POST["eid_settingpaving"];
    $ekode_barang = $_POST["ekode_barang"];
    $enama_paving = $_POST["enama_paving"];
    $elimit_stock = $_POST["elimit_stock"];
    $erange_paving = $_POST["erange_paving"];
    $etoleransi = $_POST["etoleransi"];
    $egaji = $_POST["egaji"];

    mysqli_query($koneksi, "update setting_baranglain set kode_barang = '".$ekode_barang."', nama_brglain = '".$enama_paving."', limit_stock = '".$elimit_stock."', range_brglain = '".$erange_paving."', toleransi = '".$etoleransi."', gaji = '".$egaji."' where id_settingbrglain = '".$eid_settingpaving."' ");
    
    echo '<div class="alert alert-success">Data Setting Barang Lain Sudah Diubah!</div>';
    include_once "settings/data_set_brglain.php";
    
    
    
?>