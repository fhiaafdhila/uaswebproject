<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM penduduk WHERE id=$id");
$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
  $kecamatan = $_POST['kecamatan'];
  $jumlah    = $_POST['jumlah'];

  mysqli_query($conn,
    "UPDATE penduduk 
     SET kecamatan='$kecamatan', jumlah='$jumlah' 
     WHERE id=$id"
  );

  header("Location: data.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data Penduduk</title>
</head>

<body bgcolor="#eef1f5">

<table width="100%" height="100%">
<tr>
<td align="center" valign="middle">

  <!-- CARD -->
  <table width="420" cellpadding="15" bgcolor="#ffffff"
         style="border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.15);">

    <tr>
      <td align="center">
        <h2>Edit Data Penduduk</h2>
        <p style="color:gray; font-size:12px;">
          Perbarui data kecamatan
        </p>
      </td>
    </tr>

    <tr>
      <td>

        <form method="post">

          <label><b>Nama Kecamatan</b></label><br>
          <input type="text" name="kecamatan"
                 value="<?= $d['kecamatan'] ?>"
                 required
                 style="width:100%; padding:8px; margin-top:5px;"><br><br>

          <label><b>Jumlah Penduduk</b></label><br>
          <input type="number" name="jumlah"
                 value="<?= $d['jumlah'] ?>"
                 required
                 style="width:100%; padding:8px; margin-top:5px;"><br><br>

          <button type="submit" name="update"
                  style="
                    width:100%;
                    padding:10px;
                    background:#d90429;
                    color:white;
                    border:0;
                    border-radius:6px;
                    cursor:pointer;
                  ">
            💾 Update Data
          </button>

        </form>

        <br>

        <a href="data.php" style="
          display:block;
          text-align:center;
          text-decoration:none;
          color:#555;
          font-size:13px;
        ">
          ⬅️ Kembali ke Data
        </a>

      </td>
    </tr>

  </table>
  <!-- END CARD -->

</td>
</tr>
</table>

</body>
</html>
