<?php

class MahasiswaModel
{
    private $tabel = "mahasiswa";
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = new Database();
    }

    public function getAllMahasiswa()
    {
        $this->koneksi->query("SELECT * FROM " . $this->tabel);
        return $this->koneksi->resultSet();
    }

    public function getMahasiswa($id)
    {
        $this->koneksi->query("SELECT * FROM " . $this->tabel . " WHERE id=:id");
        $this->koneksi->bind('id', $id);
        return $this->koneksi->single();
    }

    public function tambahMahasiswa($post)
    {
        $query = "INSERT INTO " . $this->tabel . " VALUES('',:nama,:npm,:email,:jurusan)";
        $this->koneksi->query($query);
        $this->koneksi->bind('nama', $post['nama']);
        $this->koneksi->bind('npm', $post['npm']);
        $this->koneksi->bind('email', $post['email']);
        $this->koneksi->bind('jurusan', $post['jurusan']);
        $this->koneksi->execute();
        return $this->koneksi->rowCount();
    }

    public function ubahMahasiswa($post)
    {
        $query = "UPDATE " . $this->tabel . " SET
        nama=:nama,
        npm=:npm,
        email=:email,
        jurusan=:jurusan where id=:id";
        $this->koneksi->query($query);
        $this->koneksi->bind('id', $post['id']);
        $this->koneksi->bind('nama', $post['nama']);
        $this->koneksi->bind('npm', $post['npm']);
        $this->koneksi->bind('email', $post['email']);
        $this->koneksi->bind('jurusan', $post['jurusan']);
        $this->koneksi->execute();
        return $this->koneksi->rowCount();
    }

    public function hapusMahasiswa($id)
    {
        $this->koneksi->query("DELETE FROM " . $this->tabel . " WHERE id=:id");
        $this->koneksi->bind('id', $id);
        $this->koneksi->execute();
        return $this->koneksi->rowCount();
    }
}