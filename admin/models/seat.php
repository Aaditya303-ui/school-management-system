<?php

namespace seatModel;
require_once __DIR__. '/../config/database.php';

use database\Database;

class Seat{
    private $conn;

    public function __construct()
    {
       $database = new Database();
       $this -> conn = $database -> connect(); 
    }

    public function displaySeatsByHallId($hid)
    {
        $sql = "SELECT * FROM seats WHERE hall_id = :hall_id";
        $stmt = $this -> conn -> prepare($sql);
        $data = [":hall_id" => $hid];
        $stmt -> execute($data);
        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    }
}