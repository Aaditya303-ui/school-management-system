<?php

namespace movieController;

require_once __DIR__ . '/../models/movie.php';

use movieModel\movie;

class movieController{

    public function add()
    {
        $img_name = $_FILES['UploadImage']['name'];
        $tmp_img = $_FILES['UploadImage']['tmp_name'];

        $imgFolder = __DIR__."/../assets/image/".$img_name;

      //   $extension = substr($img_name,strlen($img_name)-4,strlen($img_name));
      //   $allowed_extension = array(".jpg",".jpeg",".png",".gif");

      //    if(!in_array($extension, $allowed_extension)){
      //   echo "
      //     <script>
      //       alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');
      //       window.location.href = '/movie-management-system/admin/views/movies/add_movie.php';
      //     </script>
      //   ";
      // }

      move_uploaded_file($tmp_img,$imgFolder);

      $Mname = $_POST['movie_title'];
      $Mduration = $_POST['duration'];
      $Mrating = $_POST['rating'];

      $data = [
        ":movie_title" => $Mname,
        ":movie_img" => $img_name,
        ":duration" => $Mduration,
        ":rating" => $Mrating
      ];

      $movie = new movie();
      return $movie -> addMovie($data);
    }

    public function display()
    {
        $movie = new movie();
        return $movie -> displayAllMovies();
    }

    public function displayId($movie_id)
    {
        $movie = new movie();
        return $movie -> displayMovieById($movie_id);
    }

    public function update($movie_id,$data)
    {
        $movie = new movie();
        return $movie -> UpdateWithUpload($movie_id,$data);
    }

    public function delete($movie_id)
    {
        $movie = new movie();
        return $movie -> deleteMovie($movie_id);
    }
}