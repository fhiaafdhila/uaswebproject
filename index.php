<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Peta Kependudukan Kabupaten Pidie</title>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>

<body bgcolor="#eef1f5">

<table width="100%" height="100%" cellpadding="0" cellspacing="0">
<tr>

  <!-- SIDEBAR -->
  <td width="300" valign="top" bgcolor="#ffffff">
    <div style="padding:15px; font-family:Arial;">

      <h2 align="center">Kabupaten Pidie</h2>
      <p align="center" style="font-size:12px; color:gray;">
        Sistem Informasi Kependudukan
      </p>

      <hr>

      <!-- MENU -->
      <a href="tambah.php">
        <button style="width:100%; padding:10px; margin-bottom:8px;
          background:#d90429; color:white; border:0; border-radius:6px;">
          ➕ Tambah Data Penduduk
        </button>
      </a>

      <a href="data.php">
        <button style="width:100%; padding:10px; margin-bottom:8px;
          background:#6c757d; color:white; border:0; border-radius:6px;">
          📄 Lihat Data Penduduk
        </button>
      </a>

      <a href="index.php">
        <button style="width:100%; padding:10px; margin-bottom:8px;
          background:#198754; color:white; border:0; border-radius:6px;">
          🗺️ Peta Kependudukan
        </button>
      </a>

      <hr>

      <p align="center" style="font-size:11px; color:gray;">
        © GIS Kependudukan
      </p>

    </div>
  </td>

  <!-- MAP (PAKAI YANG LAMA) -->
  <td valign="top">
    <div id="map" style="width:100%; height:100vh;"></div>
  </td>

</tr>
</table>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- SCRIPT LAMA (TIDAK DIUBAH) -->
<script src="js/script.js"></script>

</body>
</html>
