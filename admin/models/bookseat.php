<?php

namespace bookseatModel;
require_once __DIR__. '/../config/database.php';

use database\Database;

class bookseat{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this -> conn = $database -> connect();
    }

    public function addBookingSeats($data1)
    {
        $sql = "INSERT INTO booking_seats
        (booking_id, seat_id,price) 
        VALUES (:booking_id, :seat_id, :price)";

        $stmt = $this -> conn -> prepare($sql);

        return $stmt -> execute($data1);
    }

    public function selectBookedSeats($bid)
    {
        $sql = "SELECT seat_id FROM booking_seats 
        WHERE booking_id = :booking_id";

        $stmt = $this -> conn -> prepare($sql);
        $data = [
            "booking_id" => $bid
        ];
        $stmt -> execute($data);
        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    }
}