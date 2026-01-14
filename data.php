<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Penduduk Kecamatan Kabupaten Pidie</title>

<style>
body {
  margin: 0;
  font-family: "Segoe UI", Tahoma, Arial, sans-serif;
  background: #eef1f5;
}

/* container */
.container {
  max-width: 1000px;
  margin: 40px auto;
  background: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

/* judul */
.container h2 {
  margin-top: 0;
  text-align: center;
  color: #333;
}

/* tombol */
.top-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.btn-add {
  padding: 10px 14px;
  background: #d90429;
  color: #fff;
  text-decoration: none;
  border-radius: 6px;
  font-weight: 600;
}

.btn-add:hover {
  background: #b40322;
}

/* tabel */
table {
  width: 100%;
  border-collapse: collapse;
  font-size: 14px;
}

thead {
  background: #343a40;
  color: #fff;
}

th, td {
  padding: 10px;
  text-align: center;
}

tbody tr:nth-child(even) {
  background: #f8f9fa;
}

tbody tr:hover {
  background: #e9ecef;
}

/* tombol aksi */
.action a {
  padding: 6px 10px;
  border-radius: 5px;
  text-decoration: none;
  font-size: 13px;
  font-weight: 600;
}

.action .edit {
  background: #0d6efd;
  color: #fff;
}

.action .edit:hover {
  background: #084298;
}

.action .hapus {
  background: #dc3545;
  color: #fff;
}

.action .hapus:hover {
  background: #a71d2a;
}

/* responsive */
@media (max-width: 768px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }

  thead {
    display: none;
  }

  tr {
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 10px;
  }

  td {
    text-align: left;
    padding: 6px 0;
  }

  td::before {
    content: attr(data-label);
    font-weight: bold;
    display: block;
    color: #555;
  }
}
</style>
</head>

<body>

<div class="container">

  <h2>Data Penduduk Kecamatan Kabupaten Pidie</h2>

  <div class="top-bar">
    <span>Total Data:
      <?php
        $total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM penduduk"));
        echo $total;
      ?>
    </span>

    <a href="tambah.php" class="btn-add">➕ Tambah Data</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Kecamatan</th>
        <th>Jumlah Penduduk</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM penduduk");

    while ($d = mysqli_fetch_array($data)) {
    ?>
      <tr>
        <td data-label="No"><?= $no++ ?></td>
        <td data-label="Kecamatan"><?= $d['kecamatan'] ?></td>
        <td data-label="Jumlah Penduduk"><?= number_format($d['jumlah']) ?></td>
        <td data-label="Aksi" class="action">
          <a href="edit.php?id=<?= $d['id'] ?>" class="edit">✏️ Edit</a>
          <a href="hapus.php?id=<?= $d['id'] ?>" 
             class="hapus"
             onclick="return confirm('Yakin hapus data ini?')">
             🗑️ Hapus
          </a>
        </td>
      </tr>
    <?php } ?>

    </tbody>
  </table>

</div>

</body>
</html>

