<?php
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

if(isset($_POST['add_student']))
{
    $student_name = $_POST['name'];
    $student_email = $_POST['email'];
    $student_phoneNo = $_POST['phoneNo'];
    $student_password = $_POST['password'];
    $usertype = "student";

    $sql = "INSERT INTO users (username,phone,email,usertype,password)
    VALUES ('$student_name','$student_phoneNo','$student_email','$usertype','$student_password')";

    $result = mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['Message-1'] = "The data is added";
        header("Location: add_student.php");
    }else
    {
        echo "It failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        label
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
            
        }

        .div_deg
        {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
    <?php include "admin-sidebar.php"; ?>
    <div class="content">
        <center>
            <h1>Add student page</h1>
            <?php 
            // if($_SESSION['Message-1'])
            // {
            //     echo $_SESSION['Message-1'];
            // }
            ?>
         <div class="div_deg">
            <form action="add_student.php" method="POST">
                <div>
                    <label>UserName</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Phone No</label>
                    <input type="number" name="phoneNo">
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <input onClick=\"javascript: return alert('Data is been added')\" class="btn btn-primary" type="submit" name="add_student" value="Add student">
            </form>
        </div>
        </center>
    </div>
</body>
</html>