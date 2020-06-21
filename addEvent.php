<?php

  session_start();

  if( $_SESSION['addEvent'] != 1 )
  {
       header("Location: index.php");
  }

  unset($_SESSION['addEvent']);

  $_SESSION['adminQuery'] = 1;

 ?>

<html>

  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/addEvent.css">
  </head>

  <form action="addEventQuery.php" method="post">

    Event Id:

    <input type="text" name="eId">

    <br><br>

    Event Start Date:

    <input type="date" name="sDate">

    <br><br>

    Event End Date:

    <input type="date" name="eDate">

    <br><br>

    <input type="submit" class="btn btn-info" value="Submit">

  </form>

</html>
