<?php

class Data_User extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }
    }

    public function index()
    {
        $data['user'] = $this->model('Data_User_model')->getAllUser();
        $data['judul'] = 'Data User';
        $data['menu'] = $this->model('Menu_model')->getRoleMenu('asa2');
        foreach ($data['menu'] as $menus) :
            $data[$menus['id']] = $this->model('Menu_model')->getMenuLevel2($menus['id']);
        endforeach;
        $this->view('templates/header', $data);
        $this->view('templates/menus', $data);
        $this->view('data_user/index', $data);
        $this->view('templates/footer');
        $this->view('templates/sweetalert');
    }
}
