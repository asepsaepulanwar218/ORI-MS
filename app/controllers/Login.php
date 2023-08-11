<?php

class Login extends Controller
{

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
