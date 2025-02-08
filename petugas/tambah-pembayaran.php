<?php
$nisns = $_GET['nisns'];
$kekurangan = $_GET['kekurangan'];
include '../koneksi.php';
$sql = "SELECT*FROM pembayaran,siswa,spp,petugas,kelas WHERE  pembayaran.id_spp=spp.id_spp AND pembayaran.nisns=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND nisns='$nisns'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Spp Payment Page</h5>
<a href="?url=pembayaran" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-tambah-pembayaran&nisns=<?= $nisns; ?>">
    <div class="form-group mb-2">
        <input name="id_spp" value="<?= $data['id_spp'] ?>" type="hidden" class="form-control" required>
        <label>Officer's Name</label>
        <input value="<?= $_SESSION['nama_petugas'] ?>" disabled class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NISN</label>
        <input readonly name="nisns" value="<?= $data['nisns'] ?>" type="number" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Student Name</label>
        <input disabled value="<?= $data['nama'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Paymet Date</label>
        <input type="date" name="tgl_bayar" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="">Pay Month</label>
        <select name="bulan_bayar" class="form-control" required>
            <option value="">--Select Paid Month--</option>
            <option value="Januari">January</option>
            <option value="Februari">February</option>
            <option value="Maret">March</option>
            <option value="April">April</option>
            <option value="Mei">May</option>
            <option value="Juni">June</option>
            <option value="Juli">July</option>
            <option value="Agustus">Agust</option>
            <option value="September">September</option>
            <option value="Oktober">October</option>
            <option value="November">November</option>
            <option value="Desember">December</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Pay Year</label>
        <select name="tahun_bayar" class="form-control" required>
            <option value="">--Select Paid Year--</option>
            <?php
            for ($i = 2020; $i <= date('Y'); $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Amount to be paid (The amount to be paid is <b>Rp.<?= number_format($kekurangan, 2, ',', '.') ?></b>)</label><br>
        <input type="number" name="jumlah_bayar" class="form-control" max="<?= $kekurangan ?>" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> SAVE </button>
        <button type="reset" class="btn btn-warning"> RESET </button>
    </div>
</form>