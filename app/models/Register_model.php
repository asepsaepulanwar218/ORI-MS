<?php

class Register_model
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

    public function tambahUser($data)
    {


        date_default_timezone_set('Asia/Jakarta');
        $p_password = password_hash($data['password'], PASSWORD_DEFAULT, $this->options);
        $query = "INSERT INTO " . $this->table . " (username, password, first_name, last_name, email, created_by, created_date)
                    VALUES
                    (:username, :password, :first_name, :last_name, :email, :created_by, :created_date)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $p_password);
        $this->db->bind('first_name', $data['firstName']);
        $this->db->bind('last_name', $data['lastName']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('created_by', $data['username']);
        $this->db->bind('created_date', date('Y-m-d h:i:sa'));

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getEmailUser($email)
    {
        $this->db->query('SELECT COUNT(id) as jumlah, email FROM ' . $this->table . ' WHERE email = :p_email');
        $this->db->bind('p_email', $email);
        return $this->db->single();
    }
}
