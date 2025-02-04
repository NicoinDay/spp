<h5>Add SPP Data Page</h5>
<a href="?url=spp" class="btn btn-primary"> BACK </a>
<hr>
<form method="post" action="?url=proses-tambah-spp">
    <div class="form-group mb-2">
        <label>Years</label>
        <input type="number" name="tahun" maxlength="4" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input type="number" name="nominal" maxlength="13" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> SAVE </button>
        <button type="reset" class="btn btn-warning"> RESET </button>
    </div>
</form>