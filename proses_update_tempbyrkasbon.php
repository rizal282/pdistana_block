<?php 
    include_once "koneksi.php";

    $id = $_POST["id"];
    $value = $_POST["value"];
    $modul = $_POST["modul"];

    mysqli_query($koneksi, "update temp_bayarkasbon set ".$modul." = '".$value."' where id_tempbyr = '".$id."'");

    echo "{}";
?>