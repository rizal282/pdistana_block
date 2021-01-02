<?php
	include_once "koneksi.php";

	if(isset($_POST["tglakhir"])){
		$idkryhistori = $_POST["idkryhistori"];
		$tglawal = date("Y-m-d", strtotime($_POST["tglawal"]));
		$tglakhir = date("Y-m-d", strtotime($_POST["tglakhir"]));

		$ambilhistoriproduksi = mysqli_query($koneksi, "select * from historikerjakaryawan inner join stock_barang on historikerjakaryawan.kode_brg = stock_barang.kode_barang where historikerjakaryawan.id_kry = '".$idkryhistori."' and tgl between '".$tglawal."' and '".$tglakhir."'");

		$nomor = 1;
		while ($rowhistoripekerjaan = mysqli_fetch_array($ambilhistoriproduksi)) {
?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo date("d M Y", strtotime($rowhistoripekerjaan["tgl"])); ?></td>
				<td><?php echo $rowhistoripekerjaan["nama_barang"]; ?></td>
				<td><?php echo $rowhistoripekerjaan["qty_brg"]; ?></td>
				<td><?php echo $rowhistoripekerjaan["qty_semen"]; ?></td>
				<td><?php echo $rowhistoripekerjaan["pekerjaan"]; ?></td>
				<td><?php echo $rowhistoripekerjaan["keterangan"]; ?></td>
				<td>
					<form action="<?php echo $url; ?>" method="post">
						<input type="hidden" name="menu" value="edit_pekerjaan_kry">
						<input type="hidden" name="id_histori" value="<?php echo $rowhistoripekerjaan["id_histori"]; ?>">
						<button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button>
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" name="menu" value="hapuskerjakry">
						<input id="id_histori" type="hidden" name="id_histori" value="<?php echo $rowhistoripekerjaan["id_histori"]; ?>">
						<button id="hapus_pekerjaan_kry" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
					</form>
				</td>
				<!-- <td></td> -->
			</tr>
<?php
			$nomor ++;
		}
	}
?>