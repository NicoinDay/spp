<h5>Halaman Data Petugas</h5>
<a href="?url=tambah-petugas" class="btn btn-primary"> Tambah Petugas </a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Nama Petugas</th>
        <th>Level</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT*FROM petugas ORDER BY id_petugas DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach ($query as $data) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['password'] ?></td>
            <td><?= $data['nama_petugas'] ?></td>
            <td><?= $data['level'] ?></td>
            <td>
                <a href="?url=edit-petugas&id_petugas=<?= $data['id_petugas'] ?>" class="btn btn-warning">EDIT</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-petugas&id_petugas=<?= $data['id_petugas'] ?>" class="btn btn-danger">HAPUS</a>
            </td>
        </tr>
    <?php } ?>

</table>