<?php
include '../controllers/db.php';

//proses login
if (@$_POST['login']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $perpus->proses_login($username, $password);
}

//proses logout
if (@$_GET['aksi'] == 'logout') {
    $perpus->logout();
}

//proses simpan user
if (@$_POST['simpan_user']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $perpus->simpan_user($username, $password);
}

if (@$_POST['simpan_user']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $perpus->simpan_ubah_user($username, $password);
}

if (@$_POST['ubah_user']) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $perpus->proses_ubah_user($id, $username, $password);
}

if (@$_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    $perpus->hapus_user($id);
}

//proses simpan siswa
if (@$_POST['simpan_siswa']) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['gambar']['name'];

    $perpus->simpan_siswa($nis, $nama, $kelas, $gambar);
}

if (@$_GET['act'] == 'hapus1') {
    $id = $_GET['id'];
    $perpus->hapus_siswa($id);
}

if (@$_POST['simpan_siswa']) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['gambar']['name'];
    $perpus->simpan_ubah_siswa($nis, $nama, $kelas, $gambar);
}

if (@$_POST['ubah_siswa']) {
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['gambar']['name'];
    $perpus->proses_ubah_siswa($id, $nis, $nama, $kelas, $gambar);
}

//proses simpan buku
if (@$_POST['simpan_buku']) {
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $picture = $_FILES['gambar']['name'];

    $perpus->simpan_buku($judul, $penulis, $penerbit, $picture);
}

if (@$_GET['act'] == 'hapus2') {
    $id = $_GET['id'];
    $perpus->hapus_buku($id);
}

if (@$_POST['simpan_buku']) {
    $judul = $_POST['juduk_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $picture = $_FILES['gambar']['name'];
    $perpus->simpan_ubah_buku($judul, $penulis, $penerbit, $picture);
}

if (@$_POST['ubah_buku']) {
    $id = $_POST['id'];
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $picture = $_FILES['gambar']['name'];
    $perpus->proses_ubah_buku($id, $judul, $penulis, $penerbit, $picture);
}

//peminjaman
if (@$_POST['simpan_pinjam']) {
    $no_peminjaman = $_POST['idd'] . "-" . date('Y-m-d');
    $siswa = $_POST['idd'];
    $buku = $_POST['buku'];
    $tgl_pinjam = date('Y-m-d');
    $tgl_kembali = $_POST['tgl_kembali'];
    $perpus->proses_simpan_peminjaman($no_peminjaman, $siswa, $buku, $tgl_pinjam, $tgl_kembali);
}

if (@$_POST['cari_nis']) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $perpus->cari_nis($nis);
}
