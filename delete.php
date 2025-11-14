<?php 

session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "schoolproject";
$port = 3307;

$conn = mysqli_connect($host,$user,$pass,$db,$port);

if($_GET['student_id'])
{
    $user_id = $_GET['student_id'];

    $sql = "DELETE FROM users WHERE id = '$user_id' ";

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        $_SESSION['Message'] = "The data is been deleted successfully";
        header("Location: view_student.php");
    }
}
?>