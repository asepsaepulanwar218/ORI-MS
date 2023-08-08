<?php

class Register extends Controller
{

    public function index()
    {

        $this->view('templates/header');
        $this->view('register/index');
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $kirim = $this->model('Register_model')->tambahUser($_POST);
        if ($kirim != null) {
            Flasher::setFlash('Berhasil', 'Registrasi berhasil', 'success', 'data_barang');
            header('Location: ' . BASEURL . '/data_barang');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Registrasi gagal', 'error', 'data_barang');
            header('Location: ' . BASEURL . '/data_barang');
            exit;
        }
    }
}
