<?php
    if(isset($_POST["idjenisbrg"])){
        $idjenisbrg = $_POST["idjenisbrg"];

        mysqli_query($koneksi, "delete from jenis_barang where id_jenisbarang = '".$idjenisbrg."'");

        echo '<div class="alert alert-success">Jenis Barang Sudah Dihapus</div>';
        include_once "settings/data_jenis_barang.php";
    }
?>