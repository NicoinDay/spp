<h5>Class Data Page</h5>
<a href="?url=tambah-kelas" class="btn btn-primary"> Add Class </a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <th>No</th>
        <th>Class Name</th>
        <th>Expertise Competency</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT*FROM kelas ORDER BY id_kelas DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach ($query as $data) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_kelas'] ?></td>
            <td><?= $data['kompetensi_keahlian'] ?></td>
            <td>
                <a href="?url=edit-kelas&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-warning">EDIT</a>
            </td>
            <td>
                <a onclick="return confirm('Are you sure you want to delete data?')" href="?url=hapus-kelas&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-danger">DELETE</a>
            </td>
        </tr>
    <?php } ?>

</table>