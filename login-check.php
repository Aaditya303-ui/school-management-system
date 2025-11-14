<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$port = 3307;

$data = mysqli_connect($host, $user, $password, $db, $port);

if ($data == false) {
    die("connection died");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$name' AND password='$pass'";
    $result = mysqli_query($data, $sql);

    // ✅ Check if any record found
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row['usertype'] == 'student') {

            $_SESSION['username'] = $name;
            $_SESSION['usertype'] = "student";
            header("Location: studenthome.php");

        } elseif ($row['usertype'] == 'admin') {

            $_SESSION['username'] = $name;
            $_SESSION['usertype'] = "admin";
            header("Location: adminhome.php");
        }
    } else {
        echo "Username or password doesn't match";
    }
}
?>
