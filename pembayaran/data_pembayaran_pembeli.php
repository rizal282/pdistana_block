<div class="row">
	<div class="col-lg-12 aligndatapembeli">
		<img src="img/logopdistana.png" width="150">
		<h2><i class="fas fa-list"></i> Data Pembayaran Pembeli</h2>
	</div>
	
	<!--<div class="col-lg-6 alignpembelitempo">
		<form action="<?php echo $url; ?>" method="post">
			<input type="hidden" name="menu" value="bayar_tempo">
			<button type="submit" class="btn btn-danger">Pembayaran Tempo</button>
		</form>
	</div>-->
</div>

<div id="panel_bayar">
	<div class="row">
		<div class="col-xl-4 col-sm-6 mb-4">
		    <div class="card text-white bg-primary o-hidden h-100">
		      <div class="card-body">
		        <div class="card-body-icon">
		          <i class="fas fa-fw fa-cash-register"></i>
		        </div>
		        <div id="text_bayar_tunai"><i class="fas fa-list"></i> Data Pembayaran Tunai</div>
		      </div>
		      <form action="<?php echo $url; ?>" method="post">
				<input type="hidden" name="menu" value="bayar_tunai">
				<button id="bayar_tunai" type="submit" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat Pembayaran Tunai</button>
			</form>
		    </div>
		</div>
		<!--<div class="col-lg-6 btnpembelitunai">
			<form action="<?php echo $url; ?>" method="post">
				<input type="hidden" name="menu" value="bayar_tunai">
				<button type="submit" class="btn btn-success">Pembayaran Tunai</button>
			</form>
		</div>-->

		<div class="col-xl-4 col-sm-6 mb-4">
		    <div class="card text-white bg-danger o-hidden h-100">
		      <div class="card-body">
		        <div class="card-body-icon">
		          <i class="fas fa-fw fa-cash-register"></i>
		        </div>
		        <div id="text_bayar_tempo"><i class="fas fa-list"></i> Data Pembayaran Tempo</div>
		      </div>
		      <form action="<?php echo $url; ?>" method="post">
				<input type="hidden" name="menu" value="bayar_tempo">
				<button id="bayar_tempo" type="submit" class="btn btn-danger"><i class="fas fa-eye"></i> Lihat Pembayaran Tempo</button>
			</form>
		    </div>
		</div>
	</div>
</div>
