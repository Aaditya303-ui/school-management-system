<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "schoolproject";
$port = 3307;

$conn = mysqli_connect($host,$user,$pass,$db,$port);
$sql = "DELETE FROM teacher WHERE id = '$teacher_id' ";

$result = mysqli_query($conn,$sql);

if($_GET['teacher_id'])
{
    $teacher_id = $_GET['teacher_id'];

    $sql1 = "DELETE FROM teacher WHERE id = '$teacher_id' ";

    $query = mysqli_query($conn,$sql1);

    if($query)
    {
        header("location: admin_view_teacher.php");
    }
}
?>