<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];
  $stok = $_POST['stok'];
  $file_gambar = $_FILES['file_gambar'];
  $gambar = null;

  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '/gambar/' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $gambar = 'gambar/' . $filename;;
    }
  }

  $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ';
  $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}','{$harga_beli}', '{$stok}', '{$gambar}')";
  $result = mysqli_query($conn, $sql);
  header('location: home.php');
}
?>

<?php require('header.php'); ?>

<div class="tentang">

  <center>
    <h1>Tambah Barang</h1>
  </center>
  <div class="main">
    <form method="post" action="tambah.php" enctype="multipart/form-data">
      <div class="input">
        <label>Nama Barang</label>
        <input type="text" name="nama" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Kategori</label>
        <select name="kategori" style="width: 102.5%; padding: 5px;">
          <option value="Komputer">Komputer</option>
          <option value="Elektronik">Elektronik</option>
          <option value="Hand Phone">Hand Phone</option>
        </select>
      </div>
      <div class="input">
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Harga Beli</label>
        <input type="text" name="harga_beli" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Stok</label>
        <input type="text" name="stok" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>File Gambar</label>
        <input type="file" name="file_gambar" style="width: 100%; padding: 5px;" />
      </div>
      <div class="submit">
        <center><input type="submit" name="submit" value="Simpan" /></center>
      </div>
    </form>
  </div>
</div>

<?php require('footer.php'); ?>