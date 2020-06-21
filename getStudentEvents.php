<?php

  function getStudentEvents($userId,$eventId)
  {
    require "dataBaseConnection.php";

    $query = "select distinct(eId) from student_event where sId = $userId";

    $result = mysqli_query($connection,$query);

    $index = 0;

    while( $row = mysqli_fetch_assoc($result) )
    {
      $eventIds[$index++] = $row['eId'];
    }

    echo json_encode($eventIds);
  }

  getStudentEvents($_POST['userId'],$_POST['eventId']);

 ?>
