<?php
	if(isset($_POST["id_order"])){
		$id_order = $_POST["id_order"];

		$getdataorderpembeli = mysqli_query($koneksi, "select * from order_pembeli where id_order = '".$id_order."'");
		$rowdataorderpembeli = mysqli_fetch_array($getdataorderpembeli);
	}
?>

<div class="card">
	<div class="card-header">Form Edit Pembeli</div>
	<div class="card-body">
		<form action="<?php echo $url; ?>" method="post">
			<div class="form-group">
			    <div class="form-label-group">
			    	<input type="hidden" name="menu" value="proseseditpembeli">
			    	<input type="hidden" name="id_editorder" value="<?php echo $rowdataorderpembeli["id_order"]; ?>">
			    	<input type="hidden" name="tr_order" value="<?php echo $rowdataorderpembeli["no_transaksi"]; ?>">
			      	<input class="form-control" type="text" id="tgl_beli" name="tgl_beli" value="<?php echo $rowdataorderpembeli["tgl_beli"]; ?>">
			      	<label for="inputPassword">Tanggal Beli</label>
			    </div>
				  </div>
				  <div class="form-group">
				    <div class="form-label-group">
				      <input autocomplete="off" class="form-control" type="text" name="pembeli" value="<?php echo $rowdataorderpembeli["nama_pembeli"]; ?>">
				      <label for="inputPassword">Nama Pembeli</label>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="form-label-group">
				      <input class="form-control" type="text" name="nohp_pembeli" value="<?php echo $rowdataorderpembeli["nohp_pembeli"]; ?>">
				      <label for="inputPassword">No HP Pembeli</label>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="form-label-group">
				      <input class="form-control" type="text" name="alamat_pembeli" value="<?php echo $rowdataorderpembeli["alamat_pembeli"]; ?>">
				      <label for="inputPassword">Alamat Pembeli</label>
				    </div>
				  </div>
				  <div class="form-group">
				      <label for="inputPassword">Wilayah</label>
				      <!--<input class="form-control" type="text" name="wilayah" class="" value="" required>-->
				      <select class="form-control" name="wilayah">
				        <option>Pilih :</option>
				        <?php
				          $getwilayah = mysqli_query($koneksi, "select nama_wilayah from wilayah");
				          while($rownamawilayah = mysqli_fetch_array($getwilayah)){
				        ?>
				            <option value="<?php echo $rownamawilayah["nama_wilayah"]; ?>" <?php if ($rowdataorderpembeli["wilayah"] == $rownamawilayah["nama_wilayah"]) echo ' selected="selected"'; ?>><?php echo $rownamawilayah["nama_wilayah"]; ?></option>
				        <?php
				          }
				        ?>
				      </select>
				  </div>
				  <div class="form-group">
				    <!-- <div class="form-label-group">
				      <input class="form-control" type="text" name="pembayaran" class="" value="" required>
				      <label for="inputPassword">Pembayaran</label>
				    </div> -->
				    <label>Pembayaran</label>
				    <select id="pembayaran" class="form-control" name="pembayaran">
				      <option value="Tunai" <?php if ($rowdataorderpembeli["pembayaran"] == 'Tunai') echo ' selected="selected"'; ?>>Tunai</option>
				      <option value="Tempo" <?php if ($rowdataorderpembeli["pembayaran"] == 'Tempo') echo ' selected="selected"'; ?>>Tempo</option>
				    </select>
				  </div>

			  		<div class="form-group">
					   <label>Tanggal Tempo</label>
					   <?php
					   		if($rowdataorderpembeli["jatuh_tempo"] == "0000-00-00"){
					   			$jatuhtempo = "-";
					   		}else{
					   			$jatuhtempo = $rowdataorderpembeli["jatuh_tempo"];
					   		}
					   ?>
					   <input class="form-control" type="te" name="tgl_tempo" id="tgl_tempo" value="<?php echo $jatuhtempo; ?>">
					</div>

				  <div class="form-group">
				    <div class="form-label-group">
				      <input class="form-control" type="text" name="keterangan" value="<?php echo $rowdataorderpembeli["keterangan"]; ?>">
				      <label for="inputPassword">Keterangan</label>
				    </div>
				  </div>

			<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
		</form>
	</div>
</div>