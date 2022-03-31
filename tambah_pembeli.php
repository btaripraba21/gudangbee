<?php

include('koneksi.php');

if ($_POST) {
  $nama_pembeli   = $_POST['nama'];
  $jumlah_pesanan = $_POST['jumlah_pesanan'];

  $query_insert = "INSERT INTO pembeli (nama_pembeli, jumlah_pesanan) VALUES ('$nama_pembeli','$jumlah_pesanan')";
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <title>Tempat List Barang | Tambah Pembeli</title>
</head>

<body style="background-image: url('beec.png'); background-size: 100%; background-position: center;">
  <div class="container mt-5">
    <h1>Tambah Pembeli</h1>
    <div class="mt-5 bg-dark px-4 py-4 text-white">
      <form action="" method="post">
        <div class="row">
          <div class="col-md-12">
            <?php if ($_POST) : ?>
              <?php if (mysqli_query($conn, $query_insert)) : ?>
                <div class="alert alert-success" role="alert">
                  Berhasil! Data berhasil ditambahkan.
                </div>
              <?php else : ?>
                <div class="alert alert-warning" role="alert">
                  Maaf! Data gagal ditambahkan.
                </div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_pembeli">Nama Pembeli</label>
              <input type="text" class="form-control" id="nama_pembeli" name="nama" required>
            </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
              <label for="jumlah_pesanan">Jumlah_Pesanan</label>
              <input type="text" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" required>
            </div>
            </div>
          <div class="col-md-6">
            <a href="pembeli.php" class="btn btn-outline-info btn-block"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-block">Tambah Pembeli</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>