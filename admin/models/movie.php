<?php

namespace movieModel;
require_once __DIR__. '/../config/database.php';

use database\Database;

class movie{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this -> conn = $database -> connect();
    }

    public function addMovie($data){
        $sql = "INSERT INTO movie
                (movie_title,movie_img,duration,rating)
                VALUES
                (:movie_title,:movie_img,:duration,:rating)";

        $stmt = $this -> conn -> prepare($sql);

        $query_execute = $stmt -> execute($data);

        if($query_execute)
        {
            echo "
            <script>
                alert('Details added successfully');
                window.location.href = '/movie-management-system/admin/views/movies/display_movie.php'
            </script>
            ";
        }else{
             echo "
            <script>
                alert('Details didnt got added');
                window.location.href = '/movie-management-system/admin/views/movies/display_movie.php'
            </script>
            ";
        }
    }

    public function displayAllMovies()
    {
        $sql = "SELECT * FROM movie";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    }

    public function displayMovieById($movie_id)
    {
        $sql = "SELECT * FROM movie WHERE movie_id = :movie_id";
        $stmt = $this -> conn -> prepare($sql);
        $data = [":movie_id" => $movie_id];
        $stmt -> execute($data);
        return $stmt -> fetch(\PDO::FETCH_ASSOC);
    }

    public function deleteMovie($movie_id)
    {
        $sql = "DELETE FROM movie WHERE movie_id = :movie_id";
        $stmt = $this -> conn -> prepare($sql);
        $data = [":movie_id" => $movie_id];
        $stmt -> execute($data);
        $query_execute = $stmt -> execute($data);

        if($query_execute){
            return true;
        }
    }

    public function UpdateWithUpload($movie_id,$data)
    {
        $data[":movie_id"] = $movie_id;
        $fields = "
                 movie_title = :movie_title,
                 duration = :duration,
                 rating = :rating
        ";
        if(isset($data[':movie_img'])){
             $fields .= ", movie_img = :movie_img";
        }

        $sql = "UPDATE movie SET $fields WHERE movie_id = :movie_id";

         $stmt = $this -> conn -> prepare($sql);
         $query_execute = $stmt -> execute($data);

        if($query_execute){
            echo "
            <script>
                alert('Details updated successfully');
                window.location.href = '/movie-management-system/admin/views/movies/display_movie.php'
            </script>";
        }else{
            echo "
            <script>
                alert('Details didnt updated');
                window.location.href = '/movie-management-system/admin/views/movies/display_movie.php'
            </script>";
        }
    }
}