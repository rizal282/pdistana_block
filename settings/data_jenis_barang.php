<div class="card">
	<div class="card-header">Data Jenis Barang</div>
	<div class="card-body">
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Barang</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $getmenustaff = mysqli_query($koneksi, "select * from jenis_barang");
                    
                    $nomor = 1;
                    while($rowmenustaff = mysqli_fetch_array($getmenustaff)){
                ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $rowmenustaff["nama_jenisbarang"]; ?></td>
                            <td>
                                <form action="<?php echo $url; ?>" method="post">
                                    <input type="hidden" name="menu" value="hapusjenisbarang">
                                    <input type="hidden" name="idjenisbrg" value="<?php echo $rowmenustaff["id_jenisbarang"]; ?>">
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
