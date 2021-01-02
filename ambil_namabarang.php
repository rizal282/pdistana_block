<?php
	include "koneksi.php";

	if(isset($_POST['search'])){
	 $search = $_POST['search'];

	 $query = "SELECT * FROM stock_barang WHERE nama_barang like'%".$search."%'";
	 $result = mysqli_query($koneksi,$query);

	 $response = array();
	 while($row = mysqli_fetch_array($result) ){
	   $response[] = array("value"=>$row['nama_barang'],"label"=>$row['nama_barang']);
	 }

	 echo json_encode($response);
	}

	exit;
?>