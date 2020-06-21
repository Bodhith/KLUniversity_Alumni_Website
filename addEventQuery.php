<?php

  session_start();

  $_SESSION['addEvent'] = 1;

  function addEvent($eId,$sDate,$eDate)
  {
    require "dataBaseConnection.php";

    $query = "select eId from events where eId='$eId'";

    $result = mysqli_query($connection,$query);

    if( mysqli_num_rows($result) )
    {
       $note = "Event Id Already Exists.";
    }

    else
    {

      $query = "insert into events(eId,sDate,eDate) values ('$eId','$sDate','$eDate');" ;

      $result = mysqli_query($connection,$query);

      $note = "Event Added Successfully.";
    }
    return $note;
  }

  $eId = $_POST['eId'];

  $sDate = $_POST['sDate'];

  $eDate = $_POST['eDate'];

  $note = addEvent($eId,$sDate,$eDate);

 ?>

 <html>

  <head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/addEventQuery.css">

  </head>

  <body>

    <?php

        echo "<p>",$note,"</p>";

     ?>

  </body>

 </html>
