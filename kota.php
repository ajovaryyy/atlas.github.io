<?php include 'koneksi.php';?>

<!-- untuk dropdown kecamatan setelah memilih kota -->

<?php if(isset($_GET['idprov']) && $_GET['namaprov'] != '' ){

    $idprov = $_GET['idprov']; // id provinsi
    $namaprov = $_GET['namaprov']; // nama provinsi
    
    ?>
<select name="namakota" class="form-control container p-2 kota" required id='kota'>
        
        <option value="">Pilih Kota</option>
        <option value="<?= $idprov; ?>" id='provback'><?= '<< <b>'.$namaprov.'<b>'; ?></option>
        
        <?php
          $query = mysqli_query($koneksi, "SELECT * from kota WHERE id_provinsi = $idprov ") or die(mysqli_error());
          while ($a = mysqli_fetch_array($query)) {
          ?>
            
            <!-- looping kota  -->
          
            <option value="<?php echo $a['idkot'].'|'.$a['namakot'] ?>"><?php echo $a['namakot'] ?></option>
        
        <?php } ?>


      </select>

<?php }

















