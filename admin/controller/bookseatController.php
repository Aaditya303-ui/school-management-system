<?php
namespace bookseatController;

require_once __DIR__ . '/../models/bookseat.php';

use bookseatModel\bookseat;

class bookseatController{
    public function add($data)
    {
        $book = new bookseat($data);
        return $book->addBookingSeats($data);
    }

    public function selectBookedSeats($bid)
    {
        $book = new bookseat();
        return $book->selectBookedSeats($bid);
    }
}