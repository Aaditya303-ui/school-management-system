<?php
namespace seatController;

require_once __DIR__ . '/../models/seat.php';

use seatModel\seat;

class seatController{

    public function displayByHid($hid)
    {
        $seat = new Seat();
        return $seat -> displaySeatsByHallId($hid);
    }

    public function add($data)
    {
        $seat = new Seat();
        return $seat -> addBookingSeats($data);
    }

    public function displaySeatByBid($bid)
    {
        $seat = new Seat();
        return $seat -> selectBookedSeats($bid);
    }
}