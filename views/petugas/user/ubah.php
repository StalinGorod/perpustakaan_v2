<?php
$u = $perpus->simpan_ubah_user(@$_GET['id']);
?>
<h5>Form Ubah User</h5>
<hr>

<form action="routes/proses.php" method="post">
    <div class="form-group">
        <label for="">Username</label>
        <input type="hidden" name="id" value="<?= $u->user_id ?>">
        <input type="text" name="username" placeholder="Username" autofocus class="form-control" value="<?= $u->username; ?>">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="ubah_user" class="btn btn-primary" value="ubah">
        <a href="dashboard.php?pages=users" class="btn btn-danger">Kembali</a>
    </div>
</form>