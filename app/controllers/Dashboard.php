<?php

class Dashboard extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $this->view('templates/header', $data);
        $this->view('templates/menus', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
