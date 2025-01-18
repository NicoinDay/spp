<h5>Halaman Data Pembayaran Siswa</h5>
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
    // $sql = "SELECT*FROM pembayaran,siswa,spp,petugas,kelas WHERE pembayaran.id_spp=spp.id_spp AND pembayaran.nisns=siswa.nisn AND siswa.id_kelas=kelas.id_kelas ORDER BY id_pembayaran";
    // $sql = "SELECT DISTINCT 
    //         siswa.nisn, 
    //         siswa.nama, 
    //         pembayaran.id_pembayaran, 
    //         pembayaran.tgl_bayar,
    //         spp.tahun, 
    //         spp.nominal, 
    //         kelas.nama_kelas
    //     FROM pembayaran, siswa, spp, petugas, kelas
    //     WHERE pembayaran.id_spp = spp.id_spp
    //     AND pembayaran.nisns = siswa.nisn
    //     AND siswa.id_kelas = kelas.id_kelas
    //     ORDER BY id_pembayaran";

    $sql = "SELECT 
            siswa.nisn, 
            siswa.nama, 
            pembayaran.id_pembayaran, 
            pembayaran.tgl_bayar, 
            spp.tahun, 
            spp.nominal, 
            kelas.nama_kelas
        FROM pembayaran, siswa, spp, petugas, kelas
        WHERE pembayaran.id_spp = spp.id_spp
        AND pembayaran.nisns = siswa.nisn
        AND siswa.id_kelas = kelas.id_kelas
        AND pembayaran.id_pembayaran = (
            SELECT MAX(id_pembayaran) 
            FROM pembayaran 
            WHERE nisns = siswa.nisn
        )
        ORDER BY pembayaran.id_pembayaran";



    $query = mysqli_query($koneksi, $sql);
    foreach ($query as $data) { 
        // var_dump($data);
        $data_pembayaran = mysqli_query($koneksi,"SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisns='$data[nisn]'");
        $data_pembayaran = mysqli_fetch_array($data_pembayaran);
        $sudah_bayar = $data_pembayaran['jumlah_bayar'];
        $kekurangan = $data['nominal']-$sudah_bayar;
        ?>
        <tr class="text-center">
            <td><?= $no++; ?></td>
            <td><?= $data['nisn'] ?></td>
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
                    <a href="?url=tambah-pembayaran&nisns=<?= $data['nisn'] ?>&kekurangan=<?= $kekurangan?>" class="btn btn-danger"> Pilih & Bayar</a>
                <?php } ?>
            </td>
            <td>
                <a href="?url=history-pembayaran&nisns=<?= $data['nisn']?>" class="btn btn-info">History</a>
            </td>
        </tr>
    <?php } ?>

</table>