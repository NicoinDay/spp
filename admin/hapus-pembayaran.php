<?php

$nisns = $_GET['nisns'];
$id_pembayarean = $_GET['id_pembayaran'];

include '../koneksi.php';
$sql = "DELETE FROM pembayaran WHERE id_pembayaran=$id_pembayarean";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    // echo "<script>window.history.back();</script>";
    header('location: ?url=history-pembayaran&nisns='.$nisns); 
} else {
    echo "<script>alert('Maaf Data Tidak Terhapus');window.history.go(-1);</script>";
}
