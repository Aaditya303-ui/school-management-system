<?php

namespace sessionModel;
require_once __DIR__. '/../config/database.php';

use database\Database;

class Session{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this -> conn = $database -> connect();
    }

    public function displayAllSession()
    {
        $sql = "SELECT * FROM session";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    }

    public function displaySessionByMId($movie_id){
        $sql = "SELECT * FROM session WHERE movie_id = :movie_id";
        $stmt = $this -> conn -> prepare($sql);
        $data = [":movie_id" => $movie_id];
        $stmt -> execute($data);
        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    }

    public function displaySessionById($movie_id)
    {
        $sql = "SELECT * FROM session WHERE id = :id";
        $stmt = $this -> conn -> prepare($sql);
        $data = [":id" => $movie_id];
        $stmt -> execute($data);
        return $stmt -> fetch(\PDO::FETCH_ASSOC);
    }

    public function updateSessionById($id,$data)
    {
        $sql = "UPDATE session set movie_id = :movie_id, 
        hall_id = :hall_id, session_date = :session_date, start_time = :start_time,
        end_time = :end_time WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
    
        // Merge the ID into the data array for execution
        $data['id'] = $id; 
    
        $query_execute = $stmt->execute($data);

        if($query_execute)
        {
            echo "
            <script>
                alert('Details added successfully');
                window.location.href = '/movie-management-system/admin/views/sessions/display_session.php'
            </script>
            ";
        }else{
             echo "
            <script>
                alert('Details didnt got added');
                window.location.href = '/movie-management-system/admin/views/sessions/display_session.php'
            </script>
            ";
        }

    }

    public function deleteSession($id)
    {
        $sql = "DELETE FROM session WHERE id = :id";
        $stmt = $this -> conn -> prepare($sql);
        $data = [":id" => $id];
        $stmt -> execute($data);
        $query_execute = $stmt -> execute($data);

        if($query_execute){
            return true;
        }
    }

    public function addAllSession($data)
    {
        $sql = "
        INSERT INTO session
                (movie_id,hall_id,session_date,start_time,end_time)
                VALUES
                (:movie_id,:hall_id,:session_date,:start_time,:end_time)
        ";

        $stmt = $this -> conn -> prepare($sql);

        $query_execute = $stmt -> execute($data);

        if($query_execute)
        {
            echo "
            <script>
                alert('Details added successfully');
                window.location.href = '/movie-management-system/admin/views/sessions/display_session.php'
            </script>
            ";
        }else{
             echo "
            <script>
                alert('Details didnt got added');
                window.location.href = '/movie-management-system/admin/views/sessions/display_session.php'
            </script>
            ";
        }
    }
}