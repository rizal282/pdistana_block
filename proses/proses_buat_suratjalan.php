<?php
	if(isset($_POST["btn_suratjalan"])){
		$suratjalan_tr = $_POST["suratjalan_tr"];
		$png_jawab = $_POST["png_jawab"];
		// $id_supir = $_POST["id_supir"];
		$nama_supir = $_POST["nama_supir"];
		$pembuat = $_POST["pembuat"];
		$no_kendaraan = $_POST["no_kendaraan"];
		$no_transaksi_srtjalan = $_POST["no_transaksi_srtjalan"];
		$id_wilayah = $_POST["id_wilayah"];
		$wilayah = $_POST["wilayah"];
		$stsuangjalan = $_POST["ytuangjalan"];
		$tgl_suratjln = date("Y-m-d", strtotime($_POST["tgl_suratjln"]));
		$catatan = $_POST["catatan"];

		// $ceknamasupir = mysqli_query($koneksi, "select nama_kry, group_kry from karyawan where id_kry = '".$nama_supir."'");
		// $rownamasupir = mysqli_fetch_array($ceknamasupir);

		$ceknamawilayah = mysqli_query($koneksi, "select nama_wilayah from wilayah where nama_wilayah = '".$wilayah."'");
		$rownamawilayah = mysqli_fetch_array($ceknamawilayah);

		if(!empty($rownamawilayah["nama_wilayah"])){
			$nomorsurat = "";
			// $fromsuratjalan = $_POST["fromsuratjalan"];

			// cek nomor surat jalan
			$sqlceknomorsurat = "select no_surat_jalan from surat_jalan order by id_surat_jalan desc";
			$aksiceknomorsurat = mysqli_query($koneksi, $sqlceknomorsurat);
			$countnomor = mysqli_num_rows($aksiceknomorsurat);


			if($countnomor == 0){
				$nomorsurat = "ISTNB-".date("dmY")."-1";
			}else{
				$rownomorsuratjalan = mysqli_fetch_array($aksiceknomorsurat);
				$exp_nomor = explode("-", $rownomorsuratjalan["no_surat_jalan"]); // membuat nomor surat jalan yg baru
				$nomor_baru = $exp_nomor[2] + 1;
				$nomorsurat = "ISTNB-".date("dmY")."-".$nomor_baru;
			}

			if($stsuangjalan == "Pilih :"){
				echo '<div class="alert alert-danger">Status Uang Jalan Belum Dipilih!</div>';
				include_once "dokumen/form_buat_suratjalan.php";
			}else{
				if($stsuangjalan == "Ya"){
					$sqlbuatsurat = "insert into surat_jalan values('','".$png_jawab."','".$nomorsurat."','".$nama_supir."','".$pembuat."','".$no_kendaraan."','".$no_transaksi_srtjalan."','".$id_wilayah."','".$stsuangjalan."','".$tgl_suratjln."','".$catatan."')";
					$aksibuatsurat = mysqli_query($koneksi, $sqlbuatsurat);

					// ambil nominal uang jalan di tabel wilayah
					$getnominaluangjalan = mysqli_query($koneksi, "select nominal_uangjalan from wilayah where id_wilayah = '".$id_wilayah."'");
					$rowuangjalan = mysqli_fetch_array($getnominaluangjalan);

					// ambil uang dari kas kecil sesuai nominal uang jalan
					$sqluangkaskecil = "select * from kas";
					$aksikaskecil = mysqli_query($koneksi, $sqluangkaskecil);
					$rowkaskecil = mysqli_fetch_array($aksikaskecil);

					$kaskecilbaru = $rowkaskecil["kas_kecil"] + $rowuangjalan["nominal_uangjalan"];
					// $kasbesarbaru = $rowkaskecil["kas_besar"] - $rowuangjalan["nominal_uangjalan"];

					// update kas kecil setelah dikurangi nominal uang jalan
					$sqlkaskecilbaru = "update kas set kas_kecil = '".$kaskecilbaru."' where id_kas = 1";
					mysqli_query($koneksi, $sqlkaskecilbaru);

					// input data ke pengeluaran
					// $sqlinputpengeluaran = "insert into pengeluaran values('','".date("Y-m-d")."','".$suratjalan_tr."','Uang Surat Jalan','Surat Jalan','".$rowuangjalan["nominal_uangjalan"]."')";
					// mysqli_query($koneksi, $sqlinputpengeluaran);

					// UPDATE STATUS SURAT JALAN DI ORDER PEMBELI
					mysqli_query($koneksi, "update order_pembeli set sts_suratjalan = 'Sudah' where no_transaksi = '".$suratjalan_tr."'");

					// input data kasbon ke pengeluaran perusahaan
					// $sqlinputpengeluaran = "insert into pengeluaran values('','".$tgl_suratjln."','','".$no_transaksi_srtjalan."','Uang Jalan Supir ".$nama_supir."','Pengeluaran Uang Jalan','".$rowuangjalan["nominal_uangjalan"]."','','','')";
					// mysqli_query($koneksi, $sqlinputpengeluaran);
				}else{
					$sqlbuatsurat = "insert into surat_jalan values('','".$png_jawab."','".$nomorsurat."','".$nama_supir."','".$pembuat."','".$no_kendaraan."','".$no_transaksi_srtjalan."','".$id_wilayah."','".$stsuangjalan."','".$tgl_suratjln."','".$catatan."')";
					$aksibuatsurat = mysqli_query($koneksi, $sqlbuatsurat);

					// UPDATE STATUS SURAT JALAN DI ORDER PEMBELI
					mysqli_query($koneksi, "update order_pembeli set sts_suratjalan = 'Sudah' where no_transaksi = '".$suratjalan_tr."'");
				}
			}

			// echo '<div class="alert alert-info">Data Surat Jalan Sudah Dibuat. </div>';

			include_once "dokumen/page_surat_jalan.php";
		}else{
			echo '<div class="alert alert-danger">Nama Wilayah yang Anda Masukkan Tidak Ada</div>';
			include_once "dokumen/form_buat_suratjalan.php";
		}
	}

	unset($_POST);
?>
