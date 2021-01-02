<div class="card">
	<div class="card-header">Data Menu Staff</div>
	<div class="card-body">
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Staff</th>
                    <th>Nama Menu</th>
                    <th>Hapus Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $getmenustaff = mysqli_query($koneksi, "select * from setting_menustaff inner join menu_staff on setting_menustaff.id_menu = menu_staff.id_menu inner join karyawan on setting_menustaff.id_kry = karyawan.id_kry");
                    
                    $nomor = 1;
                    while($rowmenustaff = mysqli_fetch_array($getmenustaff)){
                ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $rowmenustaff["nama_kry"]; ?></td>
                            <td><?php echo $rowmenustaff["nama_menu"]; ?></td>
                            <td>
                                <form action="<?php echo $url; ?>" method="post">
                                    <input type="hidden" name="menu" value="hapusmenustaff">
                                    <input type="hidden" name="id_menu" value="<?php echo $rowmenustaff["id_setmenu"]; ?>">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                <?php
                        $nomor ++;
                    }
                ?>
            </tbody>
        </table>
	</div>
</div>
