<?php
    if($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "admin"){
?>
<!-- Sidebar -->
    <ul id="menu_samping" class="sidebar navbar-nav">
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="home">
            <button name="stok_brg" id="tombolmenu" type="submit" class="btn btn-secondary"><i class="fas fa-home"></i> Home</button>
          </form>
        </li>
        <li class="nav-item">
          <form action="<?php echo $url; ?>" method="post">
            <input type="hidden" name="menu" value="stokbarang">
            <button name="stok_brg" id="tombolmenu" type="submit" class="btn btn-secondary"><i class="fas fa-table"></i> Stock Barang</button>
          </form>
        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="order_pembeli">
            <button name="stok_brg" id="tombolmenu" type="submit" class="btn btn-secondary"><i class="fas fa-user"></i> Order Pembeli</button>
          </form>
        </li>

        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="pembayaran">
          <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-cash-register"></i> Pembayaran</button>
          </form>

        </li>

        <li>
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="dokumen">
            <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-file"></i> Dokumen</button>
          </form>
        </li>

        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="pengeluaran">
          <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-hand-holding-usd"></i> Pengeluaran</button>
          </form>

        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="karyawan">
          <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-users"></i> Karyawan</button>
          </form>

        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="keuangan">
          <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-money-check"></i> Keuangan</button>
          </form>

        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="kendaraan">
            <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-car"></i> Inv. Kendaraan</button>
          </form>

        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="bahanbaku">
            <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-cookie"></i> Bahan Baku</button>
          </form>

        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="laporan">
            <button id="tombolmenu" type="submit" class="btn btn-secondary"><i class="fas fa-flag"></i> Laporan</button>
          </form>
        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="settings">
            <button id="tombolmenu" type="submit" class="btn btn-secondary"><i class="fas fa-cog"></i> Settings</button>
          </form>
        </li>
    </ul>
<?php
  }elseif($_SESSION["id_user"] && $_SESSION["username"] && $_SESSION["password"] && $_SESSION["status_user"] && $_SESSION["status_user"] == "Staff"){
?>
    <ul id="menu_samping" class="sidebar navbar-nav">
        <!-- <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="home">
            <button name="stok_brg" id="tombolmenu" type="submit" class="btn btn-secondary"><i class="fas fa-home"></i> Home</button>
          </form>
        </li>
        <li class="nav-item">
          <form action="<?php echo $url; ?>" method="post">
            <input type="hidden" name="menu" value="stokbarang">
            <button name="stok_brg" id="tombolmenu" type="submit" class="btn btn-secondary"><i class="fas fa-table"></i> Stock Barang</button>
          </form>
        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="order_pembeli">
            <button name="stok_brg" id="tombolmenu" type="submit" class="btn btn-secondary"><i class="fas fa-user"></i> Order Pembeli</button>
          </form>
        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="pengeluaran">
          <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-hand-holding-usd"></i> Pengeluaran</button>
          </form>

        </li>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="karyawan">
            <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-users"></i> Karyawan</button>
          </form>
        </li> -->
        <?php
          $getmenuforstaff = mysqli_query($koneksi, "select * from setting_menustaff inner join menu_staff on setting_menustaff.id_menu = menu_staff.id_menu where setting_menustaff.id_kry = '".$_SESSION["id_user"]."'");
          while($rowmenuforstaff = mysqli_fetch_array($getmenuforstaff)){
        ?>
            <li class="nav-item">
              <form method="post" action="<?php echo $url; ?>">
                <input type="hidden" name="menu" value="<?php echo $rowmenuforstaff["value"]; ?>">
                <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-users"></i> <?php echo $rowmenuforstaff["nama_menu"]; ?></button>
              </form>
            </li>
        <?php
          }
        ?>
        <li class="nav-item">
          <form method="post" action="<?php echo $url; ?>">
            <input type="hidden" name="menu" value="gantipasswordstaff">
            <button type="submit" id="tombolmenu"  class="btn btn-secondary"><i class="fas fa-cog"></i> Ganti Password</button>
          </form>
        </li>
      </ul>
<?php } ?>
