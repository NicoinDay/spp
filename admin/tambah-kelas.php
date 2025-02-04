<h5>Add Class Data Page</h5>
<a href="?url=kelas" class="btn btn-primary"> BACK </a>
<hr>
<form method="post" action="?url=proses-tambah-kelas">
    <div class="form-group mb-2">
        <label>Class Name</label>
        <input type="text" name="nama_kelas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Expertise Competency</label>
        <input type="text" name="kompetensi_keahlian" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> SAVE </button>
        <button type="reset" class="btn btn-warning"> RESET </button>
    </div>
</form>