<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "schoolproject";
$port = 3307;

$conn = mysqli_connect($host,$user,$pass,$db,$port);

$sql = "SELECT * FROM course";

$result = mysqli_query($conn,$sql);

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
        <center>
            <h2>Course data</h2>
            <table class="table">
                <tr>
                    <th style='padding:10px; text-align: center;'>Id</th>
                    <th style='padding:10px; text-align: center;'>Name</th>
                    <th style='padding:10px; text-align: center;'>Description</th>
                    <th style='padding:10px; text-align: center;'>Image</th>
                    <th style='padding:10px; text-align: center;'>Created At</th>
                    <th style='padding:10px; text-align: center;'>Delete</th>
                </tr>
                <?php 
                while($info = mysqli_fetch_assoc($result))
                {
                    echo "
                    <tr>
                      <td style='padding:10px; text-align: center;'>{$info['id']}</td>
                      <td style='padding:10px; text-align: center;'>{$info['name']}</td>
                      <td style='padding:10px; text-align: center;'>{$info['description']}</td>
                      <td style='padding:10px; text-align: center;'>
                      <img style='height:100px; width: 200px;'  src='{$info['image']}' />
                      </td>
                      <td style='padding:10px; text-align: center;'>{$info['created_at']}</td>
                      <td>
                      <a class = 'btn btn-danger' src = 'delete_course.php'>Delete</a>
                      </td>
                    </tr>
                    ";
                }
                ?>
            </table>
        </center>
    </div>
</body>
</html>