<?php
$u = $perpus->simpan_ubah_buku(@$_GET['id']);
?>
<h5>Form Tambah User</h5>
<hr>

<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Judul Buku</label>
        <input type="hidden" name="id" value="<?= $u->buku_id ?>">
        <input type="text" name="judul_buku" placeholder="Judul Buku" autofocus class="form-control" value="<?= $u->judul_buku; ?>">
    </div>
    <div class="form-group">
        <label for="">Penulis</label>
        <input type="text" name="penulis" placeholder="penulis" class="form-control" value="<?= $u->penulis; ?>">
    </div>
    <div class="form-group">
        <label for="">Penerbit</label>
        <input type="text" name="penerbit" placeholder="Penerbit" class="form-control" value="<?= $u->penerbit; ?>">
    </div>
    <div class="form-group">
        <label for="">Gambar</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="ubah_buku" class="btn btn-primary" value="ubah">
        <a href="dashboard.php?pages=buku" class="btn btn-danger">Kembali</a>
    </div>
</form>