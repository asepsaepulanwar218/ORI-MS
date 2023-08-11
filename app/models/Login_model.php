<?php

class Login_model
{

    private $table = 'user';
    private $db;
    public $options = [
        'cost' => 10,
    ];

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLogin($data)
    {
        $dataPassword = $data['password'];
        // date_default_timezone_set('Asia/Jakarta');
        // $p_password = password_hash($data['password'], PASSWORD_DEFAULT, $this->options);
        $this->db->query('SELECT username, password FROM ' . $this->table . ' WHERE username = :p_username');
        $this->db->bind('p_username', $data['username']);
        $dataUser = $this->db->single();

        if (password_verify($dataPassword, $dataUser['password'])) {
            return true;
        } else {
            return false;
        }
    }
}
