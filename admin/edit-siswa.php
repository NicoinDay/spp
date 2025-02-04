<?php
$id_siswa = $_GET['id_siswa'];
include '../koneksi.php';
$sql = "SELECT*FROM  siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND id_siswa='$id_siswa' ORDER By nama ASC";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Page Edit Student Data</h5>
<a href="?url=siswa" class="btn btn-primary"> BACK </a>
<hr>
<form method="post" action="?url=proses-edit-siswa&id_siswa=<?= $id_siswa?>">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input value="<?= $data['nisn']?>" readonly type="text" name="nisn" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NIS</label>
        <input value="<?= $data['nis']?>" type="number" name="nis" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Student Name</label>
        <input value="<?= $data['nama']?>" type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Class</label>
        <select name="id_kelas" class="form-control" required>
            <option value=" <?= $data['id_kelas']?>"><?= $data['nama_kelas']?></option>
            <?php
            include '../koneksi.php';
            $kelas = mysqli_query($koneksi, "SELECT*FROM kelas ORDER BY nama_kelas ASC");
            foreach ($kelas as $data_kelas) {
            ?>
                <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['nama_kelas']; ?> </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Address</label>
        <textarea name="alamat" class="form-control" required><?= $data['alamat']?></textarea>
    </div> 
    <div class="form-group mb-2">
        <label>Phone Number</label>
        <input value="<?= $data['no_telp']?>" type="number" name="no_telp" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>SPP</label>
        <select name="id_spp" class="form-control" required>
            <option value="<?= $data['id_spp'] ?>"><?= $data['tahun']; ?> | Rp. <?= number_format($data['nominal'], 2, ',', '.'); ?></option>
            <?php
            include '../koneksi.php';
            $spp = mysqli_query($koneksi, "SELECT*FROM spp ORDER BY id_spp ASC");
            foreach ($spp as $data_spp) {
            ?>
            <option value="<?= $data_spp['id_spp'] ?>"><?= $data_spp['tahun']; ?> | Rp. <?= number_format($data_spp['nominal'], 2, ',', '.'); ?> </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success"> SAVE </button>
        <button type="reset" class="btn btn-warning"> RESET </button>
    </div>
</form>