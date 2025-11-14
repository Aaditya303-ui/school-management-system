<?php 
session_start();
$host = "localhost";
$user = "root";
$password = "";
$port = 3307;
$db = "schoolproject";

$data = mysqli_connect($host,$user,$password,$db,$port);

if($data == false)
{
    die("Connection lost");
}

if(isset($_POST['apply']))
{
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_msg = $_POST['message'];

    $sql = "INSERT INTO admission(name,email,phone,message) 
    VALUES ('$data_name','$data_email','$data_phone','$data_msg')";

    $result = mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message'] = "your application sent successfully";

        header("location: index.php");
    }else{
        echo "Applied failed";
    }
}
?>