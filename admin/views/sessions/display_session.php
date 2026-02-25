<?php 
session_start();

if(!isset($_SESSION['email'])){
    header("Location: /movie-management-system/admin/login.php");
    exit();
}

// importing scripts
require_once __DIR__. '/../../controller/movieController.php';
require_once __DIR__. '/../../controller/sessionController.php';
require_once __DIR__. '/../../controller/hallController.php';

// controller
$movieController = new movieController\movieController();
$sessionController = new sessionController\sessionController();
$hallController = new hallController\hallController();

$movie = $movieController -> display();
$hall = $hallController -> display();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/styles/sidebar.css">
    <link rel="stylesheet" href="../../assets/styles/movie/display_movie.css">
</head>
<body>
    <?php include_once '../../includes/sidebar.php'; ?>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Movie</th>
                    <th>Hall</th>
                    <th>Date</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th><a class="btn btn-danger" href="add_session.php">+</a></th>
                </tr>
                <tbody>
                <?php 
                $sessionController = new sessionController\sessionController();
                $movieController = new movieController\movieController();
                $session = $sessionController -> display();
                ?>

            <?php if(isset($session)): ?>
                <?php foreach($session as $s): ?>
                    <tr>
                        <td><?php echo $s['id']; ?></td>
                        <td>
                            <?php 
                            foreach($movie as $m) {
                               if($m['movie_id'] == $s['movie_id']) {
                                   echo $m['movie_title'];
                                   break; 
                            }
                           }
                            ?>
                        </td>
                        <td>
                            <?php  
                            foreach($hall as $h) {
                                if($h['id'] == $s['hall_id']) {
                                    echo $h['name'];
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $s['session_date']; ?></td>
                        <td><?php echo $s['start_time']; ?></td>
                        <td><?php echo $s['end_time']; ?></td>
                        <td>
                         <a href="update_session.php?q=<?php echo $s['id']; ?>" class="btn btn-warning">
                          Update
                          </a>
                        </td>
                        <td>
                             <a href="delete_session.php?q=<?php echo $s['id']; ?>" class="btn btn-danger">
                          Delete
                          </a>
                        </td>
                    </tr>
                     <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </thead>
        </table>
    </div>
</body>
</html>