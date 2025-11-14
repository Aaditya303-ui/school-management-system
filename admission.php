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

$sql = "SELECT * FROM admission";
$result = mysqli_query($data,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    include 'admin-sidebar.php';
    ?>
    <div class="content">
        <h1 style="text-align: center; padding-bottom: 40px">Applied for Admission</h1>

        <table class="table">
            <tr>
                <th style="padding: 20px; font-size: 15px">Name</th>
                <th style="padding: 20px; font-size: 15px">Email</th>
                <th style="padding: 20px; font-size: 15px">Phone</th>
                <th style="padding: 20px; font-size: 15px">Message</th>
            </tr>
             <?php 

            while ($info = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td style='padding:10px;'>{$info['name']}</td>
                    <td style='padding:10px;'>{$info['email']}</td>
                    <td style='padding:10px;'>{$info['phone']}</td>
                    <td style='padding:10px;'>{$info['message']}</td>
                </tr>";
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</html>