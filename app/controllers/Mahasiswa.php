<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = "Daftar Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = "Detail Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswa($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit();
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'warning');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit();
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusData($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit();
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'warning');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit();
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswa($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit();
        } else {
            Flasher::setFlash('Gagal', 'Diubah', 'warning');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit();
        }
    }

    public function cariData()
    {

        $data['judul'] = "Daftar Mahasiswa";
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa($_POST['keyword']);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
