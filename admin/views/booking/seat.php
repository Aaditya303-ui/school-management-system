<?php
// importing scripts
require_once __DIR__. '/../../controller/sessionController.php';
require_once __DIR__. '/../../controller/seatController.php';

require_once __DIR__. '/../../controller/bookingController.php';
require_once __DIR__. '/../../controller/bookseatController.php';

$sessionController = new sessionController\sessionController();
$seatController = new seatController\seatController();

$bookingController = new bookingController\bookingController();
$bookseatController = new bookseatController\bookseatController();


$sid = 13;
$bid = $bookingController -> displaySid($sid);
$seat_id = $bookseatController -> selectBookedSeats($bid);




$allBookedSeatIds = [];

foreach($bid as $b){
    $bookingId = $b['id'];

    $seats = $bookseatController -> selectBookedSeats($bookingId);

    foreach($seats as $s){
        $allBookedSeatIds[] = $s['seat_id'];
    }
}

print_r($allBookedSeatIds);
?>