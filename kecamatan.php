<?php include 'koneksi.php';?>

<!-- untuk dropdown kecamatan setelah memilih kota -->

<?php if(isset($_GET['idkota']) && $_GET['namakota'] != '' ){
    
    $idkota = $_GET['idkota'];
    $namakota = $_GET['namakota'];?>

<select name="idkec" class="form-control container p-2 kecamatan" required id='kecamatan'>
        
        <option value="">Pilih Kecamatan</option>
        <option value="<?= $idkota; ?>" id='kotaback'><?= '<< <b>'.$namakota.'<b>'; ?></option>
        
        <?php
            $query_kecamatan = mysqli_query($koneksi, "SELECT * from kecamatan WHERE id_kota = $idkota ") or die(mysqli_error());
            while ($kec = mysqli_fetch_array($query_kecamatan)) {
            ?>
          
          <!-- looping kecamatan -->

          <option value="<?php echo $kec['idkec'].'|'.$kec['namakec'] ?>"><?php echo $kec['namakec'] ?></option>
        
        <?php } ?>
      
    </select>

<?php }elseif(isset($_GET['idkota']) && $_GET['namakota'] ==='' ){
        
        // 2===== dari dropdown kota balik ke dropdown provinsi =========
     
     ?>
        

        <select name="namaprov" class="form-control container p-2 provinsi" id='provinsi'>
        <option selected>Pilih Provinsi</option>
        <?php
        $det = mysqli_query($koneksi, "SELECT * from provinsi") or die(mysqli_error());
        while ($d = mysqli_fetch_array($det)) {
        ?>
          <option value="<?php echo $d['id'].'|'.$d['namaprov'] ?>"><?php echo $d['namaprov'] ?></option>
        <?php
        }
        ?>
      </select>


    <?php }elseif(isset($_GET['idkecamatan']) && $_GET['namakecamatan'] === '' ){ 
        
        // ========= ketika dari dropdown kecamatan balik ke dropdown kota ===========

        $idkota = $_GET['idkecamatan'];
        $namakota = $_GET['namakecamatan'];
    ?>

    <?php
            $query_kota = mysqli_query($koneksi, "SELECT * from kota WHERE idkot = $idkota ") or die(mysqli_error());
            $kota = mysqli_fetch_array($query_kota);
            $idprovinsi = $kota['id_provinsi'];
            

            $query_provinsi = mysqli_query($koneksi, "SELECT * from provinsi WHERE id = $idprovinsi ") or die(mysqli_error());
            $provinsi = mysqli_fetch_array($query_provinsi);
            $namaprovinsi = $provinsi['namaprov'];
            
            ?>

    <select name="namakota" class="form-control container p-2 kota" id='kota'>
        
        <option selected>Pilih Kota</option>
        <option value="<?= $idprovinsi; ?>" id='provback'><?= '<< <b>'.$namaprovinsi.'<b>'; ?></option>
        
        <?php
          $query = mysqli_query($koneksi, "SELECT * from kota WHERE id_provinsi = $idprovinsi ") or die(mysqli_error());
          while ($a = mysqli_fetch_array($query)) {
          ?>
            
            <!-- looping kota  -->
          
            <option value="<?php echo $a['idkot'].'|'.$a['namakot'] ?>"><?php echo $a['namakot'] ?></option>
        <?php } ?>
        </select>

<?php } ?>

