<?php 

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$port = 3307;

$data = mysqli_connect($host,$user,$password,$db,$port);

$name = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = '$name' ";
$result = mysqli_query($data,$sql);
$info = mysqli_fetch_assoc($result);



if(isset($_POST['update_profile']))
{
    $s_email = $_POST['email'];
    $s_phone = $_POST['phone'];
    $s_password = $_POST['password'];

    $sql = "UPDATE users 
        SET email='$s_email', phone='$s_phone', password='$s_password' 
        WHERE username='$name'";

    $result2 = mysqli_query($data,$sql);

    if($result2)
    {
        header("location: student_profile.php");
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
    .label-deg{
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .div_deg
    {
        background-color: skyblue;
        width: 500px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
    </style>
</head>
<body>
    <?php include "student-sidebar.php" ?>
    <div class="content">
        
        <center>
            <h1>Add student</h1>
            <form action="#" method="POST">

                <div class="div_deg">

                    <div>
                        <h3 style="text-align: center">Hello <?php echo "{$info['username']}"; ?></h3>
                    </div>
                    <div>
                        <label class="label-deg">Email</label>
                        <input value="<?php echo "{$info['email']}"; ?>" type="email" name="email">
                    </div>
                    <div>
                        <label class="label-deg">Phone</label>
                        <input value="<?php echo "{$info['phone']}"; ?>" type="text" name="phone">
                    </div>
                    <div>
                        <label class="label-deg">Password</label>
                        <input value="<?php echo "{$info['password']}"; ?>" type="password" name="password">
                    </div>
                    <div>
                        <input class='btn btn-primary' type="submit" name="update_profile">
                    </div>
                </div>
        </form>
        </center>
        
    </div>
</body>
</html>