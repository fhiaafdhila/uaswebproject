<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM penduduk");

echo "KONEKSI BERHASIL<br>";

while ($d = mysqli_fetch_array($data)) {
  echo $d['kecamatan'] . " - " . $d['jumlah'] . "<br>";
}
?>
