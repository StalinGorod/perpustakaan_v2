<h5>Form Tambah User</h5>
<hr>

<form action="routes/proses.php" method="post">
    <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username" placeholder="Username" autofocus class="form-control">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="simpan_user" class="btn btn-primary" value="simpan">
        <a href="dashboard.php?pages=users" class="btn btn-danger">Kembali</a>
    </div>
</form>