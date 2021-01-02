<?php 
    $hapus_limitgenteng = $_POST["hapus_limitgenteng"];

    mysqli_query($koneksi, "delete from setting_limitstokgenteng where id_limit = '".$hapus_limitgenteng."' ");
    
    echo '<div class="alert alert-success">Data Setting Limit Genteng Sudah Dihapus!</div>';
    include_once "settings/data_set_genteng.php";

?>