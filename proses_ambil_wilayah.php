<?php		
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn = new mysqli('localhost', 'root', '' , 'pd_istanablock');

	$sql = $conn->prepare("SELECT * FROM wilayah WHERE nama_wilayah LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$hasilcari[] = $row["nama_wilayah"];
		}

		echo json_encode($hasilcari);
	}
	$conn->close();
?>

