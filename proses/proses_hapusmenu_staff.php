<?php
	$id_menu = $_POST["id_menu"];

	mysqli_query($koneksi, "update menu_staff set staff = '' where id_menu = ".$id_menu);

	echo '<div class="alert alert-success">Menu Staff Sudah Di Hapus</div>';

	include_once "settings/data_setmenu_staff.php";
?>