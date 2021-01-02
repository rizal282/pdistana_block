<?php		
	include_once "koneksi.php";

	// $keyword = strval($_POST['query']);
	// $search_param = "{$keyword}%";
	// $conn = new mysqli('localhost', 'root', '' , 'pd_istanablock');

	// $sql = $conn->prepare("SELECT * FROM karyawan WHERE nama_kry LIKE ?");
	// $sql->bind_param("s",$search_param);			
	// $sql->execute();
	// $result = $sql->get_result();
	// if ($result->num_rows > 0) {
	// 	while($row = $result->fetch_assoc()) {
	// 		$hasilcari[] = $row["id_kry"];
	// 		// $kodebrg[] = $row["kode_barang"];
	// 	}

	// 	echo json_encode($hasilcari);
	// 	// echo json_encode($kodebrg);
	// }
	// $conn->close();

	if(isset($_POST["nama_kry"])){
		$nama_kry = $_POST["nama_kry"];

		$ambilidkry = mysqli_query($koneksi, "select id_kry from karyawan where nama_kry = '".$nama_kry."'");
		$rowidsupir = mysqli_fetch_array($ambilidkry);

		echo $rowidsupir["id_kry"];
	}
?>

