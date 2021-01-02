<?php
	if(isset($_POST["nudigajisl"])){
		$idnudigaji = $_POST["id_nudigajisl"];
		$nudigajisl = $_POST["nudigajisl"];
		$idkasbon = $_POST["idkasbon"];
		$tgl_awal = date("Y-m-d", strtotime($_POST["tgl_awal"]));
		$tgl_akhir = date("Y-m-d", strtotime($_POST["tgl_akhir"]));
		$tgl_gaji = date("Y-m-d", strtotime($_POST["tgl_gaji"]));

		$format_total_upah = explode(".", $_POST["total_upahsl"]);
		$total_upah = implode($format_total_upah);

		$format_totalkasbon = explode(".", $_POST["total_kasbonsl"]);
		$total_kasbonsl = implode($format_totalkasbon);

		$format_bayarkasbon = explode(".", $_POST["bayar_kasbonsl"]);
		$bayar_kasbon = implode($format_bayarkasbon);

		$format_sisa_upah = explode(".", $_POST["sisa_upahsl"]);
		$sisa_upah = implode($format_sisa_upah);

		$format_sisa_kasbonsl = explode(".", $_POST["sisa_kasbonsl"]);
		$sisa_kasbonsl = implode($format_sisa_kasbonsl);
		$keterangan = $_POST["keterangan"];

		// ambil kas kecil untuk dikurangi dengan gaji harian
		$getkaskecil = mysqli_query($koneksi, "select * from kas");
		$rowkaskecil = mysqli_fetch_array($getkaskecil);

		// masukan data ke gaji kry tetap

		if($total_kasbonsl == 0 && $bayar_kasbon != 0){
			echo '<div class="alert alert-danger">Jangan Memasukan Selain 0 Pada Pembayaran Kasbon Jika Tidak Ada Kasbon!</div>';

			include_once 'karyawan/form_gaji_karyawanstafflapangan.php';
		}else{
			if($bayar_kasbon > $total_kasbonsl){
				echo '<div class="alert alert-danger">Pembayaran Kasbon Melebihi Total Kasbon yang Ada!</div>';

				include_once 'karyawan/form_gaji_karyawanstafflapangan.php';
			}else{
				$sqlinputgajikaryawantetap = "insert into gaji_karyawantetap(tgl_gaji,id_kry,total_gaji,bayar_kasbon,sisa_upah,keterangan) values('".$tgl_gaji."','".$idnudigaji."','".$total_upah."','".$bayar_kasbon."','".$sisa_upah."','".$keterangan."')";
				mysqli_query($koneksi, $sqlinputgajikaryawantetap);

				if(empty($sisa_upah)){
					$sisakaskecil = $rowkaskecil["kas_kecil"] + $total_upah;
					$sisakasbesar = $rowkaskecil["kas_besar"] - $total_upah;
					$upahkeluar = $total_upah;
				}else{
					$sisakaskecil = $rowkaskecil["kas_kecil"] + $sisa_upah;
					$sisakasbesar = $rowkaskecil["kas_besar"] - $sisa_upah;
					$upahkeluar = $sisa_upah;
				}

				if($sisa_kasbonsl == 0){
					mysqli_query($koneksi, "update kasbon_kry set sts_kasbon = 'Sudah Lunas' where id_kasbon = ".$idkasbon);
				}else{
					mysqli_query($koneksi, "update kasbon_kry set sts_kasbon = 'Belum Lunas' where id_kasbon = ".$idkasbon);
				}

				if($bayar_kasbon != 0){
					mysqli_query($koneksi, "insert into bayar_kasbon values('','".$idnudigaji."','".$bayar_kasbon."','".$sisa_kasbonsl."','".$tgl_gaji."')");
				}

				// update kas kecil
				mysqli_query($koneksi, "update kas set kas_kecil = '".$sisakaskecil."', kas_besar = '".$sisakasbesar."' where id_kas = 1");

				// input data kasbon ke pengeluaran perusahaan
				$sqlinputpengeluaran = "insert into pengeluaran values('','".$tgl_gaji."','','','Gaji Karyawan Tetap ".$nudigajisl."','Penggajian Karyawan Produksi dan Supir','".$upahkeluar."','','','')";
				mysqli_query($koneksi, $sqlinputpengeluaran);
				include_once "karyawan/slipgaji_karyawantetap.php";
				// echo "llala";
			}
		}


	}
?>
