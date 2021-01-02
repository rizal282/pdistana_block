<?php
	if(isset($_POST["setmenu"])){
		$nama_staff = $_POST["nama_staff"];
		$menu_staff = $_POST["menu_staff"];

		$sqlmenustaff = "insert into setting_menustaff values('','".$nama_staff."','".$menu_staff."')";

		mysqli_query($koneksi, $sqlmenustaff);

		echo '<div class="alert alert-success">Menu untuk staff sudah di setting</div>';
		
		include_once "settings/data_setmenu_staff.php";
	}
?>
