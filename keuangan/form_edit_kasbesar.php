<!-- edit kas besar -->
<form action="<?php echo $url; ?>" method="post">
    <?php
    $getnomkasbesar = mysqli_query($koneksi, "select kas_besar from kas");
    $rownomkasbesar = mysqli_fetch_array($getnomkasbesar);
    ?>
    <small>Anda akan mengedit nominal kas besar</small>
    <div class="form-group">
        <label for="">Jumlah Kas Besar</label>
        <input type="hidden" name="menu" value="prosesupdatekasbesar">
        <input onkeyup="format_angka(this)" class="form-control" type="text" name="nomeditkasbesar" id="nominaltopup" value="<?php echo $rownomkasbesar["kas_besar"] ?>">
    </div>
    <button id="editkasbesar" type="submit" class="btn btn-success">Edit</button>
</form>
