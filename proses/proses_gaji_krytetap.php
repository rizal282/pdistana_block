<?php
	if(isset($_POST["nudigaji"])){
		$idnudigaji = $_POST["id_nudigaji"];
		$nudigaji = $_POST["nudigaji"];
		$idkasbon = $_POST["idkasbon"];
		$tglkasbon_kry = $_POST["tglkasbon_kry"];
		$tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awal"]));
		$tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhir"]));
		$tgl_gaji = date("Y-m-d", strtotime($_POST["tgl_gaji"]));

		$format_total_upah = explode(".", $_POST["total_upah"]);
		$total_upah = implode($format_total_upah);

		$format_totalkasbon = explode(".", $_POST["total_kasbon"]);
		$total_kasbon = implode($format_totalkasbon);

		$format_bayarkasbon = explode(".", $_POST["bayar_kasbon"]);
		$bayar_kasbon = implode($format_bayarkasbon);

		$format_sisa_upah = explode(".", $_POST["sisa_upah"]);
		$sisa_upah = implode($format_sisa_upah);

		$format_sisa_kasbon = explode(".", $_POST["sisa_kasbon"]);
		$sisa_kasbon = implode($format_sisa_kasbon);

		$keterangan = $_POST["keterangan"];

		// ambil kas kecil untuk dikurangi dengan gaji harian
		$getkaskecil = mysqli_query($koneksi, "select kas_besar from kas");
		$rowkaskecil = mysqli_fetch_array($getkaskecil);

		if($total_kasbon == 0 && $bayar_kasbon != 0){
			echo '<div class="alert alert-danger">Jangan Memasukan Selain 0 Jika Tidak Ada Kasbon!</div>';

			include_once 'karyawan/form_gaji_karyawantetap.php';
		}else{
			if($bayar_kasbon > $total_kasbon){
				echo '<div class="alert alert-danger">Pembayaran Kasbon Melebihi Total Kasbon yang Ada!</div>';

				include_once 'karyawan/form_gaji_karyawantetap.php';
			}else{
				// masukan data ke gaji kry tetap

				$sqlinputgajikaryawantetap = "insert into gaji_karyawantetap values('','".$tgl_gaji."','".$tgl_awal."','".$tgl_akhir."','".$idnudigaji."','".$total_upah."','".$bayar_kasbon."','".$sisa_upah."','".$keterangan."')";
				mysqli_query($koneksi, $sqlinputgajikaryawantetap);

				if(empty($sisa_upah)){
					$sisakaskecil = $rowkaskecil["kas_besar"] + $total_upah;
				}else{
					$sisakaskecil = $rowkaskecil["kas_besar"] + $sisa_upah;
				}

				if($sisa_kasbon == 0){
					mysqli_query($koneksi, "update kasbon_kry set sts_kasbon = 'Sudah Lunas' where id_kasbon = ".$idkasbon);
				}else{
					mysqli_query($koneksi, "update kasbon_kry set sts_kasbon = 'Belum Lunas' where id_kasbon = ".$idkasbon);
				}

				/* else{
					mysqli_query($koneksi, "update kasbon_kry set sts_kasbon = 'Belum Lunas' where and id_kry = ".$idnudigaji);
				} */

				if($bayar_kasbon != 0){
					mysqli_query($koneksi, "insert into bayar_kasbon values('','".$idnudigaji."','".$bayar_kasbon."','".$sisa_kasbon."','".$tgl_gaji."')");
				}

				// update kas kecil
				mysqli_query($koneksi, "update kas set kas_besar = '".$sisakaskecil."' where id_kas = 1");

				// input data kasbon ke pengeluaran perusahaan
				$sqlinputpengeluaran = "insert into pengeluaran values('','".$tgl_gaji."','','','Gaji Karyawan Tetap ".$nudigaji."','Penggajian Karyawan Staff dan Lapangan','".$sisa_upah."','','','')";
				mysqli_query($koneksi, $sqlinputpengeluaran);

				include_once "karyawan/slipgaji_karyawantetap.php";
			}
		}

		mysqli_query($koneksi, "truncate temp_bayarkasbon");
	}
?>
