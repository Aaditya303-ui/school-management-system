<?php
// importing scripts
require_once __DIR__. '/../../controller/sessionController.php';
require_once __DIR__. '/../../controller/seatController.php';
require_once __DIR__. '/../../controller/bookingController.php';
require_once __DIR__. '/../../controller/bookseatController.php';

$sessionController = new sessionController\sessionController();
$seatController = new seatController\seatController();
$bookseatController = new bookseatController\bookseatController();

$booking = new bookingController\bookingController();

if(isset($_POST['book_btn'])){
    $selectedSeats = $_POST['seats'] ?? [];
    $customerName = $_POST['customer_name'];
    $session_id = $_POST['session_id'];

    if(empty($selectedSeats)){
        echo "alert('Please select the seat')";
    }

    $conn = (new \database\Database())->connect();

    $placeholder = implode(',',array_fill(0, count($selectedSeats), '?'));
    $stmt = $conn -> prepare("SELECT id, price FROM seats WHERE id IN ($placeholder)");
    $stmt -> execute($selectedSeats);
    $seatData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total_amount = 0;
    $bookingId = $conn->lastInsertId();

    foreach($seatData as $seat){
        $total_amount += $seat['price'];
    }

    foreach($seatData as $seat){
        $seat_id = $seat['id'];
        $seat_price = $seat['price'];
    }

    $data1 = [
    "session_id" => $session_id,
    "customer_name" => $customerName,
    "total_amount" => $total_amount
];

$bookingId = $booking->add($data1);

echo "<script>
        alert('Booking added successfully');
        window.location.href = '/movie-management-system/admin/views/booking/display_booking.php'
      </script>";

if($bookingId){
    foreach($seatData as $seat){
        $data2 = [
            "booking_id" => $bookingId,
            "seat_id" => $seat['id'],
            "price" => $seat['price']
        ];
        $bookseatController->add($data2);
    }
} else {
        echo "<script>alert('Error creating main booking');</script>";
    }
}
