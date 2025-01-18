<?php

$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_spp = $_POST['id_spp'];



include '../koneksi.php';
$sql_siswa = "INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) VALUES('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')";
$query_siswa = mysqli_query($koneksi, $sql_siswa);

$sql_pembayaran = "INSERT INTO pembayaran(id_petugas,nisns,tgl_bayar,bulan_bayar,tahun_bayar,id_spp,jumlah_bayar) VALUES(NULL,'$nisn',NULL,NULL,NULL,'$id_spp',NULL)";
$query_pembayaran = mysqli_query($koneksi, $sql_pembayaran);

if ($query_siswa &&  $query_pembayaran) {
    header("Location:?url=siswa");
} else {
    echo "<script>alert('Maaf Data Tidak Tersimpan'); window.location.assign('?url=siswa');</script>";
}