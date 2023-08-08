<?php

class Register_model
{

    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambahUser($data)
    {


        date_default_timezone_set('Asia/Jakarta');
        $query = "INSERT INTO " . $this->table . " (username, password, first_name, last_name, email, created_by, created_date)
                    VALUES
                    (:username, :password, :first_name, :last_name, :email, :created_by, :created_date)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('first_name', $data['firstName']);
        $this->db->bind('last_name', $data['lastName']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('created_by', $data['username']);
        $this->db->bind('created_date', date('Y-m-d h:i:sa'));

        $this->db->execute();

        return $this->db->rowCount();
    }
}
