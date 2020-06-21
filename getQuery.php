<?php

function getQuery($date,$sNum,$cCode)
{
  require "dataBaseConnection.php";

  echo "<br><br>";

  $query = "select * from student_event_details where dates='$date' and sNum=$sNum and cCode='$cCode';" ;

  $result = mysqli_query($connection,$query);

  if( mysqli_num_rows($result) )
  {
    return $result;
  }

  $notice = "No Student Found.";

  die($notice);
}

$notice = "";

 ?>
