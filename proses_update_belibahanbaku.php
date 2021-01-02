<?php 
    include_once "koneksi.php";

    $id = $_POST["id"];
    $value = $_POST["value"];
    $modul = $_POST["modul"];

    if($modul == "tgl_pembelian" || $modul == "tgl_tempo"){
        $formattgl = date("Y-m-d", strtotime($value));
        mysqli_query($koneksi, "update order_bahanbaku set ".$modul." = '".$formattgl."' where id_orderbahanbaku = '".$id."'"); 
    }else{
        mysqli_query($koneksi, "update order_bahanbaku set ".$modul." = '".$value."' where id_orderbahanbaku = '".$id."'"); 
    }
    
    echo "";
?>