<?php
    include_once "koneksi.php";

    
        
            $gettempbyrkasbon = mysqli_query($koneksi, "select * from temp_bayarkasbon inner join karyawan on temp_bayarkasbon.id_kry = karyawan.id_kry");

            $nomor = 1;
            while($rowtempbyrkasbon = mysqli_fetch_array($gettempbyrkasbon)){
?>
                <tr data-id="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>">
                    <td>
                        <span class="caption" data-id="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>"><?php echo $rowtempbyrkasbon["nama_kry"]; ?></span>
                        <input type="hidden" id="kolupdate" value="<?php echo $rowtempbyrkasbon["id_kry"]; ?>">
                        <input type="hidden" id="idtempbyrkasbon" value="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>">
                       <!-- <input type="hidden" class="field-nama form-control editor" value="<?php echo $rowtempbyrkasbon["nama_kry"]; ?>" data-id="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>"> -->
                        <select class="form-control field-nama editor" data-id="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>">
							<option>Pilih :</option>
							<?php 
								$getkaryawan = mysqli_query($koneksi, "select * from karyawan order by nama_kry");
								while($rowkaryawan = mysqli_fetch_array($getkaryawan)){
							?>
									<option value="<?php echo $rowkaryawan["id_kry"] ?>"><?php echo $rowkaryawan["nama_kry"] ?></option>
							<?php
								}
							?>
						</select>
                    </td>
                    <td>
                        <span class="caption" data-id="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>"><?php echo $rowtempbyrkasbon["nominal"]; ?></span>
                        <input type="hidden" id="kolupdate" value="nominal">
                        <input type="hidden" id="idtempbyrkasbon" value="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>">
                        <input type="text" class="field-bayar form-control editor" value="<?php echo $rowtempbyrkasbon["nominal"]; ?>" data-id="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>">
                    </td>
                    <td>
                        <a href="#" class="btn btn-xs btn-danger hapus-tempbyr" data-id="<?php echo $rowtempbyrkasbon["id_tempbyr"]; ?>">Hapus</a>
                    </td>
                </tr>
<?php
                $nomor ++;
            }
?>
            <tr>
                <td>Total Bayar Kasbon</td>
                <td>
                    <?php
                        $hitungtempbayarkasbon = mysqli_query($koneksi, "select sum(nominal) as totalbyrkasbon from temp_bayarkasbon");
                        $rownominalbyrkasbon = mysqli_fetch_array($hitungtempbayarkasbon);

                        echo $rownominalbyrkasbon["totalbyrkasbon"];
                    ?>
                    <input type="hidden" id="totalbayarkasbon" value="<?php echo $rownominalbyrkasbon["totalbyrkasbon"];?>">
                </td>
            </tr>
