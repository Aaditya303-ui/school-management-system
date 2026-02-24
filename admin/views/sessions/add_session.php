<?php 
session_start();

if(!isset($_SESSION['email'])){
    header("Location: /movie-management-system/admin/login.php");
    exit();
}

// importing scripts
require_once __DIR__. '/../../controller/movieController.php';
require_once __DIR__. '/../../controller/hallController.php';
require_once __DIR__. '/../../controller/sessionController.php';

// controller
$movieController = new movieController\movieController();
$hallController = new hallController\hallController();
$sessionController = new sessionController\sessionController();

$movies = $movieController -> display();
$halls = $hallController -> display();



if(isset($_POST['submit'])){
    $movie_id = $_POST['movie_id']; 
    $hall_id = $_POST['hall_id'];
    $session_date = $_POST['show_date'];
    $start_time = $_POST['start_time'];


    $selected_movie = $movieController->displayId($movie_id);
    
    if($selected_movie && isset($selected_movie['duration'])) {
        $duration = $selected_movie['duration'];


        $time = new DateTime($start_time);
        $time->modify("+$duration minutes");
        

        $endTime = $time->format("H:i:s");
        $startTimeFormatted = date("H:i:s", strtotime($start_time));

        $data = [
            'movie_id'     => $movie_id,
            'hall_id'      => $hall_id,
            'session_date' => $session_date,
            'start_time'   => $startTimeFormatted,
            'end_time'     => $endTime
        ];

        
        $sessionController->add($data); 
    } else {
        echo "<script>alert('Error: Movie duration not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.1.0/dist/css/coreui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/styles/session/add_session.css">
</head>
<body>
        <div class="container">

            <div class="card">
             <a href="display_session.php"> <- back</a>

             <div class="row">

                 <div class="col-12 text-center">
                     <h3 class="heading">Session Form</h3>
                 </div>
                  <form action="add_session.php" method="post" class="session-form">

    <div class="form-group">
        <label>Movie</label>
        <select name="movie_id" class="form-control" required>
            <option value="">Select Movie</option>
            <?php foreach($movies as $m): ?>
            <option value="<?php echo $m['movie_id']; ?>">
                <?php echo $m['movie_title']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Hall</label>
        <select name="hall_id" class="form-control" required>
            <option value="">Select Hall</option>
            <?php foreach($halls as $h): ?>
            <option value="<?php echo $h['id']; ?>">
                <?php echo $h['name']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Date</label>
        <input type="date" name="show_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Start Time</label>
        <input type="time" name="start_time" class="form-control" required>
    </div>

    <button type="submit" name="submit" class="btn btn-danger w-100 mt-4 text-white">
        Create Session
    </button>

</form>
             </div>
         </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.1.0/dist/js/coreui.bundle.min.js"></script>
</html>