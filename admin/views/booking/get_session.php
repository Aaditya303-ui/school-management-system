<?php

require_once '../../controller/sessionController.php';

$q = intval($_GET['q']);

$sessionController = new sessionController\sessionController();

$sessions = $sessionController -> displayByMovieId($q);

echo '<table class="table session-table">

  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Hall</th>
      <th scope="col">Date</th>
      <th scope="col">Start-time</th>
      <th scope="col">End-time</th
      <th scope="col"></th>
      <th scope="col">Booking</th>
    </tr>
  </thead>';

foreach($sessions as $s){
    echo "<tr>";
    echo "<td>".$s['id']."</td>";
    echo "<td>".$s['hall_id']."</td>";
    echo "<td>".$s['session_date']."</td>";
    echo "<td>".$s['start_time']."</td>";
    echo "<td>".$s['end_time']."</td>";
    echo '<td>
            <a class="btn btn-primary" href="book_seat.php?session_id='.$s['id'].'">
                Book
            </a>
          </td>';

}