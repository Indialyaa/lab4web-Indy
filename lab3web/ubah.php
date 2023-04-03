<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
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

  $sql = 'UPDATE data_barang SET ';
  $sql .= "nama = '{$nama}', kategori = '{$kategori}', ";
  $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}', stok = '{$stok}' ";
  if (!empty($gambar))
    $sql .= ", gambar = '{$gambar}' ";
  $sql .= "WHERE id_barang = '{$id}'";
  $result = mysqli_query($conn, $sql);

  header('location: home.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);

function is_select($var, $val)
{
  if ($var == $val) return 'selected="selected"';
  return false;
}
?>

<?php require('header.php'); ?>

<div class="tentang">
  <center>
    <h1>Ubah Barang</h1>
  </center>
  <div class="main">
    <form method="post" action="ubah.php" enctype="multipart/form-data">
      <div class="input">
        <label>Nama Barang</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Kategori</label>
        <select name="kategori" style="width: 102.5%; padding: 5px;">
          <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Komputer">Komputer</option>
          <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Elektronik">Elektronik</option>
          <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
        </select>
      </div>
      <div class="input">
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Harga Beli</label>
        <input type="text" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Stok</label>
        <input type="text" name="stok" value="<?php echo $data['stok']; ?>" style="width: 100%; padding: 5px;" />
      </div>
      <div class=" input">
        <label>File Gambar</label>
        <input type="file" name="file_gambar" style="width: 100%; padding: 5px;" />
      </div>
      <div class="submit">
        <input type="hidden" name="id" value="<?php echo $data['id_barang']; ?>" />
        <center><input type="submit" name="submit" value="Simpan" /></center>
      </div>
    </form>
  </div>
</div>

<?php require('footer.php'); ?>