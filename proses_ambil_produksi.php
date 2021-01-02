<?php 
    error_reporting(0);
	include_once "koneksi.php";

	$id_kry = $_POST["id_kry"];
	$group = $_POST["group_kry"];
	$tgl_gaji = date("Y-m-d", strtotime($_POST["tgl_gaji"]));
	$tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awalperiodegaji"]));
	$tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhirperiodegaji"]));

	$getproduksibarang = mysqli_query($koneksi, "select * from historikerjakaryawan inner join stock_barang on historikerjakaryawan.kode_brg = stock_barang.kode_barang where historikerjakaryawan.id_kry = '".$id_kry."'");
	
?>

<label for="">Hasil Produksi Karyawan</label>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Jenis Barang</th>
			<th>Jumlah Produksi</th>
			<th>Pekerjaan</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$nomor = 1;
			while($rowhasilproduksi = mysqli_fetch_array($getproduksibarang)){
		?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $rowhasilproduksi["kode_brg"]; ?></td>
					<td><?php echo $rowhasilproduksi["nama_barang"]; ?></td>
					<td><?php echo $rowhasilproduksi["jenis_brg"]; ?></td>
					<td><?php echo $rowhasilproduksi["qty_brg"]; ?></td>
					<td><?php echo $rowhasilproduksi["pekerjaan"]; ?></td>
				</tr>
		<?php
				$nomor ++;
			}
		?>
	</tbody>
</table>