<?php
    if(isset($_POST["id_detail"])){
        $id_detail = $_POST["id_detail"];

        // ambil jumlah beli dari detail order
        $getjumlahbeli = mysqli_query($koneksi, "select * from detail_order_pembeli where id_detail_order = '".$id_detail."'");
        $rowjumlahbeli = mysqli_fetch_array($getjumlahbeli);

        // ambil jenis barang yg dibeli
        $gettbarangdibeli = mysqli_query($koneksi, "select * from stock_barang where kode_barang = '".$rowjumlahbeli["kode_barang"]."'");
        $rowbarangdibeli = mysqli_fetch_array($gettbarangdibeli);

        // jika jenis barang Paving
        if($rowbarangdibeli["jenis_brg"] == "Paving"){
            // hitung jumlah yg dibeli dengan dikalikan ke qty paving per meter
            $getqtymeterpaving = mysqli_query($koneksi, "select * from setting_cetakpaving where kode_barang = '".$rowjumlahbeli["kode_barang"]."'");
            $rowqtymeterpaving = mysqli_fetch_array($getqtymeterpaving);

            // ambil jumlah barang terjual 
            $getjumlahterjual = mysqli_query($koneksi, "select * from stock_terjual where no_transaksi = '".$rowjumlahbeli["no_transaksi"]."' and kd_barang = '".$rowjumlahbeli["kode_barang"]."' and tgl_terjual = '".date("Y-m-d")."'");
            $rowjumlahterjual = mysqli_fetch_array($getjumlahterjual);

            $totalbelipaving = $rowjumlahbeli["jumlah_beli"] * $rowqtymeterpaving["qtymeter"];

            
            // 1. ambil total bayar di tabel total bayar pembeli lalu update
            // 2. kembalikan jumlah terjual ke stock barang lalu update stock akhir dan modal stock nya
            // 3. hapus jumlah terjual di stock terjual

            $gettotalbayar = mysqli_query($koneksi, "select total_bayar from total_bayar_pembeli where no_transaksi = '".$rowjumlahbeli["no_transaksi"]."'");
            $rowtotalbeli = mysqli_fetch_array($gettotalbayar);
            $totalbayarkembali = $totalbelipaving * $rowjumlahbeli["hrg_barang"];
            $totalkurangibayar = $rowtotalbeli["total_bayar"] - $totalbayarkembali;
            mysqli_query($koneksi, "update total_bayar_pembeli set total_bayar ='".$totalkurangibayar."' where no_transaksi = '".$rowjumlahbeli["no_transaksi"]."'");

            $stockakhirkembali = $rowbarangdibeli["stock_akhir"] + $totalbelipaving;
            $modalstockkembali = $rowbarangdibeli["harga"] * $totalbelipaving + $rowbarangdibeli["modal_stock"];
            mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirkembali."', modal_stock = '".$modalstockkembali."' where kode_barang = '".$rowjumlahbeli["kode_barang"]."'");

            mysqli_query($koneksi, "delete from stock_terjual where no_transaksi = '".$rowjumlahbeli["no_transaksi"]."' and kd_barang = '".$rowjumlahbeli["kode_barang"]."' and tgl_terjual = '".date("Y-m-d")."'");
            mysqli_query($koneksi, "delete from detail_order_pembeli where id_detail_order = '".$id_detail."'");

        }else{
            // ambil jumlah barang terjual 
            $getjumlahterjual = mysqli_query($koneksi, "select * from stock_terjual where no_transaksi = '".$rowjumlahbeli["no_transaksi"]."' and kd_barang = '".$rowjumlahbeli["kode_barang"]."' and tgl_terjual = '".date("Y-m-d")."'");
            $rowjumlahterjual = mysqli_fetch_array($getjumlahterjual);

            // 1. ambil total bayar di tabel total bayar pembeli lalu update
            // 2. kembalikan jumlah terjual ke stock barang lalu update stock akhir dan modal stock nya
            // 3. hapus jumlah terjual di stock terjual

            $gettotalbayar = mysqli_query($koneksi, "select total_bayar from total_bayar_pembeli where no_transaksi = '".$rowjumlahbeli["no_transaksi"]."'");
            $rowtotalbeli = mysqli_fetch_array($gettotalbayar);
            $totalbayarkembali = $rowjumlahterjual["jml_terjual"] * $rowjumlahbeli["hrg_barang"];
            $totalkurangibayar = $rowtotalbeli["total_bayar"] - $totalbayarkembali;
            mysqli_query($koneksi, "update total_bayar_pembeli set total_bayar ='".$totalkurangibayar."' where no_transaksi = '".$rowjumlahbeli["no_transaksi"]."'");

            $stockakhirkembali = $rowbarangdibeli["stock_akhir"] + $rowjumlahterjual["jml_terjual"];
            $modalstockkembali = $rowbarangdibeli["harga"] * $rowjumlahterjual["jml_terjual"] + $rowbarangdibeli["modal_stock"];
            mysqli_query($koneksi, "update stock_barang set stock_akhir = '".$stockakhirkembali."', modal_stock = '".$modalstockkembali."' where kode_barang = '".$rowjumlahbeli["kode_barang"]."'");

            mysqli_query($koneksi, "delete from stock_terjual where no_transaksi = '".$rowjumlahbeli["no_transaksi"]."' and kd_barang = '".$rowjumlahbeli["kode_barang"]."' and tgl_terjual = '".date("Y-m-d")."'");
            mysqli_query($koneksi, "delete from detail_order_pembeli where id_detail_order = '".$id_detail."'");

        }

        echo '<div class="alert alert-success">Detail Pembelian Sudah Dihapus</div>';
        
        if($_SESSION["status_user"] == "admin"){
            include_once "stock_barang/data_stock_barang.php";
        }else{
            include_once "stock_barang/data_stock_barangstaff.php";
        }
    }
?>