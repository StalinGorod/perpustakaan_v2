<a href="dashboard.php?pages=buku&act=tambah" class="btn btn-success mb-3">Tambah Data Buku</a>

<table class="table border shadow">
    <tr class="bg-primary text-white">
        <th>No</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Gambar</th>
        <th>Opsi</th>
    </tr>
    <?php
    $no = 1;
    foreach (@$perpus->list_buku() as $u) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $u->judul_buku; ?></td>
            <td><?= $u->penulis; ?></td>
            <td><?= $u->penerbit; ?></td>
            <td><img src="assets/img/<?= $u->gambar; ?>" width=80></td>
            <td>
                <a href="dashboard.php?pages=buku&act=ubah&id=<?= $u->buku_id; ?>" class="btn btn-primary">Ubah</a>
                <a href="routes/proses.php?pages=buku&act=hapus2&id=<?= $u->buku_id; ?>" class="btn btn-danger" onClick='return confirm("Anda yakin akan menghapus data ini")'>Hapus</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>