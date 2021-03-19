<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('template/header');
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }

    public function detail($id)
    {
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswa($id);
        $this->view('template/header');
        $this->view('mahasiswa/detail', $data);
        $this->view('template/footer');
    }

    public function tambah()
    {
        if ($this->model('MahasiswaModel')->tambahMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header("Location:" . base_url . '/Mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header("Location:" . base_url . '/Mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('MahasiswaModel')->hapusMahasiswa($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header("Location:" . base_url . '/Mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header("Location:" . base_url . '/Mahasiswa');
            exit;
        }
    }

    public function ubah()
    {
        if ($this->model('MahasiswaModel')->ubahMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            header("Location:" . base_url . '/Mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diubah', 'danger');
            header("Location:" . base_url . '/Mahasiswa');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('MahasiswaModel')->getMahasiswa($_POST['id']));
    }
}