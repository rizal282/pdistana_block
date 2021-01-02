<?php
  session_start();
  ob_start();
  error_reporting(0);
  include_once "koneksi.php";
  include_once "assets/header_page.php";
  include_once "proses_login.php";

  if($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin"){

    include_once "assets/sidebar_menu.php";
?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <?php include_once "fungsimenuadmin.php"; ?>

      </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<?php

  }elseif($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "Staff"){

    include_once "assets/sidebar_menu.php";
?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <?php include_once "fungsimenustaff.php"; ?>

      </div>
     </div>
      <!-- /.content-wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<?php
  }else{
    include_once "login.php";
  }

  include_once "assets/footer_page.php";
  ob_flush();
?>
