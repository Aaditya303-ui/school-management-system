<?php
// importing scripts
require_once __DIR__. '/../../controller/sessionController.php';
require_once __DIR__. '/../../controller/seatController.php';
require_once __DIR__. '/../../controller/bookingController.php';

$sid = $_GET['session_id'];

// controller
$sessionController = new sessionController\sessionController();
$seatController = new seatController\seatController();

$bookingController = new bookingController\bookingController();

$sessionController = new sessionController\sessionController();
$sessionData = $sessionController->displayByHId($sid);

if ($sessionData) {
    $hid = $sessionData['hall_id']; 
    $seats = $seatController->displayByHid($hid);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Seats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/styles/seat/seat.css">

</head>
<body>
    <!-- <form method="post" action="book_seats.php">
        <?php 
        $currentRow = '';
        
        foreach($seats as $seat):
        
            if($currentRow != $seat['seat_row']):
                if($currentRow != ''):
                    echo "</div>"; // close previous row
                endif;
        
                $currentRow = $seat['seat_row'];
                echo "<div style='margin-bottom:10px;'>"; // start new row
            endif;
        ?>
        
            <span style="display:inline-block; width:40px;">
                <input type="checkbox" name="seats[]" value="<?php echo $seat['id']; ?>">
                <input type="hidden" name="price" value="<?php echo $seat['price']; ?>">
                <?php echo $seat['seat_row'] .$seat['number']; ?>
            </span>
        
        <?php endforeach; ?>
         <input type="hidden" name="session_id" value="<?php echo $sid; ?>">
         <input type="text" name="customer_name" placeholder="Your Name" required>
         <button type="submit" name="book_btn">Confirm Booking</button>
    </form> -->

    <a href="display_booking.php"><- Back</a>
<div class="theater-container">
    <div class="screen">SCREEN</div>

    <form method="post" action="book_seats.php">
        <?php 
        $currentRow = '';
        
        foreach($seats as $seat):
            $rowLabel = $seat['seat_row']; // A, B, C etc.
            
            // Determine Seat Category Class
            $categoryClass = 'standard';
            if(in_array($rowLabel, ['E', 'F', 'G'])) { $categoryClass = 'vip'; }
            if(in_array($rowLabel, ['H', 'I', 'J'])) { $categoryClass = 'disabled-access'; }

            // Logic to display Section Headers and start new rows
            if($currentRow != $rowLabel):
                if($currentRow != ''): echo "</div>"; endif; // Close previous row

                // Add Section Titles for Clarity
                if($currentRow == '' && in_array($rowLabel, ['A','B','C','D'])) echo "<div class='section-title'>Standard Section</div>";
                if($currentRow == 'D' && $rowLabel == 'E') echo "<div class='section-title'>VIP Golden Circle</div>";
                if($currentRow == 'G' && $rowLabel == 'H') echo "<div class='section-title'>Disabled Access (Rear)</div>";

                $currentRow = $rowLabel;
                echo "<div class='seat-row'>"; // Start new row
            endif;
        ?>
        
            <div class="seat-item">
                <input type="checkbox" name="seats[]" id="seat-<?php echo $seat['id']; ?>" value="<?php echo $seat['id']; ?>">
                <label for="seat-<?php echo $seat['id']; ?>" class="seat-label <?php echo $categoryClass; ?>">
                    <?php echo $rowLabel . $seat['number']; ?>
                </label>
                <input type="hidden" name="price" value="<?php echo $seat['price']; ?>">
            </div>
        
        <?php endforeach; ?>
        </div> <hr>
        <div class="booking-footer">
            <input type="hidden" name="session_id" value="<?php echo $sid; ?>">
            <input type="text" name="customer_name" class="form-control mb-2" style="max-width:300px; margin:auto;" placeholder="Enter Customer Name" required>
            <button type="submit" name="book_btn" class="btn btn-danger btn-lg">Confirm Booking</button>
        </div>
    </form>
</div>
</body>
</html>


