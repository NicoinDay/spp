<?php

$id_petugas = $_GET['id_petugas'];

include '../koneksi.php';
$sql = "DELETE FROM petugas WHERE id_petugas='$id_petugas'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    header("Location:?url=petugas");
} else {
    echo "<script>alert('Sorry, data not deleted'); window.location.assign('?url=petugas');</script>";
}
