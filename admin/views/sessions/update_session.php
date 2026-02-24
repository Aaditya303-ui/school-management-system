<?php 

$movie_id = $_GET['q'];
// importing scripts
require_once __DIR__. '/../../controller/movieController.php';
require_once __DIR__. '/../../controller/sessionController.php';
require_once __DIR__. '/../../controller/hallController.php';

// controller
$movieController = new movieController\movieController();
$sessionController = new sessionController\sessionController();
$hallController = new hallController\hallController();

$movies = $movieController -> display();
$session = $sessionController -> displayById($movie_id);
$hall = $hallController -> display();

if(isset($_POST['update'])){
    $session_id = $_GET['q']; 
    $movie_id = $_POST['movie_id']; 
    $hall_id = $_POST['hall_id'];
    $session_date = $_POST['show_date'];
    $start_time = $_POST['start_time'];

    // CRITICAL: Fetch the movie to get the duration for the new end_time
    $selected_movie = $movieController->displayId($movie_id);
    
    if($selected_movie) {
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


        $sessionController->update($session_id, $data); 
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
                     <h3 class="heading">Update Session</h3>
                 </div>
                  <form action="update_session.php?q=<?= $_GET['q']; ?>" method="post" class="session-form">

    <div class="form-group">
        <label>Movie</label>
        <select name="movie_id" class="form-control" required>
            <option value="">Select Movie</option>
            <?php foreach($movies as $m){?>
                <option value="<?php echo $m['movie_id']; ?>" <?= ($session['movie_id'] == $m['movie_id']) ? 'selected' : ''; ?>>
                    <?= $m['movie_title']; ?>
                </option>
            <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label>Hall</label>
        <select name="hall_id" class="form-control" required>
        <option value="">Select Hall</option>
        <?php foreach($hall as $h): ?>
            <option value="<?= $h['id']; ?>" <?= ($session['hall_id'] == $h['id']) ? 'selected' : ''; ?>>
                <?= $h['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    </div>

    <div class="form-group">
        <label>Date</label>
        <input type="date" 
        name="show_date" 
        class="form-control"
        value="<?php echo $session['session_date']; ?>"
        required>
    </div>

    <div class="form-group">
        <label>Start Time</label>
        <input type="time" 
        name="start_time" 
        class="form-control"
        value="<?php echo $session['start_time']; ?>" 
        required>
    </div>

    <button type="submit" name="update" class="btn btn-danger w-100 mt-4 text-white">
        Update Session
    </button>

</form>
             </div>
         </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.1.0/dist/js/coreui.bundle.min.js"></script>
</html>