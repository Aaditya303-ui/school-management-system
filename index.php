<?php 
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message');
    </script>
    ";
}

if(isset($_SESSION['message']))
{
    $message = $_SESSION['message'];
    echo "<script>alert('$message');</script>";
    unset($_SESSION['message']); // clear it after showing
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "schoolproject";
$port = 3307;

$data = mysqli_connect($host,$user,$pass,$db,$port);
$sql = "SELECT * FROM teacher";
$sql1 = "SELECT * FROM course";

$result = mysqli_query($data,$sql);
$result1 = mysqli_query($data,$sql1);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
    .label-txt{
    display: inline-block;
    width: 100px;
    text-align: right;
    padding-right: 10px;
   }

   .input-deg{
    width: 30%;
    height: 40px;
    border-radius: 25px;
    border: 1px solid blue;
   }
   .adm-int{
    padding-top: 10px;
    padding-bottom: 10px;
   }

   .inp-txt{
    width: 30%;
    height: 120px;
    border-radius: 25px;
    border: 1px solid blue;
   }
  </style>
<body>
    <nav>
        <label class="logo">w-School</label>

        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section-1">
        <label class="img-text">We teach students with care</label>
        <img class="main-img" src="school-bg.png" alt="">
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="welcome_img" src="school-pic-1.png">
            </div>

            <div class="col-md-8">
                <h1>Welcome to W-School</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem rerum tempora praesentium 
                    perferendis maiores laborum deleniti tenetur facere perspiciatis consectetur, quos voluptas 
                    error itaque reiciendis, voluptates cumque iure debitis nemo fugiat eum reprehenderit ut 
                    laboriosam inventore odio. Expedita molestiae aut minima officiis, perspiciatis tempore quia 
                    inventore, quisquam accusantium aperiam delectus mollitia. Atque accusantium veritatis veniam 
                    voluptatem suscipit commodi repellendus explicabo, rem vitae autem sed accusamus dolorem, sint 
                    ratione iusto error cumque ipsam laborum ex fugit dolorum. Perferendis similique dolor tempora 
                    odit recusandae? Placeat ratione, quis dolores voluptas, impedit magnam eligendi doloribus, nulla
                     quidem culpa ducimus quasi ullam nam rerum ipsam.</p>
            </div>

        </div>

    </div>
    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">

   <div class="row">

    <?php 
    while($info = mysqli_fetch_assoc($result))
    {
    ?>
        <div class="col-md-4">
            <img class="teacher" src="<?php echo $info['image']; ?>" alt="">
            <h3><?php echo $info['name']; ?></h3>
            <p><?php echo $info['description']; ?></p>
        </div>
    <?php 
    }
    ?>

</div>


    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">

    <div class="row">

       <?php 
    while($info = mysqli_fetch_assoc($result1))
    {
    ?>
        <div class="col-md-4">
            <img class="teacher" src="<?php echo $info['image']; ?>" alt="">
            <h3><?php echo $info['name']; ?></h3>
            <p><?php echo $info['description']; ?></p>
        </div>
    <?php 
    }
    ?>
        
    </div>
    </div>

    <center>
        <h1 style="padding-top: 50px">Admission Form</h1>
    </center>

    <div align="center" class="admission_form">
        <form action="data-check.php" method="POST">

        <div class="adm-int">
            <label class="label-txt">Name</label>
            <input class="input-deg" type="text" name="name">
        </div>
        <div class="adm-int">
            <label class="label-txt">Email</label>
            <input class="input-deg" type="text" name="email">
        </div>
        <div class="adm-int">
            <label class="label-txt">Phone</label>
            <input class="input-deg" type="text" name="phone">
        </div>
        <div class="adm-int">
            <label class="label-txt">Message</label>
            <textarea class="inp-txt" name="message"></textarea>
        </div>
        <div class="adm-int">
            <input id="submit" class="btn btn-primary" name="apply" type="submit" value="apply">
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>