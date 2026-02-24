<?php

// importing scripts
require_once __DIR__. '/../../controller/movieController.php';

// controller
$movieController = new movieController\movieController();

$movie_id = $_GET['q'];

if($movieController -> delete($movie_id)){
        echo "<script>
        alert('Movie Data deleted successfully!'); 
         window.location.href='/movie-management-system/admin/views/movies/display_movie.php';
        </script>";
}