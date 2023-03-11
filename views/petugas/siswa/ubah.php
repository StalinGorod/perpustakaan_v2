<?php
$u = $perpus->simpan_ubah_siswa(@$_GET['id']);
?>
<h5>Form Tambah User</h5>
<hr>

<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">NIS</label>
        <input type="hidden" name="id" value="<?= $u->siswa_id ?>">
        <input type="text" name="nis" placeholder="NIS" autofocus class="form-control" value="<?= $u->nis; ?>">
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?= $u->nama_siswa; ?>">
    </div>
    <div class="form-group">
        <label for="">Kelas</label>
        <input type="text" name="kelas" placeholder="Kelas" class="form-control" value="<?= $u->kelas; ?>">
    </div>
    <div class="form-group">
        <label for="">Photo</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="ubah_siswa" class="btn btn-primary" value="ubah">
        <a href="dashboard.php?pages=siswa" class="btn btn-danger">Kembali</a>
    </div>
</form>