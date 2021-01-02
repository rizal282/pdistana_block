<div class="row">
  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-hand-holding-usd"></i>
        </div>
        <div class="mr-5"><i class="fas fa-flag"></i> Laporan Pengeluaran</div>
      </div>
      <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
        <input type="hidden" name="menu" value="laporankeuangan">
        <button class="btn btn-primary" type="submit">
          <i class="fas fa-eye"></i> Lihat Laporan
        </button>
      </form>
    </div>
  </div>

  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-cash-register"></i>
        </div>
        <div class="mr-5"><i class="fas fa-flag"></i> Laporan Pemasukan</div>
      </div>
      <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post">
        <input type="hidden" name="menu" value="formlaporanpemasukkan">
        <button class="btn btn-warning" type="submit">
          <i class="fas fa-eye"></i> Lihat Laporan
        </button>
      </form>
      <!-- <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#kasbesar">
        <span class="float-left">Lihat Laporan</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a> -->
    </div>
  </div>

  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-table"></i>
        </div>
        <div class="mr-5"><i class="fas fa-flag"></i> Laporan Stock Barang</div>
      </div>
      <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post" target="_blank">
        <!-- <input type="hidden" name="menu" value="laporanstockbarang"> -->
        <input type="hidden" name="menu" value="formlaporanstockbarang">
        <button class="btn btn-success" type="submit">
          <i class="fas fa-eye"></i> Lihat Laporan
        </button>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-cookie"></i>
        </div>
        <div class="mr-5"><i class="fas fa-flag"></i> Laporan Stock Bahan Baku</div>
      </div>
      <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post" target="_blank">
        <input type="hidden" name="menu" value="laporanbahanbaku">
        <button class="btn btn-primary" type="submit">
          <i class="fas fa-eye"></i> Lihat Laporan
        </button>
      </form>
    </div>
  </div>

  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-cookie"></i>
        </div>
        <div class="mr-5"><i class="fas fa-flag"></i> Laporan Tempo yang Belum Lunas</div>
      </div>
      <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post" target="_blank">
        <input type="hidden" name="menu" value="laporantempobelumlunas">
        <button class="btn btn-warning" type="submit">
          <i class="fas fa-eye"></i> Lihat Laporan
        </button>
      </form>
    </div>
  </div>

  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-cookie"></i>
        </div>
        <div class="mr-5"><i class="fas fa-flag"></i> Laporan Pembelian Bahan Baku</div>
      </div>
      <form class="card-footer text-white clearfix small z-1" action="<?php echo $url; ?>" method="post" target="_blank">
        <input type="hidden" name="menu" value="laporanbelibahanbaku">
        <button class="btn btn-success" type="submit">
          <i class="fas fa-eye"></i> Lihat Laporan
        </button>
      </form>
    </div>
  </div>
</div>
</div>
