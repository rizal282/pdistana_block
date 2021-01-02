<?php
	if($rowdatatempo["total_tempo"] != 0 && $rowdatatempo["baca_notif"] == "Belum"){
?>
		<div class="alert alert-success">
			<div class="row">
				<div class="col-lg-3">
					Anda Memiliki <?php echo $rowdatatempo["total_tempo"]; ?> Pembayar Tempo.
				</div>
				<div class="col-lg-9">
					<form action="<?php echo $url; ?>" method="post" target="_blank">
						<input type="hidden" name="menu" value="detail_notif">
						<input id="tgl_tempo" type="hidden" name="tgl_tempo" value="<?php echo $tglnotif; ?>">
						<button id="detail_notif" type="submit" class="btn btn-link"><i class="fas fa-eye"></i> Lihat Detail</button>
					</form>
				</div>
			</div>
		</div>
<?php
	}
?>

<div class="home">
	<div class="img-home">
		<img src="img/logopdistana.png" width="150px" height="100px">
	</div>

	<div class="tagline">
		<h2>Selamat Datang Di</h2>
		<h4>Aplikasi Web Istana Block Purwakarta</h4>
	</div>
</div>