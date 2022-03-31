<?php

include('koneksi.php');
$results = mysqli_query($conn, "SELECT * FROM barang");

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <title>Tempat Penyimpanan Barang</title>
</head>

<body style="background-image: url('bee2.jpg'); background-size: 100%; background-position: center;">
  <div class="container mt-5">
    <h1>List Barang di Gudang</h1>
    <a href="index.php" class="btn btn-outline-info my-4">Kembali ke Menu</a>
    <a href="tambah_barang.php" class="btn btn-primary my-4">Tambah Barang</a>
    <div class="list-gudang">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Harga Suplier</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (mysqli_num_rows($results) > 0) : ?>
          <?php $nomor = 1;?>
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
              <tr>
                <th scope="row"><?= $nomor++; ?></th>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= number_format($row['stok_barang']); ?></td>
                <td>Rp <?= number_format($row['harga_satuan']); ?></td>
                <td>Rp <?= number_format($row['harga_supplier']); ?></td>
                <td>
                  <a href="ubah_barang.php?id=<?= $row['kd_barang']; ?>" class="btn btn-info"><i class="far fa-edit"></i> Ubah</a>
                  <a href="hapus_barang.php?id=<?= $row['kd_barang']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php } ?>
          <?php else : ?>
            <tr colspan="5">
              <td>Tidak ada barang</td>
            </tr>
          <?php endif;  ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>