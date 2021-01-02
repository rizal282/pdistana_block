<?php 
    $eid_settingpaving = $_POST["eid_settingpaving"];
    $elimit_stock = $_POST["elimit_stock"];

    mysqli_query($koneksi, "update setting_limitstokgenteng set jml_limit = '".$elimit_stock."'  where id_limit = '".$eid_settingpaving."' ");
    
    echo '<div class="alert alert-success">Data Setting Limit Genteng Sudah Diubah!</div>';
    include_once "settings/data_set_genteng.php";
    
    
    
?>