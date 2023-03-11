<?php
class perpustakaan
{
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = new mysqli('localhost', 'root', '', 'perpustakaan_v2');
    }

    public function proses_login($username, $password)
    {
        $query = $this->koneksi->query("SELECT * FROM users WHERE username='$username' AND password=md5('$password')");
        $data = $query->fetch_object();
        $count = $query->num_rows;

        if ($count > 0) {
            session_start();
            $_SESSION['login'] = 1;
            $_SESSION['username'] = $data->username;
            $_SESSION['level'] = $data->level;
            $_SESSION['nis'] = $data->nis;
            header("location:../dashboard.php");
        } else {
            session_start();
            $_SESSION['warning'] = 'Anda gagal login, periksa username dan password';
            header("location:../login.php");
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        //alert
        session_start();
        $_SESSION['success'] = 'Anda berhasil logout';


        header("location:../login.php");
    }

    //Data User
    public function list_users()
    {
        $query = $this->koneksi->query("SELECT * FROM users");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function simpan_user($username, $password)
    {
        $query = $this->koneksi->query("INSERT INTO users VALUES(null,'$username',md5('$password'),'Petugas','0')");

        if ($query) {
            session_start();
            $_SESSION['success'] = 'Data user berhasil disimpan';
            header("location:../dashboard.php?pages=users");
        }
    }

    public function simpan_ubah_user($id)
    {
        $query = $this->koneksi->query("SELECT * FROM users WHERE user_id='$id'");
        return $query->fetch_object();
    }

    public function proses_ubah_user($id, $username, $password)
    {
        if ($password == null) {
            $query = $this->koneksi->query("UPDATE users SET username='$username' WHERE user_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data user berhasil diubah';
            header("location:../dashboard.php?pages=users");
        } else {
            $query = $this->koneksi->query("UPDATE users SET username='$username',password=md5('$password') WHERE user_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data user berhasil diubah';
            header("location:../dashboard.php?pages=users");
        }
    }

    public function hapus_user($id)
    {
        $query = $this->koneksi->query("DELETE FROM users WHERE user_id='$id'");
        header("location:../dashboard.php?pages=users");
    }

    public function menghitung_users()
    {
        $query = $this->koneksi->query("SELECT * FROM users");
        return $query->num_rows;
    }

    //data siswa
    public function list_siswa()
    {
        $query = $this->koneksi->query("SELECT * FROM siswa");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function simpan_siswa($nis, $nama, $kelas, $gambar)
    {
        $query = $this->koneksi->query("INSERT INTO siswa VALUES(null,'$nis','$nama','$kelas','$gambar')");

        if ($query) {
            $query2 = $this->koneksi->query("INSERT INTO users VALUES(null,'$nis',md5('$nis'),'Siswa','$nis')");
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . $gambar);
            session_start();
            $_SESSION['success'] = 'Data siswa berhasil disimpan';
            header("location:../dashboard.php?pages=siswa");
        }
    }

    public function menghitung_siswa()
    {
        $query = $this->koneksi->query("SELECT * FROM siswa");
        return $query->num_rows;
    }

    public function hapus_siswa($id)
    {
        $query = $this->koneksi->query("DELETE FROM siswa WHERE siswa_id='$id'");
        header("location:../dashboard.php?pages=siswa");
    }

    public function simpan_ubah_siswa($id)
    {
        $query = $this->koneksi->query("SELECT * FROM siswa WHERE siswa_id='$id'");
        return $query->fetch_object();
    }

    public function proses_ubah_siswa($id, $nis, $nama, $kelas, $gambar)
    {
        if ($gambar == null) {
            $this->koneksi->query("UPDATE siswa SET nis='$nis',nama_siswa='$nama',kelas='$kelas' WHERE siswa_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data siswa berhasil diubah';
            header("location:../dashboard.php?pages=siswa");
        } else {
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . $gambar);
            $query = $this->koneksi->query("UPDATE siswa SET nis='$nis',nama_siswa='$nama',kelas='$kelas',photo='$gambar' WHERE siswa_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data siswa berhasil diubah';
            header("location:../dashboard.php?pages=siswa");
        }
    }

    //data buku
    public function list_buku()
    {
        $query = $this->koneksi->query("SELECT * FROM buku");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function simpan_buku($judul, $penulis, $penerbit, $picture)
    {
        $query = $this->koneksi->query("INSERT INTO buku VALUES(null,'$judul','','$penulis','$penerbit','$picture')");

        if ($query) {
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . $picture);
            session_start();
            $_SESSION['success'] = 'Data buku berhasil disimpan';
            header("location:../dashboard.php?pages=buku");
        }
    }

    public function hapus_buku($id)
    {
        $query = $this->koneksi->query("DELETE FROM buku WHERE buku_id='$id'");
        header("location:../dashboard.php?pages=buku");
    }

    public function menghitung_buku()
    {
        $query = $this->koneksi->query("SELECT * FROM buku");
        return $query->num_rows;
    }

    public function simpan_ubah_buku($id)
    {
        $query = $this->koneksi->query("SELECT * FROM buku WHERE buku_id='$id'");
        return $query->fetch_object();
    }

    public function proses_ubah_buku($id, $judul, $penulis, $penerbit, $picture)
    {
        if ($picture == null) {
            $this->koneksi->query("UPDATE buku SET judul_buku='$judul',penulis='$penulis',penerbit='$penerbit' WHERE buku_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data buku berhasil diubah';
            header("location:../dashboard.php?pages=buku");
        } else {
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/' . $picture);
            $this->koneksi->query("UPDATE buku SET judul_buku='$judul',penulis='$penulis',penerbit='$penerbit',gambar='$picture' WHERE buku_id='$id'");
            session_start();
            $_SESSION['success'] = 'Data buku berhasil diubah';
            header("location:../dashboard.php?pages=buku");
        }
    }

    //data peminjaman user
    public function list_peminjaman()
    {
        $query = $this->koneksi->query("SELECT * FROM peminjaman INNER JOIN buku ON buku.buku_id = peminjaman.buku_id INNER JOIN siswa ON siswa.nis = peminjaman.nis");
        while ($pinjam = $query->fetch_object()) {
            $hasil3[] = $pinjam;
        }
        return $hasil3;
    }

    public function proses_simpan_peminjaman($no_peminjaman, $siswa, $buku, $tgl_pinjam, $tgl_kembali)
    {
        $query = $this->koneksi->query("INSERT INTO peminjaman VALUES ('$no_peminjaman','$buku','$siswa','$tgl_pinjam','$tgl_kembali')");

        if ($query) {
            session_start();
            $_SESSION['success'] = 'Data peminjaman berhasil disimpan';
            header("location:../dashboard.php?pages=peminjaman");
        }
    }

    public function buku()
    {
        $query = $this->koneksi->query("SELECT * FROM buku");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function menghitung_peminjaman()
    {
        $query = $this->koneksi->query("SELECT * FROM peminjaman");
        return $query->num_rows;
    }

    public function cari_nis($nis)
    {
        header("location:../dashboard.php?pages=peminjaman&act=tambah&nis=$nis");
    }
}

$perpus = new perpustakaan();
