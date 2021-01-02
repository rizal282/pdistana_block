<?php
    $koneksi = mysqli_connect("localhost", "root", "", "pd_istanablock");

    if($koneksi){

    }else{
        echo "Gagal terkoneksi";
    }

    $url = "http://localhost/pd_istana/";

?>