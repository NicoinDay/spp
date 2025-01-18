<h5>Halaman Data Pembayaran Siswa</h5>
<a href="?url=tambah-data" class="btn btn-primary"> Tambah Siswa</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold text-center">
        <th>No</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>SPP</th>
        <th>Nominal</th>
        <th>Sudah Dibayar</th>
        <th>Kekurangan</th>
        <th>Status</th>
        <th>History</th>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT*FROM pembayaran,siswa,spp,petugas,kelas WHERE pembayaran.id_siswa=siswa.id_siswa AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND siswa.id_kelas=kelas.id_kelas ORDER BY id_pembayaran";
    $query = mysqli_query($koneksi, $sql);
    foreach ($query as $data) { 
        $data_pembayaran = mysqli_query($koneksi,"SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisns='$data[nisns]'");
        $data_pembayaran = mysqli_fetch_array($data_pembayaran);
        $sudah_bayar = $data_pembayaran['jumlah_bayar'];
        $kekurangan = $data['nominal']-$sudah_bayar;
        ?>
        <tr class="text-center">
            <td><?= $no++; ?></td>
            <td><?= $data['nisns'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['tahun'] ?></td>
            <td>Rp. <?= number_format($data['nominal'], 2, ',', '.'); ?></td>
            <td>Rp. <?= number_format($sudah_bayar, 2, ',', '.'); ?></td>
            <td>Rp. <?= number_format($kekurangan, 2, ',', '.'); ?></td>
            <td>
                <?php
                if ($kekurangan==0) {
                    echo"<span class='badge text-bg-success'> Sudah Lunas </span>";
                }else { ?>
                    <a href="?url=tambah-pembayaran&nisns=<?= $data['nisns'] ?>&kekurangan=<?= $kekurangan?>" class="btn btn-danger"> Pilih & Bayar</a>
                <?php } ?>
            </td>
            <td>
                <a href="?url=history-pembayaran&nisns=<?= $data['nisns']?>" class="btn btn-info">History</a>
            </td>
        </tr>
    <?php } ?>

</table>