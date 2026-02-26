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
$movie = $movieController -> display();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Booking</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <link rel="stylesheet" href="../../assets/styles/sidebar.css">
     <link rel="stylesheet" href="../../assets/styles/booking/display_booking.css">
</head>
<body>
    <?php include_once __DIR__.'/../../includes/sidebar.php'; ?>
    <div class="content">
        <div class="form-group">
        <label>Movie</label>
        <select name="movie_id" onchange="showSession(this.value)" class="form-control select" required>
            <option value="">Select Movie</option>
            <?php foreach($movie as $m): ?>
            <option value="<?php echo $m['movie_id']; ?>">
                <?php echo $m['movie_title']; ?>
            </option>
            <?php endforeach; ?>
        </select>

        <!-- display session by movie id -->
         <table class="table session-table">
            <thead>
                <tbody id="sessionTable"></tbody>
            </thead>
         </table>
    </div>
    </div>
</body>
</html>
<script>
    function showSession(str){
        if(str == ""){
            document.getElementById("sessionTable").innerHTML = "";
            return;
        }else{
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("sessionTable").innerHTML = this.responseText;
                }
            }
            xhr.open("GET","get_session.php?q="+str,true);
            xhr.send();
        }
    }
</script>