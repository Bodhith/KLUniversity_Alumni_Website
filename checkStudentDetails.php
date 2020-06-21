<?php

  session_start();

  if( $_SESSION['checkStudentDetails'] != 1 )
  {
     header("Location: index.php");
  }

  unset($_SESSION['checkStudentDetails']);

 ?>

<html>

<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


  <link rel='stylesheet' href='CSS/checkStudentDetails.css'>

</head>

<body>

  <form action='checkStudentDetailsQuery.php' method='post'>

    Date:

    <input type='date' name='queryDate' required>

    <br><br>

    Event Id:

    <input type='text' name='eId' required>

    <br><br>

    <input type='submit' class="btn btn-info" value='Submit' name='checkStudentDetailsSubmit'>

  </form>

</body>

</html>
