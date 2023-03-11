<a href="dashboard.php?pages=siswa&act=tambah" class="btn btn-success mb-3">Tambah Data Siswa</a>

<table class="table border shadow">
    <tr class="bg-primary text-white">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Photo</th>
        <th>Opsi</th>
    </tr>
    <?php
    $no = 1;
    foreach (@$perpus->list_siswa() as $u) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $u->nis; ?></td>
            <td><?= $u->nama_siswa; ?></td>
            <td><?= $u->kelas; ?></td>
            <td><img src="assets/img/<?= $u->photo; ?>" width=80></td>
            <td>
                <a href="dashboard.php?pages=siswa&act=ubah&id=<?= $u->siswa_id; ?>" class="btn btn-primary">Ubah</a>
                <a href="routes/proses.php?pages=siswa&act=hapus1&id=<?= $u->siswa_id; ?>" class="btn btn-danger" onClick='return confirm("Anda yakin akan menghapus data ini")'>Hapus</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>