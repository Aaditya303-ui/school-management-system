<?php 

// importing scripts
require_once __DIR__. '/../../controller/movieController.php';

// controller
$movie_id = $_GET['q'];
$movieController = new movieController\movieController();
$movie = $movieController -> displayId($movie_id);

if(isset($_POST['update-btn'])){
    $movie_id = $_GET['q'];

    $Mname = $_POST['movie_title'];
    $duration = $_POST['duration'];
    $rating = $_POST['rating'];

    $old_pic = $_POST['old_pic'];

    $data = [
        ":movie_title" => $Mname,
        ":duration" => $duration,
        ":rating" => $rating
    ];

    if(!empty($_FILES['UploadNewImage']['name'])){
        $New_img_file = $_FILES['UploadNewImage']['name'];
        $tmp_new = $_FILES['UploadNewImage']['tmp_name'];
        $new_img_name = time()."_".$New_img_file;
        $target_img = "../../assets/image/".$new_img_name;

        if(move_uploaded_file($tmp_new,$target_img)){
            $data[":movie_img"] = $new_img_name;
        }

        if(!empty($old_pic) && file_exists("../../assets/image/".$old_pic)){
            unlink("../../assets/image/".$old_pic);
        }

    }
    $movieController -> update($movie_id,$data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/styles/movie/add_movie.css">
</head>
<style>
    .img{
        height: 140px;
        width: 140px;
    }
    .img1{
        height: 75px;
        width: 75px;
        margin-left: 60px;
        margin-top:10px;
    }
</style>
<body>
        <div class="container">

            <div class="card">
             <a href="display_movie.php"> <- back</a>

             <div class="row">
                 
                 <div class="col-12 text-center">
                     <h3 class="heading">Movie Form</h3>
                     <img class='img' src="../../assets/image/<?php echo $movie['movie_img']; ?>" alt="">
                 </div>
                 <form action="update_movie.php?q=<?php echo $movie_id; ?>" method="post" enctype="multipart/form-data">
                     <div class="col-5 ml-5 mt-3 pl-3">
                         <label>Enter the Movie Name</label>
                         <input 
                          type="text" 
                          name="movie_title" 
                          placeholder="Enter your full Name" 
                          value="<?php echo $movie['movie_title'] ?>"
                          class="form-control">
                     </div>
                     <div class="col-5 ml-5 mt-3 pl-3">
                         <label>Enter the Image of movie</label>

                         <input 
                           type="hidden" 
                           name = "old_pic"
                           value="<?php echo $movie['movie_img']; ?>"
                           >
                         <input type="file" class="form-control" name="UploadNewImage"
                         accept="image/*">
                         <img class="img1" src="../../assets/image/<?php echo $movie['movie_img']; ?>" alt="">
                     </div>
    
                     <div class="col-5 ml-5 mt-3 pl-3">
                         <label>Enter the duration</label>
                         <input 
                         type="number" 
                         name="duration" 
                         placeholder="Enter the duration" 
                         value="<?php echo $movie['duration']; ?>"
                         class="form-control">
                     </div>
    
                     <div class="col-5 ml-5 mt-3 pl-3">
                         <label>Enter the ratings of movie</label>
                         <input 
                         type="text" 
                         name="rating"
                         placeholder="Enter your Rating" 
                         value="<?php echo $movie['rating']; ?>"
                         class="form-control">
                     </div>
    
                     <button name="update-btn" type="submit">Update</button>
                 </form>

             </div>
         </div>
        </div>
</body>
</html>