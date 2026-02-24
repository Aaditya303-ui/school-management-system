<?php
namespace hallController;

require_once __DIR__ . '/../models/hall.php';

use hall\hall;

class hallController{

    public function display()
    {
        $hall = new hall();
        return $hall -> displayHall();
    }

}