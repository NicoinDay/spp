<?php

$koneksi = mysqli_connect('localhost','root','','spp_english');

if (!$koneksi) {
    echo"Koneksi Anda Gagal";
}
