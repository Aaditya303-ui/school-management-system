<?php

namespace hall;
require_once __DIR__. '/../config/database.php';

use database\Database;

class hall{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this -> conn = $database -> connect();
    }

    public function displayHall()
    {
        $sql = "SELECT * FROM halls";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    }
}