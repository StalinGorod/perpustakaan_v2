<h5>Form Tambah Buku</h5>
<hr>

<form action="routes/proses.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Judul Buku</label>
        <input type="text" name="judul_buku" placeholder="Judul Buku" autofocus class="form-control">
    </div>
    <div class="form-group">
        <label for="">Penulis</label>
        <input type="text" name="penulis" placeholder="Penulis" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Penerbit</label>
        <input type="text" name="penerbit" placeholder="Penerbit" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Gambar</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="simpan_buku" class="btn btn-primary" value="simpan">
        <a href="dashboard.php?pages=buku" class="btn btn-danger">Kembali</a>
    </div>
</form>