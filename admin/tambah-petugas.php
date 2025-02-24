<h5>Add Officer Data Page</h5>
<a href="?url=petugas" class="btn btn-primary"> BACK </a>
<hr>
<form method="post" action="?url=proses-tambah-petugas">
    <div class="form-group mb-2">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input type="text" name="password" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Officer Name</label>
        <input type="text" name="nama_petugas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Officer Level</label>
        <select name="level" class="form-control" required>
            <option value="">--Select Officer Level--</option>
            <option value="admin">Admin</option>
            <option value="petugas">Officer</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> SAVE </button>
        <button type="reset" class="btn btn-warning"> RESET </button>
    </div>
</form>