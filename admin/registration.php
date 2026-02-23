<?php
include_once '../admin/config/database.php';

use database\database;

$message = "";
$nameErr = "";
$emailErr = "";
$passErr = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($name) && empty($email) && empty($password)){
        $nameErr = "Name is required";
        $emailErr = "Email is required";
        $passErr = "Password is required";
    }elseif(empty($name)){
        $nameErr = "Name is required";
    }elseif(empty($email)){
        $emailErr = "Email is required";
    }elseif(empty($password)){
        $passErr = "Password is required";
    }else{
    $db = new Database();
    $conn = $db -> connect();

    $stmt = $conn -> prepare("SELECT id FROM admin WHERE email = :email");
    $stmt -> execute([":email" => $email]);

    if($stmt->rowCount()>0){
        $message = "Account already taken";
    }else{
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $insert = $conn -> prepare(
            "INSERT INTO admin 
            (name,email,password) VALUES (:name,:email,:password)");

            $insert -> execute([
                ":name" => $name,
                ":email" => $email,
                ":password" => $hashedPassword
            ]);

            echo "
            <script>
                alert('Account created successfully login with credentials');
                window.location.href = '../admin/login.php'
            </script>";
        exit();
    }

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../admin/assets/styles/registration.css">
</head>
<body>
    <div class="container">
        <h4>Registration page</h4>
        <span class="error msg"><?php echo $message; ?></span>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text"
                value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>"  
                name="username" placeholder="User Name: ">
                <span class="error"><?php echo $nameErr ?></span> 
            </div>
            <div class="form-group">
                <input type="email" 
                value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"  
                name="email" 
                placeholder="Email: ">
                <span class="error"><?php echo $emailErr ?></span>
            </div>
            <div class="form-group">
                <input 
                type="password" 
                value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>" 
                name="password" 
                placeholder="password: ">
                <span class="error"><?php echo $passErr; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Register" name="submit">
            </div>
            <a href="login.php" id="login">Login</a>
        </form>
    </div>
</body>
</html>