<?php

namespace bookingmodel;
require_once __DIR__. '/../config/database.php';

use database\Database;

class booking{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this -> conn = $database -> connect();
    }

    public function addBooking($data1)
    {
        $sql = "
        INSERT INTO bookings
                (session_id,customer_name,total_amount)
                VALUES
                (:session_id,:customer_name,:total_amount)
        ";

        $stmt = $this -> conn -> prepare($sql);
        if($stmt->execute($data1)) {
        return $this->conn->lastInsertId(); // Return the ID here!
        }
    return false;
    }

    public function displayIdBySessionId($sid)
    {
        $sql = "SELECT id FROM bookings WHERE session_id = :session_id";
        $stmt = $this -> conn -> prepare($sql);
        $data = [":session_id" => $sid];
        $stmt -> execute($data);
        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    }
}