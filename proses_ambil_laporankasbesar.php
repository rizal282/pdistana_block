<?php 
    include_once "koneksi.php";

    $tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awal"]));
    $tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhir"]));

    $getkasbesar = mysqli_query($koneksi, "select * from pembayaran where tgl_bayar between '".$tgl_awal."' and '".$tgl_akhir."' and masuk_ke = 'Kas Besar'");
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No Transaksi</th>
            <th>DP Masuk</th>
            <th>Cash Masuk</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $nomor = 1;
            while($rowkasbesar = mysqli_fetch_array($getkasbesar)){
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo date("d M Y", strtotime($rowkasbesar["tgl_bayar"])); ?></td>
                    <td><?php echo $rowkasbesar["no_transaksi"]; ?></td>
                    <td>Rp <?php echo number_format($rowkasbesar["nominal_dp"],0,",","."); ?></td>
                    <td>Rp <?php echo number_format($rowkasbesar["nominal_cash"],0,",","."); ?></td>
                    <td>
								<form action="<?php echo $url; ?>" method="post">
									<input type="hidden" name="menu" value="hapuskasbesar">
									<input type="hidden" name="idbayar" value="<?php echo $rowdatalaporan["id_pembayaran"]; ?>">
									<button class="btn btn-danger" type="submit">Hapus</button>
								</form>
							</td>
                </tr>
        <?php
                $nomor ++;
            }
        ?>
    </tbody>
</table>

<div class="row">
		<div class="col-lg-12">
			<form action="<?php echo $url; ?>" method="post" target="_blank">
				<input type="hidden" name="menu" value="buatlaporankasbesar">
				<input type="hidden" name="tgl_awal" value="<?php echo $tgl_awal; ?>">
				<input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhir; ?>">
				<button type="submit" class="btn btn-success">Buat Laporan</button>
			</form>
		</div>
	</div>