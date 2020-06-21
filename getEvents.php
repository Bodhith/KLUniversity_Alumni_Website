<?php

    function getEvents()
    {
      require "dataBaseConnection.php";

      $currDate = date('Y-m-d');

      $result = mysqli_query($connection,"SELECT * FROM events");

      $events = array("Something");

      for($i=0,reset($events);$row = mysqli_fetch_assoc($result);)
      {
        $eDate = $row['eDate'];

        if( $currDate < $eDate )
        {
          $events[$i++] = $row['eId'];
        }
      }

      return $events;
    }

    $events = getEvents();

?>
