<?php 
    if(isset($_POST["id_menu"])){
        $id_menu = $_POST["id_menu"];

        mysqli_query($koneksi, "delete from setting_menustaff where id_setmenu = '".$id_menu."'");

        echo '<div class="alert alert-success">Menu Staff Dihapus</div>';

        include_once "settings/data_menu_staff.php";
    }

?>