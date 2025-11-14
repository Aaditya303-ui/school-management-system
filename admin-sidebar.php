<?php 
// session_start();

// if(!isset($_SESSION['username']))
// {
//     header("location: login.php");
// }elseif($_SESSION['usertype'] == 'student')
// {
//     header("location: login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<style>
</style>
<body>
    <header class="header">
        <a href="">Admin Dashboard</a>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li>
                <a href="admission.php">Admission</a>
            </li>
            <li>
                <a href="add_student.php">Add student</a>
            </li>
            <li>
                <a href="view_student.php">View student</a>
            </li>
             <li>
                <a href="admin_add_teacher.php">Add Teacher</a>
            </li>
            <li>
                <a href="admin_view_teacher.php">View Teacher</a>
            </li>
            <li>
                <a href="admin_add_course.php">Add Courses</a>
            </li>
            <li>
                <a href="admin_view_course.php">View Courses</a>
            </li>
        </ul>
    </aside>

    <div class="content">
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
crossorigin="anonymous"></script>
</body>
</html>