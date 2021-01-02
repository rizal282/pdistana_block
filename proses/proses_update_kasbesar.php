<?php
    if(isset($_POST["nomeditkasbesar"])){
        $format_angka = explode(".", $_POST["nomeditkasbesar"]);
        $nomeditkasbesar = implode($format_angka);

        mysqli_query($koneksi, "update kas set kas_besar = '".$nomeditkasbesar."' where id_kas = 1");

        include_once "keuangan/kas_keuangan.php";
    }
?>