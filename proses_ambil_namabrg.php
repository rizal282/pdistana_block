<?php		
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn = new mysqli('localhost', 'root', '' , 'pd_istanablock');

	$sql = $conn->prepare("SELECT * FROM stock_barang WHERE nama_barang LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$hasilcari[] = $row["nama_barang"];
			// $kodebrg[] = $row["kode_barang"];
		}

		echo json_encode($hasilcari);
		// echo json_encode($kodebrg);
	}
	$conn->close();
?>

