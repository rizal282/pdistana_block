<?php 
    $eid_settingpaving = $_POST["eid_settingpaving"];
    $ekode_barang = $_POST["ekode_barang"];
    $enama_paving = $_POST["enama_paving"];
    $elimit_stock = $_POST["elimit_stock"];
    $eqty_meter = $_POST["eqty_meter"];
    $erange_paving = $_POST["erange_paving"];
    $etoleransi = $_POST["etoleransi"];
    $egaji = $_POST["egaji"];

    mysqli_query($koneksi, "update setting_cetakpaving set kode_barang = '".$ekode_barang."', nama_paving = '".$enama_paving."', limit_stock = '".$elimit_stock."', qtymeter = '".$eqty_meter."', range_paving = '".$erange_paving."', toleransi = '".$etoleransi."', gaji = '".$egaji."' where id_settingpaving = '".$eid_settingpaving."' ");
    
    echo '<div class="alert alert-success">Data Setting Paving Sudah Diubah!</div>';
    include_once "settings/data_set_paving.php";
    
    
    
?>