<?php require('header.php'); ?>

<div class="content">
  <h1>Data Barang</h1>
  <div class="main">
    <table>
      <tr>
        <th>Gambar</th>
        <th>Nama Barang</th>
        <th>Katagori</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
      <?php if ($result) : ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
          <tr>
            <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td><?= $row['harga_jual']; ?></td>
            <td><?= $row['harga_beli']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td>
              <a href="ubah.php?id=<?= $row['id_barang']; ?>"><input type='button' class='btn-ubah'></a>
              <a href="hapus.php?id=<?= $row['id_barang']; ?>"><input type='button' class='btn-delete'></a>
            </td>
          </tr>
        <?php endwhile;
      else : ?>
        <tr>
          <td colspan="7">Belum ada data</td>
        </tr>
      <?php endif; ?>
    </table>
  </div>
</div>

<?php require('footer.php'); ?>