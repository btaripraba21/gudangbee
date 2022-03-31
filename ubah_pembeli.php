<?php

include('koneksi.php');
$telah_diubah = false;

if ($_GET) {
  $id = $_GET['id'];
  $query_get = "SELECT * FROM pembeli WHERE kd_pembeli=$id";

  $result_data = mysqli_query($conn, $query_get);
}

if ($_POST) {
  $kd_pembeli = $_POST['id'];
  $nama_pembeli = $_POST['nama_pembeli'];
  $jumlah_pesanan = $_POST['jumlah_pesanan'];

  $query_update = "UPDATE pembeli SET nama_pembeli='$nama_pembeli',jumlah_pesanan='$jumlah_pesanan' WHERE kd_pembeli='$kd_pembeli'";
  if (mysqli_query($conn, $query_update)) {
    $telah_diubah = true;
    $result_data = mysqli_query($conn, $query_get);
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <title>Tempat Penyimpanan Barang | Edit pembeli</title>
</head>

<body style="background-image: url('beec.png'); background-size: 100%; background-position: center;">
  <div class="container mt-5">
    <h1>Edit Pembeli</h1>
    <div class="mt-5 bg-dark px-4 py-4 text-white">
      <?php if (mysqli_num_rows($result_data) > 0) : ?>
        <?php while ($row = mysqli_fetch_assoc($result_data)) { ?>
          <form action="" method="post">
            <div class="row">
              <div class="col-md-12">
                <?php if ($_POST) : ?>
                  <?php if ($telah_diubah == true) : ?>
                    <div class="alert alert-success" role="alert">
                      Berhasil! Data berhasil diubah.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                      Maaf! Data gagal diubah.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              <input type="hidden" class="form-control" name="id" value="<?= $row['kd_pembeli'] ?>" required>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_pembeli">Nama pembeli</label>
                  <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="<?= $row['nama_pembeli'] ?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jumlah_pesanan">Jumlah_Pesanan</label>
                  <input type="text" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="<?= $row['jumlah_pesanan'] ?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <a href="pembeli.php" class="btn btn-outline-info btn-block"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
              </div>
              <div class="col-md-6">
                <button type="submit" class="btn btn-warning btn-block">Edit Pembeli</button>
              </div>
            </div>
          </form>
        <?php } ?>
      <?php else : ?>
        ID tidak ditemukan
      <?php endif; ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>