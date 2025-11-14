<?php 

session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "schoolproject";
$port = 3307;

$data = mysqli_connect($host,$user,$pass,$db,$port);

$id = $_GET['teacher_id'];

// Fetch old data
$sql = "SELECT * FROM teacher WHERE id = '$id'";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update_teacher']))
{
    $t_name = $_POST['name'];
    $t_desc = $_POST['description'];

    // Get new image
    $file = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    // Destination path
    $dst = "./image/" . $file;
    $dst_db = "image/" . $file;

    // Move file
    move_uploaded_file($tmp, $dst);

    // Update query (always updates image)
    $sql1 = "UPDATE teacher 
             SET name='$t_name', description='$t_desc', image='$dst_db'
             WHERE id='$id'";

    $query = mysqli_query($data, $sql1);

    if($query)
    {
        header("location: admin_view_teacher.php");
    }
    else
    {
        echo "Error updating teacher!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 0;
        }

        .content {
            margin-left: 260px; /* space for sidebar */
        }

        .form-card {
            background: #ffffff;
            width: 420px;
            padding: 35px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
            text-align: left;
        }

        label {
            display: block;
            font-size: 15px;
            margin-bottom: 6px;
            color: #333;
            font-weight: 600;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            font-size: 15px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            outline: none;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #3b82f6;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: 0.25s;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

    <?php include "admin-sidebar.php"; ?>

    <div class="content">
        <center>
            <div class="form-card">
                <div class="form-title">Update Teacher</div>

                <form action="#" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name">Teacher Name</label>
                        <input value="<?php echo "{$row['name']}" ?>" type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input value="<?php echo "{$row['description']}" ?>" type="text" id="description" name="description" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" id="image" name="image" required>
                        <img style="height: 100px; width: 150px;" src="<?php echo "{$row['image']}"; ?>" alt="">
                    </div>

                    <button type="submit" name="update_teacher" class="btn-primary">Update</button>

                </form>
            </div>
        </center>
    </div>

</body>
</html>
