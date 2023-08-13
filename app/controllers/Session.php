<?php

class Session extends Controller
{

    public function index($user)
    {
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ' . BASEURL . '/dashboard');
    }
}
