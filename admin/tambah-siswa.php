<h5>Add Student Data Page </h5>
<a href="?url=siswa" class="btn btn-primary"> BACK </a>
<hr>
<form method="post" action="?url=proses-tambah-siswa">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input type="number" name="nisn" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NIS</label>
        <input type="number" name="nis" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Student Name</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Class</label>
        <select name="id_kelas" class="form-control" required>
            <option value=""> Select Class </option>
            <?php
            include '../koneksi.php';
            $kelas = mysqli_query($koneksi,"SELECT*FROM kelas ORDER BY nama_kelas ASC");
            foreach($kelas as $data_kelas){
            ?>
            <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['nama_kelas']; ?> </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Address</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="form-group mb-2">
        <label>Phone Number</label>
        <input type="number" name="no_telp" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>SPP</label>
        <select name="id_spp" class="form-control" required>
            <option value=""> Select SPP</option>
            <?php
            include '../koneksi.php';
            $spp = mysqli_query($koneksi,"SELECT*FROM spp ORDER BY id_spp ASC");
            foreach($spp as $data_spp){
            ?>
            <option value="<?= $data_spp['id_spp'] ?>"><?= $data_spp['tahun']; ?> | Rp. <?= number_format($data_spp['nominal'],2,',','.'); ?> </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success"> SAVE </button>
        <button type="reset" class="btn btn-warning"> RESET </button>
    </div>
</form>