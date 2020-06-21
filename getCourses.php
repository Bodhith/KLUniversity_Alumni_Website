<?php

  function getCourses()
  {
    require "dataBaseConnection.php";

    $query = "select cId from courses; ";

    $result = mysqli_query($connection,$query);

    $index = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        $courses[$index++] = $row['cId'];
    }

    return $courses;
  }

  $courses = getCourses();

 ?>
