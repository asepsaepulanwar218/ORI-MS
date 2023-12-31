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
        $data['menu'] = $this->model('Menu_model')->getRoleMenu('asa2');
        foreach ($data['menu'] as $menus) :
            $data[$menus['id']] = $this->model('Menu_model')->getMenuLevel2($menus['id']);
        endforeach;
        $this->view('templates/header', $data);
        $this->view('templates/menus', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
