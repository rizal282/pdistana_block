<?php
$tgl1 = date('Y-m-d');// pendefinisian tanggal awal
$tgl2 = date('Y-m-d', strtotime('+3 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
echo $tgl1;
echo "<br>";

echo $tgl2; //print tanggal
?>