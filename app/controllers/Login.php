<?php

class Login extends Controller
{

    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/dashboard');
        }
    }

    public function index()
    {

        $this->view('templates/header');
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function getLogin()
    {
        echo json_encode($this->model('Login_model')->getLogin($_POST));
    }
}
