<?php function tampilHarga($namakota_asal, $harga, $namakota, $namaprov, $namakec)
{ ?>

    <!-- fungsi buat nampilin harga -->

    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Asal</h5>
                <p class="card-text"><?= $namakota_asal; ?></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tujuan</h5>
                <p class="card-text"><?= $namakec . ', ' . $namakota . ', ' . $namaprov; ?></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Harga</h5>
                <p class="card-text"><?= $harga; ?></p>
            </div>
        </div>
    </div>
<?php } ?>

<?php function gaadaHarga()
{ ?>

    <!-- fungsi yang tampil kalo harganya gaada -->

    <div class="alert alert-warning" role="alert">
        Tidak ada data harga
    </div>

<?php } ?>