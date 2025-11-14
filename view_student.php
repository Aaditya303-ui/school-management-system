<?php 
error_reporting(0);
session_start();

if(!isset($_SESSION['username']))
{
    header("location: login.php");
}elseif($_SESSION['usertype'] == 'student')
{
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "schoolproject";
$port = 3307;

$data = mysqli_connect($host,$user,$pass,$db,$port);

$sql = "SELECT * FROM users WHERE usertype='student'";

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
    <?php include "admin-sidebar.php"; ?>
    <div class="content">
        <h1 style="text-align: center; padding-bottom: 40px">Student Data</h1>

        <?php 
        if($_SESSION['Message'])
        {
            echo $_SESSION['Message'];
        }
        unset($_SESSION['Message']);
        ?>
        <table class="table">
            <tr>
                <th>UserName</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($result))
            {
                echo"
                <tr>
                    <td style='padding:10px;'>{$row['username']}</td>
                    <td style='padding:10px;'>{$row['email']}</td>
                    <td style='padding:10px;'>{$row['phone']}</td>
                    <td style='padding:10px;'>{$row['password']}</td>
                    <td style='padding:10px;'>
                    <a onClick=\" javascript: return confirm('Are you sure you want to delete this');\" 
                    href = 'delete.php?student_id={$row['id']}' class= 'btn btn-danger'>
                    Delete
                    </a>
                    </td>
                    <td style='padding:10px;'>
                    <a href = 'update_student.php?student_id={$row['id']}' class= 'btn btn-warning'>
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