<?php
namespace bookingController;

require_once __DIR__ . '/../models/booking.php';

use bookingmodel\booking;

class bookingController{

    public function add($data1)
    {
        $book = new booking();
        return $book -> addBooking($data1);
    }

    public function displaySid($sid)
    {
        $book = new booking();
        return $book -> displayIdBySessionId($sid);
    }
}