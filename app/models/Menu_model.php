<?php

class Menu_model
{

    private $table = 'menu';
    private $db;
    public $options = [
        'cost' => 10,
    ];

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRoleMenu($data)
    {
        $dataUser = $data;
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE menu_level=:level');
        $this->db->bind('level', 1);
        return $this->db->resulSet();
    }

    public function getMenuLevel2($data)
    {
        $dataUser = $data;
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE menu_parent=:parent');
        $this->db->bind('parent', $data);
        return $this->db->resulSet();
    }
}
