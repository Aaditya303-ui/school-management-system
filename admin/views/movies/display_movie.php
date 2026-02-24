<?php 

session_start();

if(!isset($_SESSION['email'])){
    header("Location: /movie-management-system/admin/login.php");
    exit();
}

// importing scripts
require_once __DIR__. '/../../controller/movieController.php';

// controller
$movieController = new movieController\movieController();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/styles/sidebar.css">
    <link rel="stylesheet" href="../../assets/styles/movie/display_movie.css">
</head>
<body>
    <?php include_once '../../includes/sidebar.php'; ?>
    <div class="content">
        <table class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Duration</th>
                    <th>Rating</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th><a class="btn btn-danger" href="add_movie.php">+</a></th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $movieController = new movieController\movieController();
              $movies = $movieController -> display();
            ?>

            <?php if(isset($movies)): ?>
                <?php foreach($movies as $m): ?>
        <tr>
            <td><?php echo $m['movie_id']; ?></td>
            <td><?php echo $m['movie_title']; ?></td>
            <td>
                <div class="display-img">
                    <img class='display-img' src="../../assets/image/<?php echo $m['movie_img']; ?>" alt="">
                </div>
            </td>
            <td><?php echo $m['duration']; ?></td>
            <td><?php echo $m['rating']; ?></td>
            <td>
                <a href="update_movie.php?q=<?php echo $m['movie_id']; ?>" class="btn btn-warning">
                    Update
                </a>
            </td>
            <td>
                <a href="delete_movie.php?q=<?php echo $m['movie_id']; ?>" class="btn btn-danger">
                    Delete
                </a>
            </td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
            </tbody>
    </table>
    </div>
</body>
</html>