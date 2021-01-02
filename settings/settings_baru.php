<div class="card">
    <div class="card-header">Data Settings Barang & Gaji Karyawan</div>
    <div class="card-body">
        <div id="laporaninputsetting"></div>
        <div id="jnsbrg" class="row">
            <div class="col-lg-6">
                <div id="laporaninputsetting"></div>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="">Pilih Jenis Barang</label>
                        <select id="jenisbarang" name="jenisbarang" class="form-control">
                            <option value="">Pilih :</option>
                            <option value="Genteng">Genteng</option>
                            <option value="Paving">Paving</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Pilih</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-inline">
                    <div class="form-group">
                        <input class="form-control" type="text" name="tambahjenisbrg" id="tambahjenisbrg" placeholder="Tambah Jenis Barang">
                        <button id="btntambahjenis" type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-cogs"></i>
                        </div>
                        <div class="mr-5">Data Setting Genteng</div>
                    </div>
                    <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
                        <input type="hidden" name="menu" value="datasettinggenteng">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-fw fa-eye"></i> Lihat Settings
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-cogs"></i>
                        </div>
                        <div class="mr-5">Data Setting Paving</div>
                    </div>
                    <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
                        <input type="hidden" name="menu" value="datasettingpaving">
                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-fw fa-eye"></i> Lihat Settings
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-cogs"></i>
                        </div>
                        <div class="mr-5">Data Setting Barang Lain</div>
                    </div>
                    <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
                        <input type="hidden" name="menu" value="datasettingbrglain">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-fw fa-eye"></i> Lihat Settings
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-4">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-cogs"></i>
                        </div>
                        <div class="mr-5">Data Jenis Barang</div>
                    </div>
                    <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
                        <input type="hidden" name="menu" value="pagejenisbarang">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-fw fa-eye"></i> Lihat Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <p></p>
        <div id="genteng">
            <table class="table table-bordered">
                <tr>
                    <th>Kode Barang</th>
                    <td colspan="3"><input id="kodebrggenteng" name="kodebrggenteng" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <th>Nama Genteng</th>
                    <td colspan="3"><input id="namagenteng" name="namagenteng" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <th>Limit Stock</th>
                    <td colspan="3"><input type="text" id="limit_stockgenteng" name="limit_stockgenteng" class="form-control"></td>
                </tr>
                <tr>
                    <th></th>
                    <th>Range</th>
                    <th>Tol</th>
                    <th>Gaji</th>
                </tr>
                <tr>
                    <th>Cetak</th>
                    <td><input id="rangecetakgenteng" name="rangecetakgenteng" type="text" class="form-control"></td>
                    <td><input id="tolcetakgenteng" name="tolcetakgenteng" type="text" class="form-control"></td>
                    <td><input id="gajicetakgenteng" name="gajicetakgenteng" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <th>Cat</th>
                    <td><input id="rangecatgenteng" name="rangecatgenteng" type="text" class="form-control"></td>
                    <td><input id="tolcatgenteng" name="tolcatgenteng" type="text" class="form-control"></td>
                    <td><input id="gajicatgenteng" name="gajicatgenteng" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <th>Angkat</th>
                    <td><input id="rangeangkatgenteng" name="rangeangkatgenteng" type="text" class="form-control"></td>
                    <td><input id="tolangkatgenteng" name="tolangkatgenteng" type="text" class="form-control"></td>
                    <td><input id="gajiangkatgenteng" name="gajiangkatgenteng" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="4"><button id="simpangenteng" class="btn btn-primary">Simpan</button></td>
                </tr>
            </table>
        </div>

        <p></p>
        <div id="paving">
            <table class="table table-bordered">
                <tr>
                    <th>Kode Barang</th>
                    <td colspan="3"><input id="kodebrgpaving" name="kodebrgpaving" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <th>Nama Paving</th>
                    <td colspan="3"><input id="namapaving" name="namapaving" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <th>Limit Stock</th>
                    <td colspan="3"><input type="text" id="limit_stockpaving" name="limit_stockpaving" class="form-control"></td>
                </tr>
                <tr>
                    <th>Quantity/Meter</th>
                    <td colspan="3"><input type="text" id="qtymeterpaving" name="limit_stockpaving" class="form-control"></td>
                </tr>
                <tr>
                    <th></th>
                    <th>Range</th>
                    <th>Tol</th>
                    <th>Gaji</th>
                </tr>
                <tr>
                    <th>Cetak</th>
                    <td><input id="rangecetakpaving" name="rangecetakpaving" type="text" class="form-control"></td>
                    <td><input id="tolcetakpaving" name="tolcetakpaving" type="text" class="form-control"></td>
                    <td><input id="gajicetakpaving" name="gajicetakpaving" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="4"><button id="simpanpaving" class="btn btn-primary">Simpan</button></td>
                </tr>
            </table>
        </div>

        <p></p>
        <div id="lainlain">
            <table class="table table-bordered">
                <tr>
                    <th>Kode Barang</th>
                    <td colspan="3"><input id="kodebrglain" name="kodebrglain" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <th>Nama Barang Lain-lain</th>
                    <td colspan="3"><input id="namabaranglain" name="namanamabaranglainpaving" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <th>Limit Stock</th>
                    <td colspan="3"><input type="text" id="limit_stocklain" name="limit_stocklain" class="form-control"></td>
                </tr>
                <tr>
                    <th></th>
                    <th>Range</th>
                    <th>Tol</th>
                    <th>Gaji</th>
                </tr>
                <tr>
                    <th>Cetak</th>
                    <td><input id="rangecetaklain" name="rangecetaklain" type="text" class="form-control"></td>
                    <td><input id="tolcetaklain" name="tolcetaklain" type="text" class="form-control"></td>
                    <td><input id="gajicetaklain" name="gajicetaklain" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="4"><button id="simpanlain" class="btn btn-primary">Simpan</button></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<p></p>

