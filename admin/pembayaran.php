<h5>Halaman Data Pembayaran Siswa</h5>
<hr>
<table class="table table-striped table-bordered">
    <thead>
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
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $no = 1;

        // Query yang sudah dioptimalkan
        $sql = "
        SELECT 
            siswa.nisn, siswa.nama, kelas.nama_kelas, spp.tahun, spp.nominal,
            COALESCE(SUM(pembayaran.jumlah_bayar), 0) AS sudah_bayar
        FROM siswa
        LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
        LEFT JOIN spp ON siswa.id_spp = spp.id_spp
        LEFT JOIN pembayaran ON siswa.nisn = pembayaran.nisns
        GROUP BY siswa.nisn
        ORDER BY siswa.nisn ASC";

        $query = mysqli_query($koneksi, $sql);

        // Looping data siswa
        while ($data = mysqli_fetch_assoc($query)) {
            $kekurangan = $data['nominal'] - $data['sudah_bayar'];
        ?>
            <tr class="text-center">
                <td><?= $no++; ?></td>
                <td><?= $data['nisn']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['nama_kelas']; ?></td>
                <td><?= $data['tahun']; ?></td>
                <td>Rp. <?= number_format($data['nominal'], 2, ',', '.'); ?></td>
                <td>Rp. <?= number_format($data['sudah_bayar'], 2, ',', '.'); ?></td>
                <td>Rp. <?= number_format($kekurangan, 2, ',', '.'); ?></td>
                <td>
                    <?php if ($kekurangan == 0) { ?>
                        <span class="badge text-bg-success">Sudah Lunas</span>
                    <?php } else { ?>
                        <a href="?url=tambah-pembayaran&nisns=<?= $data['nisn']; ?>&kekurangan=<?= $kekurangan; ?>" class="btn btn-danger">Pilih & Bayar</a>
                    <?php } ?>
                </td>
                <td>
                    <a href="?url=history-pembayaran&nisns=<?= $data['nisn']; ?>" class="btn btn-info">History</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>