<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'atlas');

if (mysqli_connect_errno()) {
    echo "Koneksi Ke Database Gagal : " . mysqli_connect_error();
}
