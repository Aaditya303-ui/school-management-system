<?php

// importing scripts
require_once __DIR__. '/../../controller/sessionController.php';

// controller
$sessionController = new sessionController\sessionController();

$movie_id = $_GET['q'];

if($sessionController -> delete($movie_id)){
    echo "<script>
        alert('Session Data deleted successfully!'); 
         window.location.href='/movie-management-system/admin/views/sessions/display_session.php';
        </script>";
}