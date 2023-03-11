<a href="dashboard.php?pages=users&act=tambah" class="btn btn-success mb-3">Tambah Data User</a>

<table class="table border shadow">
    <tr class="bg-primary text-white">
        <th>No</th>
        <th>Username</th>
        <th>Level</th>
        <th>Opsi</th>
    </tr>
    <?php
    $no = 1;
    foreach ($perpus->list_users() as $u) {
    ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $u->username; ?></td>
            <td><?= $u->level; ?></td>
            <td>
                <a href="dashboard.php?pages=users&act=ubah&id=<?= $u->user_id; ?>" class="btn btn-primary">Ubah</a>
                <a href="routes/proses.php?pages=users&act=hapus&id=<?= $u->user_id; ?>" class="btn btn-danger" onClick='return confirm("Anda yakin akan menghapus data ini")'>Hapus</a>
            </td>
        </tr>
    <?php
        $no++;
    }
    ?>
</table>