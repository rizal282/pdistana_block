<?php 
    $hapus_setcetakgenteng = $_POST["hapus_setcetakgenteng"];

    mysqli_query($koneksi, "DELETE FROM setting_cetakgenteng where id_settingcetak = '".$hapus_setcetakgenteng."' ");
    
    echo '<div class="alert alert-success">Data Setting Cetak Genteng Sudah Dihapus!</div>';
    include_once "settings/data_set_genteng.php";

?>