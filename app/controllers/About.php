<?php

class About extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }
    }

    public function index($nama = 'Asep Saepul Anwar', $pekerjaan = 'QA', $umur = 25)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About';
        $this->view('templates/header', $data);
        $this->view('templates/menus', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('templates/menus', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
