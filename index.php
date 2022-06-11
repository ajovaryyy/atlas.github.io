<?php
include "koneksi.php";
include "header.php";
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container mt-5">
    <form method="post">
      <div class="form-group">
        <h1 class="container">Asal</h1>
        <select name="idkota" required class="form-control container p-2">
          <option value="">Pilih Kota</option>
          <?php
          $det = mysqli_query($koneksi, "SELECT * from kota_asal") or die(mysqli_error());
          while ($d = mysqli_fetch_array($det)) {
          ?>
            <option value="<?php echo $d['idks'] ?>"><?php echo $d['namakota_asal'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>

      <h1 class="container mt-3">Tujuan</h1>
      <div class="form-group tujuan">
        <select name="namaprov" class="form-control container p-2 provinsi" required id='provinsi'>
          <option value="">Pilih Provinsi</option>
          <?php
          $det = mysqli_query($koneksi, "SELECT * from provinsi") or die(mysqli_error());
          while ($d = mysqli_fetch_array($det)) {
          ?>
            <option value="<?php echo $d['id'] . '|' . $d['namaprov'] ?>"><?php echo $d['namaprov'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>

      <button type='submit' name="addstok" class="btn btn-primary btn-block mt-5">Cek Harga</button>

    </form>

    <?php if (isset($_POST['addstok'])) {

      // ketika tombol cek harga dipencet maka harga akan tampil

      $idkota_asal = $_POST['idkota'];
      $idkecamatan_tujuan = $_POST['idkec'];
      $idkecamatan_tujuan = explode('|', $idkecamatan_tujuan);
      $idkecamatan_tujuan = $idkecamatan_tujuan[0];

      // query buat select harga , kota asal, kota tujuan , provinsi tujuan , dan kecamatan tujuan

      $hasharga = mysqli_query($koneksi, "SELECT namakota_asal,harga,namakec,namakot,namaprov FROM hargaa, kota_asal, kecamatan JOIN kota ON kota.idkot = kecamatan.id_kota JOIN provinsi ON provinsi.id = kota.id_provinsi  WHERE idkotsal=idks AND idkct=idkec AND idks = $idkota_asal AND idkct = $idkecamatan_tujuan ");

      $harga = mysqli_fetch_array($hasharga); ?>
      <div class="harga-tampil mt-3">

        <?php if ($harga > 0) {
          // cek dulu datanya ada apa engga, kalo ada tampilin tampilHarga()

          tampilHarga($harga['namakota_asal'], $harga['harga'], $harga['namakot'], $harga['namaprov'], $harga['namakec']);
        } else {
          // kalo gaada datanya ya tampilin gaadaHarga()

          gaadaHarga();
        } ?>

      </div>

    <?php } ?>

  </div>
  <!-- Footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="script.js"></script>

</body>

</html>