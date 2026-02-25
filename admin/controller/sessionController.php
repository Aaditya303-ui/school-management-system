<?php

namespace sessionController;

require_once __DIR__ . '/../models/session.php';

use sessionModel\session;

class sessionController{

    public function add($data)
    {
        $session = new Session();
        return $session -> addAllSession($data);
    }

    public function display()
    {
        $session = new Session();
        return $session -> displayAllSession();
    }

    public function displayById($movie_id)
    {
        $session = new Session();
        return $session -> displaySessionById($movie_id);
    }

    public function displayByMovieId($movie_id)
    {
        $session = new Session();
        return $session -> displaySessionByMId($movie_id);
    }

    public function delete($id)
    {
        $session = new Session();
        return $session -> deleteSession($id);
    }

    public function update($id, $data)
    {

        $session = new Session();
        $result = $session->updateSessionById($id, $data);
        if($result) {
          header("Location: display_session.php?status=updated");
          exit();
        }
    
    }
}
