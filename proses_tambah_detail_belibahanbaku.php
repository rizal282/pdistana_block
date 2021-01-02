<?php
	include_once "koneksi.php";


	$notrbahanbaku = $_POST["notrbahanbaku"];
	// $kode_brgbahanbaku = $_POST["kode_brgbahanbaku"];
	$nama_bahanbaku = strtolower($_POST["nama_bahanbaku"]);
	$format_hrg_bahanbaku = explode(".", $_POST["hrg_bahanbaku"]);
	$hrg_bahanbaku = implode($format_hrg_bahanbaku);
	$jumlah_bahanbaku = $_POST["jumlah_bahanbaku"];

	$totalharga = $hrg_bahanbaku * $jumlah_bahanbaku;

	// masukkan pembelian bahan baku ke temporary tabel
	$sqlinserttempbelibahanbaku = "insert into temp_order_bahanbaku(no_trbahanbaku,nama_barang,hrg_barang,jumlah_beli,total_harga) values('".$notrbahanbaku."','".$nama_bahanbaku."','".$hrg_bahanbaku."','".$jumlah_bahanbaku."','".$totalharga."')";
	mysqli_query($koneksi, $sqlinserttempbelibahanbaku);

	$sqlgetbrg = mysqli_query($koneksi, "select * from temp_order_bahanbaku where no_trbahanbaku = '".$notrbahanbaku."' order by id_detailbahanbaku desc limit 1");

	$count_barang = mysqli_num_rows($sqlgetbrg);
	$row = mysqli_fetch_array($sqlgetbrg);
	for($i = 1; $i <= $count_barang; $i++){
?>
		<tr>
	        <td><?php echo $row["no_trbahanbaku"]; ?></td>
	        <td><?php echo $row["nama_barang"]; ?></td>
	        <td><?php echo "Rp ".number_format($row["hrg_barang"],1,",","."); ?></td>
	        <td><?php echo $row["jumlah_beli"]; ?></td>
	        <td><?php echo "Rp ".number_format($row["total_harga"],1,",","."); ?></td>
	    </tr>
<?php
	}
	//echo "Berhasil disimpan";

?>
