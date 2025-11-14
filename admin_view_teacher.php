<?php 

$host = "localhost";
$username = "root";
$pass = "";
$db = "schoolproject";
$port = 3307;

$data = mysqli_connect($host,$username,$pass,$db,$port);
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data,$sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "admin-sidebar.php" ?>
    <div class="content">
        <h1 style="text-align: center;">Our Teachers</h1>

        <table class="table">
            <tr>
                <th style='padding:10px; text-align: center;'>id</th>
                <th style='padding:10px; text-align: center;'>name</th>
                <th style='padding:10px; text-align: center;'>description</th>
                <th style='padding:10px; '>image</th>
                <th style='padding:10px; '>Delete</th>
                <th style='padding:10px; '>Update</th>
            </tr>
            <?php 
            while ($info = mysqli_fetch_assoc($result))
            {
                echo "
                <tr>
                  <td style='padding:10px; text-align: center;'>{$info['id']}</td>
                  <td style='padding:10px; text-align: center;'>{$info['name']}</td>
                  <td style='padding:10px; text-align: center;'>{$info['description']}</td>
                  <td style='padding:10px; height: 100px; width: 100px text-align: center;'>
                  <img style='height: 100px; width: 150px;' src = '{$info['image']}' />
                  </td>
                  <td style='padding:10px; text-align: center;'>
                  <a class='btn btn-danger' href='delete_teacher.php?teacher_id={$info['id']}'>
                  Delete
                  </a>
                  </td>
                   <td style='padding:10px; text-align: center;'>
                  <a class='btn btn-success' href='update_teacher.php?teacher_id={$info['id']}'>
                  Update
                  </a>
                  </td>
                </tr>
                ";
            }
            ?>
        </table>
    </div>
</body>
</html>