<div class="card">
    <div class="card-header">Setting Gaji Staff</div>
    <div class="card-body">
        <form class="form-inline" action="<?php echo $url; ?>" method="post">
            <div class="form-group">
                <label for="">Pilih Staff</label>
                <input type="hidden" name="menu" value="setgajikrysstaff">
                <select name="nama_staff" id="nama_staff" class="form-control">
                    <option value="">Pilih :</option>
                    <?php
                    $getnamastaff = mysqli_query($koneksi, "select id_kry, nama_kry from karyawan where group_kry = 'Staff' or group_kry = 'Lapangan' order by nama_kry asc");
                    while ($rownamastaff = mysqli_fetch_array($getnamastaff)) {
                        ?>
                        <option value="<?php echo $rownamastaff["id_kry"]; ?>"><?php echo $rownamastaff["nama_kry"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Nominal Gaji</label>
                <input type="text" name="besargaji" class="form-control" onkeyup="format_angka(this)" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary">Set Gaji</button>
        </form>

        <p></p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Staff</th>
                    <th>Nominal Gaji</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                $getgajistaff = mysqli_query($koneksi, "select * from setting_gajistaff inner join karyawan on setting_gajistaff.id_kry = karyawan.id_kry");
                while ($rowgajistaff = mysqli_fetch_array($getgajistaff)) {
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $rowgajistaff["nama_kry"]; ?></td>
                        <td><?php echo "Rp " . number_format($rowgajistaff["gaji_staff"], 1, ",", "."); ?></td>
                        <td>
                            <form action="<?php echo $url; ?>" method="post">
                                <input type="hidden" name="menu" value="editgajistaff">
                                <input type="hidden" name="id_setting" value="<?php echo $rowgajistaff["id_setting"]; ?>">

                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?php echo $url; ?>" method="post">
                                <input type="hidden" name="menu" value="hapusgajistaff">
                                <input type="hidden" name="id_setting" value="<?php echo $rowgajistaff["id_setting"]; ?>">

                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php
                    $nomor++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>