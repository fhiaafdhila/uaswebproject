<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
  $kecamatan = $_POST['kecamatan'];
  $jumlah    = $_POST['jumlah'];

  mysqli_query($conn,
    "INSERT INTO penduduk (kecamatan, jumlah)
     VALUES ('$kecamatan', '$jumlah')"
  );

  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Data Penduduk</title>

<style>
body {
  margin: 0;
  font-family: "Segoe UI", Tahoma, Arial, sans-serif;
  background: #eef1f5;
}

/* container */
.container {
  max-width: 420px;
  margin: 80px auto;
  background: #ffffff;
  padding: 24px;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

/* judul */
.container h2 {
  margin-top: 0;
  text-align: center;
  color: #333;
}

/* form */
label {
  font-weight: 600;
  display: block;
  margin-top: 12px;
  color: #444;
}

input {
  width: 100%;
  padding: 10px;
  margin-top: 6px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 14px;
}

input:focus {
  outline: none;
  border-color: #d90429;
}

/* tombol */
.btn-save {
  width: 100%;
  margin-top: 18px;
  padding: 12px;
  background: #d90429;
  color: #fff;
  border: none;
  border-radius: 6px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
}

.btn-save:hover {
  background: #b40322;
}

.btn-back {
  display: block;
  text-align: center;
  margin-top: 12px;
  text-decoration: none;
  color: #555;
}

.btn-back:hover {
  text-decoration: underline;
}
</style>
</head>

<body>

<div class="container">

  <h2>Tambah Data Penduduk</h2>

  <form method="post">
    <label>Kecamatan</label>
    <input type="text" name="kecamatan" required>

    <label>Jumlah Penduduk</label>
    <input type="number" name="jumlah" required>

    <button type="submit" name="simpan" class="btn-save">
      💾 Simpan Data
    </button>
  </form>

  <a href="data.php" class="btn-back">⬅️ Kembali ke Data</a>

</div>

</body>
</html>
