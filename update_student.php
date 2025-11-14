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

$conn = mysqli_connect($host,$user,$pass,$db,$port);
$id = $_GET['student_id'];

$sql = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phoneNo'];
    $password = $_POST['password'];

    $query = "UPDATE users 
              SET username='$name', email='$email', phone='$phone', password='$password' 
              WHERE id='$id'";

    $result2 = mysqli_query($conn,$query);

    if($result2)
    {
        echo "
              <script>
                alert('Data has been updated successfully');
                window.location.href='view_student.php';
              </script>
        ";
    }else{
        echo "error";
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
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <?php include "admin-sidebar.php"?>
    <div class="content">
        <center>
            <h1>Update student data</h1>
            <?php 
            
            ?>
         <div class="div_deg">
            <form action="" method="POST">
                <input type="hidden" 
                name="id" 
                value="<?php echo $row['id']; ?>">
                <div>
                    <label>UserName</label>
                    <input 
                    type="text" 
                    name="name"
                    value="<?php echo "{$row['username']}"; ?>">
                </div>
                <div>
                    <label>Email</label>
                    <input 
                    type="email" 
                    name="email"
                    value="<?php echo "{$row['email']}"; ?>">
                </div>
                <div>
                    <label>Phone No</label>
                    <input type="number" 
                    name="phoneNo"
                    value="<?php echo "{$row['phone']}"; ?>"
                    >
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" 
                    name="password"
                    value="<?php echo "{$row['password']}"; ?>">
                </div>
                <input 
                    class="btn btn-primary" 
                    type="submit" 
                    name="update" 
                    value="Update student"
                    onclick="alert('Updating student data...');">
            </form>
        </div>
        </center>
    </div>
</body>
</html>