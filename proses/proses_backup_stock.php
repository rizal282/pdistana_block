<?php
    include_once "../koneksi.php";

    mysqli_query($koneksi, "truncate backup_stock");
    $getdatastock = mysqli_query($koneksi, "select * from stock_barang");
    $countdatastock = mysqli_num_rows($getdatastock);
    
    while($rowdatastock = mysqli_fetch_array($getdatastock)){  
        mysqli_query($koneksi, "insert into backup_stock(kode_barang,nama_barang,jenis_brg,stock_awal,stock_masuk,terjual,stock_akhir,kondisi_stock,harga,modal_stock) select kode_barang,nama_barang,jenis_brg,stock_awal,stock_masuk,terjual,stock_akhir,kondisi_stock,harga,modal_stock from stock_barang");
    }

    // include_once "stock_barang/data_stock_barang.php";
    echo "Stock barang di backup";
?>